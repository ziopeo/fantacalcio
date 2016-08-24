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
if (array_key_exists('metodo', $_GET))
	switch ($_GET['metodo'])
			{case 'getCreaFormazioniPage';
					stampaCreaFormazione();
					
					break;

			case 'creaFantasquadra';
				stampaRosaPage();
			break;
			case 'miaFantasquadra';
				stampaMiaRosaPage();
			break;
			case 'formazioneUtenteLoggato';
				stampaFormazionePage();
			break;
			case 'logout';
			//logout 
			//rimuovo tutte le variabili di sessione e la distruggo
				session_unset();
				session_destroy(); 
				stampaHomePage("");
				break;
			case 'stampaRegistrazione';
				stampaRegistrazione(0);
			break;
			case 'formazioniPage';
	//servizio vista: crea pagina per la scelta delle formazioni
				stampaFormazioniPage();
				break;
			case '';
						stampaHomePage();
			break;
			}


else if (array_key_exists('metodo', $_POST))
	switch($_POST['metodo']){
		case 'login';
	//login per gli utenti. Apre la session e la imposto per l utente loggato
				if (verUtente($_POST['utente'], $_POST['password'])) //chiamata a model
				{	//elaboro
						stampaCreaFormazione(); //stampo su vista.php il risultato
				}
				else {
					echo "errore Login";
					stampaHomePage();
				}
				break;
		case 'loginAdmin';
	//login per lamministratore -------dacompletare
			if ($utenteConnesso=verAdmin($_POST['utente'], $_POST['password']))
			{	$_SESSION['loggato']=$utenteConnesso;
				creaGraficaAdmin(false, "");
			}
			else {

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
		case 'setGiocatoriRosa';
				if(isset($_POST['giocatoriRosa'])){
				if (insertGiocatoriRosa($_SESSION['loggato'], $_POST['giocatoriRosa']))
					{echo "caricamento effettuato";}
			}
		break;
		
		case 'registrazione';
				registraUtente($_POST['matricolaUtente'], $_POST['nomeUtente'], $_POST['cognomeUtente'], $_POST['emailUtente'], $_POST['passwordUtente'], $_POST['facoltaUtente']);
				stampaHomePage();
		break;
		case 'getFacolta';
				header('Content-Type: application/json; charset=UTF8');
				echo getFacolta();
		break;
		case 'uploadPagelle';
				
		break;
			case 'avviaLeghe';
				if (avviaLegaAteneo(getAdmin($_SESSION['loggato'])))
					creaGraficaAdmin(true, "");
		break;
			case 'fantaOn';
				
		break;
			case 'fantaOff';
				
		break;
			case 'uploadCalendario';
				if(isset($_FILES['fileCalendario']))
					caricaCal($_FILES['fileCalendario']['tmp_name']);

		break;
			case 'uploadGiocatori';
			print_r($_FILES['fileGiocatori']);
				if(isset($_FILES['fileGiocatori']))
					if (caricaGiocatori($_FILES['fileGiocatori']['tmp_name']))
						creaGraficaAdmin(true, "Giocatori caricati!");
					
				break;
			case 'getSquadraUtente';
					header('Content-Type: application/json; charset=UTF8');
					if ($x = getSquadraUtente($_SESSION['loggato']))
							echo $x;
					
				break;
				case 'getNomeSquadraUtente';
					header('Content-Type: application/json; charset=UTF8');
					if ($x = getNomeSquadraUtente($_SESSION['loggato']))
							echo $x;
					
				break;
				
				case 'setGiocatoriFormazione';
				print_r ($_POST);
				if (setGiocatoriFormazioneGiornata($_SESSION['loggato'], $_POST['giocatoriTitolari'], $_POST['giocatoriPanchinari'],$_SESSION['modulo']=$_POST['modulo']))
					{echo "caricamento effettuato";}
			break;
			case 'caricaPagelle';
					caricaPagelle($_FILES['filePagelle']);
						echo "caricamento effettuato";
			break;
			case 'getFormazioneUtente';
			header('Content-Type: application/json; charset=UTF8');
				if ($x=getFormazioneUtenteModel($_SESSION['loggato']))
					echo $x;
			break;
			case 'getVotoUltimaFormazione';
			header('Content-Type: application/json; charset=UTF8');
				if ($x=getVotoUltimaFormazione($_SESSION['loggato']))
					echo $x;
			break;

	}
else stampaHomePage("");




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