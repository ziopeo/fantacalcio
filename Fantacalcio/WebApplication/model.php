<?php

function getModelGiocatori() 
{
$sql='SELECT * FROM Giocatore';
return mysqli_query($conn, $sql); 
}

function getSquadra()
{
  $sql='SELECT * FROM Squadre';
  return mysqli_query($conn, $sql); 
}

function getInfoUser($username)
{
  $sql="SELECT * FROM Utente WHERE  username = '". $username . "'" ;
  return mysqli_query($conn, $sql); 
}



?>