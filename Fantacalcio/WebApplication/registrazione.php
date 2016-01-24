<?php 
	
	/* apertura sessione e successiva inclusione del file per la connessione al database*/
	session_start();
	include ("db_con.php");
	
	/* passaggio dei parametri per la query */
	if ($_POST["nome_reg"] != "" && ["cognome_reg"] != "" && ["matricola_reg"] != "" && ["facolta_reg"] != "" && ["email_reg"] != "" && ["nomesquadra_reg"] != "" && ["pass_reg"] != ""){
		/* query */
		$query_reg = mysql_query("INSERT INTO utenti (matricola,nome,cognome,facolta,email,password) VALUES (' ".$_POST["matricola_reg"]."','".$_POST["nome_reg"]."','".$_POST["cognome_reg"]."','".$_POST["facolta_reg"]."','".$_POST["email_reg"]."','".$_POST["pass_reg"]."')")
		/*in caso fallisce la query */
		or die("fallimento query registrazione, errore: ".mysql_error());
	}
	/* se non sono soddisfatte le condizioni entra nell'else*/
	else{
		header('location:index.php?action=registrazione&errore=Non hai compilato tutti i campi');
	}
	
	/* se la query è andata a buon fine */
	if (isset($query_reg)){
		/* restituisco il valore vero alla chiave logged in SESSION*/
		$_SESSION["logged"]=true;
		header("location:home.php");
	}
	/* altrimenti restituisce errore */
	else{
		echo "non ti sei registrato con successo";
	}
?>