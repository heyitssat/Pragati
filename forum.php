<?php

$pid= $_GET['qid'];
# echo $pid;


?>

<?php
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
	$query = "SELECT * from `master` WHERE $pid";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    
// while($row = $result->fetch_assoc()) {
//        echo "id: " . $row["Day"]. " - Name: " . $row["Break Fast"]. " " . $row["Lunch"]. "<br>";
//    }

?>
<!DOCTYPE html>
<html>
<head>
	<title> A streamline </title>
	<link rel="icon" href="fevicon.png" type="image/gif" sizes="16x16">
	<script src="mess.js"> </script>
	<link rel="stylesheet" type="text/css" href="mess.css">
</head>
<body>

	<div class="container">
	<div class="row">
		<IMG src = "fevicon.png" height = "100" width = "100" > <center><h2>Forum</h2></center> 
		<br>
		<br>
            <div class="container" style="background-color:#808080">
    <table  border="solid red" align="center">
    <tr id='a'>
    <?php
    echo "<td>$row[qid]</td>";
        echo "<td>$row[qname]</td>";
            echo "<td>$row[question]</td>";
    ?>
    </tr>
    </div>

		<table border="solid red" align="center">

			<?php
            $query = "SELECT * from `question$pid` ";
            $result = $conn->query($query);
    
            
			$no=1;
			while($row = $result->fetch_assoc()){
				$no++;
				echo   "<tr id = '$no'>
				<td> $row[id];  </td>
				<td> $row[aname]; </td>
				<td> <a href ='forum.php?qid=$no' >$row[acmmnt]; </a></td>
				<td> $row[red_date]; </td>
			</tr>";
			}
			$conn->close();
            ?>
            
    </table>
    <div>
	<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
    <textarea name="cmmnt"></textarea>
    <input type="submit" value="post">
    </form>
    </div>
   /* <?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    
    }
    ?>*/
</body>
</html>
