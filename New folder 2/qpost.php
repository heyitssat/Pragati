<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>


<script>
function myFunction() {
   // var x =document.getElementById("newcat").checked;
//    if(x){
    var x= document.getElementById("but").value;
    if(x==1){
    document.getElementById("demo").innerHTML = '<input type="text" form="a" name="cat_name"></input>';
    document.getElementById("cat").disabled = true;
    document.getElementById("but").value=0;
        document.getElementById("but").innerHTML='Select from existing';
       }else{
            document.getElementById("demo").innerHTML = '';
    document.getElementById("cat").disabled = false;
    document.getElementById("but").value=1;
        document.getElementById("but").innerHTML='Create a new topic';
}
}
</script>

</body>
</html>
<?php
session_start();
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
Question
<textarea name='question' rows='10' cols='30'></textarea><input type='submit' name='post'></input></form>
<label>Select category<select name='id' form='a' id='cat'>  ";

                $query = "SELECT cat_name from `categories`";
                $result = $conn->query($query);
            while($row = $result->fetch_assoc()) { 
echo"<option value='$row[cat_id]'>$row[cat_name]</option>";}

echo"</select></label>
<button type='button' class='btn btn-primary' style='width:20%' onclick='myFunction()' id='but' value='1'>Create a new topic</button>
<p id='demo'></p>
";
echo $_SESSION['user_name'];

}else{echo"u r not signed in.<a href='signin.php'>Click here to login</a>";

}
?>



