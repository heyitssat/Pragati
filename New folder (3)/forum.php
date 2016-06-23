<?php
    session_start();
    include 'head.php';
    include 'header_test.php';

$pid = $_GET['qid'];
 #echo $pid;

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
// to delete 

if(isset($_GET['x'])){   
    if(!isset($_SESSION['signed_in'])) {
		echo "Oops...you are not signed in. <a href='signin.php'> Click here </a>to sign in.<br>";
	}
	else {
    
    #echo "x is set";
        $change= $_GET['x'];
        #echo "$change is change";
//to delete the comment
            if($change=='2'){            
            $sid=$_GET['t'];
            #echo $pid;
            #echo $sid;
                $sql= "SELECT uid FROM question$pid WHERE id='$sid'";
              $result = mysqli_query($conn,$sql);
              $row = $result->fetch_assoc();
                $id=$row['uid'];
                $nowid= $_SESSION['user_id'];
            if($id==$nowid || ($_SESSION['user_level']==1)){
                $sql = "DELETE FROM question$pid WHERE id='$sid'";
                if($conn->query($sql)){

#echo "comment deleted ";
}

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
#echo " row $count  updated ";
}
                
                $count++;
                }
               $y=$rown +1;
                $sql="ALTER TABLE `question$pid` AUTO_INCREMENT = $y";
if($conn->query($sql)){
#echo "auto increment updated";
}
             
            }else{ echo" you don't have permission to delete it";}             
            }else if($change=='1'){                                     // to delete the question
        
              $sql= "SELECT uid FROM master WHERE qid='$pid'";
              $result = mysqli_query($conn,$sql);
              $row = $result->fetch_assoc();
                $id=$row['uid'];
                $nowid= $_SESSION['user_id'];
            if(($id==$nowid) || ($_SESSION['user_level']==1)){
            
                $sql = "DELETE FROM master WHERE qid='$pid'";
            if($conn->query($sql)){
                #echo "question deleted ";
                }

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
                    #echo " row $count  updated ";
                    }
                $count++;
                }
                $y=$rown +1;
                $sql="ALTER TABLE `master` AUTO_INCREMENT = $y";
if($conn->query($sql)){
#echo "auto increment updated";
}
                $pql = "DROP TABLE question$pid";
if($conn->query($pql)){
#echo "table question$pid dropped";
}
                $count=$pid;                                    //updating the values which come after $pid to -1.
            while($count<=$rown){       // = is applied as the rown is the no. of rows after deletion.
                $y=$count+1;
                $pql="RENAME TABLE `question$y` TO `question$count`";
            if($conn->query($pql)){
                    #echo "table question$y renamed";
                    }

                $count++;
                }
                header('Location: stream.php');
            }else{
                echo "You don't have right to delete this content.";
                }
            }
    }
    }        
// selecting the row
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

	<div class="container">
	<div class="row">
	 <center><h2>Forum</h2></center> 
		<br>
		<br>
            <div class="container" style="background-color:#808080">
    <table class="table table-striped"  border="solid red" align="center">
    <tr id='a'>
    <?php                                                                       //to post the question

        echo "<td>$row[qname]</td>";
            echo "<td>$row[question]</td>";
            echo "<td>$row[reg_date]</td>";
            
                echo "<td><a role='button' href='check.php?s=2&qid=$pid&x=1' >Delete your question</a></td>";
        ?>
    </tr>
    </div>
    </div>
    </div>
    <?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    echo "check";
        if(!isset($_SESSION['signed_in'])) {
		echo "You are not signed in.<a href='signin.php'> Click here </a>to sign in.<br>";
	}
	else {
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
    $b=test_input($_POST['cmmnt']);
    $a=$_SESSION['user_name'];
    $c=$_SESSION['user_id'];
    $v= date('Y-m-d h:i:sa');
    $sql="INSERT INTO `question$pid`( `aname`, `acmmnt`,`uid`,`reg_date`) VALUES ('$a','$b','$c','$v')";
   
   if ($conn->query($sql) === TRUE) {
    #echo "New record created successfully";
    header('Location: ');
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
        
    
    }
}

?>
    <div class="container">
		<table class="table table-striped" border="solid red" align="center">

			<?php
            
            $query = "SELECT * from `question$pid` ";
            $result = $conn->query($query);
    
            
			$no=0;
            
			while($row = $result->fetch_assoc() ){
				$no++;
				echo   "<tr id = '$no'>
				<td> $row[id]  </td>
				<td> $row[aname] </td>
				<td> $row[acmmnt] </td>
				<td> $row[reg_date] </td>
                   <td><a role='button' href='check.php?s=1&t=$row[id]&qid=$pid' >Delete your comment</a></td>
			</tr>";
			}
			$conn->close();
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
            
    </table>
    </div>
    <div>
	<form class="form-horizontal" method="post" action="">
        <label class="control-label" for="email">Comment:</label><textarea required name="cmmnt"></textarea>
        <input type="submit" value="post">
    </form>
    </div>
<?php
include 'foot.php';
?>
    