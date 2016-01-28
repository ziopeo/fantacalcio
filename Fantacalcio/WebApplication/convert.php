
<?php
include 'db.php';
$keys = array();
$arr= array();
function peoCsvtoArray(){
$handle = @fopen("quotazioni.txt", "r");
if ($handle) {
	$i=0;
	while (($lineArray = fgets($handle, 4096)) !== false) {
        if ($i==0)
		{	
			$keys=explode(";",str_replace("\'", "",str_replace("?", "", trim(utf8_decode($lineArray))))); }

		else
		{	$arr[$i]= explode(";",str_replace("'", "",str_replace("?", "", trim(utf8_decode($lineArray)))));; 
	 }
	 $i++;
 
}

if (!feof($handle)) {
        echo "Error: unexpected fgets() fail\n";
    }
    fclose($handle);
}
return $arr;
}


$data = peoCsvtoArray();

$count =count($data);
for ($i=1; $i<=$count; $i++){
$arr=$data[$i];

$sql = "INSERT INTO Giocatore(`idgiocatore`, `ruolo`, `nome`, `squadra`, `prezzoIniziale`, `prezzoAttuale`) VALUES ('". $arr[0]."' ,'". $arr[3]."','". $arr[1]."','". $arr[4]."',". $arr[5].",". $arr[6].")";
 echo $today = date("Y-m-d H:00:00");  
echo $sql;

$result=mysqli_query($conn, $sql);
}
if ($result==0)
echo "error 0 risultati";
else
	echo (count($result));

$conn->close();


?>