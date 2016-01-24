<?php
	/* Connessione al database*/

	$connect = mysql_connect("localhost","root","root");
	
	/* in caso di fallimento della connesione */
	if(!$connect){
		die('Connessione fallita, errore: '.mysql_error());
	}
	
	/* selezione del database */
	$db_select = mysql_select_db("ufl_db",$connect);
		
	/* in caso di fallimento della selezione del database */
	if(!$db_select){
		die('Selezione database fallita, errore: '.mysql_error());
	}
?>