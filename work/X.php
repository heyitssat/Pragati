<?php

    $servername = "localhost";
	$username = "root";
	$database = "questions";
	$password = "";

	// Create connection


	$conn = new mysqli($servername, $username, $password, $database);

/*$sql="SELECT * FROM information_schema.tables WHERE table_schema = 'questions'  AND table_name = 'master' LIMIT 1";
echo $conn->query($sql);
 
if($conn->query($sql)){
echo "hi";}
*/
    $pid=3;
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
                

    $conn->close();

?>