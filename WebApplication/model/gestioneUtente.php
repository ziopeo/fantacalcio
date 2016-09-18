<?php


function registraUtente($matricola, $nome, $cognome, $email, $password, $idFacolta, $squadra){
	$res=true;
       $sqlutente="INSERT INTO `Utente`(`matricola`, `nome`, `cognome`, `email`,  `fantamilioni`, `pass`, `nomefantasquadra`) VALUES ('$matricola','$nome','$cognome','$email',300,'$password','$squadra')";
	$sqlclassifica="INSERT INTO `ClassificaFacolta`( `squadra`, `lega`, `punti`) VALUES ('$matricola','$idFacolta',0)";
	$conn=getDatabase();
	$result =mysqli_query($conn, $sqlutente)or $res=false ;
	mysqli_query($conn, $sqlclassifica) or $res=false;
	
	return $res;
}



//verAdmin: si occupa del login di admin
function verAdmin($ut, $pa){
	$sql="SELECT email FROM Admin WHERE email= '$ut' AND password='$pa'" ;
	$conn=getDatabase();
	$result= mysqli_query($conn, $sql) or die ("Errore query verifica admin\n ");
	$row=mysqli_fetch_assoc($result);
$_SESSION['loggato']= $row['email'];
if ($_SESSION['loggato']=="") 
	return false;
else return true;
}



//verifica login con nome utente e password
//ritorna true se presente e falso se no;
function verUtente($ut, $pa){
	$sql="SELECT matricola, lega FROM Utente, ClassificaFacolta WHERE email LIKE '$ut' AND pass LIKE '$pa' AND squadra LIKE matricola OR matricola='$ut' AND pass ='$pa' AND squadra LIKE matricola" ;
	$conn=getDatabase();
	$result= mysqli_query($conn, $sql) or die ("Errore query verifica utente\n ");
	$row=mysqli_fetch_assoc($result);
	$_SESSION['loggato']=$row['matricola'];
	$_SESSION['loggatoFacolta']=$row['lega'] ;
if ($_SESSION['loggato']=="") 
	return false;
else return true;
}




function getFantamilioni()
{	$utente=$_SESSION['loggato'];
	$sql="SELECT `fantamilioni` FROM Utente WHERE `matricola`='$utente'" or die ("Errore get fantamilioni\n ");
	$conn=getDatabase();
	$result= mysqli_query($conn, $sql);
	$row=mysqli_fetch_assoc($result);
return $row['fantamilioni'];	
}
function setFantamilioni($fantamilioni)
{	$utente=$_SESSION['loggato'];
	$sql="UPDATE `Utente` SET  `fantamilioni`='$fantamilioni' WHERE `matricola`='$utente'" or die ("Errore update fantamilioni\n ");
	$conn=getDatabase();
return mysqli_query($conn, $sql);	
}


//getAdmin: ritorna l'id dell'admin della lega corrente
function getAdmin($admin)
{
	$sql="SELECT `idAdmin`, `email`FROM `Admin` WHERE `email`='$admin' ";
	$conn=getDatabase();
$result= mysqli_query($conn, $sql)or die ("Errore query get admin\n ");
$row=mysqli_fetch_assoc($result);
return $row['email'];

}
function getUtente()
{
	return $_SESSION['loggato'];

}

function getUtenti()
{
	$sql="SELECT * FROM `utente`";
	$conn=getDatabase();
$result= mysqli_query($conn, $sql)or die ("Errore query get admin\n ");
$row=mysqli_fetch_assoc($result);
return json_encode(jsonpreformat($row));;

}

?>