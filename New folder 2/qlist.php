<?php
session_start();

if(isset($_SESSION['user_name'])){
    $name = $_SESSION['user_name'];
}

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
id INT(6) AUTO_INCREMENT PRIMARY KEY,
uid INT(6),
aname VARCHAR(30) NOT NULL,
acmmnt TEXT(255) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
 #   echo "Table $tname created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
if(isset($_POST['id'])){
$z=$_POST['id'];
}else{
$cat_nam=test_input($_POST['cat_name']);
    $sql="INSERT INTO `categories`( `cat_name`) VALUES ('$cat_nam')";
   
   if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql ="SELECT * FROM `categories` WHERE cat_name='$cat_nam'";
    $result = $conn->query($sql);
     $row = $result->fetch_assoc();
     $z=$row['cat_id'];
}
$k=$_SESSION['user_id'];
$x=test_input($_POST['question']);
$sql = "INSERT INTO `master` ( `qname`,`question`,`uid`,`cat_id`) VALUES ('$name','$x','$k','$z')";


if ($conn->query($sql) === TRUE) {
 #   echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
header('Location: stream.php');
$conn->close();

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
