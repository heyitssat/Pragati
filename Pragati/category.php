<?php
    include 'header_test.php';
    include 'head.php';
/*if(!isset($_SESSION['signed_in'])){
echo"<div style='float:right'><a href='signin.php'>Sign in</a></div>";
}else{
echo"<div style='float:right'><a href='signout.php'>Sign out</a></div>";
}*/
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

	<div class="container">
	<div class="row">
	 <center><h2><b>Forum</b></h2></center> 
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

            echo " <div class='container' style='background-color:none'>
                     <table class='table table-sm' style='border:none' align='center'>
                        <th style='background-image:url(table.jpg); color:white;' colspan='4'>$row[cat_name]</th>";
    $sql = "SELECT * FROM `master` WHERE cat_id=$temp";
    $result = mysqli_query($conn,$sql);        
    $no=1;
    
            while($row = $result->fetch_assoc()){
                    $i=$row['qid'];
                    echo "<tr id='a' style='font-family:verdana'><td style='column-width: 5em'>$no</td><td style='column-width: 70em'><a href ='forum.php?qid=$i' >$row[question] </a></td><td style='column-width: 10em'><b>$row[qname]</b></td>";
                    echo "<td style='column-width: 15em'>$row[reg_date]</td></tr>";
                    $no++;
                }
echo "</table></div><br>";
$temp--;
} 
$conn->close();

include 'foot.php';
?>
    
    