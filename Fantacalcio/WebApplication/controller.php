<?php 

include 'model.php';
include 'vista.php';

switch($_POST['metodo']){
	case 'getGiocatori';
			$result=getModelGiocatori();
			stampaGiocatori($result);
			break;
	case 'controlla_login';
			break;
	case'getInfoUser';
		$result=getInfoUser($POST['matricola']);
		
	default:
		//homepage default
		include 'corpo.php';
		break;
	
}
?>