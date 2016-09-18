
<?php
include 'db.php';

$keys = array();
$arr = array();

function peoCsvtoArray()
	{
	$handle = @fopen("quotazioni.txt", "r");
	if ($handle)
		{
		$i = 0;
		while (($lineArray = fgets($handle, 4096)) !== false)
			{
			if ($i == 0)
				{
				$keys = explode(";", str_replace("\'", "", str_replace("?", "", trim(utf8_decode($lineArray)))));
				}
			  else
				{
				$arr[$i] = explode(";", str_replace("'", "", str_replace("?", "", trim(utf8_decode($lineArray)))));;
				}

			$i++;
			}

		if (!feof($handle))
			{
			echo "Error: unexpected fgets() fail\n";
			}

		fclose($handle);
		}

	return $arr;
	}

$data = peoCsvtoArray();
$count = count($data);
$idAteneo = getIdLegaAteneoCorrente();

// fa una query per creare un nuovo archivio
// per poi creare la relazione GiocatoreArchiviato

$querycreaArchivio("INSERT INTO `ArchivioLega`(`lega`, `dataUpload`) VALUES (" . $idAteneo . ",'" . $today . "')";
$idArchivioLega = $conn->insert_id;

for ($i = 1; $i <= $count; $i++)
	{
	$arr = $data[$i];
	$queryArchivia = "INSERT INTO `GiocatoreArchiviato`( `archivioLega`, `giocatore`) VALUES (" . $idArchivio . "," . $arr[0] . ")"echo $sql;
	$result = mysqli_query($conn, $sql);
	}

if ($result == 0) echo "error 0 risultati";
  else echo (count($result));
$conn->close();
?>