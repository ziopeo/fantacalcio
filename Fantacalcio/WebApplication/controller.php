<?php 
//session_start();
include 'db.php';
include 'model.php';
include 'vista.php';
include 'corpo.php';

if (!isset($_POST['metodo']))
	{$_POST['metodo']="";}

switch($_POST['metodo']){
	case 'logoutPage';			
			break;
	case 'login';
			if ($utenteConnesso=verUtente($_POST['utente'], $_POST['password']))
			{	$_SESSION['loggato']=$utenteConnesso;
					stampaFormazioniPage();
			}
			break;
	case 'loginAdmin';
		if ($utenteConnesso=verAdmin($_POST['utente'], $_POST['password']))
		{	$_SESSION['loggato']=$utenteConnesso;
			echo creaGraficaAdmin();
		}
		break;
	case 'caricaCalendario';
			break;
	case 'caricaArchivioGiocatori';
			caricaGiocatori(peoCsvtoArray($_POST['fileGiocatori']));
			break;
	case 'rosaPage';
			break;
	case 'classificaLegaPage';
			break;
	case 'utentePage';
			creaGraficaAdmin();
			break;
	case 'formazioniPage':
	echo "sssaaa";
			stampaFormazioniPage();
			break;
	case 'loginAdminnn';
			echo getSquadre();
			break;
	case 'caricaSquadre';
			echo getSquadreTotale();
			break;
	case 'getGiocatoriSquadra';
			header('Content-Type: application/json; charset=UTF8');
			echo json_encode(getGiocatoriSquadra($_POST['squadra']));
			break;
	case 'getSquadre';
			echo jsonparentesi();
			break;
	default:
		//homepage default
		stampaHomePage();
		break;

}

function getSquadreTutte()
{
$result=getSquadreTotale();
			while($row=mysqli_fetch_assoc($result))
				$arr[]=$row;
				
			return $arr;
		}
function jsonparentesi()

{	$result=getSquadreTotale();
			while($row=mysqli_fetch_assoc($result))
				$arr[]=$row;

	$out='{"squadre":[';
	for($i=0;$i<count($arr);$i++)
	
		if($i==count($arr)-1) 
			$out.=  '{"squadra":"' . $arr[$i]["squadra"]. '"}';
		else $out.=  '{"squadra":"' . $arr[$i]["squadra"]. '"},';
		
		$out.=']}';
	return $out;
}