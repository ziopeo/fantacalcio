console.log("ciao");
var xmlhttp;

//connessione stantard ajax
function connectAja() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
               document.getElementById("demo").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("POST", "controller.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    	xmlhttp.send("metodo=login&user=giuseppe&pass");
    }

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
            connectAjax("metodo=loginAdmin&utente="+ut.value+"&password="+pass.value, "corpo");
            else
                connectAjax("metodo=login&utente="+ut.value+"&password="+pass.value, "corpo");
console.log(admin.checked);
    }

function connectAjax(parametri, idResponse)
{
         var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 
                document.getElementById(idResponse).innerHTML=xmlhttp.responseText;
               
            }
        };
        xmlhttp.open("POST", "controller.php", true);
          xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(parametri);
    }
    function connectAj( parametri, idResponse)
{
         xmlhttp = new XMLHttpRequest();
         
        xmlhttp.open("POST", "controller.php", true);
          xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(parametri);
        return xmlhttp;

    }


    function selezionaFormazioni(modulo) {
            connectAjax("metodo=getFormazioni&modulo="+modulo);
    }
    function caricaGiocatori()
    {   
        console.log("archivioGiovatoriCaricamento...")
        connectAjax("metodo=caricaArchivioGiocatori&file=","corpo");
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
        };
        xmlhttp.open("POST", "controller.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("metodo=caricaSquadre");
    
    }

 function getSquadre(elemento)
    {
        var xml=connectAj("metodo=getSquadre", "corpo");
        xml.onreadystatechange = function ()
        
        {var x;
            if (xml.readyState == 4 && xml.status == 200) {
                
                // console.log(x);
                 console.log(xml.responseText);
                 
   
               
            }
        }
    }


