<?php

function getModelGiocatori() 
{include 'db.php';
$sql='SELECT * FROM Giocatore';


return mysqli_query($conn, $sql); 
}
?>