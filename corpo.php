<?php



//funzioni che stampano le varie pagine
function staticPage()
{
	$javascriptCode='<SCRIPT src="script.js"></SCRIPT>';
$cssStileHome='<style> 	#immLogo{ width: 80%; height: auto; }
						#giornate{    text-align: center;	width: 100%;}
						#table1{	width:100%; 	}
						#immHome {width:20%; height:auto;}
						#selectFormazioni{height:300px;width:250px;}
						#selectSquadra{width:20%;}
				</style>';
$inizioTestaPagina=  '<!DOCTYPE html><html><head>' .$cssStileHome .$javascriptCode. '</head><body>';
$corpoGiornate=getCorpoGiornate();
$login=loginView();
$inizioHeader='<header>';
$corpoHeader='<div id="logo"><img id="immHome" src="image/home.png" width="472,4" height="70,8"><a href="home.php"><img id="immLogo" src="image/logoLungoSMALL.png" alt="UFL - University Fanta League"></a>
                </div>
            <div id="giornate">
                <table id="table1"><tr><td><img id="immGiornate" src="image/giornate.png" width="100" height="16"></td>'.$corpoGiornate.'</tr></table></div>
				<div></div>';
$fineHeader='</header>';
$inizioCorpoCentrale='<div id="contenitore">
                <!-- Section sidebar -->
                <section id="sidebar">
                    <div id="menu" style="float:left">
                        <a href="home.php">
                            <div id="areaUtente">
                                <img src="image/areaUtente.png" width="177,2" height="59,1" alt="AREA UTENTE"/>
                            </div>
                        </a>
                        <a href="squadra.php">
                            <div id="b">
                                <img src="image/squadra.png" width="177,2" height="59,1" alt="SQUADRA"/>
                            </div>
                        </a>    
                        <a href="mercato.php">
                            <div id="c">
                                <img src="image/mercato.png" width="177,2" height="59,1" alt="MERCATO">
                            </div>
                        </a>
                        <a href="cerca.php">
                            <div id="d">
                                <img src="image/cerca.png" width="177,2" height="59,1" alt="">
                            </div>
                        </a>
                        <div id="e">
                            <img src="image/logout.png" width="177,2" height="59,1" alt="">
                        </div>
            			<div>
                        <!--Frame per la classifica di serie a e gli ultimi risultati-->
                        <iframe  idsrc="http://www.ilcalcio.net/classifica-serie-A.htm" width="256" height="244" scrolling="auto" frameborder="0"> 
                            <font size="1" face="Tahoma\">Se il tuo browser non supporta i frame in linea clicca
                                <a href="http://www.ilcalcio.net/\" target=\"_blank\">
                                    QUI
                                </a>
                            </font>
                        </iframe>
                        </div>
                        <!-- Fine frame -->
                    </div>
                </section>
                <!-- Fine section sidebar-->
            
                <!-- Inizio div corpo -->
                <section id="corpo" style="float:center">
                    '. $login .' 
                    
                </section>
            </div>';
           $footer='<footer bgcolor="#A4E4B9">
            <table style="width:100%">
                <tr>
                    <td align="center" bgcolor="#A4E4B9">
                        <p>
                            UFL - University Fanta League  -  Progetto di Ingegneria del Software  -  Realizzato da Stefano Foresta, Gennaro Franzese, Giuseppe Paglialonga
                        </p>
                    </td>
                </tr>
            </table>
        </footer>';
$finePagina='</body></html>';
echo $inizioTestaPagina . $inizioHeader . $corpoHeader . $fineHeader.$inizioCorpoCentrale. $footer . $finePagina; 
}

function getCorpoGiornate(){
                            $corpo='';;
                            $giornate = 37;//=getNumeroGiornate();
                            for($i=0;$i<$giornate;$i++)
                                $corpo=$corpo . '<td><a href="giornata.php">' . $i . '</a></td>';
                            return $corpo;
                        }

function loginView()
{
$login='<H2 id="loginIntestazione">LOGIN</h2><BR>
<div>
<p><input type="checkbox" id="adminCheck" name="admin" onchange="cambiaUserEmailAdmin(this)" value="on"> Admin</p>
        <p><input type="text" id="userLoginText"  placeholder="Username or Email"></p>
        <p><input type="password" id="passwordLoginText"  placeholder="Password"></p>
        <p><input type="button" onclick="loginAja()" " value="Login"></p>
      </div>
      <script></script>';
 
  
return $login;
}

function creaGraficaAdmin(){
	$corpo ='<div> <form id="uploadCalendario" enctype="multipart/form-data">
    Seleziona il file contenente il calendario:
    <input type="file" id="fileUploadCalendario">
    <input type="button" value="Carica Calendario" onclick="caricaCalendario()" name="buttonCaricaCalendario">
</form>
<div>
    Selezione il file contenente l elenco dei giocatori:
    <input type="file" name="fileGiocatori" id="fileUploadGiocatori">
    <input type="button" value="Carica Giocatori" onclick="caricaGiocatori()" name="buttonCaricaGiocatori">
</div>
<div>
    Selezione il file contenente l elenco dei giocatori:
    <input type="file" name="filePagelle" id="fileUploadPagelle">
    <input type="button" value="Carica Pagelle" onclick="caricaPagelle()" name="buttonCaricaPagelle">
</div><div>
<input type="checkbox" name="fantamercato" value="on" > Fantamercato ATTIVO/DISATTIVO<br>
</div></div>';
return $corpo;
}


function creaGraficaSquadra(){
	$utente;
	{

	}
}

function creaGraficaFormazioni($modulo)
{	$moduli=explode("-", $modulo);
	$corpo='<div align="center">
	<div><select id="selectSquadra"   onload="getSquadre(this)" > 
	<option value="squadra">squadra</option>
	<option value="squadra">juventus</option>
	</select></div>
          <select id="selectFormazioni" size="20"  multiple onchange="selectoption();" > option value="4-3-3">4-3-3</option>
  <option value="3-4-3">3-4-3</option>
  <option value="4-4-2">4-4-2</option>
  <option value="3-5-2">3-5-2</option>option value="4-3-3">4-3-3</option>
  <option value="3-4-3">3-4-3</option>
  <option value="4-4-2">4-4-2</option>
  <option value="3-5-2">3-5-2</option>option value="4-3-3">4-3-3</option>
  <option value="3-4-3">3-4-3</option>
  <option value="4-4-2">4-4-2</option>
  <option value="3-5-2">3-5-2</option>option value="4-3-3">4-3-3</option>
  <option value="3-4-3">3-4-3</option>
  <option value="4-4-2">4-4-2</option>
  <option value="3-5-2">3-5-2</option>option value="4-3-3">4-3-3</option>
  <option value="3-4-3">3-4-3</option>
  <option value="4-4-2">4-4-2</option>
  <option value="3-5-2">3-5-2</option>option value="4-3-3">4-3-3</option>
  <option value="3-4-3">3-4-3</option>
  <option value="4-4-2">4-4-2</option>
  <option value="3-5-2">3-5-2</option>option value="4-3-3">4-3-3</option>
  <option value="3-4-3">3-4-3</option>
  <option value="4-4-2">4-4-2</option>
  <option value="3-5-2">3-5-2</option>option value="4-3-3">4-3-3</option>
  <option value="3-4-3">3-4-3</option>
  <option value="4-4-2">4-4-2</option>
  <option value="3-5-2">3-5-2</option>option value="4-3-3">4-3-3</option>
  <option value="3-4-3">3-4-3</option>
  <option value="4-4-2">4-4-2</option>
  <option value="3-5-2">3-5-2</option>option value="4-3-3">4-3-3</option>
  <option value="3-4-3">3-4-3</option>
  <option value="4-4-2">4-4-2</option>
  <option value="3-5-2">3-5-2</option>option value="4-3-3">4-3-3</option>
  <option value="3-4-3">3-4-3</option>
  <option value="4-4-2">4-4-2</option>
  <option value="3-5-2">3-5-2</option>option value="4-3-3">4-3-3</option>
  <option value="3-4-3">3-4-3</option>
  <option value="4-4-2">4-4-2</option>
  <option value="3-5-2">3-5-2</option>';


    $endCorpo='</select></div>';
    return $corpo . $endCorpo;
	
}
function stampaPostLogin($ut)
{	
	$corpo= '<div><form>
<select id="selezionaFormazioni" onchange="prendiFormazioni(this.value)">
  <option value="4-3-3">4-3-3</option>
  <option value="3-4-3">3-4-3</option>
  <option value="4-4-2">4-4-2</option>
  <option value="3-5-2">3-5-2</option>
  <option value="5-3-2">5-3-2</option>
  <option value="5-4-1">5-4-1</option>
  </select>
</form></div>';
echo $corpo;
}

?>