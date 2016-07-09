<?php
    include 'head.php';

 
 ?>
 <!--SCRIPT FUNCTION FOR ADDING FAV TAGS -->

<script>
function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "gethint.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>

<script>
function showUser(str) {


    if (str == "") {
        document.getElementById("chosed").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var x=  document.getElementById("chosed").innerHTML;

                if(x==""){
                document.getElementById("chosed").innerHTML = xmlhttp.responseText;
                document.getElementById("refresh").innerHTML ='<a href="">Refresh</a>the Page';
                
                }else{
                document.getElementById("chosed").innerHTML =""+x +xmlhttp.responseText;
                document.getElementById("refresh").innerHTML ='<a href="users.php">Refresh</a> the Page';
                
                }
            }
        };
        xmlhttp.open("GET","getuser.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>


 <div class="container">
<div class="well" style="">
<p>Your Favorites</p>
<p>Remove unnecessary?</p>
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

//to delete the fav tag
if(isset($_GET['del'])){
                $del = $_GET['del'];
                echo "kdfjk";
                $sap= $_SESSION['user_id'];

                 $sql= "SELECT fav_tags FROM users WHERE user_id=$sap";
                        $result = mysqli_query($conn,$sql);
                        $row = $result->fetch_assoc();
                            $fav_tags=$row['fav_tags'];

                            $fav_tags=str_replace("$del","","$fav_tags");
                            $fav_tags=str_replace(",,",",","$fav_tags");
                            $fav_tags= trim($fav_tags,",");
                            $fav_tags=str_replace("","","$fav_tags");
                            //remove that no. 

                $sql="UPDATE `users` SET `fav_tags`= '$fav_tags' WHERE user_id=$sap";           //inverted commas had to be used in '$qans' as it is string
                                     
                if($conn->query($sql)){
                                echo "deleted";
                }
}
    if(isset($_SESSION['signed_in'])){
            $sap=$_SESSION['user_id'];

            $sql= "SELECT fav_tags FROM users WHERE user_id=$sap";
            $result = mysqli_query($conn,$sql);
            $row = $result->fetch_assoc();
                $fav_tags=$row['fav_tags'];

                $arr=explode(",",$fav_tags);
                        $l=count($arr);
                        $i=0;

                    while($l--){
                            $temp= $arr[$i];
                            $i++;
echo $temp;
echo "kjrdfdkjf";
                        if(is_numeric($temp)){
                            $sqa = "SELECT cat_name FROM `categories` WHERE cat_id=$temp";
                            $resa = mysqli_query($conn,$sqa);
                            $roa = $resa->fetch_assoc();
                            echo  "<span><li style='display:inline;'><a href='?del=$temp'>$roa[cat_name]</a></li></span>";
                        }
                    }

            }?>
</div>  
<div class="row">
<?php


if(isset($_SESSION['signed_in'])){
 echo '  <div class="well">
 <form> 
Add Favorites <input type="text" onkeyup="showHint(this.value)">
</form>
<p><span id="txtHint"></span></p>
<p><span id="chosed">You added </span></p></div>
<p id="refresh"></p>';
}
   
 if(!isset($_GET['uid'])){
 	

          $sql = "SELECT * from `users` ";
            $result = $conn->query($sql);
			while($row = $result->fetch_assoc() ){

					$sq = "SELECT * FROM `master` WHERE uid=$row[user_id]";
					$resul = mysqli_query($conn,$sq);
					$rowcount=mysqli_num_rows($resul);

  		echo"<a href='users.php?uid=$row[user_id]'>
  		<div class='col-sm-3' style='background-color:lavender;height:100px;margin:10px;text-align: center;'>		

  				 $row[user_name]
  				<br><p style='color:#2F4F4F; font-family:verdana; font-size:15px'>Q: $rowcount</p>

		  ";									//ALL CONTENT HERE
  		
  		// NO OF ANSWERS
  		          $sqls = "SELECT qans from `users` WHERE user_id=$row[user_id]";
            $results = $conn->query($sqls);
		$rows = $results->fetch_assoc(); 
		$id=$rows['qans'];
    		   $arra=explode(",",$id);
    		   $l=count($arra);
    		   $i=0;

    		if($l && $arra[0]!=='NULL'){
    				echo "<div>A: ".$l."</div>";
    		}else{
    				echo "<div>A: 0</div>";
    		}


    		//TAGS
  				$id=$row['fav_tags'];
    			$arr=explode(",",$id);
    		    $l=count($arr);
    		    $i=0;
    			while($l--){
	    			$temp= $arr[$i];
	    		    $i++;
	    		if(is_numeric($temp)){
                    $sqa = "SELECT cat_name FROM `categories` WHERE cat_id=$temp";
				    $resa = mysqli_query($conn,$sqa);
	    			$roa = $resa->fetch_assoc();
	    			echo "$roa[cat_name] ";
	    		 }
	           }

	    		echo " </div></a>";
		}
	echo '</div>';
}else{
	$uid= $_GET['uid'];
 	
          $sql = "SELECT * from `users` WHERE user_id=$uid";
            $result = $conn->query($sql);
		$row = $result->fetch_assoc(); 

			$sq = "SELECT * FROM `master` WHERE uid=$uid";
			$resul = mysqli_query($conn,$sq);
			$rowcount=mysqli_num_rows($resul);

?>
<div class="well" style="height:100px"></div>  
<div class="row">

<div class='col-sm-3' style='background-color:lavender;height:100px;margin:10px;text-align: center;'>		

  				<p> <?php echo "$row[user_name]"; ?></p>
  				 <br>
  				<p> Q :<?php echo $rowcount; ?></p>
  		<?php 
  		//NO OF ANSWERS

          $sqls = "SELECT qans from `users` WHERE user_id=$uid";
            $results = $conn->query($sqls);
		$rows = $results->fetch_assoc(); 
		$id=$rows['qans'];
    		   $arra=explode(",",$id);
    		   $l=count($arra);
    		   $i=0;


    		if($l && $arra[0]!=='NULL'){
    				echo "<div>A: ".$l."</div>";
    		}else{
    				echo "<div>A: 0</div>";
    		}


    		//TAGS
  			
  				$id=$row['fav_tags'];
    			$arr=explode(",",$id);
    		    $l=count($arr);
    		    $i=0;
    			while($l--){
	    			$temp= $arr[$i];
	    		    $i++;
	    		    $sqa = "SELECT cat_name FROM `categories` WHERE cat_id=$temp";
				    $resa = mysqli_query($conn,$sqa);
	    			$roa = $resa->fetch_assoc();
	    			echo "$roa[cat_name] ";
	    		}


	    	
	    ?>
</div>
</div>
</div><br>

<div class="container">
	<div class="row">
		<div class="col-sm-6">		<!-- TABLE FOR QUESTIONS BY USER-->
				



			<?php


    		    $sql = "SELECT * FROM `master` WHERE uid=$uid";
			    $result = mysqli_query($conn,$sql);
 if($rowcount!=0){

			echo '<table border="" class="table table-striped" align="center" style="background-color:#FFF; border:none; border-width:3px; border-radius:4px">
        <thead border="" style="background-image:url(table.jpg)">
        <tr>
        <th style="color:white">S.No.</th>
        <th style="color:white">Creator</th>
        <th style="color:white">Questions</th>
        <th style="color:white">Creation Date</th>
        </tr>
        </thead>';

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
		}else{
			echo "NO QUESTIONS TO SHOW";
		}

			echo "</table>";
			?>


		</div>
		<div class="col-sm-6">		<!-- TABLE FOR ANSERES BY USER-->
		
			<?php 														

          $sqls = "SELECT qans from `users` WHERE user_id=$uid";
            $results = $conn->query($sqls);
		$rows = $results->fetch_assoc(); 
		$id=$rows['qans'];
    		   $arra=explode(",",$id);
    		   $l=count($arra);
    		   $i=0;
echo $l."k";
echo $arra[0]."p";
    		if($l && $arra[0]!=='NULL'){

    		while($l-- ){

    			$temp= $arra[$i];		
		    	$i++;
			    			echo "dj".$id;
						    $sql = "SELECT * FROM `master` WHERE qid=$temp";
						    $result = mysqli_query($conn,$sql);
			    			$row = $result->fetch_assoc();
			    echo '<table border="" class="table table-striped" align="center" style="background-color:#FFF; border:none; border-width:3px; border-radius:4px">
        <thead border="" style="background-image:url(table.jpg)">
        <tr>
        <th style="color:white">S.No.</th>

        <th style="color:white">Questions</th>
        <th style="color:white">Creation Date</th>
        </tr>
        </thead>
';
			    echo   "<tr >
				<td style='color:#2F4F4F; font-family:verdana; font-size:15px'> $i  </td>
				
				<td style='color:#2F4F4F; font-family:verdana; font-size:15px'> <a href ='forum.php?qid=$row[qid]' >$row[question] </a></td>";
 				echo"<td style='color:#2F4F4F; font-family:verdana; font-size:15px'> $row[reg_date] </td>";

    			echo "<td style='color:#2F4F4F; font-family:verdana; font-size:15px'>";
    	
    		   $ida=$row['cat_id'];
    		   $arr=explode(",",$ida);
    		   $la=count($arr);
    		   $ia=0;
    		while($la--){
    			$tempa= $arr[$ia];
    		    $ia++;
    		    $sqa = "SELECT cat_name FROM `categories` WHERE cat_id=$tempa";
			    $resa = mysqli_query($conn,$sqa);
    			$roa = $resa->fetch_assoc();
    			echo "<p>$roa[cat_name]</p>";
    			}

    			echo "</td></tr></table>";

    			//answers of that question
    			echo '<table class="table table-striped" style=" color:#006400; border:none;" border="solid red" align="center">        <thead border="" style="background-color:#808080">
        <tr>
        <th style="color:#80808">S.No.</th>
     
        <th style="color:white">Answer</th>
        <th style="color:white">Creation Date</th>
        </tr>
        </thead>
';

            $query = "SELECT * from `question$temp` WHERE uid=$uid ";
            $result = $conn->query($query);
    
            
			$no=0;
            
			while($row = $result->fetch_assoc() ){
				$no++;
				echo   "<tr id = '$no'>
				<td> $row[id]  </td>
			
				<td> $row[acmmnt] </td>
			<td> $row[reg_date] </td></tr>";
			}
   
   			echo " </table>";

}}else{
	echo "NO ANSWERS TO SHOW";
}

			?>


		</div>
	</div>
</div>

</div>
</div>


<?php
}
include 'foot.php';
?>
