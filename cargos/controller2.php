<?php 

$nrooa = $_POST['nrocargo'];

$servername = "192.168.1.136";
$username = "cruiz";
$password = "pepito1530";
$dbname = "SICBONET";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
		
$hoy = getdate();
$periodo = $hoy['mon']. $hoy['year'];

$sql = 'SELECT * FROM zoa_cargo where nrocargo='.$nrooa.' and periodo = '.$periodo.' ';
$result = $conn->query($sql);
$array_cargo = array();
while ($data = mysqli_fetch_assoc($result)) {
	$array_cargo[] = $data;
}
echo json_encode($array_cargo);
$conn->close();
