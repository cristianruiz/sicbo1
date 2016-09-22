<?php
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

$numero=$_GET['nuevo'];
$id=$_GET['id'];
$sql = "UPDATE ULT_OA SET NUMERO=".$numero." WHERE id=".$id." ";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
