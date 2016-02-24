<?php
//model: prepara risultati inviati a controller, facendo query sul database o letture su file
include 'gestioneGiornata.php';
include 'gestioneUtente.php';
include 'gestioneLeghe.php';
include 'gestioneSquadra.php';


function getModelGiocatori() 
{ 
	$sql="SELECT * FROM Giocatore";
	$result= mysqli_query($conn, $sql);
	return $result;
}




function jsonpreformat($result)
{		$arr=array();
			while($row=mysqli_fetch_assoc($result))
				$arr[]=$row;
			return $arr;
}


//WORK IN PROGRES ---------------------------------------------------
//TEMP
function caricaCalendarioModel($arr)
{	$idLega=getLegaAteneoCorrente();
	for ($i=0;$i<count($arr);$i++)
	{
		$temp= explode("-", $arr[$i]);
		$temp1=explode("(", $temp[0]);
		$temp2=explode(")", $temp[1]);

		creaGiornata($temp1, $temp2, $idLega);	

	}
}




?>