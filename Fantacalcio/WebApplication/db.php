<?php
Global $conn;
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "UFL_PEO";
// Creo connessione
$conn=new mysqli($servername, $username, $password, $dbname);
// controllo
if ($conn->connect_error) {
    die("Connessione fallita: " . $$conn->connect_error);
}
  else echo ("connessione avvenuta");
    


?>
