<HTML>
<HEAD>

<TITLE> TEST </TITLE>
</HEAD>
<BODY>
<div id="container">
<h1> TEST BLACK BOX BACK END <H1>
<h4> TEST LOGIN <H4>
<br><br><button onclick="testasuccessologin();">Test Login: Successo</button>
<button id="logsuc" disabled onclick="testasuccessologout();">Test Logout: Successo</button>
<button onclick="testafallimentologin();">Test Login: Fallimento</button>
<button id="logfal"  onclick="testafallimentologout();">Test Logout: Fallimento</button><br>
<DIV id="testbackend">Inizio...

</DIV>

<h4> TEST REGISTRAZIONE  <H4>
<br><br><button id="regbut" onclick="testasuccessoregistrazione();this.disabled=true;">Test Registrazione: Successo</button>
<br><button  onclick="testafallimentoregistrazione();">Test Registrazione: Fallimento</button>
<DIV id="testbackendreg">Inizio...

</DIV>

<h4> TEST API  <H4>
<br><br><button onclick="testagetsquadrautente(elementgen);">Test API: getSquadraUtente</button>
<br><button onclick="testagetfacolta(elementgen);">Test API: getFacoltà</button>
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
testasuccessoregistrazione();
testasuccessologin();

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
              var y= msg+ "<BR>Test <h4>API"+metodo +"</h4>:<BR> Test eseguito con successo<BR><br>";
            else if(x.length>1)
              var y= msg+ "<BR>Test <h4>API:"+metodo +"</h4><br> Test eseguito con successo<br>"+ xml.responseText+ "<br><br>";
          else if (x[0].status=="false" ) 
            y=msg+"<BR>Test <h4>"+metodo+"</h4> Fallito<BR><BR>";
          else if(x[0].idGiocatore!="")
            var y= msg+ "<BR>Test <h2>API:"+metodo +"</h2><br>eseguito con successo<br>"+ xml.responseText+ "<br>";


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

function testagetsquadrautente(divid)
{
  testa("getSquadraUtente", "Oracolo: restituisce un oggetto json con i componenti della squadra dell utente loggato", divid);
}
function testagetfacolta(divid)
{
  testa("getFacolta", "Oracolo: restituisce un oggetto json con le facoltà presenti nel sistema", divid);
}

  



function testasuccessologin() 
{
  testlogin("0510200479", "ciao", "Oracolo: il login viene effettuato con successo.");logsuc.disabled=false;logfal.disabled=true;
}
function testasuccessologout()
{
 testlogout("Oracolo: il logout viene effettuato con successo."); logsuc.disabled=true;logfal.disabled=false;  
  }

  function testafallimentologin() 
{testlogin("sdafsaf", "sadfasd", "Oracolo: il login non va a buon fine");}
  
  function testafallimentologout()
  {
  testlogout("Oracolo: il login non va a buon fine in quanto non si è loggati");   
  }

function testasuccessoregistrazione()
{
matricola="0510200200";
  nome="pippo";
  cognome="pluto";
  username="ciao";
  password="pass";
  idFacolta=1;
  squadra="lanina";
testaregistrazione(matricola, nome, cognome, username, password, idFacolta, squadra, "Oracolo: Registrazione viene effettuata con successo");
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
testaregistrazione(matricola, nome, cognome, username, password, idFacolta, squadra, "Oracolo: La registrazione non va a buon fine");
}
function testagetsquadre(divid)
 { testa("getSquadre", 'Test: getSquadre<BR> Oracolo: {restituisce un oggetto json con le squadre dei giocatori reali presenti nel sistema} "',divid );}
function testagetformazioneutente(divid)
 { testa("getFormazioneUtente", 'Test: getFormazioneUtente<BR> Oracolo {restituisce unoggetto  json con la formazione dellutente loggato} "' ,divid);}

function testagetinformazionigiocatore(divid)
 { testa("getInformazioniGiocatore&calciatore=BASSI", 'TEST DRIVER: CALCIATORE=BASSI<BR>Test: getInformazioniGiocatore<BR> Oracolo {restituisce un oggetto json con le informazioni sul calciatore}"', divid );}
function testagetgiocatorisquadra(divid)
 { testa("getGiocatoriSquadra&squadra=milan", 'TEST DRIVER: squadra=MILAN <br>Test: getGiocatoriSquadra<BR> Oracolo: {restituisce un oggetto json con i giocatori della squadra MILAN} "', divid );}


</SCRIPT>
</BODY>
</HTML>