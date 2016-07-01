<?php
include 'head.php';
if(isset($_SESSION['signed_in'])){
$user=$_SESSION['user_name'];}
else{
$user2=$_GET['user'];
$user1 = trim($user2, '()');
echo "y".$user1 ."kjf";
if(isset($_SESSION['check'])){
$msg = $_SESSION['check'];
}
}
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
    

if($_SERVER['REQUEST_METHOD'] != 'POST' && isset($_SESSION['signed_in']))
{
    /*the form hasn't been posted yet, display it
      note that the action="" will cause the form to post to the same page it is on */
    echo '<form method="post" action="">
        Current Password: <input type="password" name="user_pass">
        New Password: <input type="password" name="user_pass1">
        New Password again: <input type="password" name="user_pass_check">
        <input type="submit" class="submit_button" value="Change password" />
     </form>';
}
else if(isset($_SESSION['signed_in']))
{
    /* so, the form has been posted, we'll process the data in three steps:
        1.  Check the data
        2.  Let the user refill the wrong fields (if necessary)
        3.  Save the data 
    */
    $errors = array(); /* declare the array for later use */
        $pass =test_input($_POST['user_pass']);
        $pass1 =test_input($_POST['user_pass1']);
        $pass2 =test_input($_POST['user_pass_check']);        
    if(isset($pass))
    {
        if($pass1 != $pass2)
        {
            $errors[] = 'The two passwords did not match.';
        }
    }
    else
    {
        $errors[] = 'The password field cannot be empty.';
    }
     
    if(!empty($errors)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/
    {
        echo 'Uh-oh.. a couple of fields are not filled in correctly..';
        echo '<ul>';
        foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */
        {
            echo '<li>' . $value . '</li>'; /* this generates a nice error list */
        }
        echo '</ul>';
        echo '<a href="changepass.php?user=".$user." "> Try Again</a>';
    }
    else
    {
        //the form has been posted without, so save it
        //notice the use of mysql_real_escape_string, keep everything safe!
        //also notice the sha1 function which hashes the password
    $sql= "SELECT * FROM users WHERE user_name='$user'";
    $result = mysqli_query($conn,$sql);
    $row = $result->fetch_assoc();
$pas=sha1($pass);
$pass1=sha1($pass1);
$oldpass= $row['user_pass'];
 /*   echo $row['user_pass'];
    echo '  ';
    echo $pas;
    echo '';
    echo $pass1;
*/    if(!isset($row['user_pass'])){
    header ('Location:signin.php');
    }
    if($pas==$oldpass){
    echo "fhi";
        $sql = "UPDATE users SET user_pass='$pass1' WHERE user_name='$user'";
        $result = mysqli_query($conn,$sql);
        if(!$result)
        {
            //something went wrong, display the error
            echo 'Something went wrong while registering. Please try again later.';
            //echo mysql_error(); //debugging purposes, uncomment when needed
        }
        else
        {
            echo 'Successfully Changed. You can now <a href="signin.php">sign in</a> and start posting! :-)';
        }
    }else{
    echo 'You have supplied invalid password, ';
    echo '<a href="signin.php">Try Again</a>';
    }
    }   
}else if($_SERVER['REQUEST_METHOD'] != 'POST')
{

    if(isset($_GET['otp'])){
        $otp=$_GET['otp'];
        echo "otp is";
        echo $otp;
        echo "this";
        echo $msg;
        echo"m";
        
        if($otp==$msg){
            echo '<form method="post" action="">
        New Password: <input type="password" name="user_pass1">
        New Password again: <input type="password" name="user_pass1_check">
        <input type="submit" class="submit_button" value="Change password" />
     </form>';
        }else{
                echo'you have entered wrong details.';
        }
    }else{

    $sql= "SELECT * FROM users WHERE user_name='$user1'";
    $result = mysqli_query($conn,$sql);
    $row = $result->fetch_assoc();
    $mail= $row['user_email'];
    echo $mail;
//generate mail msg is $msg
$msg=rand();
echo $msg;
$_SESSION['check']=$msg;
echo 'msg';
mail("$mail","subject",$msg);
echo '<input type="text" id="otp" >';
echo '<input type="submit"  onClick="myfunc()">';

echo '<p id="error"></p>';
}
}else if($_SERVER['REQUEST_METHOD'] == 'POST'){

$errors = array(); /* declare the array for later use */
        
        $pass2 =test_input($_POST['user_pass1']);
        $pass2check =test_input($_POST['user_pass1_check']);        
$pass2=sha1($pass2);
$pass2check=sha1($pass2check);

    if(isset($pass2))
    {
        if($pass2 != $pass2check)
        {
            $errors[] = 'The two passwords did not match.';
        }
    }
    else
    {
        $errors[] = 'The password field cannot be empty.';
    }
     
    if(!empty($errors)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/
    {
        echo 'Uh-oh.. a couple of fields are not filled in correctly..';
        echo '<ul>';
        foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */
        {
            echo '<li>' . $value . '</li>'; /* this generates a nice error list */
        }
        echo '</ul>';
        echo '<a href="changepass.php?user=".$user1." "> Try Again</a>';
    }
    else
    {

        $sql = "UPDATE users SET user_pass='$pass2' WHERE user_name='$user1'";
       
       
       $result = mysqli_query($conn,$sql);
        if(!$result)
        {
            //something went wrong, display the error
            echo 'Something went wrong while registering. Please try again later.';
            //echo mysql_error(); //debugging purposes, uncomment when needed
        }
        else
        {
            echo 'Successfully Changed. You can now <a href="signin.php">sign in</a> and start posting! :-)';
        }
    }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
include 'footer.php';
?>