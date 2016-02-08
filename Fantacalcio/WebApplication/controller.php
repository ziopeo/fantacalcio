<?php 
//il file controller si occupa di gestire tutti i servizi necessari al funzionamento di UFL

session_start();

include 'db.php'; //file database
include 'model.php'; //modello dei dati, consente le chiamate al database
include 'vista.php'; //include le funzioni grafiche per stampare il corpo delle pagine web di UFL
// temporaneo

//le richieste vengono passate attraverso le chiamate POST
//ogni richiesta ha un suo servizio
//le chiamate POST vengono usate per i dati sensibili
// e le chiamate GET per quelli non
if (!isset($_POST['metodo']))
	{$_POST['metodo']="";}

switch($_POST['metodo']){
//logout 
	case 'logoutPage';
//rimuovo tutte le variabili di sessione e la distruggo
			session_unset();
			session_destroy(); 
			break;
		
	case 'login';
//login per gli utenti. Apre la session e la imposto per l utente loggato
			if ($utenteConnesso=verUtente($_POST['utente'], $_POST['password'])) //chiamata a model
			{	$_SESSION['loggato']=$utenteConnesso; //elaboro
					stampaFormazioniPage(); //stampo su vista.php il risultato
			}
			break;
	case 'loginAdmin';
//login per lamministratore -------dacompletare
		if ($utenteConnesso=verAdmin($_POST['utente'], $_POST['password']))
		{	$_SESSION['loggato']=$utenteConnesso;
			creaGraficaAdmin();
		}
		break;
	case 'caricaCalendario';
//carica il calendario tramite un file 
			caricaCal($_POST['fileCalendario']);
			break;
	case 'caricaArchivioGiocatori';
//servizio crea un Archivio di Giocatori da un file 
			caricaGiocatori(peoCsvtoArray($_POST['fileGiocatori']));
			break;
	case 'rosaPage';
//servizio vista: crea pagina per composizione della rosa
			break;
	case 'classificaLegaPage';
			break;
	case 'utentePage';
//servizio vista: crea pagina post login per l admin
			creaGraficaAdmin();
			break;
	case 'formazioniPage':
//servizio vista: crea pagina per la scelta delle formazioni
			stampaFormazioniPage();
			break;
	case 'getSquadre';
//servizio model: ritorna le squadre dei giocatori presenti in archivio
			header('Content-Type: application/json; charset=UTF8');
			echo getTutteLeSquadre();
			break;
	case 'getGiocatoriSquadra';
	//chiamata ajax: json risponde con la lista di giocatori
	//setto il content-type per evitare i valori nulli per json
			header('Content-Type: application/json; charset=UTF8');
			echo (getGiocatoriSquadra($_POST['squadra']));
			break;
	case 'getInformazioniGiocatore';
			header('Content-Type: application/json; charset=UTF8');
			echo (getInformazioniGiocatore($_POST['calciatore']));
			break;
	case 'getFantamilioni';
			header('Content-Type: application/json; charset=UTF8');
			echo (getFantamilioni($_SESSION['loggato']));
			break;

	default:
		//homepage default
		stampaHomePage();
		break;

}





/*)
	$out='{"squadre":[';
	for($i=0;$i<count($arr);$i++)
	
		if($i==count($arr)-1) 
			$out.=  '{"squadra":"' . $arr[$i]["squadra"]. '"}';
		else $out.=  '{"squadra":"' . $arr[$i]["squadra"]. '"},';
		
		$out.=']}';
	return $out;
}


*/

?>