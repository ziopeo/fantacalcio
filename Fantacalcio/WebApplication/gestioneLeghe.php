<?php
//caricaGiocatori: inserisce i giocatori con un query sul database da un array di giocatori
function caricaGiocatori($file)
{	$giocatori=peoCsvtoArray($file);
	$idArchivioLega=creaArchivioLega();
	for ($i=1; $i<=count($giocatori); $i++){
		$arr=$giocatori[$i];
		$conn=getDatabase();	
		$queryInserisci = 'INSERT INTO Giocatore(`idgiocatore`, `ruolo`, `nome`, `squadra`, `prezzoIniziale`, `prezzoAttuale`) VALUES ('. $arr[0].' ,"'. $arr[2].'","'. $arr[1].'","'. $arr[4].'",'. $arr[5].','. $arr[6].')';
	 	echo $queryInserisci;
	 	$queryArchivia='INSERT INTO `GiocatoreArchiviato`(`archivioLega`, `giocatore`) VALUES ('. $idArchivioLega .','.$arr[0]. ')'; 
 		mysqli_query($conn, $queryInserisci) or die ("Errore queryInserisci\n ");
		$result =mysqli_query($conn, $queryArchivia) or die ("Errore queryArchivia\n ");
	}
return $result;
}

function creaArchivioLega()
{
	$idAteneo=getLegaAteneoCorrente();
	 $today = date("Y-m-d H:00:00");
	$queryCreaArchivio='INSERT INTO `ArchivioLega`(`lega`, `dataUpload`) VALUES ('.$idAteneo.',"'. $today .'")';
	$conn=getDatabase();
	mysqli_query($conn, $queryCreaArchivio) or die ("errore query creaArchivioLega\n");
	$idArchivioLega= $conn->insert_id;
return $idArchivioLega;
}
//funziona che converte il file csv contenente la lista di giocatori

function peoCsvtoArray($file){

$i=1;
$handle = fopen($file, "r");
if ($handle) {

    while (($line = fgets($handle, 4096)) !== false) {
        $arr= explode(";", $line);
        if(is_numeric($arr[0]))
          {$giocatori[$i]=$arr;
      	$i++;}

    }

}
    fclose($handle);

return $giocatori;
}


//avvia una nuova lega Ateneo 
function avviaLegaAteneo($admin)
{
	disattivaLegheAteneo();
	$sql="INSERT INTO `Leghe`( `admin`, `statoFantamercato`, `attiva`) VALUES ('$admin', 0,1)" ;
	echo $sql;
	$conn=getDatabase();
	$result= mysqli_query($conn, $sql) or die ("Errore query avvia leghe ateneo\n ");
return $result;
}

function creaFacolta($nome)
{
	$sql='INSERT INTO `LegaFacolta`(`nome`, `lega`) VALUES ("$nome", '. getLegaAteneoCorrente(). ')' ;
	$conn=getDatabase();
	$result= mysqli_query($conn, $sql) or die ("Errore query crea facoltà\n ");
return $result;

}



//disattivaLegheAteneo: imposta lo stato di tutte le leghe ateneo presenti a 0; 
//servizio per avviaLegaAteneo()

function disattivaLegheAteneo()
{
	$sql="UPDATE `Leghe` SET `attiva`=0 WHERE 1" ;
	$conn=getDatabase();
	$result= mysqli_query($conn, $sql) or die ("Errore query disattiva leghe\n ");
return $result;
}

function getFacolta()
{
$sql='SELECT `idLegaFacolta`, `nome`, `lega` FROM `LegaFacolta` WHERE 1' ;
	$conn=getDatabase();
	$result= mysqli_query($conn, $sql) or die ("Errore query get Facoltà \n ");
return json_encode(jsonpreformat($result));

}

//getLegaAteneoCorrente: ritorna l'id della lega Ateneo in corso
function getLegaAteneoCorrente()
{
	$sql='SELECT `idLeghe` FROM Leghe WHERE `attiva`=1' ;
	$conn=getDatabase();
	$result= mysqli_query($conn, $sql) or die ("Errore query get id ateneo corrente\n ");
	$row=mysqli_fetch_assoc($result);
return $row['idLeghe'];	
}







?>