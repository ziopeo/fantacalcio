case 'getCreaFormazioniPage';
                    stampaCreaFormazione();
                    
                    break;

            case 'creaFantasquadra';
                stampaRosaPage();
            break;
            break;
            case 'formazioneUtenteLoggato';
                stampaFormazionePage();
            break;
            case 'logout';
            //logout 
            //rimuovo tutte le variabili di sessione e la distruggo
                session_unset();
                session_destroy(); 
                $_SESSION['loggato']="";
                header('Location: controller.php');
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





                