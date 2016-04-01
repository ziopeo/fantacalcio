<?php
//funzioni di scrittura sopra; 

//get dopo



//caricaCalendarioModel: crea un nuovo calendario di giornate e le attribuisce alla lega creata
/*
il file delle giornate per essere caricate devono con il seguente formato
IL FILE NELLA CARTELLA DI RIFERIMENTO è calendario.csv
-------------------

23/08/15-17/01/16
"
27/08/15-17/01/16
"
.
.
.
"
30/08/15-24/01/16
"
13/09/15-31/01/16

-------------------
*/
function caricaCal($file){
$handle = @fopen($file, "r");
$idLega=1;
//echo "   ". $handle."    ";
if ($handle) 
    {   $i=0;
      
    	$lett=fread($handle,filesize("calendario.csv"));
    	$arr=explode('"', ($lett));
    	$j=19;
    	for ($i=0;$i<count($arr);$i++)
    	{	$temp3=($arr[$i]);
       		$temp1=explode(('-'), trim($temp3));
   			$arra[$i]= trim($temp1[0]);
   			$arra[$j]=trim($temp1[1]); 
        	$j++;   
		}
    $ary=(json_decode(getFacolta()));
    for($y=0;$y<count($ary);$y++)
      {for ($i=0;$i<=37;$i++){
    	if(!creaGiornata($arra[$i], $i+1, ($ary[$y]->{'idLegaFacolta'})))
          return false;
      }}
fclose($handle); 
}
return true;
}

function caricaPagelle($file){
  
print_r($file);
$i=0;
$handle = fopen($file['tmp_name'], "r");
if ($handle) {

    while (($line = fgets($handle, 4096)) !== false) {
        $arr= explode(";", $line);
        if(is_numeric($arr[0]))
          echo creaPagella(getGiornataCorrente(), $arr[33],$arr[0] );
    }
}
    fclose($handle);

return true;
}
function creaPagella($giornataId, $voto, $giocatoreId)
{

 echo $query="INSERT INTO `PagellaGiocatore`(`giornata`, `voto`, `giocatore`) VALUES ('$giornataId','$voto','$giocatoreId')";
  $conn=getDatabase();
  mysqli_query($conn, $query) or die ("Errore query inserisci pagellina\n ");
  
return $conn->insert_id;;

}
function oggi()
{  return date("Y-m-d");
  
}
function ora()
{
  return date("Y-m-d h:i:sa");
}
//creaGiornate: crea una giornata; servizio per caricaCal()
function creaGiornata($data,$i, $legaFacolta){
	$idLeg=getLegaAteneoCorrente();
	(list ($giorno, $mese, $anno)=explode('/', $data));
	$date = ( "20".trim($anno) . "-". trim($mese)."-".trim($giorno));
       if($i==1)
        $sql='INSERT INTO `Giornata`(`numero`,`dataGiornata`, `lega`, `incorso`) VALUES ('.$i .',"'.$date.'",'.$legaFacolta.',1)';
        else

       $sql='INSERT INTO `Giornata`(`numero`,`dataGiornata`, `lega`) VALUES ('.$i .',"'.$date.'",'.$legaFacolta.')';
	//echo $sql;//CANC
	$conn=getDatabase();
	$result =mysqli_query($conn, $sql) or die ("Errore query inserisci giornata\n ");
return $result;
}




//ritorna il numero di giornate della lega Ateneo corrente
function getNumeroGiornate(){
   $sql="SELECT DISTINCT numero FROM Giornata WHERE lega LIKE ".$_SESSION['loggatoFacolta']." AND incorso LIKE 1" ;
  $conn=getDatabase();
  $result= mysqli_query($conn, $sql) or die ("Errore query get numero Giornata Corrente\n ");
   $row=mysqli_fetch_assoc($result);
  return $row['numero'];
}



function getGiornataCorrente(){
$loggato=$_SESSION['loggatoFacolta'];
$sql="SELECT idGiornata FROM Giornata WHERE lega LIKE '$loggato' AND incorso LIKE 1" ;
  $conn=getDatabase();
  $result= mysqli_query($conn, $sql) or die ("Errore query get Giornata Corrente\n ");
  $row=mysqli_fetch_assoc($result);
  return $row['idGiornata'];
}



?>