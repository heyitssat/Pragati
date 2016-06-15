<?php
session_start();
if(!isset($_SESSION['signed_in'])){
echo"<div style='float:right'><a href='signin.php'>Sign in</a></div>";
}else{
echo"<div style='float:right'><a href='signout.php'>Sign out</a></div>";
}
if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)
{
echo "
<form method='post' action='qlist.php'>
<br>
question
<textarea name='question' rows='10' cols='30'></textarea><input type='submit' name='post'></input></form>";
echo $_SESSION['user_name'];

}else{echo"u r not signed in.<a href='signin.php'>Click here to login</a>";

}
?>