
<?php
 

 
// Arrays we'll use later
$keys = array();
$newArray = array();
$arr= array();


function peoCsvtoArray(){
	global $keys, $arr;
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

// Do it
$data = peoCsvtoArray();
 
// Set number of elements (minus 1 because we shift off the first row)
$count = count($data); //$count = count($data)-1;
 
// Bring it all together
for ($j = 1; $j < $count; $j++) {
  $d = array_combine($keys, $data[$j]);
  $newArray[$j] = $d;
}
 
//print_r($newArray);


$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "UFL_PEO";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
    die("Connection failed: " . $conn->connect_error);

$count =count($data);
for ($i=1; $i<=$count; $i++){
$arr=$data[$i];

$sql = "INSERT INTO Fantagiocatore(`idFantagiocatore`, `ruolo`, `nome`, `squadra`, `prezzoIniziale`, `prezzoAttuale`) VALUES (". $arr[0]." ,'". $arr[3]."','". $arr[1]."','". $arr[5]."','". $arr[6]. "','". $arr[4]."')";
echo $sql . "\n";
$result=$conn->query($sql);
}
if ($result==0)
echo "error 0 risultati";
else
	echo (count($result));

$conn->close();


?>