<?php
session_start();
include'header_test.php';
$servername = "localhost";
	$username = "root";
	$database = "questions";
	$password = "";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $database);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	$query = "SELECT * from `master`";
	$result = $conn->query($query);

	// echo $result;
	// while($row = $result->fetch_assoc()) {
 //        echo "id: " . $row["Day"]. " - Name: " . $row["Break Fast"]. " " . $row["Lunch"]. "<br>";
 //    }
echo"<div style='float:right'>";
if(!isset($_SESSION['signed_in'])){
echo"<a href='signin.php'>Sign in</a>";
}else{
echo"<a href='signout.php'>Sign out</a>
</div>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title> A streamline </title>
	<link rel="icon" href="fevicon.png" type="image/gif" sizes="16x16">
	<script src="mess.js"> </script>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

</head>
<body>

	<div class="container">
	<div class="row">
<center><h2>Pragati</h2></center> 
		<br>
		<br>
		<table border="" align="center">


			<?php
			$no=0;
			while($row = $result->fetch_assoc()){
				$no++;
				echo   "<tr id = '$no'>
				<td> $row[qid]  </td>
				<td> $row[qname] </td>
				<td> <a href ='forum.php?qid=$no' >$row[question] </a></td>
				<td> $row[reg_time] </td>
			</tr>";
			}
			?>
		</table>
        
    	<br><a href="check.php?s=3"	>Start a new discussion</a><br>
</body>
</html>
