<?php
include 'db.php';
function getModelGiocatori() 
{

$sql='SELECT * FROM Giocatore';
return mysqli_query($conn, $sql); 
}
function caricaGiocatori($arr)
{
$queryInserisci = "INSERT INTO Giocatore(`idgiocatore`, `ruolo`, `nome`, `squadra`, `prezzoIniziale`, `prezzoAttuale`) VALUES ('". $arr[0]."' ,'". $arr[3]."','". $arr[1]."','". $arr[4]."',". $arr[5].",". $arr[6].")";
return mysqli_query($conn, $queryInserisci);

}

function creaArchivioGiocatori()
{
	$idAteneo=getIdAteneoCorrente();
	$today = date("Y-m-d H:00:00");
$querycreaArchivio("INSERT INTO `ArchivioLega`(`lega`, `dataUpload`) VALUES (". $idAteneo . ",'". $today ."')";
$idArchivioLega= $conn->insert_id;
return $idArchivioLega;
?>