<?php
//signin.php
//require_once('connect.php');
//include 'header_test.php';
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


if($_SERVER['REQUEST_METHOD'] != 'POST'){
if(!isset($_SESSION['signed_in'])){
echo"<div style='float:right'><a href='signin.php'>Sign in</a></div>";
}else{
echo"<div style='float:right'><a href='signout.php'>Sign out</a></div>";
}
}
echo '<div class="build title-page">';

echo '<h3 class:"text-center"><b>Sign in</b></h3>';
echo '<div class="line-title bg-primary"></div>';
echo '</div>';
 
//first, check if the user is already signed in. If that is the case, there is no need to display this page
if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)
{
    echo '<p class="error_message">You are already signed in, you can <a href="signout.php">sign out</a> if you want.</p>';
    echo '<br><p class="error_message"><a href="changepass.php"><br>Change Your password</a> </p>      <br><p id ="error"></p>';
}
else
{
    if($_SERVER['REQUEST_METHOD'] != 'POST')
    {
        /*the form hasn't been posted yet, display it
          note that the action="" will cause the form to post to the same page it is on */
        echo '<form method="post" action="">
            Username: <input type="text" name="user_name" id="nam" />
            Password: <input type="password" name="user_pass">
            <input type="submit" class="submit_button" value="Sign in" />
         </form>';
         echo '<p class="error_message" style="font-family:verdana;">Forgot Password?</p><div style="text-align:center;"<button type="button" class="btn btn-primary" style=" margin:auto;
  display:block;" onclick="newDoc()" id="but" value="1">Change your Password</button><br><p id ="error1"></p></div>';
         echo'<p class="error_message" style="font-family:verdana; color:brown;">Do not have an account,yet?</p> <a class="error_message" style="display:block; font-family:verdana;" href="signup.php">Create an account</a>';
    }
    else
    {
        /* so, the form has been posted, we'll process the data in three steps:
            1.  Check the data
            2.  Let the user refill the wrong fields (if necessary)
            3.  Varify if the data is correct and return the correct response
        */
        $errors = array(); /* declare the array for later use */
                     $name=test_input($_POST['user_name']);
                    $pass=test_input($_POST['user_pass']);
        if(!isset($name))
        {
            $errors[] = 'The username field must not be empty.';
        }
         
        if(!isset($pass))
        {
            $errors[] = 'The password field must not be empty.';
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
        }
        else
        {
            //the form has been posted without errors, so save it
            //notice the use of mysql_real_escape_string, keep everything safe!
            //also notice the sha1 function which hashes the password
            
            $sql = "SELECT  
                        user_id,
                        user_name,
                        user_level
                    FROM
                        users
                    WHERE
                        user_name = '" . mysqli_real_escape_string($conn,$name) . "'
                    AND
                        user_pass = '" . sha1($pass) . "'";
                         
            $result = mysqli_query($conn,$sql);
            if(!$result)
            {
                //something went wrong, display the error
                echo '<p class="error_message">Something went wrong while signing in. Please try again later.</p>';
                //echo mysql_error(); //debugging purposes, uncomment when needed
            }
            else
            {
                //the query was successfully executed, there are 2 possibilities
                //1. the query returned data, the user can be signed in
                //2. the query returned an empty result set, the credentials were wrong
                if(mysqli_num_rows($result) == 0)
                {
                    echo '<p class="error_message">You have supplied a wrong user/password combination.
                    <a href="">Try again</a>
                    <br>Do not have an account,yet?<a href="signup.php"> Sign Up</a></p>';
                }
                else
                {
                    //set the $_SESSION['signed_in'] variable to TRUE
                    $_SESSION['signed_in'] = true;
                     
                    //we also put the user_id and user_name values in the $_SESSION, so we can use it at various pages
                    $row = mysqli_fetch_assoc($result);
                        $_SESSION['user_id'] = $row['user_id'];
                        $_SESSION['user_name']  = $row['user_name'];
                        $_SESSION['user_level'] = $row['user_level'];
            
   //                 echo $_SESSION['user_name']  ;

         
                    if(isset($_GET['s'])){
                        $t=$_GET['s'];
                        if(isset($_GET['qid'])){
                            $pid=$_GET['qid'];
                        }
                        if(isset($_GET['t'])){
                            $colindex=$_GET['t'];
                        }
                        header("Location: check.php?s=$t&qid=$pid&t=$colindex");
                    }else{
                    
                    
                    echo"<div style='float:right'><a href='signout.php'>Sign out</a></div>";
                    echo '<p class="text1">Welcome, ' . $_SESSION['user_name'] . '. <a href="qpost.php">Start a new discussion.</a>.</p>';   
                    echo '<br><a style="font-family:verdana; text-align:center;" href="changepass.php">Change your password</a><br><p id="error"></p>';  
                    }
                }
            }
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
