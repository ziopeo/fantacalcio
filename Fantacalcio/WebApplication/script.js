
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
function caricaGiocatori()
    {   var squadra=document.getElementById("selectSquadra").value;
        var eelemento=document.getElementById("selectFormazioni");
        console.log("archivioGiovatoriCaricamento...")
        var xml =connectA("metodo=getGiocatoriSquadra&squadra="+squadra);
        xml.onreadystatechange= function(){
                        
                        var x=xml.responseText;
                        var t=(JSON.parse(x));
                        console.log(t);
                        removeOptions(eelemento);

                        for (i=0;i<(x.length);i++){
                    var option= document.createElement("option");
                    option.text = option.value=x[i].nome;
                    eelemento.add(option);}
        }
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

function connectA(metodo)
{
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("POST", "controller.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(metodo);
        return xmlhttp;

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
                var res=JSON.parse(t.replace("getSquadre", ""));
                for (i=0;i<(res.squadre.length);i++){
                    var option= document.createElement("option");
                    option.text = option.value=res.squadre[i].squadra;
                    eelemento.add(option);
                   
                  }           
            }
        }
    }
