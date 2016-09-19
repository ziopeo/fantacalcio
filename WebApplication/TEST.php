<HTML>
<HEAD>

<TITLE> TEST </TITLE>
</HEAD>
<BODY>
<div id="container">
<h1> TEST BLACK BOX BACK END <H1>


<h4> TEST REGISTRAZIONE  <H4>
<br><br><button id="regbut" onclick="testasuccessoregistrazione();this.disabled=true;">Test Registrazione: Successo</button>
<br><button  onclick="testafallimentoregistrazione();">Test Registrazione: Fallimento</button>
<DIV id="testbackendreg">Inizio...

</DIV>

<h4> TEST LOGIN <H4>
<br><br><button disabled id="loginsuc" onclick="testasuccessologin();">Test Login: Successo</button>
<button id="logsuc" disabled onclick="testasuccessologout();">Test Logout: Successo</button>
<button onclick="testafallimentologin();">Test Login: Fallimento</button>
<button id="logfal"  onclick="testafallimentologout();">Test Logout: Fallimento</button><br>
<DIV id="testbackend">Inizio...

</DIV>

<h4> TEST API  <H4>
<br><br>
<button onclick="testalogincondatitest()">carica TEST DRIVER per test API</button>
<button onclick="testagetsquadrautente(elementgen);">Test API: getSquadraUtente</button>
<button onclick="testagetfacolta(elementgen);">Test API: getFacoltà</button>
<button onclick="testagetsquadre(elementgen);">Test API: getSquadre()</button>
<button onclick="testagetformazioneutente(elementgen);">Test API: getFormazioneUtente</button>
<button onclick="testagetgiocatorisquadra(elementgen);">Test API: getGiocatoriSquadra</button>
<button onclick="testagetinformazionigiocatore(elementgen);">Test API: getInformazioniGiocatore</button>
<button onclick="testatutto();">Test API: test totale</button>
<br>
<DIV id="testbackendgen">Inizio...

</DIV>




</DIV>

<SCRIPT>
var loginsuc= document.getElementById("loginsuc");
var logsuc= document.getElementById("logsuc");
var logfal= document.getElementById("logfal");
var regbut= document.getElementById("regbut");
var element = document.getElementById("testbackend");
var elementreg = document.getElementById("testbackendreg");
var elementgen = document.getElementById("testbackendgen");
var a,b,c,d,e,f,g;
var container=document.getElementById("container");





function testatutto()
{ /*testagetsquadre(divid)
testagetformazioneutente()
testagetinformazionigiocatore(divid)
testagetsquadrautente(divid)
testasuccessologin
  testasuccessologout
  testafallimentologout
testafallimentologin
testasuccessoregistrazione
testafallimentoregistrazione
testagetfacolta
testagetgiocatorisquadra
testagetinformazionigiocatore*/

  a=document.createElement("div");
  b=document.createElement("div");
  c=document.createElement("div");
  d=document.createElement("div");
  e=document.createElement("div");
  f=document.createElement("div");
  g=document.createElement("div");
    container.appendChild(a);
    container.appendChild(b);
    container.appendChild(c);
    container.appendChild(d);
    container.appendChild(e);
    container.appendChild(f);
    container.appendChild(g);
    testalogincondatitest();
    testagetsquadre(a);
    testagetformazioneutente(b);
    testagetfacolta(c);
    testagetinformazionigiocatore(d);
    testagetgiocatorisquadra(e);
    testagetsquadrautente(f);




}
function connectA(metodo) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "controller.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(metodo);
    return xmlhttp;
}



function testa(metodo, msg,divid)
{var xml = connectA("metodo="+metodo);
    xml.onreadystatechange = function() {
        if (xml.readyState == 4 && xml.status == 200) {
            //resetSelect(eelemento);
            console.log(metodo);
            console.log(xml.responseText);
             debugger;
            var x = JSON.parse(xml.responseText);

            if(x[0].status=="true") 
              var y= msg+ "<BR>Test <h2>API"+metodo +"</h2>:<BR> Test eseguito con successo<BR><br>";
            else if(x.length>1)
              var y= msg+ "<BR>Test <h2>API:"+metodo +"</h2><br> Test eseguito con successo<br>"+ xml.responseText+ "<br><br>";
          else if (x[0].status=="false" ) 
            y=msg+"<BR>Test <h4>"+metodo+"</h4> Fallito<BR><BR>";
          else if(x[0].idGiocatore!="")
            var y= msg+ "<BR>Test <h2>API:"+metodo +"</h2><br>eseguito con successo<br>"+ xml.responseText+ "<br>";
          else if(x=="") y=msg+"<BR>Test <h4>"+metodo+"</h4> Fallito<BR><BR>";


divid.innerHTML=y;
            }
        }
        
}
function testaregistrazione(matricola, nome, cognome, username, password, idFacolta, squadra, msg){
  


  var xml = connectA("metodo=registrazione&matricola="+matricola+"&nome="+nome+"&cognome="+cognome+"&username="+username+"&password="+password+"&facolta="+idFacolta+"&squadra="+squadra);
    xml.onreadystatechange = function() {
        if (xml.readyState == 4 && xml.status == 200) {
            //resetSelect(eelemento);
            console.log(xml.responseText);
            var x = JSON.parse(xml.responseText);
            if(x[0].status=="true") 
             { var y= msg+ "<BR>TEST DRIVER: <BR>matricola="+matricola+"&nome="+nome+"&cognome="+cognome+"&username="+username+"&password="+password+"&facolta="+idFacolta+"&squadra="+squadra+"<BR> SUCCESSO<BR><br>";
              }
          else
            y=msg+"<BR>TEST DRIVER: <BR>matricola="+matricola+"&nome="+nome+"&cognome="+cognome+"&username="+username+"&password="+password+"&facolta="+idFacolta+"&squadra="+squadra+"<br>Test falli<br><br>";

elementreg.innerHTML=y;
            }
        }
        
}










function testlogin(username, password, msg){

	var xml = connectA("metodo=login&utente="+username+"&password="+password);
    xml.onreadystatechange = function() {
        if (xml.readyState == 4 && xml.status == 200) {
            //resetSelect(eelemento);
            console.log(xml.responseText);
            var x = JSON.parse(xml.responseText);
            if(x[0].status=="true") 
              var y= msg+ "<BR>TEST DRIVER: <BR>utente= "+username+"<BR>password= "+password+ "<BR> Test eseguito con successo<BR><br>";
          else
          	y=msg+"<BR>TEST DRIVER: <BR>utente= "+username+"<BR>password= "+password+ "<br>Test Fallito!<br><br>";

element.innerHTML=y;
            }
        }
        
}

function connectGet(par){
	var xhttp = new XMLHttpRequest();
  xhttp.open("GET", "controller.php?"+par, true);
  xhttp.send();
  return xhttp;
}

function testlogout(msg){

	var xml = connectA("metodo=logout");
    xml.onreadystatechange = function() {
        if (xml.readyState == 4 && xml.status == 200) {
            //resetSelect(eelemento);
            console.log(xml.responseText);

             
            var x = JSON.parse(xml.responseText);

            if(x[0].status=="true") 
              var y= msg+ "<BR>Test logut eseguito con successo<BR><br>";
          else
          	y=msg+"<BR>Test logout Fallito<BR><BR>";


element.innerHTML=y;
            }
        }
        
}





function testasuccessologin() 
{
  testlogin("0510200200", "pass", "<H2>Oracolo:</H2> il login viene effettuato con successo.");logsuc.disabled=false;logfal.disabled=true;
}
function testasuccessologout()
{
 testlogout("<H2>Oracolo:</H2> il logout viene effettuato con successo."); logsuc.disabled=true;logfal.disabled=false;  
  }

  function testafallimentologin() 
{testlogin("sdafsaf", "sadfasd", "<H2>Oracolo:</H2> il login non va a buon fine");}
  
  function testafallimentologout()
  {
  testlogout("<H2>Oracolo:</H2> il logout non va a buon fine in quanto non si è loggati");   
  }

function testalogincondatitest() 
{testlogin("0510200479", "ciao", "<H2>Oracolo:</H2> il login va a buon fine<BR> i TEST DRIVER SONO DISPONIBILI ORA<BR>");}
function testasuccessoregistrazione()
{
matricola="0510200200";
  nome="pippo";
  cognome="pluto";
  username="ciao";
  password="pass";
  idFacolta=1;
  squadra="lanina";
testaregistrazione(matricola, nome, cognome, username, password, idFacolta, squadra, "<H2>Oracolo:</H2> Registrazione viene effettuata con successo");
loginsuc.disabled=false;
}

function testafallimentoregistrazione()
{
matricola="";
  nome="pippo";
  cognome="pluto";
  username="";
  password="";
  idFacolta=1;
  squadra="lanina";
testaregistrazione(matricola, nome, cognome, username, password, idFacolta, squadra, "<H2>Oracolo:</H2> La registrazione non va a buon fine");
}
function testagetsquadre(divid)
 { testa("getSquadre", 'Test: getSquadre<BR> <H2>Oracolo:</H2> {restituisce un oggetto json con le squadre dei giocatori reali presenti nel sistema} - permessi utente "',divid );}
function testagetformazioneutente(divid)
 { testa("getFormazioneUtente", 'Test: getFormazioneUtente<BR> Oracolo {restituisce unoggetto  json con la formazione dellutente loggato} - permessi utente "' ,divid);}

function testagetinformazionigiocatore(divid)
 { testa("getInformazioniGiocatore&calciatore=BASSI", 'Test: getInformazioniGiocatore<BR>TEST DRIVER: CALCIATORE=BASSI<BR> Oracolo {restituisce un oggetto json con le informazioni sul calciatore} - permessi utente"', divid );}
function testagetgiocatorisquadra(divid)
 { testa("getGiocatoriSquadra&squadra=milan", 'Test: getGiocatoriSquadra<BR>TEST DRIVER: squadra=MILAN <br> <H2>Oracolo:</H2> {restituisce un oggetto json con i giocatori della squadra MILAN} - permessi utente"', divid );}
 function testagetsquadrautente(divid)
{
  testa("getSquadraUtente", "<br>Test: getSquadraUtente (loggato)<br><H2>Oracolo:</H2> restituisce un oggetto json con i componenti della squadra dell utente loggato - permessi utente", divid);
}
function testagetfacolta(divid)
{
  testa("getFacolta", "<br>Test: getFacolta()<br><H2>Oracolo:</H2> restituisce un oggetto json con le facoltà presenti nel sistema - permessi pubblici", divid);
}

  


</SCRIPT>
</BODY>
</HTML>