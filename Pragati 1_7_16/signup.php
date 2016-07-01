<?php
include 'head.php';
//signup.php

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
include 'header_test.php';
 
echo '<h3 class="signup_head">Sign up</h3>';
echo '<div class="line-title bg-primary"></div>';
 
if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    /*the form hasn't been posted yet, display it
      note that the action="" will cause the form to post to the same page it is on */
    echo '<form method="post" action="">
        Username: <input type="text" name="user_name" />
        Password: <input type="password" name="user_pass">
        Password again: <input type="password" name="user_pass_check">
        E-mail: <input type="email" name="user_email">
        <input type="submit" class="submit_button" value="Sign Up" />
     </form>';
}
else
{
    /* so, the form has been posted, we'll process the data in three steps:
        1.  Check the data
        2.  Let the user refill the wrong fields (if necessary)
        3.  Save the data 
    */
    $errors = array(); /* declare the array for later use */
        $username=test_input($_POST['user_name']);
        $pass =test_input($_POST['user_pass']);
        $email = test_input($_POST['user_email']); 
    if(isset($username))
    {
        //the user name exists
        if(!ctype_alnum($username))
        {
            $errors[] = 'The username can only contain letters and digits.';
        }
        if(strlen($username) > 30)
        {
            $errors[] = 'The username cannot be longer than 30 characters.';
        }
    }
    else
    {
        $errors[] = 'The username field must not be empty.';
    }
     
     
    if(isset($pass))
    {
        if($pass != $_POST['user_pass_check'])
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
        echo '<p class="error_message" style="color:#380000;">Error! A few fields are not filled properly</p>';
        echo '<ul>';
        foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */
        {
            echo '<li>' . $value . '</li>'; /* this generates a nice error list */
        }
        echo '</ul>';
        echo '<a href="signup.php"> Try Again!</a>';
    }
    else
    {
        //the form has been posted without, so save it
        //notice the use of mysql_real_escape_string, keep everything safe!
        //also notice the sha1 function which hashes the password
       
        $sql = "INSERT INTO
                    users(user_name, user_pass, user_email ,user_date, user_level)
                VALUES('" . mysqli_real_escape_string($conn,$username) . "',
                       '" . sha1($pass) . "',
                       '" . mysqli_real_escape_string($conn,$email) . "',
                        NOW(),
                        0)";
                         
        $result = mysqli_query($conn,$sql);
        if(!$result)
        {
            //something went wrong, display the error
            echo 'Something went wrong while registering. Please try again later.';
            //echo mysql_error(); //debugging purposes, uncomment when needed
        }
        else
        {
            echo 'Successfully registered. You can now <a href="signin.php">sign in</a> and start posting! :-)';
        }
    }
}
 function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
include 'foot.php';
?>