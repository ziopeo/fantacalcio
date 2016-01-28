
<?php 
//include 'head.php';
//stampa risulta
function stampaGiocatori($giocatori)
{
if (mysqli_num_rows($giocatori) > 0) {
    while($row = mysqli_fetch_assoc($giocatori)) {
        echo "id: " . $row['idGiocatore']. " - Name: " . $row['nome']. "<br>";

    }
} else {
    echo "0 results";
}
mysqli_free_result($giocatori);
}
?>
	



