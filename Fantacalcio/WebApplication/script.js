
//connessione stantard ajax
function cambiaUserEmailAdmin(check)
{   var x=document.getElementById("userLoginText");
    if(check.checked)
        x.placeholder="Email";
   else
        x.placeholder="Matricola o Email";
}


function loginAja(check) {
           var ut=document.getElementById("userLoginText");
           var pass =document.getElementById("passwordLoginText");
           var admin= document.getElementById("adminCheck");
           if (admin.checked)
            connectA("metodo=loginAdmin&utente="+ut.value+"&password="+pass.value);
            else
                connectA("metodo=login&utente="+ut.value+"&password="+pass.value);
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
    var xml =connectA("metodo=getInformazioniGiocatore&calciatore="+giocatore.value);
    xml.onreadystatechange= function(){
                        if (xml.readyState == 4 && xml.status == 200) {
                        var x=JSON.parse(xml.responseText);
                           eelemento.textContent="Nome: " + x[0].nome+ "\nPrezzo Attuale: "+ x[0].prezzoAttuale+"\nRuolo: "+ x[0].ruolo+"\nSquadra: "+ x[0].squadra ;
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
                    option.value=x[i].nome;
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
var y=x.childNodes;var i=0;sw=0;
switch (parametro){
    case 1:  
        while (i<y.length){
            if (y[i].value==nome)
                 sw=1; 
            if (i>1){
                sw=2;
                break;
                }i++;}
            break;
    case 2:  
        while (i<y.length){
            if (y[i].value==nome)
                 sw=1; 
            if (i>6){
                sw=2;
                break;
                }i++;}
            break;
    case 3:  
        while (i<y.length){
            if (y[i].value==nome)
                 sw=1; 
            if (i>6){
                sw=2;
                break;
                }i++;}
            break;
    case 4:  
        while (i<y.length){
            if (y[i].value==nome)
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

{           var portieriopt=document.getElementById("optRosaPortieri");
        var difensoriopt=document.getElementById("optRosaDifensori");
        var centrocampistiopt=document.getElementById("optRosaCentrocampisti");
        var attaccantiopt=document.getElementById("optRosaAttaccanti");

            var option=document.createElement("option");
                                          var i;
                     var xml =connectA("metodo=getInformazioniGiocatore&calciatore="+giocatore.value);
                        xml.onreadystatechange= function(){
                        if (xml.readyState == 4 && xml.status == 200) {
                        var x=JSON.parse(xml.responseText);
                         option.value=x[0].nome;
                    option.text = x[0].nome + " ( "+x[0].prezzoIniziale+ " ) "; 
                       switch (x[0].ruolo){
                        case "P" : ;
                                    i=(checkEsiste(x[0].nome, portieriopt, 1));
                                if(i==0)
                                        portieriopt.appendChild(option);
                                    else if (i==1)
                                        alert("Possiedi già questo giocatore");
                                    else if (i=2)
                                        alert("Puoi acquistare massimo 3 portieri");
                            break;
                        case "D":debugger;
                                i=(checkEsiste(x[0].nome, difensoriopt, 2));
                                if(i==0)
                                        difensoriopt.appendChild(option);
                                    else if (i==1)
                                        alert("Possiedi già questo giocatore");
                                    else if (i=2)
                                        alert("Puoi acquistare massimo 8 difensori");
                            break;
                        case "C":
                                i=(checkEsiste(x[0].nome, centrocampistiopt, 3));
                                if(i==0)
                                        centrocampistiopt.appendChild(option);
                                    else if (i==1)
                                        alert("Possiedi già questo giocatore");
                                    else if (i=2)
                                        alert("Puoi acquistare massimo 8 centrocampisti");
                                    break;
                        case "A":
                            i=(checkEsiste(x[0].nome, attaccantiopt, 4));
                                if(i==0)
                                        attaccantiopt.appendChild(option);
                                    else if (i==1)
                                        alert("Possiedi già questo giocatore");
                                    else if (i=2)
                                        alert("Puoi acquistare massimo 6 attaccanti");
                            break;
                        default:
                            break;
                   }
}}
}
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
