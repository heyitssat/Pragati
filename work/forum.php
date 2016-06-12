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
    echo "x is set";
        $change= $_GET['x'];
        echo "$change is change";

            if($change=='2'){
            $sid=$_GET['s'];
                $sql = "DELETE FROM question$pid WHERE id='$sid'";
                if($conn->query($sql)){

echo "comment deleted ";}

                
                $rown=0;
                $query = "SELECT * from `question$pid`";
                $result = $conn->query($query);
            while($row = $result->fetch_assoc()) {
                $rown++;   
            }                  
                $count=$sid;                                    //updating the values which come after $pid to -1.
                while($count<=$rown){
                $z=$count+1;
                $sql="UPDATE `question$pid` SET `id`=$count WHERE id=$z";
                
                if($conn->query($sql)){
echo " row $count  updated ";}
                
                $count++;
                }
               $y=$rown +1;
                $sql="ALTER TABLE `question$pid` AUTO_INCREMENT = $y";
if($conn->query($sql)){
echo "auto increment updated";}
             
             
            }else if($change=='1'){
            

/*$sql="SELECT * FROM information_schema.tables WHERE table_schema = 'questions'  AND table_name = 'master' LIMIT 1";
echo $conn->query($sql);
 
if($conn->query($sql)){
echo "hi";}
*/
    
                $sql = "DELETE FROM master WHERE qid='$pid'";
            if($conn->query($sql)){

echo "question deleted ";}



                
$rown=0;
$query = "SELECT * from `master`";
    $result = $conn->query($query);
     while($row = $result->fetch_assoc()) {
            $rown++;   
	 }                
                $count=$pid;                                    //updating the values which come after $pid to -1.
                while($count<=$rown){        //= is applied as the rown is the no. of rows after deletion.
                $z=$count +1;
                $sql="UPDATE `master` SET `qid`=$count WHERE qid= $z";
                if($conn->query($sql)){
echo " row $count  updated ";}
                $count++;
                }
                $y=$rown +1;
                $sql="ALTER TABLE `master` AUTO_INCREMENT = $y";
if($conn->query($sql)){
echo "auto increment updated";}
                $pql = "DROP TABLE question$pid";
if($conn->query($pql)){
echo "table question$pid dropped";}
                $count=$pid;                                    //updating the values which come after $pid to -1.
                while($count<=$rown){       // = is applied as the rown is the no. of rows after deletion.
                $y=$count+1;
                $pql="RENAME TABLE `question$y` TO `question$count`";
                if($conn->query($pql)){
echo "table question$y renamed";}

                $count++;
                }
            
                header('Location: stream.php');
            
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
            
                echo "<td><a role='button' href=?x=1&qid=$pid >Delete your question</a></td>";
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
                   <td><a role='button' href='?x=2&qid=$pid&s=$row[id]' >Delete your comment</a></td>
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
