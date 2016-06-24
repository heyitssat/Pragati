<?php
session_start();
include'header_test.php';
include 'head.php';
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

	<div class="container">
	<div class="row">
<center><h2>Pragati</h2></center> 
		<br>
		<br>
		<table border="" class="table table-striped" align="center">


			<?php
			$no=0;
			while($row = $result->fetch_assoc()){
				$no++;
				echo   "<tr id = '$no'>
				<td> $row[qid]  </td>
				<td> $row[qname] </td>
				<td> <a href ='forum.php?qid=$no' >$row[question] </a></td>
				<td> $row[reg_date] </td>
			</tr>";
			}
			?>
		</table>
        
    	<br><a href="check.php?s=3"	>Start a new discussion</a><br>
<?php
include 'foot.php';
?>