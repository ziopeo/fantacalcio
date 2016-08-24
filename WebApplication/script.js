

function cambiaUserEmailAdmin(check)
{   var x=document.getElementById("userLoginText");
    var y=document.getElementById("loginutenteadmin");
    if(check.checked){
        x.placeholder="Email";
        y.value="loginAdmin";}
   else{
        x.placeholder="Matricola o Email";
        y.value="login";
    }
}


function loginAja() {
           var ut=document.getElementById("userLoginText");
           var pass =document.getElementById("passwordLoginText");
           var admin= document.getElementById("adminCheck");
           if (admin.checked)
            connectA("metodo=loginAdmin&utente="+ut.value+"&password="+pass.value);
            else
                connectA("metodo=login&utente="+ut.value+"&password="+pass.value);
    }


    function connectAj(parametri)
{
         xmlhttp = new XMLHttpRequest();
         
        xmlhttp.open("POST", "controller.php", false);
          xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(parametri);
        return xmlhttp;

    }


    function selezionaFormazioni(modulo) {
            connectAjax("metodo=getFormazioni&modulo="+modulo);
    }
    function removeOptions(selectbox)
{
    var i;
    for(i=selectbox.options.length-1;i>=0;i--)
    {
        selectbox.remove(i);
    }
}

function caricaInformazioniGiocatore(giocatore){
    var eelemento=document.getElementById("informazioniGiocatore");
    var k=gFS(giocatore, 1);
    var xml =connectA("metodo=getInformazioniGiocatore&calciatore="+k);
    xml.onreadystatechange= function(){
                        if (xml.readyState == 4 && xml.status == 200) {
                        var x=JSON.parse(xml.responseText);
                           eelemento.innerHTML="<p>Nome: " + x[0].nome+ "<p>Prezzo Attuale: "+ x[0].prezzoAttuale+"<p>Ruolo: "+ x[0].ruolo+"<P>Squadra: "+ x[0].squadra ;
                        }
                                    }
}
function caricaInformazioniGiocatore2(gioc)
{               

    var x= infGiocatore(gioc.value);
   
 
}


function resetSelect(x){
while (x.hasChildNodes()) {
    x.removeChild(x.firstChild);
} 


}  


//-------------------------------------

function caricaGiocatoriUtente()
    {  
        var portieriopt=document.getElementById("optRosaPortieri");
        var difensoriopt=document.getElementById("optRosaDifensori");
        var centrocampistiopt=document.getElementById("optRosaCentrocampisti");
        var attaccantiopt=document.getElementById("optRosaAttaccanti");
        var xml =connectA("metodo=getSquadraUtente");
        xml.onreadystatechange= function(){
            if (xml.readyState == 4 && xml.status == 200) {
                var x=JSON.parse(xml.responseText);
                for (i=0;i<(x.length);i++){
                    var option= document.createElement("option");
                    option.text =x[i].nome +" ( "+ x[i].prezzoIniziale+ " )";
                    option.value=x[i].nome+"="+x[i].prezzoIniziale+ "&id="+x[i].idGiocatore+ "&ruolo="+ x[i].ruolo;
                    switch (x[i].ruolo){
                        case "P" : 
                                portieriopt.appendChild(option);
                            break;
                        case "D":
                                
                                difensoriopt.appendChild(option);
                            break;
                        case "C":
                                centrocampistiopt.appendChild(option);
                            break;
                        case "A":
                                attaccantiopt.appendChild(option);
                            break;
                        default:
                            break;
                   }
                    /*var option1=document.createElement("option");
                    option1.text= x[i].prezzoIniziale;
                    option.value=i+1;
                    eelemento.add(option);*/
                    //eelemento.add(option);
                }
        }
    }
}
//-----------------------------------------------------


function caricaGiocatori(squadra)
    {  
        var portieriopt=document.getElementById("optPortieri");
        var difensoriopt=document.getElementById("optDifensori");
        var centrocampistiopt=document.getElementById("optCentrocampisti");
        var attaccantiopt=document.getElementById("optAttaccanti");
        //var squadra=document.getElementById("selectSquadra");
        var eelemento=document.getElementById("selectGiocatore");
        var elemento=document.getElementById("selectGiocatoriRosa");
        var xml =connectA("metodo=getGiocatoriSquadra&squadra="+squadra);
        resetSelect(portieriopt);
        resetSelect(difensoriopt);
        resetSelect(centrocampistiopt);
        resetSelect(attaccantiopt);
        squadra=squadra.value;
        xml.onreadystatechange= function(){
            if (xml.readyState == 4 && xml.status == 200) {
                //resetSelect(eelemento);
                var x=JSON.parse(xml.responseText);
                for (i=0;i<(x.length);i++){
                    var option= document.createElement("option");
                    option.text =x[i].nome +" ( "+ x[i].prezzoIniziale+ " )";
                    option.value=x[i].nome+"="+x[i].prezzoIniziale+ "&id="+x[i].idGiocatore+ "&ruolo="+ x[i].ruolo;
                    switch (x[i].ruolo){
                        case "P" : 
                                portieriopt.appendChild(option);
                            break;
                        case "D":
                                
                                difensoriopt.appendChild(option);
                            break;
                        case "C":
                                centrocampistiopt.appendChild(option);
                            break;
                        case "A":
                                attaccantiopt.appendChild(option);
                            break;
                        default:
                            break;
                   }
                    /*var option1=document.createElement("option");
                    option1.text= x[i].prezzoIniziale;
                    option.value=i+1;
                    eelemento.add(option);*/
                    //eelemento.add(option);
                }
        }
    }
}
    function myFunction(arr) {
    var out = "";
    var i;
    for(i = 0; i < arr.length; i++) {
        out += arr[i]['nome'];
    }
}

    function caricaCalendario()
    {    var t=document.getElementById("fileUploadCalendario").value;
            connectAjax("metodo=caricaCalendario&file="+t, "corpo");
    }
    function caricaSquadre(sele)
    {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
               document.getElementById("demo").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("POST", "controller.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("metodo=caricaSquadre");
    
    }
//connession di default. dato un metodo restituisce i dati desiderati
function connectA(metodo)
{
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("POST", "controller.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(metodo);
        return xmlhttp;

}
function checkEsiste(nome, x, parametro){
//verifica se il giocatore esiste già nella select 
//e verifica se ha raggiunto la quota max di giocatori
//parametreo: 1=> portieri, 2=>difensori, 3....

var y=x.childNodes;var i=0;sw=0;s="";

switch (parametro){
    case 1:  
        while (i<y.length){
            s=gFS(y[i],1);
            if (s==nome)
                 sw=1; 
            if (i>1){
                sw=2;
                
                break;
                }i++;}
            break;
    case 2:  
        while (i<y.length){
            s=gFS(y[i],1);
            if (s==nome)
                 sw=1; 
            if (i>6){
                sw=2;
                break;
                }i++;}
            break;
    case 3:  
        while (i<y.length){
            s=gFS(y[i],1);
            if (s==nome)
                 sw=1; 
            if (i>6){
                sw=2;
                break;
                }i++;}
            break;
    case 4:  
        while (i<y.length){
            s=gFS(y[i],1);
            if (s==nome)
                 sw=1; 
            if (i>4){
                sw=2;
                break;
                }i++;}
            break;    
    }


return sw;
}

function aggiungiArosa(giocatore)
{var sw=false;     

    if (acquistoFantamilioni(giocatore, 1, 0)!=null)
    {
        var portieriopt=document.getElementById("optRosaPortieri");
        var difensoriopt=document.getElementById("optRosaDifensori");
        var centrocampistiopt=document.getElementById("optRosaCentrocampisti");
        var attaccantiopt=document.getElementById("optRosaAttaccanti");
        var option=document.createElement("option");
        var nome=gFS(giocatore, 1);
        var ruolo=gFS(giocatore, 3);
                    option.value= giocatore.value;
                    option.text = giocatore.options[giocatore.selectedIndex].text;
                    switch (ruolo){
                        case "P" :
                                    i=(checkEsiste(nome, portieriopt, 1));
                                if(i==0){
                                        portieriopt.appendChild(option);
                                        sw=true;
                                         }   
                                else if (i==1)
                                    alert("Possiedi già questo giocatore");
                                else if (i=2)
                                    alert("Puoi acquistare massimo 3 portieri");
                                break;
                        case "D":
                                i=(checkEsiste(nome, difensoriopt, 2));
                                if(i==0){
                                    difensoriopt.appendChild(option);
                                    sw=true;}    
                                else if (i==1)
                                    alert("Possiedi già questo giocatore");
                                else if (i=2)
                                    alert("Puoi acquistare massimo 8 difensori");
                                break;
                        case "C":
                                i=(checkEsiste(nome, centrocampistiopt, 3));
                                if(i==0){
                                    centrocampistiopt.appendChild(option);
                                    sw=true;}
                                else if (i==1)
                                    alert("Possiedi già questo giocatore");
                                else if (i=2)
                                    alert("Puoi acquistare massimo 8 centrocampisti");
                                break;
                        case "A":
                                i=(checkEsiste(nome, attaccantiopt, 4));
                                if(i==0){
                                    attaccantiopt.appendChild(option);
                                    sw=true;}
                                else if (i==1)
                                    alert("Possiedi già questo giocatore");
                                else if (i=2)
                                    alert("Puoi acquistare massimo 6 attaccanti");
                                break;
                        default:
                                break;
                        }
                    
                if(sw==true){
                    (acquistoFantamilioni(giocatore, 1, 1));    }

                }


}

/*
fantamilioni prende dal database e li aggiorna nel testo 
del div contenente i fantamilioni
*/
function fantamilioni()
{
    var fant = document.getElementById("fantamilioni");
    var xml=connectA("metodo=getFantamilioni");
    xml.onreadystatechange = function (){
    if (xml.readyState == 4 && xml.status == 200) {
        var t= (xml.responseText);
        var res=(t);
        fant.textContent=res;
        }           
    }
        
}

/*
acquistaFantamilioni: si occupa di aggiornare il totale dei fantamilioni
e di verificare se l utente può permettersi di acquistare quel giocatore.
acqu_vend: indica se si vuole acquistare o vendere
calcoloSi: abilita l aggiornamento del totale anche nel divFANTAMILIONI, 
cosa inutile in caso di verifica
*/

function acquistoFantamilioni(giocatore, acqu_vend, calcoloSi)
{
    var fant = document.getElementById("fantamilioni");
    var x=parseInt(fant.textContent);
    if (acqu_vend==1)
        x=x- gFS(giocatore,0);
    else if (acqu_vend==0)
        x=x+ gFS(giocatore,0);
    if (x>0){
        if (calcoloSi==1){
            fant.textContent=x;
            return true;    }
         else if (calcoloSi!=1)
            return true;
        }
    else {
        return false; }
}

/*
gFS: da un giocatore ne prende il value passato con formato "BUFFON=17"
splitta e a seconda del parametro:
0 restituisce il costo
1 restituisce il nome
*/
function gFS(giocatore, para)
{
    var u= giocatore.value.split("&");
    
        
    if (u!=undefined && u!="")

    {   var k=u[0].split("=");
        var i=u[1].split("=");

        var id=i[1];
        var y=u[2].split("=");
        var ruolo=y[1];
        if (para==0) //stampa il prezzo
            return parseInt(k[1]);
        else if (para==1) //stampa il nome
            return k[0];
        else if (para==2) //ritorna l id;
            return (id);
        else if (para==3)
            return ruolo;
        else return null;
    }
}
function gFSS(giocatore, para)
{
    var k= giocatore.split("=");
    if (para==0) //stampa il prezzo
       return parseInt(k[1]);
    else if (para==1) //stampa il nome
        return k[0];
    else return null;
}
/*
si occupa ti aggiornare il divFantamilioni dopo la rivendita del giocatore x
*/
function venditaFantamilioni(x)
{
    var fant = document.getElementById("selectGiocatoriRosa");
    if (acquistoFantamilioni(x, 0,1)!=null)
        x.remove(x.selectedIndex);

}
function toId(arr)
{
  { var str= "";


    for(var i=0;i<arr.length;i++){            
        if (i==(arr.length-1)){
            str+=arr[i];}
            else {
            str+= arr[i]+ ',';
            }
    }
     
    return str;
}  
}

function selTutti(sel){
    
                  for (var i=0;i<sel.options.length;i++)
                  {
                    sel.options[i].selected=true;
                  }

}
function arrayToJson(array)
{   var str= '{"giocatori":[';
    var arr=new Array();
    for(var i=0;i<array.length;i++){ 
        arr=array[i];           
        if (i==(array.length-1)){
            str+='{"nome":"'+ arr[0]+ '", "prezzo":"'+ arr[1] + '"}';}
            else {
            str+='{"nome":"'+ arr[0]+ '", "prezzo":"'+ arr[1] + '"},';
            }
    }
    str+=']}'; 
    return str;
}
function salvaModificheRosa()
{
    var sel= document.getElementById("selectGiocatoriRosa");
    var inpFan=document.getElementById("fantamilioni");
    var inpHid= document.getElementById("fantamilion");
    inpHid.value= (inpFan.textContent);
    console.log(inpHid.value);
    var x=""; var c=0;
    var prep=new Array();var k=sel.options.length;
   if (k==25){ 
        for(var i=0;i<k;i++)
            {   
            x=sel.options[i];
            if(((sel.options[i].value).localeCompare(""))!=0)
            {   
                prep[c]= gFS(x,2);
                c++;       }    
             }
        selTutti(sel);
        return true;
        } 
    else
    {alert('devi scegliere 25 giocatori tra cui: 3 portieri, 8 difensori, 8 centrocampisti, 6 attaccanti');
   return false;
   }
}

function creaTemp()
{
    var selgioc=document.getElementById("selectGiocatore");
    var selRos=document.getElementById("selectGiocatoriRosa");
    for (var i=0;i<selgioc.options.length;i++)
    {  
        if (selgioc.options[i].value!="squadra" && selgioc.options[i].value!="")
            aggiungiArosa(selgioc.options[i]);
    }
}
/*
chiama le squadre sul database per caricare la selectSquadra
che serve poi per visualizzare i giocatori da acquistare
*/
 function getSquadre()
{ 
    var eelemento=document.getElementById("selectSquadra");
    var xml=connectA("metodo=getSquadre");
    xml.onreadystatechange = function (){
    if (xml.readyState == 4 && xml.status == 200) {
        var t= (xml.responseText);
        var res=JSON.parse(t);
        for (var i=0;i<(res.length);i++){
            var option= document.createElement("option");
            option.text = option.value=res[i].squadra;
            eelemento.add(option);
           }           
        }
    }
}


function AjaxModel()
{


var xml=connectA("metodo=getFacolta");
    xml.onreadystatechange = function (){
    if (xml.readyState == 4 && xml.status == 200) {
        
        }
     }  
}

function caricaFacolta()
{
var ele = document.getElementById("sceltaFacolta");

var xml=connectA("metodo=getFacolta");
    xml.onreadystatechange = function (){
    if (xml.readyState == 4 && xml.status == 200) {
        var t= JSON.parse(xml.responseText);
        for (var i=0; i<t.length;i++)
        {
         var option = document.createElement("option");
        option.text= t[i].nome;
        option.value=t[i].idLegaFacolta;
        ele.add(option);
        }
        }
       }
}
function carica(arra, x, para)
{

    for (var i=0;i<x.length;i++)
        {
        switch(para) {
         case 0: 
        x[i].childNodes[0].nodeValue=arra[i].nome;
         break;
         case 1:
         x[i].childNodes[0].nodeValue=arra[i].prezzoIniziale;
         break;
         case 2:
         x[i].childNodes[0].nodeValue=arra[i].squadra;
        break;
        }
    }
}

function caricaPerFormazione(arra, x, para)
{

    for (var i=0;i<x.length;i++)
        {
        switch(para) {
         case 0: 
         (x[i].childNodes[0].nodeValue=arra[i].nome);
         break;
         case 1:
         (x[i].childNodes[0].nodeValue=arra[i].ruolo);
         break;
         case 2:
         (x[i].childNodes[0].nodeValue=arra[i].squadra);
        break;
        case 3:
        var xxx=arra[i].voto
        if (xxx!=null)
         (x[i].childNodes[0].nodeValue=xxx);
        else
            (x[i].childNodes[0].nodeValue="0.0");
        break;
        }
    }
}
function caricaSquadraUtente(){


var por= document.getElementById("nomiPortieri");
var dif= document.getElementById("nomiDifensori");
var cen= document.getElementById("nomiCentrocampisti");
var att= document.getElementById("nomiAttaccanti");
var cp= document.getElementById("costoPortieri");
var cd= document.getElementById("costoDifensori");
var cc= document.getElementById("costoCentrocampisti");
var ca= document.getElementById("costoAttaccanti");
var sp=document.getElementById("squadrePortieri");
var sd=document.getElementById("squadreDifensori");
var sc= document.getElementById("squadreCentrocampisti");
var sa=document.getElementById("squadreAttaccanti");
var arr=new Array();var t;
var portieri=new Array;
var difensori=new Array;
var centrocampisti=new Array;
var attaccanti=new Array; var prop;
var xml=connectA("metodo=getSquadraUtente");
    xml.onreadystatechange = function (){
    if (xml.readyState == 4 && xml.status == 200) {
        console.log(xml.responseText);
        t=JSON.parse(xml.responseText);
        for( prop in t)
            {
            switch(t[prop].ruolo){
                case "P": portieri.push(t[prop]);   
                break;
                case "D":difensori.push(t[prop]);   
                break;
                case "C":centrocampisti.push(t[prop]);
                break;
                case "A":attaccanti.push(t[prop]);
                break;
                    }
                }

                carica(portieri, por.getElementsByClassName("portiere"), 0);
carica(portieri, cp.getElementsByClassName("costoPortiere"), 1);
carica(portieri, sp.getElementsByClassName("squadraPortiere"), 2);


carica(difensori, dif.getElementsByClassName("difensore"), 0);
carica(difensori, cd.getElementsByClassName("costoDifensore"), 1);
carica(difensori, sd.getElementsByClassName("squadraDifensore"), 2);

carica(centrocampisti, cen.getElementsByClassName("centrocampista"), 0);
carica(centrocampisti, cc.getElementsByClassName("costoCentrocampista"), 1);
carica(centrocampisti, sc.getElementsByClassName("squadraCentrocampista"), 2);

carica(attaccanti, att.getElementsByClassName("attaccante"), 0);
carica(attaccanti, ca.getElementsByClassName("costoAttaccante"), 1);
carica(attaccanti, sa.getElementsByClassName("squadraAttaccante"), 2);

            }}  

                     
                     

}


function getSquadraUtente()
{
    var portieriopt=document.getElementById("optPortieri");
        var difensoriopt=document.getElementById("optDifensori");
        var centrocampistiopt=document.getElementById("optCentrocampisti");
        var attaccantiopt=document.getElementById("optAttaccanti");
        var eelemento=document.getElementById("selectGiocatore");
        var elemento=document.getElementById("selectFormazione");

   var xml=connectA("metodo=getSquadraUtente");
    xml.onreadystatechange = function (){
    if (xml.readyState == 4 && xml.status == 200) {
          
          var x=JSON.parse(xml.responseText);
                resetSelect(portieriopt);
                resetSelect(difensoriopt);
                resetSelect(centrocampistiopt);
                resetSelect(attaccantiopt);
                for (i=0;i<(x.length);i++){
                    var option= document.createElement("option");
                    option.text =x[i].nome +" ( "+ x[i].squadra+ " )";
                    option.value=x[i].nome+"="+x[i].prezzoIniziale+ "&id="+x[i].idGiocatore+ "&ruolo="+ x[i].ruolo;
                    switch (x[i].ruolo){
                        case "P" : 
                                portieriopt.appendChild(option);
                            break;
                        case "D":
                                
                                difensoriopt.appendChild(option);
                            break;
                        case "C":
                                centrocampistiopt.appendChild(option);
                            break;
                        case "A":
                                attaccantiopt.appendChild(option);
                            break;
                        default:
                            break;
                   }
                    }
     }  
}
}

//carica la select nel caso l'utente abbia gia scelto una fantasquadra
function getRosa()
{
    var portieriopt=document.getElementById("optPortieri");
        var difensoriopt=document.getElementById("optDifensori");
        var centrocampistiopt=document.getElementById("optCentrocampisti");
        var attaccantiopt=document.getElementById("optAttaccanti");
        var eelemento=document.getElementById("selectGiocatore");
        var elemento=document.getElementById("selectFormazione");
        var fantamilioni=document.getElementById
   var xml=connectA("metodo=getSquadraUtente");
    xml.onreadystatechange = function (){
    if (xml.readyState == 4 && xml.status == 200) {
          
          var x=JSON.parse(xml.responseText);
                resetSelect(portieriopt);
                resetSelect(difensoriopt);
                resetSelect(centrocampistiopt);
                resetSelect(attaccantiopt);
                for (i=0;i<(x.length);i++){
                    var option= document.createElement("option");
                    option.text =x[i].nome +" ( "+ x[i].squadra+ " )";
                    option.value=x[i].nome+"="+x[i].prezzoIniziale+ "&id="+x[i].idGiocatore+ "&ruolo="+ x[i].ruolo;
                    switch (x[i].ruolo){
                        case "P" : 
                                portieriopt.appendChild(option);
                            break;
                        case "D":
                                
                                difensoriopt.appendChild(option);
                            break;
                        case "C":
                                centrocampistiopt.appendChild(option);
                            break;
                        case "A":
                                attaccantiopt.appendChild(option);
                            break;
                        default:
                            break;
                   }
                    }
     }  
}
}




function getNomeSquadraUtente(){

var h2=document.getElementById("nomeSquadraUtente");

var xml=connectA("metodo=getNomeSquadraUtente");
    xml.onreadystatechange = function (){
    if (xml.readyState == 4 && xml.status == 200) {
            var x=JSON.parse(xml.responseText);
            h2.textContent=(x[0].nomeFantasquadra);
        }
     }  




}
function aggiungiA(giocatore)
{
  var tit= document.getElementById("selectGiocatoriFormazione");
    var pan= document.getElementById("selectGiocatoriPanchina");
    if (tit.disabled)
        aggiungiApanchina(giocatore);

    else if(!tit.disabled)
            aggiungiAformazione(giocatore);
      
}



function aggiungiAformazione(giocatore)
{var sw=false;     

        var formazione=document.getElementById("selectGiocatoriFormazioni")
        var portieriopt=document.getElementById("optFormazionePortieri");
        var difensoriopt=document.getElementById("optFormazioneDifensori");
        var centrocampistiopt=document.getElementById("optFormazioneCentrocampisti");
        var attaccantiopt=document.getElementById("optFormazioneAttaccanti");
        var option=document.createElement("option");
        var modulo =document.getElementById("selectModulo").value;
        var nome=gFS(giocatore, 1);
        var ruolo=gFS(giocatore, 3);

                    option.value= giocatore.value;
                    option.text = giocatore.options[giocatore.selectedIndex].text;//grande ci so riuscito
                    switch (ruolo){
                        case "P" :
                                    i=(checkEsisteFormazione(nome, portieriopt, 1,modulo[0], modulo[1],modulo[2]));
                                if(i==0){
                                        portieriopt.appendChild(option);
                                        sw=true;
                                         }   
                                else if (i==1)
                                    alert("Hai già aggiunto questo giocatore\nalla formazione");
                                else if (i=2)
                                     alert("Puoi aggiungere 1 portiere titolare");
                                break;
                        case "D":
                                i=(checkEsisteFormazione(nome, difensoriopt, 2,modulo[0], modulo[1],modulo[2]));
                                if(i==0){
                                    difensoriopt.appendChild(option);
                                    sw=true;}    
                                else if (i==1)
                                    alert("Hai già aggiunto questo giocatore\nalla formazione");
                                else if (i=2)
                                    alert("modulo selezionato: "+formattaModulo(modulo)+"\npuoi aggiungere max "+modulo[0]+" difensori!");
                                break;
                        case "C":
                                i=(checkEsisteFormazione(nome, centrocampistiopt, 3,modulo[0], modulo[1],modulo[2]));
                                if(i==0){
                                    centrocampistiopt.appendChild(option);
                                    sw=true;}
                                else if (i==1)
                                   alert("Hai già aggiunto questo giocatore\nalla formazione");
                                else if (i=2)
                                   alert("modulo selezionato: "+formattaModulo(modulo)+"\npuoi aggiungere max "+modulo[1]+" centrocampisti!");
                                break;
                        case "A":
                                i=(checkEsisteFormazione(nome, attaccantiopt, 4,modulo[0], modulo[1],modulo[2]));
                                if(i==0){
                                    attaccantiopt.appendChild(option);
                                    sw=true;}
                                else if (i==1)
                                    alert("Hai già aggiunto questo giocatore\nalla formazione");
                                else if (i=2)
                                   alert("modulo selezionato: "+formattaModulo(modulo)+"\npuoi aggiungere max "+modulo[2]+" attaccante/i!");
                                break;
                        default:
                                break;
                        }
                    


}



function checkEsisteFormazione(nome, x, parametro, dif, cen, att){
//verifica se il giocatore esiste già nella select 
//e verifica se ha raggiunto la quota max di giocatori
//parametreo: 1=> portieri, 2=>difensori, 3....

var y=x.childNodes;var i=0;sw=0;s="";

switch (parametro){
    case 1:  
        while (i<y.length){
            s=gFS(y[i],1);
            if (s==nome)
                 sw=1; 
            if (i>-1){
                sw=2;
                
                break;
                }i++;}
            break;
    case 2:  
        while (i<y.length){
            s=gFS(y[i],1);
            if (s==nome)
                 sw=1; 
            if (i>dif-2){
                sw=2;
                break;
                }i++;}
            break;
    case 3:  
        while (i<y.length){
            s=gFS(y[i],1);
            if (s==nome)
                 sw=1; 
            if (i>cen-2){
                sw=2;
                break;
                }i++;}
            break;
    case 4:  
        while (i<y.length){
            s=gFS(y[i],1);
            if (s==nome)
                 sw=1; 
            if (i>att-2){
                sw=2;
                break;
                }i++;}
            break;    
    }


return sw;
}


function pulisciSelectFormazione()
{ 
    var portieriopt=document.getElementById("optFormazionePortieri");
        var difensoriopt=document.getElementById("optFormazioneDifensori");
        var centrocampistiopt=document.getElementById("optFormazioneCentrocampisti");
        var attaccantiopt=document.getElementById("optFormazioneAttaccanti");
            resetSelect(portieriopt);
                resetSelect(difensoriopt);
                resetSelect(centrocampistiopt);
                resetSelect(attaccantiopt);
}

function aggiungiApanchina(giocatore)
{var sw=false;   
var modulo =document.getElementById("selectModulo").value;  
var portierioptF=document.getElementById("optFormazionePortieri");
        var difensorioptF=document.getElementById("optFormazioneDifensori");
        var centrocampistioptF=document.getElementById("optFormazioneCentrocampisti");
        var attaccantioptF=document.getElementById("optFormazioneAttaccanti");
        var portieriopt=document.getElementById("optPanchinaPortieri");
        var difensoriopt=document.getElementById("optPanchinaDifensori");
        var centrocampistiopt=document.getElementById("optPanchinaCentrocampisti");
        var attaccantiopt=document.getElementById("optPanchinaAttaccanti");
        var option=document.createElement("option");
        var nome=gFS(giocatore, 1);
        var ruolo=gFS(giocatore, 3);
                    option.value= giocatore.value;
                    option.text = giocatore.options[giocatore.selectedIndex].text;
                //options[giocatore.selectedIndex].text;
                    switch (ruolo){
                        case "P" :
                                    i=(checkEsistePanchina(nome,portierioptF, portieriopt, 1));
                                if(i==0){
                                        portieriopt.appendChild(option);
                                        sw=true;
                                         }   
                                else if (i==1)
                                    alert("Hai già aggiunto questo giocatore\nalla formazione");
                                else if (i=2)
                                    alert("Puoi aggiungere 1 portiere panchinaro");
                                break;
                        case "D":
                                i=(checkEsistePanchina(nome,difensorioptF, difensoriopt, 2, modulo));
                                if(i==0){
                                    difensoriopt.appendChild(option);
                                    sw=true;}    
                                else if (i==1)
                                    alert("Hai già aggiunto questo giocatore\nalla formazione!");
                                else if (i=2)
                                    alert("puoi aggiungere max 2 difensori panchinari!");
                                break;
                        case "C":
                                i=(checkEsistePanchina(nome,centrocampistioptF, centrocampistiopt, 3, modulo));
                                if(i==0){
                                    centrocampistiopt.appendChild(option);
                                    sw=true;}
                                else if (i==1)
                                    alert("Hai già aggiunto questo giocatore\nalla formazione");
                                else if (i=2)
                                      alert("puoi aggiungere max 2 centrocampisti panchinari!");
                                break;
                        case "A":
                                i=(checkEsistePanchina(nome,attaccantioptF, attaccantiopt, 4, modulo));
                                if(i==0){
                                    attaccantiopt.appendChild(option);
                                    sw=true;}
                                else if (i==1)
                                    alert("Hai già aggiunto questo giocatore\nalla formazione");
                                else if (i=2)
                                   alert("puoi aggiungere max 2 attaccanti panchinari!");
                                break;
                        default:
                                break;
                        }
                    


}

function formattaModulo(modulo)
{
      var str=modulo[0]+ "-"+modulo[1]+ "-"+ modulo[2];
return str;
}

function checkEsistePanchina(nome,xFor, xPan, parametro, modulo){
//verifica se il giocatore esiste già nella select 
//e verifica se ha raggiunto la quota max di giocatori
//parametreo: 1=> portieri, 2=>difensori, 3....

var y=xPan.childNodes;var i=0;sw=0;s="";
var f=xFor.childNodes;
switch (parametro){
    case 1:  
        while (i<y.length){
            s=gFS(y[i],1);
            if (s==nome)
                 sw=1; 
            if (i>-1){
                sw=2;
                
                break;
                }i++;}
                while (i<f.length){
                s=gFS(f[i],1);
            if (s==nome)
                 sw=1; 
            if (i>0){
                sw=2;
                
                break;
                }i++;}
            break;
    case 2:  
        while (i<y.length){
            s=gFS(y[i],1);
            if (s==nome)
                 sw=1; 
            if (i>0){
                sw=2;
                break;
                }i++;}
                while (i<f.length){
            s=gFS(f[i],1);
            if (s==nome)
                 sw=1; 
            if (i>1+modulo[0]){
                sw=2;
                break;
                }i++;}
            break;
    case 3:  
        while (i<y.length){
            s=gFS(y[i],1);
            if (s==nome)
                 sw=1; 
            if (i>0){
                sw=2;
                break;
                }i++;}
                    while (i<f.length){
            s=gFS(f[i],1);
            if (s==nome)
                 sw=1; 
            if (i>1+modulo[1]){
                sw=2;
                break;
                }i++;}
            break;
    case 4:  
        while (i<y.length){
            s=gFS(y[i],1);
            if (s==nome)
                 sw=1; 
            if (i>0){
                sw=2;
                break;
                }i++;}
                while (i<f.length){
            s=gFS(f[i],1);
            if (s==nome)
                 sw=1; 
            if (i>1+modulo[2]){
                sw=2;
                break;
                }i++;}
            break;    
    }


return sw;
}

function salvaModificheFP()
{   var but=document.getElementById("butSalvaTutto");
    var modulo =document.getElementById("selectModulo");
    var tit= document.getElementById("selectGiocatoriFormazione");
    var pan= document.getElementById("selectGiocatoriPanchina");
    if (tit.disabled){
        if(salvaModifichePanchina(pan))
            {
        tit.disabled=false;
        modulo.disabled=false;
        return true;}
        else 
        {   return false;}
    }
    
    else if(!tit.disabled){
            if(salvaModificheFormazione(tit))
                {
                    selTutti(tit);
                    but.disabled=false;
                return false; }
                else
                 
                 {alert('Devi scegliere prima 11 giocatori titolari\npoi "SALVA FORMAZIONE"');
                    return false;}

    }

}

function salvaModificheFormazione(sel)
{
    var modulo =document.getElementById("selectModulo");
    var x=""; var c=0;
    var prep=new Array();var k=sel.options.length;
   if (k==11){ 
        for(var i=0;i<k;i++)
            {   
            x=sel.options[i];
            if(((sel.options[i].value).localeCompare(""))!=0)
            {   
                prep[c]= gFS(x,2);
                c++;       }    
             }
            selTutti(sel);
            modulo.disabled=true;
            sel.disabled=true;
            return true;
        } 
    else
    {
   return false;
   }
}



function salvaModifichePanchina(sel)
{
    var x=""; var c=0;
    var prep=new Array();var k=sel.options.length;
   if (k==7){ 
        for(var i=0;i<k;i++)
            {   
            x=sel.options[i];
            if(((sel.options[i].value).localeCompare(""))!=0)
            {   
                prep[c]= gFS(x,2);
                c++;       }    
             }
        selTutti(sel);
        
        return true;
        } 
    else
    {alert('devi scegliere 7 giocatori panchinari:\n 1 portiere, 2 difensori, 2 centrocampisti, 2 attaccanti\npoi "SALVA TUTTO" ');
   return false;
   }
}

function removeGiocatoreSelect(x)
{
    var fant = document.getElementById("selectGiocatoriFormazione");
        x.remove(x.selectedIndex);

}


function caricaFormazionePage()
{
    var xml=connectA("metodo=getFormazioneUtente");
    tit=new Array();
    pan=new Array();
    xml.onreadystatechange = function (){
        if (xml.readyState == 4 && xml.status == 200) {
            t=JSON.parse(xml.responseText);
            for( prop in t){
                if(t[prop].tipoSchieramento==0)
                    pan.push(t[prop]);
                else if (t[prop].tipoSchieramento==1)
                    tit.push(t[prop]);}
            caricaTitolariFormazioneUtente(tit);
            caricaPanchinaFormazione(pan);}
            }
            caricaVoto();
            
}
function caricaVoto()
{   var voto= document.getElementById("VotoPagellaTotale");
    var xml=connectA("metodo=getVotoUltimaFormazione");
    tit=new Array();
    pan=new Array();
    xml.onreadystatechange = function (){
        if (xml.readyState == 4 && xml.status == 200) {
            t=JSON.parse(xml.responseText);
            voto.textContent=   (t[0].sommavoto);
            }
}
}


function caricaPanchinaFormazione(t)
{
var por= document.getElementById("nomiPortieriPanchina");
var dif= document.getElementById("nomiDifensoriPanchina");
var cen= document.getElementById("nomiCentrocampistiPanchina");
var att= document.getElementById("nomiAttaccantiPanchina");
var cp= document.getElementById("VotoPagellaPortieriPanchina");
var cd= document.getElementById("VotoPagellaDifensoriPanchina");
var cc= document.getElementById("VotoPagellaCentrocampistiPanchina");
var ca= document.getElementById("VotoPagellaAttaccantiPanchina");
var sp=document.getElementById("squadrePortieriPanchina");
var sd=document.getElementById("squadreDifensoriPanchina");
var sc= document.getElementById("squadreCentrocampistiPanchina");
var sa=document.getElementById("squadreAttaccantiPanchina");
var arr=new Array();
var portieri=new Array;
var difensori=new Array;
var centrocampisti=new Array;
var attaccanti=new Array; var prop;

            for( prop in t)
                {
                    switch(t[prop].ruolo){
                        case "P": portieri.push(t[prop] );   
                        break;
                        case "D":difensori.push(t[prop]);   
                        break;
                        case "C":centrocampisti.push(t[prop]);
                        break;
                        case "A":attaccanti.push(t[prop]);
                        break;
                            }
                    }
                caricaPerFormazione(portieri, por.getElementsByClassName("portierePanchina"), 0);
                caricaPerFormazione(portieri, cp.getElementsByClassName("VotoPagellaPortierePanchina"), 3);
                caricaPerFormazione(portieri, sp.getElementsByClassName("squadraPortierePanchina"), 2);


                caricaPerFormazione(difensori, dif.getElementsByClassName("difensorePanchina"), 0);
                caricaPerFormazione(difensori, cd.getElementsByClassName("VotoPagellaDifensorePanchina"), 3);
                caricaPerFormazione(difensori, sd.getElementsByClassName("squadraDifensorePanchina"), 2);

                caricaPerFormazione(centrocampisti, cen.getElementsByClassName("centrocampistaPanchina"), 0);
                caricaPerFormazione(centrocampisti, cc.getElementsByClassName("VotoPagellaCentrocampistaPanchina"), 3);
                caricaPerFormazione(centrocampisti, sc.getElementsByClassName("squadraCentrocampistaPanchina"), 2);

                caricaPerFormazione(attaccanti, att.getElementsByClassName("attaccantePanchina"), 0);
                caricaPerFormazione(attaccanti, ca.getElementsByClassName("VotoPagellaAttaccantePanchina"), 3);
                caricaPerFormazione(attaccanti, sa.getElementsByClassName("squadraAttaccantePanchina"), 2);

            }                   
function calcolaV()
{
    setTimeout(calcolaVoto, 1);
}   
function calcolaVoto()
{
var cp= document.getElementById("VotoPagellaPortieri");
var cd= document.getElementById("VotoPagellaDifensori");
var cc= document.getElementById("VotoPagellaCentrocampisti");
var ca= document.getElementById("VotoPagellaAttaccanti");
var cpp= document.getElementById("VotoPagellaPortieriPanchina");
var cdp= document.getElementById("VotoPagellaDifensoriPanchina");
var ccp= document.getElementById("VotoPagellaCentrocampistiPanchina");
var cap= document.getElementById("VotoPagellaAttaccantiPanchina"); 
var x;
var somma=0;


//calcolo voto portiere e sostituzione con portiere panchinaro
var x = parseFloat(cp.childNodes[1].textContent);
if (x==0.0) {   
    cp.childNodes[1].textContent="^";
    somma+=parseFloat(cpp.childNodes[1].textContent);
    }


//calcolo voto difensori e sostituzione con panchinaro in caso di non voto fino a un massimo di 
//panchinari per ruolo tranne il portiere
var a=0; //contatore dei panchinari
for (prop in cd.childNodes)
{    
    x = (cd.childNodes[prop].textContent);
    if (x!=undefined)
        if(x==0.0 && a<2){
           somma+=parseFloat(cdp.childNodes[a].textContent);
           a++;
           cd.childNodes[prop].textContent="^"; }
        else if (x>0.0){
            somma+=parseFloat(x); }    
}

//calcolo voto centrocampisti e sostituzione
a=0; //contatore dei panchinari
for (prop in cc.childNodes)
{    
    x = (cc.childNodes[prop].textContent);
    if (x!=undefined)
        if(x==0.0 && a<2){
           somma+=parseFloat(ccp.childNodes[a].textContent);
           a++;
           cc.childNodes[prop].textContent="^"; }
        else if (x>0.0){
            somma+=parseFloat(x); }    
}

// calcolo voto attanccanti e sostituzione 
a=0; //contatore dei panchinari
for (prop in ca.childNodes)
{    
    x = (ca.childNodes[prop].textContent);
    if (x!=undefined)
        if(x==0.0 && a<2){
           somma+=parseFloat(cap.childNodes[a].textContent);
           a++;
           ca.childNodes[prop].textContent="^"; }
        else if (x>0.0){
            somma+=parseFloat(x); }    
}


            connectAj("metodo=storeVotoFormazione&voto="+somma);
//store somma voti nel datab


}

function caricaTitolariFormazioneUtente(t){


var por= document.getElementById("nomiPortieri");
var dif= document.getElementById("nomiDifensori");
var cen= document.getElementById("nomiCentrocampisti");
var att= document.getElementById("nomiAttaccanti");
var cp= document.getElementById("VotoPagellaPortieri");
var cd= document.getElementById("VotoPagellaDifensori");
var cc= document.getElementById("VotoPagellaCentrocampisti");
var ca= document.getElementById("VotoPagellaAttaccanti");
var sp=document.getElementById("squadrePortieri");
var sd=document.getElementById("squadreDifensori");
var sc= document.getElementById("squadreCentrocampisti");
var sa=document.getElementById("squadreAttaccanti");
var arr=new Array();
var portieri=new Array;
var difensori=new Array;
var centrocampisti=new Array;
var attaccanti=new Array; var prop;
            for( prop in t)
                {
                    if (t[prop].tipoSchieramento==1)

                        {
                            switch(t[prop].ruolo){

                            case "P": portieri.push(t[prop]);   
                            break;
                            case "D":difensori.push(t[prop]);   
                            break;
                            case "C":centrocampisti.push(t[prop]);
                            break;
                            case "A":attaccanti.push(t[prop]);
                            break;
                                }
                            }
                    }

caricaPerFormazione(portieri, por.getElementsByClassName("portiere"), 0);
caricaPerFormazione(portieri, cp.getElementsByClassName("VotoPagellaPortiere"), 3);
caricaPerFormazione(portieri, sp.getElementsByClassName("squadraPortiere"), 2);


caricaPerFormazione(difensori, dif.getElementsByClassName("difensore"), 0);
caricaPerFormazione(difensori, cd.getElementsByClassName("VotoPagellaDifensore"), 3);
caricaPerFormazione(difensori, sd.getElementsByClassName("squadraDifensore"), 2);

caricaPerFormazione(centrocampisti, cen.getElementsByClassName("centrocampista"), 0);
caricaPerFormazione(centrocampisti, cc.getElementsByClassName("VotoPagellaCentrocampista"), 3);
caricaPerFormazione(centrocampisti, sc.getElementsByClassName("squadraCentrocampista"), 2);

caricaPerFormazione(attaccanti, att.getElementsByClassName("attaccante"), 0);
caricaPerFormazione(attaccanti, ca.getElementsByClassName("VotoPagellaAttaccante"), 3);
caricaPerFormazione(attaccanti, sa.getElementsByClassName("squadraAttaccante"), 2);

} 

                     
function riempiFormazioneSelect()
{
    setTimeout(riempiFormazione, 1000);
}

function riempiFormazione()
{
tit=new Array();
pan=new Array();
var xml=connectA("metodo=getFormazioneUtente");
xml.onreadystatechange = function (){
        if (xml.readyState == 4 && xml.status == 200) {
            t=JSON.parse(xml.responseText);
            console.log(t);
            for( prop in t){
                if(t[prop].tipoSchieramento==0)
                    pan.push(t[prop]);
                else if (t[prop].tipoSchieramento==1)
                    tit.push(t[prop]); }

        }
    }
    debugger;
    caricaFormazioneTitolare(tit);
    caricaFormazionePanchina(pan);
}








function caricaFormazioneTitolare(x)
{
        var portieriopt=document.getElementById("optFormazionePortieri");
        var difensoriopt=document.getElementById("optFormazioneDifensori");
        var centrocampistiopt=document.getElementById("optFormazioneCentrocampisti");
        var attaccantiopt=document.getElementById("optFormazioneAttaccanti");
                for (i=0;i<(x.length);i++){
                    var option= document.createElement("option");
                    option.text =x[i].nome +" ( "+ x[i].squadra+ " )";
                    option.value=x[i].nome+"="+x[i].prezzoIniziale+ "&id="+x[i].idGiocatore+ "&ruolo="+ x[i].ruolo;
debugger;
                    switch (x[i].ruolo){
                        case "P" : 
                                portieriopt.appendChild(option);
                            break;
                        case "D":
                                
                                difensoriopt.appendChild(option);
                            break;
                        case "C":
                                centrocampistiopt.appendChild(option);
                            break;
                        case "A":
                                attaccantiopt.appendChild(option);
                            break;
                        default:
                            break;
                   }
                }
}

function caricaFormazionePanchina(x)
{
        var portieriopt=document.getElementById("optPanchinaPortieri");
        var difensoriopt=document.getElementById("optPanchinaDifensori");
        var centrocampistiopt=document.getElementById("optPanchinaCentrocampisti");
        var attaccantiopt=document.getElementById("optPanchinaAttaccanti");
                for (i=0;i<(x.length);i++){
                    var option= document.createElement("option");
                    option.text =x[i].nome +" ( "+ x[i].squadra+ " )";
                    option.value=x[i].nome+"="+x[i].prezzoIniziale+ "&id="+x[i].idGiocatore+ "&ruolo="+ x[i].ruolo;

                    switch (x[i].ruolo){
                        case "P" : 
                                portieriopt.appendChild(option);
                            break;
                        case "D":
                                
                                difensoriopt.appendChild(option);
                            break;
                        case "C":
                                centrocampistiopt.appendChild(option);
                            break;
                        case "A":
                                attaccantiopt.appendChild(option);
                            break;
                        default:
                            break;
                   }
                }
}