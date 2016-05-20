<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "opensensor";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// echo "Connected successfully";

// $result = $conn->query("SELECT * FROM sensorvalue");
// if($result->num_rows > 0){
// 	while($row = $result->fetch_assoc()){
// 		echo $row['SENSORMODEL']." ".$row['GAS']." ".$row['TIME']." ".$row['VALUE'].'<br>';
// 	}
// }

?>