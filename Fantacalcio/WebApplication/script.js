
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
    {   
        var squadra=document.getElementById("selectSquadra").value;
        var eelemento=document.getElementById("selectFormazioni");
        console.log("archivioGiovatoriCaricamento...")
        var xml =connectA("metodo=getGiocatoriSquadra&squadra="+squadra);
        xml.onreadystatechange= function(){
                        if (xml.readyState == 4 && xml.status == 200) {
                        
                        var x=JSON.parse(xml.responseText);
                        debugger;
                        // console.log(x);
                        console.log(x);
                        removeOptions(eelemento);

                        for (i=0;i<(x.length);i++){
                    var option= document.createElement("option");
                    option.text = option.value=x[i].nome;
                    eelemento.add(option);}
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
                    option.text = option.value=res[i].squadra;
                    eelemento.add(option);
                   
                  }           
            }
        }
    }
