<?php
//funzioni di scrittura :top
//funziondi di lettura : bottom





function creaSquadra($utente, $nomeSquadra)
{	$sql='INSERT INTO `Squadra`(`nome`, `punti`, `utente`) VALUES ('.$nomeSquadra. ',0,'.$utente.')';
	$conn=getDatabase();
	mysqli_query($conn, $sql) or die("errore creazione squadra\n");
	return $conn->insert_id;
}



function insertGiocatoriRosa($utente, $giocatoriJSON)
{foreach ($giocatoriJSON as $selected_option) {
    	$t=explode("&", $selected_option);
		$te=explode("=", $t[1]);
	echo	$sql='INSERT INTO `Acquistato`(`idFantagiocatore`, `idSquadra`) VALUES ('.($te[1]).',"'.$utente.'")';
	
	$conn=getDatabase();
	mysqli_query($conn, $sql) or die("errore creazione squadra\n");
}

return true;
}


//getInformazioniGiocatore: ritorna informazioni in merito ad un determinato $giocatore
function getInformazioniGiocatore($giocatore)
{
	$sql="SELECT `idGiocatore`, `ruolo`, `nome`, `squadra`, `prezzoIniziale`, `prezzoAttuale` FROM `Giocatore` WHERE `nome`= '$giocatore'";
	$conn=getDatabase();
	$result= mysqli_query($conn, $sql) or die ("Errore query verifica admin\n ");
	return json_encode(jsonpreformat($result));
}



//getTutteleSquadre: ritorna le squadre  a cui appartengono i giocatori presenti  in archivio: 
// solitamente in serie a 20 squadre totale
function getTutteleSquadre()
{
	$sql="SELECT DISTINCT `squadra` FROM `Giocatore` ";
	$conn=getDatabase();
	$result= mysqli_query($conn, $sql) or die ("Errore Squadre\n ");
return json_encode(jsonpreformat($result));
}


//getGiocatoriSquadra: ritorna i giocatori di una determina $squadra
function getGiocatoriSquadra($squadra)
{
	$sql="SELECT `idGiocatore`, `ruolo`, `nome`, `squadra`, `prezzoIniziale`, `prezzoAttuale` FROM `Giocatore` WHERE squadra LIKE '$squadra'";
	$conn=getDatabase();
	$result= mysqli_query($conn, $sql) or die ("Errore: non esiste nessuna squadra".$squadra. "\n ");
	return json_encode(jsonpreformat($result));
}

function getSquadraUtente($utente)
{

	$sql='SELECT `nome`,`idGiocatore`, `prezzoIniziale`, `squadra`, `ruolo` FROM `Acquistato`, `Giocatore` WHERE `idFantagiocatore` LIKE `idGiocatore` AND `idSquadra` LIKE "'. $utente. '"';
	$conn=getDatabase();
	$result= mysqli_query($conn, $sql) or die ("Errore: non esiste nessuna squadra".$squadra. "\n ");
	return json_encode(jsonpreformat($result));

}

function getNomeSquadraUtente()
{
	 $sql='SELECT  `nomeFantasquadra` FROM `Utente` WHERE  `matricola`  LIKE "'. $_SESSION["loggato"]. '"';
	$conn=getDatabase();
	$result= mysqli_query($conn, $sql) or die ("Errore: non esiste nessuna squadra".$_SESSION['loggato']. "\n ");
	return json_encode(jsonpreformat($result));

}

function setGiocatoriFormazioneGiornata($utente, $titolari, $panchinari, $modulo)

{	$oggi=oggi();
	$gio=getGiornataCorrente();
	$idForm= creaFormazione($utente, $gio, $modulo, $oggi);
	for ($i=0;$i<count($titolari);$i++)

		inserisciGiocatoreFormazione($titolari[$i], $idForm, 1);
	for ($i=0;$i<count($panchinari);$i++)
		inserisciGiocatoreFormazione($panchinari[$i], $idForm, 0);
	return true;
}

function inserisciGiocatoreFormazione($giocatore, $formazione, $titPan)
{	$t=explode("&", $giocatore);
		$te=explode("=", $t[1]);
	$sql='INSERT INTO `Schierato`(`Giocatore`, `Formazione`, `tipoSchieramento`) VALUES ('.$te[1].','.$formazione.','.$titPan.')';	
	$conn=getDatabase();
	mysqli_query($conn, $sql) or die("errore creazione giocatore Formazione\n");
	return $conn->insert_id;
}
function creaFormazione($utente, $giornata, $modulo, $dataConsegna)
{$ora=ora();
 $sql="INSERT INTO `Formazione`(`dataConsegna`, `modulo`, `giornata`, `utente`) VALUES ('$ora', '$modulo', '$giornata','$utente')";
	$conn=getDatabase();
	mysqli_query($conn, $sql) or die("errore creazione Formazione\n");
	return $conn->insert_id;
}
function getVotoUltimaFormazione($utente){
$sql ='SELECT SUM(sq1.voto) as sommavoto FROM (SELECT sq.*, voto as voto FROM (Select idGiocatore as idGiocatore, nome as nome, ruolo as ruolo, squadra as squadra, tipoSchieramento as tipoSchieramento FROM Formazione, Schierato, Giocatore WHERE Schierato.Formazione = (
SELECT MAX(idFormazione) FROM Formazione, Utente WHERE UTENTE LIKE "'.$utente. '") AND Formazione.idFormazione =(
SELECT MAX(idFormazione) FROM Formazione, Utente WHERE UTENTE LIKE "'.$utente. '") AND Giocatore.idGiocatore LIKE Schierato.Giocatore) AS sq LEFT JOIN PagellaGiocatore ON(sq.idGiocatore = PagellaGiocatore.giocatore)) as sq1';
$conn=getDatabase();
$result= mysqli_query($conn, $sql) or die ("Errore: non esiste somma formazione\n ");
return json_encode(jsonpreformat($result));
}
function getFormazioneUtenteModel($utente)
{ $sql='SELECT sq.*, voto FROM (Select idGiocatore as idGiocatore, nome as nome, ruolo as ruolo, squadra as squadra, tipoSchieramento as tipoSchieramento FROM Formazione, Schierato, Giocatore WHERE Schierato.Formazione = (
SELECT MAX(idFormazione) FROM Formazione, Utente WHERE UTENTE LIKE "'.$utente. '") AND Formazione.idFormazione =(
SELECT MAX(idFormazione) FROM Formazione, Utente WHERE UTENTE LIKE "'.$utente. '") AND Giocatore.idGiocatore LIKE Schierato.Giocatore) AS sq LEFT JOIN PagellaGiocatore ON(sq.idGiocatore = PagellaGiocatore.giocatore)';

	
	$conn=getDatabase();


	$result= mysqli_query($conn, $sql) or die ("Errore: non esiste nessuna formazione\n ");
	return json_encode(jsonpreformat($result));



}

?>