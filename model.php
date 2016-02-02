<?php

function getModelGiocatori() 
{ 

$sql="SELECT * FROM Giocatore";
$result= mysqli_query($conn, $sql);
return $result;
}

function caricaGiocatori($giocatori)
{
$idArchivioLega=creaArchivioLega();
for ($i=1; $i<=count($giocatori); $i++){
$arr=$giocatori[$i];
$conn=getDatabase();
echo $arr[0].  $arr[1]."','". $arr[2]."','". $arr[3]."',". $arr[4].",". $arr[5];
echo $queryInserisci = 'INSERT INTO Giocatore(`idgiocatore`, `ruolo`, `nome`, `squadra`, `prezzoIniziale`, `prezzoAttuale`) VALUES ('. $arr[0].' ,"'. $arr[2].'","'. $arr[1].'","'. $arr[4].'",'. $arr[5].','. $arr[6].')';
echo $queryArchivia='INSERT INTO `GiocatoreArchiviato`(`archivioLega`, `giocatore`) VALUES ('. $idArchivioLega .','.$arr[0]. ')'; 
 mysqli_query($conn, $queryInserisci);

mysqli_query($conn, $queryArchivia) or die ("Errore queryArchivia\n ");
}

}
function getSquadreTotale()
{

	$sql="SELECT DISTINCT `squadra` FROM `Giocatore` " or die ("Errore query verifica admin\n ");
	$conn=getDatabase();
	$result= mysqli_query($conn, $sql);
	echo json_encode($result);
return $result;	
}
function getSquadreGiocatori($squadra)
{
	$sql="SELECT `idGiocatore`, `ruolo`, `nome`, `squadra`, `prezzoIniziale`, `prezzoAttuale` FROM `Giocatore` WHERE squadra= '$squadra'" or die ("Errore query verifica admin\n ");
	$conn=getDatabase();
	$result= mysqli_query($conn, $sql);
	echo json_encode($result);
return $result;	
}
function creaArchivioLega()
{
	echo $idAteneo=getLegaAteneoCorrente();
	echo $today = date("Y-m-d H:00:00");
	echo $queryCreaArchivio='INSERT INTO `ArchivioLega`(`lega`, `dataUpload`) VALUES ('.$idAteneo.',"'. $today .'")';
	$conn=getDatabase();
	mysqli_query($conn, $queryCreaArchivio);
	$idArchivioLega= $conn->insert_id;
return $idArchivioLega;
}

function verAdmin($ut, $pa){
	$sql="SELECT email FROM Admin WHERE email= '$ut' AND password='$pa'" or die ("Errore query verifica admin\n ");
	echo $sql;
	$conn=getDatabase();
	$result= mysqli_query($conn, $sql);
	$row=mysqli_fetch_assoc($result);
return $row['email'];
}

//verifica login con nome utente e password
//ritorna true se presente e falso se no;
function verUtente($ut, $pa){
	$sql="SELECT nome FROM Utente WHERE matricola= '$ut' AND pass='$pa'" or die ("Errore query verifica utente\n ");
	echo $sql;
	$conn=getDatabase();
	$result= mysqli_query($conn, $sql);
	$row=mysqli_fetch_assoc($result);
return $row['nome'];
}
function getAdmin()
{
	$sql="SELECT `idAdmin`FROM `Admin`"or die ("Errore query get admin\n ");
	echo $sql;
	$conn=getDatabase();
$result= mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);
return $row['idAdmin'];

}
function registraUtente(){}



function getLegaAteneoCorrente()
{
	$sql='SELECT `idLeghe` FROM Leghe WHERE `attiva`=1' or die ("Errore query get id ateneo corrente\n ");
	$conn=getDatabase();
	$result= mysqli_query($conn, $sql);
	$row=mysqli_fetch_assoc($result);
return $row['idLeghe'];	
}
function disattivaLegheAteneo()
{
	$sql="UPDATE `Leghe` SET `attiva`=0 WHERE 1" or die ("Errore query disattiva leghe\n ");
	echo $sql;
	$conn=getDatabase();
	$result= mysqli_query($conn, $sql);
return $result;
}

function avviaLegaAteneo()
{
	disattivaLegheAteneo();
	$sql="INSERT INTO `Leghe`( `admin`, `statoFantamercato`) VALUES (". getAdmin().", off, 1)" or die ("Errore query avvia leghe ateneo\n ");
	$conn=getDatabase();
	$result= mysqli_query($conn, $sql);
return $result;
}

//ritorna il numero di giornate della lega Ateneo corrente
function getNumeroGiornate(){}



function caricaCalendarioModel($arr)
{	$idLega=getLegaAteneoCorrente();
	for ($i=0;$i<count($arr);$i++)
	{
		$temp= explode("-", arr[$i]);
		$temp1=explode("(", temp[0]);
		$temp2=explode(")", temp[1]);

		creaGiornata($temp1, $temp2, $idLega);	

	}
}

function creaGiornata($data,$i){
	$idLeg=getLegaAteneoCorrente();
	//echo $idLeg;
	(list ($giorno, $mese, $anno)=explode('/', $data));
	$date = ( "20".trim($anno) . "-". trim($mese)."-".trim($giorno));
      echo $date . "    ";
       $sql='INSERT INTO `Giornata`(`idGiornata`,`data`, `lega`) VALUES ('.$i .',"'.$date.'",1)'or die ("Errore query inserisci giornata\n ");
	//echo $sql;//CANC
	$conn=getDatabase();
	$result =mysqli_query($conn, $sql);
return $result;
}


function peoCsvtoArray($file){
$handle = @fopen($file, "r");
if ($handle) 
	{	$i=0;
	while (($lineArray = fgets($handle, 4096)) !== false) 
	{
        if ($i==0)
		{	$keys=explode(";",str_replace("\'", "",str_replace("?", "", trim(utf8_decode($lineArray))))); }
		else
		{	$arr[$i]= explode(";",str_replace("'", "",str_replace("?", "", trim(utf8_decode($lineArray)))));; 	}
	 $i++;	}
	if (!feof($handle)) {
        echo "Error: unexpected fgets() fail\n";	}
    fclose($handle);	
	}
	print_r($arr);
return $arr;
}
function caricaCal(){
$handle = @fopen("calendario.csv", "r");
$idLega=1;
if ($handle) 
    {   $i=0;
    $lett=fread($handle,filesize("calendario.csv"));
    $arr=explode('"', ($lett));
    $j=19;
    for ($i=0;$i<count($arr);$i++)
    {	$temp3=($arr[$i]);
        $temp1=explode(('-'), trim($temp3));
   		$arra[$i]= trim($temp1[0]);
   		$arra[$j]=trim($temp1[1]); 
        $j++;   

    }
    for ($i=0;$i<=37;$i++){
    	creaGiornata($arra[$i], $i+1);
       
    }
fclose($handle); 
}
}




?>