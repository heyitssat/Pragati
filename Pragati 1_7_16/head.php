<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Pragati- CWC, IIT Kanpur</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <script src="ckeditor/ckeditor.js"></script> 
    <link href="css/style.css" rel="stylesheet">
    <link href="css/ekko-lightbox.css" rel="stylesheet">
    <link href="css/flexslider.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
	    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
   <link rel="stylesheet" href="test_form.css"  > 
<style>
a:link    {color:brown; background-color:transparent; text-decoration:none}
a:visited {color:brown; background-color:transparent; text-decoration:none}
a:hover   {color:#660000; background-color:transparent; text-decoration:underline}
a:active  {color:yellow; background-color:transparent; text-decoration:underline}

ul.a {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
    position: fixed;
    top: 0;
    width: 100%;
}

li.b {
    float: left;
        color:white;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: #4CAF50;
}
</style>
    <!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
  </head>

  <body>

<nav class="navbar navbar-default" style="background-color:#333">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">PRAGATI</a>
    </div> 
    <ul class="a" >
      <li style="display:inline" class="b"><a href="index.php">Home</a></li>
      <li style="display:inline" class="b"><a href="stream.php">Forum</a></li>  
      <li style="display:inline" class="b"><a href="category.php">Discussion Topics</a></li>
      <li style="display:inline" class="b"><a href="users.php">Users</a></li>
      <li style="display:inline" class="b"><a href="#">About Us</a></li>

    <?php
    session_start();
if(!isset($_SESSION['signed_in'])){
echo"<li class='b' style='display:inline;float:right' ><a href='signin.php'>Sign in</a></li>";
}else{
echo"<li class='b' style='display:inline; float:right' ><a href='signout.php'>Sign out</a></li>
";
}
?>
  
    </ul>
  </div>
</nav>
  
  <div id="boxWrapp" style="background-image:url(green.jpg)">
    <div class="main-nav clearfix">
	  <!-- navbar -->
	  
	</div>
 
	<!-- end header -->
    <!-- /Full Page Image Header Area -->
