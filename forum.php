<?php

$pid = $_GET['qid'];
 echo $pid;


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
    if(isset($_GET['x'])){
    
        $change= $_GET['x'];
    echo"<script>
    alert('Are you sure, you want to delete your question?');
    
    </script>";    
            if($change==2){
                $sql = "DELETE FROM question$pid WHERE id='$pid'";
                    if ($conn->query($sql) === TRUE) {
                        echo "Your comment deleted successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                    
            }else if($change==1){
                $sql = "DELETE FROM master WHERE qid='$pid'";
                $pql = "DROP TABLE question$pid";
                    if ($conn->query($sql) === TRUE and $conn->query($pql) === TRUE) {
                        echo "Your question deleted successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
            }
    }
        

    
	$query = "SELECT * from `master` WHERE qid=$pid ";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
/*    $no = 0;
while($no<=$pid) {
    $row = $result->fetch_assoc();
    $no++;
    }
    */
?>
<!DOCTYPE html>
<html>
<head>
	<title> Forum </title>
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
    <?php                                                                       //to post the question
    echo "<td>$row[qid]</td>";
        echo "<td>$row[qname]</td>";
            echo "<td>$row[question]</td>";
            
                echo "<td><a role='button' href=?$x='1'&$qid='$pid' >Delete your question</a></td>";
        ?>
    </tr>
    </div>
    
    <?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    echo "check";
    $servername = "localhost";
    $username = "root";
    $database = "questions";
	$password = "";

	/*// Create connection
	$conn = new mysqli($servername, $username, $password, $database);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} */
    $a=$_POST['cmmntor'];
    $b=$_POST['cmmnt'];
    $sql="INSERT INTO `question$pid`( `aname`, `acmmnt`) VALUES ('$a','$b')";
   
   if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header('Location: ');
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
        
    
    }

?>
    <div class="container">
		<table border="solid red" align="center">

			<?php
            $query = "SELECT * from `question$pid` ";
            $result = $conn->query($query);
    
            
			$no=0;
			while($row = $result->fetch_assoc() ){
				$no++;
				echo   "<tr id = '$no'>
				<td> $row[id];  </td>
				<td> $row[aname]; </td>
				<td> <a href ='forum.php?qid=$no' >$row[acmmnt]; </a></td>
				<td> $row[reg_date]; </td>
			</tr>";
			}
			$conn->close();
            ?>
            
    </table>
    </div>
    <div>
	<form method="post" action="">
    <textarea name="cmmnt"></textarea>
       <input type="text" name="cmmntor">
    <input type="submit" value="post">
    </form>
    </div>
</body>
</html>
