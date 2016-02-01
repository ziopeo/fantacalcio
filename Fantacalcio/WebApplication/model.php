<?php 

include 'model.php';
include 'vista.php';

switch($_POST['metodo']){
	case 'getGiocatori':
			$result=getModelGiocatori();
			stampaGiocatori($result);
			break;
	case 'controlla_login':
			break;
	case'controlla_registrazione':
		$matricola = $_POST(matricola_reg);
		$nome = $_POST(nome_reg);
		$cognome = $_POST(cognome_reg);
		$facolta = $_POST(facolta_reg);
		$email = $_POST(email_reg);
		$password = $_POST(pass_reg);
		$squadra= $_POST(squadra_reg);
		creaUtente($matricola,$nome,$cognome,$facolta,$email,$password,$squadra);
	default:
		//homepage default
		include 'corpo.php';
		break;
	case'lista_facolta':
		listafacolta();
}
?>