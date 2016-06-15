<?php 
session_start();
if(isset($_SESSION['signed_in'])) {
	session_destroy();
    header('Location:stream.php');
}

?>