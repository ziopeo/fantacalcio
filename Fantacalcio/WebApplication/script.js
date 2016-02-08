
//connessione stantard ajax
function cambiaUserEmailAdmin(check)
{   var x=document.getElementById("userLoginText");
    if(check.checked)
        x.placeholder="Email";
   else
        x.placeholder="Matricola o Email";
}


function loginAja() {
           var ut=document.getElementById("userLoginText");
           var pass =document.getElementById("passwordLoginText");
           var admin= document.getElementById("adminCheck");
           if (admin.checked)
            connectA("metodo=loginAdmin&utente="+ut.value+"&password="+pass.value);
            else
                connectA("metodo=login&utente="+ut.value+"&password="+pass.value);
            console.log(ut.value + pass.value);
    }


    function connectAj()
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
                           eelemento.textContent="Nome: " + x[0].nome+ "Prezzo Attuale: "+ x[0].prezzoAttuale+"Ruolo: "+ x[0].ruolo+"Squadra: "+ x[0].squadra ;
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
function caricaGiocatori(squadra)
    {   var y;
        var portieriopt=document.getElementById("optPortieri");
        var difensoriopt=document.getElementById("optDifensori");
        var centrocampistiopt=document.getElementById("optCentrocampisti");
        var attaccantiopt=document.getElementById("optAttaccanti");
        var squadra=document.getElementById("selectSquadra").value;
        var eelemento=document.getElementById("selectGiocatore");
        var elemento=document.getElementById("selectGiocatoriRosa");
        var xml =connectA("metodo=getGiocatoriSquadra&squadra="+squadra);
        

        xml.onreadystatechange= function(){
            if (xml.readyState == 4 && xml.status == 200) {
                //resetSelect(eelemento);
                var x=JSON.parse(xml.responseText);
                resetSelect(portieriopt);
        resetSelect(difensoriopt);
        resetSelect(centrocampistiopt);
        resetSelect(attaccantiopt);
                for (i=0;i<(x.length);i++){
                    var option= document.createElement("option");
                    option.text =x[i].nome +" ( "+ x[i].prezzoIniziale+ " )";
                    option.value=x[i].nome+"="+x[i].prezzoIniziale;
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
                console.log(gFS(y[i],1)+"nnsdndns" + "   "+nome);
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
        var xml =connectA("metodo=getInformazioniGiocatore&calciatore="+gFS(giocatore, 1));
            xml.onreadystatechange= function(){
                if (xml.readyState == 4 && xml.status == 200) {
                    var x=JSON.parse(xml.responseText);
                    option.value=x[0].nome+"="+x[0].prezzoIniziale;
                    option.text = x[0].nome + " ( "+x[0].prezzoIniziale+ " ) "; 
                    switch (x[0].ruolo){
                        case "P" :
                                    i=(checkEsiste(x[0].nome, portieriopt, 1));
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
                                i=(checkEsiste(x[0].nome, difensoriopt, 2));
                                if(i==0){
                                    difensoriopt.appendChild(option);
                                    sw=true;}    
                                else if (i==1)
                                    alert("Possiedi già questo giocatore");
                                else if (i=2)
                                        alert("Puoi acquistare massimo 8 difensori");
                                break;
                        case "C":
                                i=(checkEsiste(x[0].nome, centrocampistiopt, 3));
                                if(i==0){
                                    centrocampistiopt.appendChild(option);
                                    sw=true;}
                                else if (i==1)
                                    alert("Possiedi già questo giocatore");
                                else if (i=2)
                                    alert("Puoi acquistare massimo 8 centrocampisti");
                                break;
                        case "A":
                                i=(checkEsiste(x[0].nome, attaccantiopt, 4));
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
                }
                if(sw==true){
                    (acquistoFantamilioni(giocatore, 1, 1));    }
            }
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
    var k= giocatore.value.split("=");
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
/*
chiama le squadre sul database per caricare la selectSquadra
che serve poi per visualizzare i giocatori da acquistare
*/
 function getSquadre()
{ 
    var eelemento=document.getElementById("selectSquadra");
    var xml=connectA("metodo=getSquadre");
    xml.onreadystatechange = function (){
    var x;
    if (xml.readyState == 4 && xml.status == 200) {
        var t= (xml.responseText);
        var res=JSON.parse(t);
        for (i=0;i<(res.length);i++){
            var option= document.createElement("option");
            option.text = option.value=res[i].squadra;
            eelemento.add(option);
           }           
        }
    }
}
