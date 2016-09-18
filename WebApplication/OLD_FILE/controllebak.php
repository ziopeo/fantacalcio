<?php
//il file controller si occupa di gestire tutti i servizi necessari al funzionamento di UFL

session_start();
include 'db.php'; //file database
include 'model.php'; //modello dei dati, consente le chiamate al database
include 'vista.php'; //include le funzioni grafiche per stampare il corpo delle pagine web di UFL
// temporaneo


header('Content-Type: application/json; charset=UTF8');

$true= '[{"status":"true"}]';
$false= '[{"status":"false"}]';
//le richieste vengono passate attraverso le chiamate POST
//ogni richiesta ha un suo servizio
//le chiamate POST vengono usate per i dati sensibili
// e le chiamate GET per quelli non
if (array_key_exists('metodo', $_GET))
{    

    if (isset($_SESSION['loggato']))
    //api da loggato
    	switch ($_GET['metodo']) {

        
        //grafica
        case 'getCreaFormazioniPage':    stampaCreaFormazione(); 
        break;    
        case 'creaFantasquadra';
            stampaRosaPage();
            break;
            break;
        case 'formazioneUtenteLoggato';
            stampaFormazionePage();
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
        case 'miaFantasquadra':
            stampaMiaRosaPage();
            break;
    		}
    	
    else //api non loggato
        switch ($_GET['metodo']) {
        
    }

}
else if (array_key_exists('metodo', $_POST))
{       header('Content-Type: application/json; charset=UTF8');
		if (isset($_SESSION['loggato']))
        switch ($_POST['metodo']) 
    	{
        //metodi get back-end
        case 'getSquadre': 
            //servizio model: ritorna le squadre dei giocatori presenti in archivio
            
            echo getTutteLeSquadre();
            break;
        case 'getGiocatoriSquadra': 
            //chiamata ajax: json risponde con la lista di giocatori
            //setto il content-type per evitare i valori nulli per json

            echo (getGiocatoriSquadra($_POST['squadra']));
            break;
        case 'getInformazioniGiocatore':  
            echo (getInformazioniGiocatore($_POST['calciatore']));
            break;
        case 'getFantamilioni': 
            echo (getFantamilioni($_SESSION['loggato']));
            break;
        
        case 'getSquadraUtente': 
            if ($x = getSquadraUtente($_SESSION['loggato']))
                echo $x;
            break;
        case 'getNomeSquadraUtente': 
            if ($x = getNomeSquadraUtente($_SESSION['loggato']))
                echo $x;
            break;
        
        case 'getFormazioneUtente': 
            if ($x = getFormazioneUtenteModel($_SESSION['loggato']))
                echo $x;
            break;
        case 'getVotoUltimaFormazione': 
            if ($x = getVotoUltimaFormazione($_SESSION['loggato']))
                echo $x;
            break;
         //set back end
        case 'caricaCalendario':
            //carica il calendario tramite un file 
            caricaCal($_POST['fileCalendario']);
            break;
        case 'caricaArchivioGiocatori':
            //servizio crea un Archivio di Giocatori da un file 
            caricaGiocatori(peoCsvtoArray($_POST['fileGiocatori']));
            break;
        case 'rosaPage':
            //servizio vista: crea pagina per composizione della rosa
            break;
        case 'classificaLegaPage':
            break;
        case 'utentePage':
            //servizio vista: crea pagina post login per l admin
            creaGraficaAdmin("");
            break;
        case 'setGiocatoriRosa':
            if (isset($_POST['giocatoriRosa'])) {
                if (insertGiocatoriRosa($_SESSION['loggato'], $_POST['giocatoriRosa'])) { //header('Location: controller.php');
                    setFantamilioni($_POST['fantamilion']);
                    echo $_POST['fantamilion'];
                }
            }
            break;
        case 'avviaLeghe':
            if (avviaLegaAteneo(getAdmin($_SESSION['loggato'])))
                creaGraficaAdmin("");
            break;
        case 'fantaOn':
            
            break;
        case 'fantaOff':
            
            break;
        case 'uploadCalendario':
            if (isset($_FILES['fileCalendario']))
                caricaCal($_FILES['fileCalendario']['tmp_name']);
            break;
        case 'storeVotoFormazione':
            header('Location: controller.php');
            print_r($_POST);
            break;
        case 'uploadGiocatori':
            print_r($_FILES['fileGiocatori']);
            if (isset($_FILES['fileGiocatori']))
                if (caricaGiocatori($_FILES['fileGiocatori']['tmp_name']))
                    creaGraficaAdmin("Giocatori caricati!");
            break;  
        case 'setGiocatoriFormazione':
            if (setGiocatoriFormazioneGiornata($_SESSION['loggato'], $_POST['giocatoriTitolari'], $_POST['giocatoriPanchinari'], $_SESSION['modulo'] = $_POST['modulo'])) 
                header('Location: controller.php');
            
            break;
        case 'caricaPagelle':
            caricaPagelle($_FILES['filePagelle']);
            echo "caricamento effettuato";
            //avanza giornata
            //riporta alla home
            creaGraficaAdmin("Caricamento pagelle effettuato");
            break;  
            case 'getFormazioneUtente':
            if ($x = getFormazioneUtenteModel($_SESSION['loggato']))
                echo $x;
            break; 
            
 	}   
            
    else
        switch ($_POST['metodo']) {
        case 'login':
            //login per gli utenti. Apre la session e la imposto per l utente loggato
            if (verUtente($_POST['utente'], $_POST['password'])) //chiamata a model
                {
                echo $true;}
                else
                     echo $false;

            break;
        case 'loginAdmin':
            //login per lamministratore -------dacompletare
            if ($utenteConnesso = verAdmin($_POST['utente'], $_POST['password'])) {
                $_SESSION['loggato'] = $utenteConnesso;
                creaGraficaAdmin("");
            } 
            break;
        case 'registrazione':
             
            if(registraUtente($_POST['matricola'], $_POST['nome'], $_POST['cognome'], $_POST['email'], $_POST['password'], $_POST['facolta'], $_POST['squadra']))
                echo $true;
            else 
                echo $false;
            
            break;
            case 'logout';
            //logout 
            //rimuovo tutte le variabili di sessione e la distruggo
            if (isset($_SESSION['loggato']))
            {    session_unset();
                session_destroy();
                if (isset($_SESSION['loggato']))
                    echo $false;
                else echo $true;
            }
            else echo $false;
            break;

        case 'getFacolta':
            echo getFacolta();
            break;
        
        }
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