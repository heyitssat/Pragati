<?php include 'head.php';

?>


<script>
function myFunction() {
   // var x =document.getElementById("newcat").checked;
//    if(x){
    var x= document.getElementById("but").value;
    if(x==1){
    document.getElementById("demo").innerHTML = '<input type="text" required form="a" name="cat_name"></input>';
    //document.getElementById("cat").disabled = true;
    //document.getElementById("but").value=0;
    //    document.getElementById("but").innerHTML='Select from existing';
       }/*else{
            document.getElementById("demo").innerHTML = '';
    document.getElementById("cat").disabled = false;
    document.getElementById("but").value=1;
        document.getElementById("but").innerHTML='Create a new topic';
}*/
}
</script>

<?php
include 'header_test.php';
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

if(!isset($_SESSION['signed_in'])){
echo"<div style='float:right'><a href='signin.php'>Sign in</a></div>";
}else{
echo"<div style='float:right'><a href='signout.php'>Sign out</a></div>";
}
if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)
{
echo "
<form method='post' action='qlist.php' id='a'>
<br>
<p style='color:#888888'> <b>Question</b></p>
<textarea name='question' required rows='10' cols='30'></textarea><input type='submit' name='post'></input></form>
<label>Select Topic<select name='id' form='a' id='cat'>  ";

                $query = "SELECT * from `categories`";
                $result = $conn->query($query);
            while($row = $result->fetch_assoc()) { 
echo " <p><input type='checkbox' id='cat' name='topics[]' form='a' value='$row[cat_id]' /> $row[cat_name]</p>  ";
}

echo"</select></label>
<button type='button' class='btn btn-primary' style='width:20%' onclick='myFunction()' id='but' value='1'>Create a new topic</button>
<p id='demo'></p>
";
//echo $_SESSION['user_name'];

}else{echo"<p>You are not signed in.<a href='signin.php'>Click here to login</a></p>";

}
include 'foot.php';
?>



