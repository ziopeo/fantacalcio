<?php
//il file controller si occupa di gestire tutti i servizi necessari al funzionamento di UFL

session_start();
include 'db.php'; //file database
include 'model.php'; //modello dei dati, consente le chiamate al database
//include 'vista.php'; //include le funzioni grafiche per stampare il corpo delle pagine web di UFL
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
                    }
             else //api non loggato
        switch ($_GET['metodo']) {
            
        }
        
}
else if (array_key_exists('metodo', $_POST))
{
    if (isset($_SESSION['loggato'])){
        switch ($_POST['metodo']) 
        {



        }
    }
    else{ 
        switch ($_POST['metodo']) {
            case 'login':
            //login per gli utenti. Apre la session e la imposto per l utente loggato
            
            header('Content-Type: application/json; charset=UTF8');
            if ($_SESSION['loggato']=verUtente($_POST['utente'], $_POST['password'])) //chiamata a model
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
            header('Content-Type: application/json; charset=UTF8');

            echo getFacolta();
            break;
        
        }
    }
}
