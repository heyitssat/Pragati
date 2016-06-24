<? php
session_start()
?>
<?php
//connect.php
$servername = "localhost";
$username = "root";
$password = "";
 $con=mysqli_connect($servername,$username,$password,"pragati");
try {
    $conn = new PDO("mysql:host=$servername;dbname=pragati", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>
