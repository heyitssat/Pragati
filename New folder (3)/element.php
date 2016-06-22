session_start();
echo"<div style='float:right'>";
if(!isset($_SESSION['signed_in'])){
echo"<a href='signin.php'>Sign in</a>";
}else{
echo"<a href='signout.php'>Sign out</a>
</div>";
}