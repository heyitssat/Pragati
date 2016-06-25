<?php
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

?>

	<div class="container">
	<div class="row">
<center><h2>Pragati</h2></center> 
		<br>
		<br>
		<table border="" class="table table-striped" align="center" style="background-color:none; border:none; border-width:3px; border-radius:4px">
        <thead border="" style="background-image:url(table.jpg)">
        <tr>
        <th style='color:white'>S.No.</th>
        <th style='color:white'>Creator</th>
        <th style='color:white'>Questions</th>
        <th style='color:white'>Creation Date</th>
        </tr>
        </thead>


			<?php
			$no=0;
			while($row = $result->fetch_assoc()){
				$no++;
				echo   "<tr id = '$no'>
				<td style='color:#2F4F4F; font-family:verdana; font-size:15px'> $row[qid]  </td>
				<td style='color:#2F4F4F; font-family:verdana; font-size:15px'><b> $row[qname]</b> </td>
				<td style='color:#2F4F4F; font-family:verdana; font-size:15px'> <a href ='forum.php?qid=$no' >$row[question] </a></td>
				<td style='color:#2F4F4F; font-family:verdana; font-size:15px'> $row[reg_date] </td>
			</tr>";
			}
			?>
		</table>
        
    	<br><a href="check.php?s=3"	><p align="center" style="color:#888888; font-family:verdana; font-size:30px; text-decoration: underline;"><b>Start a new discussion</b></p></a><br>
<?php
include 'foot.php';
?>