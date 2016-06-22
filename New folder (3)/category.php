<?php
    session_start();
    include 'header_test.php';
if(!isset($_SESSION['signed_in'])){
echo"<div style='float:right'><a href='signin.php'>Sign in</a></div>";
}else{
echo"<div style='float:right'><a href='signout.php'>Sign out</a></div>";
}
?><?php
    $servername = "localhost";
	$username = "root";
	$database = "questions";
	$password = "";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $database);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} ?>
<!DOCTYPE html>
<html>
<head>
	<title> Category </title>
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">    
    </head>
<body>

	<div class="container">
	<div class="row">
	 <center><h2>Forum</h2></center> 
		<br>
		<br>
    <?php                                                                       //to post the question
    $conn = new mysqli($servername, $username, $password, $database);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

$rown=0;
$sql = "SELECT cat_id FROM `categories`";
$result = mysqli_query($conn,$sql);
while($row = $result->fetch_assoc()){
    $rown++;
};
$temp =$rown;
while($temp>0){
    $sql = "SELECT * FROM `categories` WHERE cat_id=$temp";
    $result = mysqli_query($conn,$sql);
    $row = $result->fetch_assoc();

            echo " <div class='container' style='background-color:#608080'>
                     <table class='table table-striped table-sm'  border='solid red' align='center'>
                        <th colspan='3'>$row[cat_name]</th>";
    $sql = "SELECT * FROM `master` WHERE cat_id=$temp";
    $result = mysqli_query($conn,$sql);        
    $no=1;
    
            while($row = $result->fetch_assoc()){
                    $i=$row['qid'];
                    echo "<tr id='a'><td>$no</td><td>$row[qname]</td><td>$row[reg_date]</td>";
                    echo "<td><a href ='forum.php?qid=$i' >$row[question]; </a></td></tr>";
                    $no++;
                }
echo "</table></div><br>";
$temp--;
} 
$conn->close();
            ?>
    
    </body>
</html>

    