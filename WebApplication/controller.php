<?php 
//il file controller si occupa di gestire tutti i servizi necessari al funzionamento di UFL

session_start();
 //file database
include 'model/model.php'; //modello dei dati, consente le chiamate al database

// temporaneo
$true= '[{"status":"true"}]';
$false= '[{"status":"false"}]';
header('Content-Type: application/json; charset=UTF8');
$sw=false;
//variabile di controllo sessione

//le richieste vengono passate attraverso le chiamate POST
//ogni richiesta ha un suo servizio

if (array_key_exists('metodo', $_GET))
    switch ($_GET['metodo'])
            {

            }

else if (array_key_exists('metodo', $_POST))
            switch($_POST['metodo']){
                case 'registrazione':
                    if(registraUtente($_POST['matricola'], $_POST['nome'], $_POST['cognome'], $_POST['username'], $_POST['password'], $_POST['facolta'], $_POST['squadra']))
                    {echo $true;$sw=false;}
                    else echo $false;
            break;
            case 'login':
        //login per gli utenti. Apre la session e la imposto per l utente loggato
                    
                    if (verUtente($_POST['utente'], $_POST['password'])) //chiamata a model
                    {   //elaboro
                            echo $true; 
                    }
                    else {
                        echo $false;
                    }
                    break;
            case 'loginAdmin':
        //login per lamministratore -------dacompletare
                if ($_SESSION['loggato']=verAdmin($_POST['utente'], $_POST['password']))
                    {echo $true;$sw=false;}
            break;            
        
        case 'logout';
            //logout 
            //rimuovo tutte le variabili di sessione e la distruggo
        if (isset($_SESSION['loggato']))
            {
                 if($_SESSION['loggato']!=""&& $_SESSION!=null) 
                   {  session_unset();
                session_destroy();
                echo $true;}
               else echo $false;
            }
            else echo $false;
              break;
              
        case 'getFacolta':
                    if($x=getFacolta())
                       { echo $x;$sw=false;}
                   break;

                   default:$sw=true;
                   

            }
    
      if(isset($_POST['metodo']))
         if(isset($_SESSION['loggato']))
             //if($_SESSION['loggato']!="")
                switch($_POST['metodo']){

        
            case 'getSquadre':
        //servizio model: ritorna le squadre dei giocatori presenti in archivio
                
                    if($x=getTutteLeSquadre())
                        {echo $x; $sw=false;}
                    break;
        case 'caricaArchivioGiocatori':
        //servizio crea un Archivio di Giocatori da un file 
                    if(caricaGiocatori(peoCsvtoArray($_POST['fileGiocatori'])))
                        {echo $true; $sw=false;}
                    break;
         
            case 'getGiocatoriSquadra':
            //chiamata ajax: json risponde con la lista di giocatori
            //setto il content-type per evitare i valori nulli per json
                    
                    if($x=getGiocatoriSquadra($_POST['squadra']))
                        {echo $x; $sw=false;}
                    break;
            case 'getInformazioniGiocatore':
                    
                    if($x=getInformazioniGiocatore($_POST['calciatore']))
                        {echo $x; $sw=false;}
                    break;
            case 'getFantamilioni':
                    
                    if($x=getFantamilioni($_SESSION['loggato']))
                    {echo $x;$sw=false;}
                    break;
            case 'setGiocatoriRosa':
                    if(isset($_POST['giocatoriRosa'])){
                    if (insertGiocatoriRosa($_SESSION['loggato'], $_POST['giocatoriRosa']))
                        {//header('Location: controller.php');
                            if(setFantamilioni($_POST['fantamilion']))
                            {echo $true; $sw=false; }
                }
            }
            break;

                case 'avviaLeghe':
                    if ($x=avviaLegaAteneo(getAdmin($_SESSION['loggato'])))
                        {echo $x; $sw=false;}
            break;
                case 'uploadCalendario':
                    if(isset($_FILES['fileCalendario']))
                        if(caricaCal($_FILES['fileCalendario']['tmp_name']))
                            {echo $true;$sw=false;}

            break;
                case 'uploadGiocatori':
                    if(isset($_FILES['fileGiocatori']))
                        if (caricaGiocatori($_FILES['fileGiocatori']['tmp_name']))
                            {echo $true; $sw=false;}
                        
                    break;
                case 'getSquadraUtente':
                        
                        if (($x = getSquadraUtente($_SESSION['loggato']))!="")
                                {echo $x; 
                                    $sw=false;}
                        
                    break;
                    case 'getNomeSquadraUtente':
                        
                        if ($x = getNomeSquadraUtente($_SESSION['loggato']))
                               { echo $x;$sw=false;}
                    break;
                    
                    case 'setGiocatoriFormazione':
                    if (setGiocatoriFormazioneGiornata($_SESSION['loggato'], $_POST['giocatoriTitolari'], $_POST['giocatoriPanchinari'],$_SESSION['modulo']=$_POST['modulo']))
                        {echo $true;$sw=false;}
                break;
                case 'caricaPagelle':
                        if($x=caricaPagelle($_FILES['filePagelle']))
                            {echo $true; $sw=false; }
    
                break;
                
                case 'getVotoUltimaFormazione':
                    if ($x=getVotoUltimaFormazione($_SESSION['loggato']))
                        {echo $x;$sw=false;}
                break;

                


                }

if($sw) echo $false;



?>