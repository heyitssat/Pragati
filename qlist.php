<?php

$name=$_POST['name'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "questions";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$num=1;
$query = "SELECT * from `master`";
    $result = $conn->query($query);
	 while($row = $result->fetch_assoc()) {
        $num++;   
	 }
$tname ="question$num";
// sql to create table
$sql = "CREATE TABLE $tname (
id INT(6) PRIMARY KEY, 
aname VARCHAR(30) NOT NULL,
acmmnt TEXT(255) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
 #   echo "Table $tname created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}




$x=$_POST['question'];
$sql = "INSERT INTO master ( qname,question) VALUES ('$name','$x')";


if ($conn->query($sql) === TRUE) {
 #   echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
header('Location: stream.php');
$conn->close();



?>