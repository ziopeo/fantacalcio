<?php
	session_start();
	include("db_con.php");
	
	$_SESSION["user_log"]=$_POST["user_log"];
	$_SESSION["pass_log"]=$_POST["pass_log"];
	
	$query = mysql_query("SELECT * FROM utenti WHERE username='".$_POST["user_log"]."' AND password='".$_POST["pass_log"]."'")
	or DIE('query non riuscita'.mysql_error());
	
	if(mysql_num_rows($query)!=0){ 
		$row = mysql_fetch_assoc($query);
		$_SESSION["logged"] =true; 
		header("location:home.php");
	}
	else{
		echo "non ti sei registrato con successo";
	}
?>