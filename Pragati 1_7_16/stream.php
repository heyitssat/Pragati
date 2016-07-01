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


if(isset($_POST['view'])){
	if($_POST['view']=='newest'){
		
echo "1";
	$query = "SELECT * from `master` ORDER BY qid DESC";

	}else if($_POST['view']=='voted'){
echo"2";
	$query = "SELECT * from `master` ORDER BY qvote DESC";
	
	}else if($_POST['view']=='featured'){

		$query = "SELECT * from `master` ORDER BY ans DESC";
echo "3";
	}
	$result = $conn->query($query);

}else{
echo "def";
	$query = "SELECT * from `master` ORDER BY qid DESC";
	$result = $conn->query($query);

}

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
		
<div class="container">
  <h2>Pill with Dropdown Menu</h2>
  <ul class="nav nav-pills" role="tablist">
  <form action="" method="post">
    <li class="active"><input type="submit" name="view" value="newest"></a></li>
    <li><input type="submit" name="view" value="voted"></li>
    <li><input type="submit" name="view"  value="featured"></a></li></form>        
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
      Tutorials <span class="caret"></span></a>
      <ul class="dropdown-menu" role="menu">
        <li><a href="#">HTML</a></li>
        <li><a href="#">CSS</a></li>
        <li><a href="#">JavaScript</a></li>
      </ul>
    </li>
  </ul>
</div>
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
				<td style='color:#2F4F4F; font-family:verdana; font-size:15px'> $no  </td>
				<td style='color:#2F4F4F; font-family:verdana; font-size:15px'><b> $row[qname]</b> </td>
				<td style='color:#2F4F4F; font-family:verdana; font-size:15px'> <a href ='forum.php?qid=$row[qid]' >$row[question] </a></td>";
 				echo"<td style='color:#2F4F4F; font-family:verdana; font-size:15px'> $row[reg_date] </td>";

    			echo "<td style='color:#2F4F4F; font-family:verdana; font-size:15px'>";
    	
    		   $id=$row['cat_id'];
    		   $arr=explode(",",$id);
    		   $l=count($arr);
    		   $i=0;
    		while($l--){
    			$temp= $arr[$i];
    		    $i++;
    		    $sq = "SELECT cat_name FROM `categories` WHERE cat_id=$temp";
			    $res = mysqli_query($conn,$sq);
    			$ro = $res->fetch_assoc();
    			echo "<p>$ro[cat_name]</p>";
    			}

    			echo "</td></tr>";

			}
			?>
		</table>
        
    	<br><a href="check.php?s=3"	><p align="center" style="color:#888888; font-family:verdana; font-size:30px; text-decoration: underline;"><b>Start a new discussion</b></p></a><br>
<?php
include 'foot.php';
?>