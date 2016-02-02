<?php 
//session_start();
include 'db.php';
include 'model.php';
include 'vista.php';
include 'corpo.php';

if (!isset($_POST['metodo']))
	{$_POST['metodo']="";}
echo $_POST['metodo'];
switch($_POST['metodo']){
	case 'logoutPage';
			
			break;
	case 'login';
			if ($utenteConnesso=verUtente($_POST['utente'], $_POST['password'])){
				$_SESSION['loggato']=$utenteConnesso;
				echo creaGraficaFormazioni("4-4-2");
			}
			break;
	case 'loginAdmin';
	if ($utenteConnesso=verAdmin($_POST['utente'], $_POST['password'])){
		$_SESSION['loggato']=$utenteConnesso;
		echo creaGraficaAdmin();
	}
	break;
	case 'caricaCalendario';
			echo "caricamento calendario\n";
			echo $_POST['file'];	
		//caricaCal();

			break;
	case 'caricaArchivioGiocatori';
		echo "baosdbiofbasdbfas";
			caricaGiocatori(peoCsvtoArray($_POST['fileGiocatori']));
			break;
	case 'formazioniPage';
		echo creaGraficaFormazioni("4-4-2");
			break;
	case 'rosaPage';
			break;
	case 'classificaLegaPage';
			break;
	case 'utentePage';
			creaGraficaAdmin();
			break;
	case 'getFormazioni':
			creaGraficaFormazioni($_POST['modulo']);
			break;
	case 'loginAdminnn':
			echo getSquadre();
			break;
	case 'caricaSquadre':
			echo getSquadreTotale();
			break;
	case 'getSquadre':
		
			$result=getSquadreTotale();
			json_encode($result);
			while($row=mysqli_fetch_assoc($result))
				$arr[]=	  $row;
				echo json_encode($arr);
			break;

	default:
		//homepage default
		staticPage();
		break;

}




?>