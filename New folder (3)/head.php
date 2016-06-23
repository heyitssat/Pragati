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
	
    <link href="css/style.css" rel="stylesheet">
    <link href="css/ekko-lightbox.css" rel="stylesheet">
    <link href="css/flexslider.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
	    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
    <link rel="stylesheet" href="test_form.css" type="text/css" >
<style>
a:link    {color:green; background-color:transparent; text-decoration:none}
a:visited {color:brown; background-color:transparent; text-decoration:none}
a:hover   {color:red; background-color:transparent; text-decoration:underline}
a:active  {color:yellow; background-color:transparent; text-decoration:underline}
</style>
    <!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
  </head>

  <body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">PRAGATI</a>
    </div> 
    <ul  >
      <li style="display:inline" class="active"><a href="index.php">Home</a></li>
      <li style="display:inline"><a href="stream.php">Forum</a></li>  
      <li style="display:inline"><a href="category.php">Discussion Topics</a></li>
      <li style="display:inline"><a href="#">About Us</a></li>

    <?php
if(!isset($_SESSION['signed_in'])){
echo"<li style='display:inline;float:right' ><a href='signin.php'>Sign in</a></li>";
}else{
echo"<li style='display:inline; float:right' ><a href='signout.php'>Sign out</a></li>
";
}
?>
  
    </ul>
  </div>
</nav>
  
  <div id="boxWrapp">
    <div class="main-nav clearfix">
	  <!-- navbar -->
	<nav class="navbar navbar-inverse" role="navigation">
        <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
        <!--  <button type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          --><a class="navbar-brand bg-primary" href="#about">PRAGATI</a>
        </div>
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="NavCol">
         <ul class="nav navbar-nav navbar-right">
           
            <li ><a href="index.php" class="linear">Home</a></li>
            <li><a href="stream.php" class="linear">About</a></li>
            <li><a href="#work" class="linear">Ongoing Projects</a></li>
            <li><a href="#contact" class="linear">Contact</a></li>
          </ul>
        
         
        </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
	  
	</div>
 
	<!-- end header -->
    <!-- /Full Page Image Header Area -->
