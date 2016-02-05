
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
console.log(admin.checked);
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
    console.log(giocatore);
    var eelemento=document.getElementById("informazioniGiocatore");
    var xml =connectA("metodo=getInformazioniGiocatore&calciatore="+giocatore.value);
    xml.onreadystatechange= function(){
                        if (xml.readyState == 4 && xml.status == 200) {
                        var x=JSON.parse(xml.responseText);
                        console.log(x);
                           eelemento.textContent="Nome: " + x[0].nome+ "\nPrezzo Attuale: "+ x[0].prezzoAttuale+"\nRuolo: "+ x[0].ruolo+"\nSquadra: "+ x[0].squadra ;
                        }
                                    }
}
function caricaInformazioniGiocatore2(gioc)
{               

    var x= infGiocatore(gioc.value);
    console.log(x);
    console.log(gioc.value);
 
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
                console.log(x);
                resetSelect(portieriopt);
        resetSelect(difensoriopt);
        resetSelect(centrocampistiopt);
        resetSelect(attaccantiopt);
                for (i=0;i<(x.length);i++){
                    var option= document.createElement("option");
                    option.text =x[i].nome +" ( "+ x[i].prezzoIniziale+ " )";
                    option.value=x[i].nome;
                    console.log(x[i].ruolo);
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
    console.log(out);
}

    function caricaCalendario()
    {    var t=document.getElementById("fileUploadCalendario").value;
            connectAjax("metodo=caricaCalendario&file="+t, "corpo");
            console.log("metodo=caricaCalendario&file="+t);
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
function checkEsiste(nome, x){
var y=x.childNodes;var i=0;
console.log(y[1]);
while (x.hasChildNodes()) {
    if (y[i].value.localeCompare(nome))
        return true;
i++;} 
}

function aggiungiArosa(giocatore)

{console.log(giocatore.text);               var portieriopt=document.getElementById("optRosaPortieri");
        var difensoriopt=document.getElementById("optRosaDifensori");
        var centrocampistiopt=document.getElementById("optRosaCentrocampisti");
        var attaccantiopt=document.getElementById("optRosaAttaccanti");

            var option=document.createElement("option");
                                          
                     var xml =connectA("metodo=getInformazioniGiocatore&calciatore="+giocatore.value);
                        xml.onreadystatechange= function(){
                        if (xml.readyState == 4 && xml.status == 200) {
                        var x=JSON.parse(xml.responseText);
                         option.value=x[0].nome;
                    option.text = x[0].nome + " ( "+x[0].prezzoIniziale+ " ) "; 
                       switch (x[0].ruolo){
                        case "P" : 
                                if(!checkEsiste(x[0].nome, portieriopt))
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
                        console.log(x[0]);
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
                 console.log(t);
                var res=JSON.parse(t);
                for (i=0;i<(res.length);i++){
                    var option= document.createElement("option");
                    console.log(res[i].squadra);
                    option.text = option.value=res[i].squadra;
                    eelemento.add(option);
                   
                  }           
            }
        }
    }
