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
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
<style>
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
      <li style="display:inline" class="b"><a href="#">About Us</a></li>

    <?php
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
  
  <div id="boxWrapp">
    <!-- Full Page Image Header Area -->
    <div id="about" class="header">

	<div class="maskHeader"></div>
	<div class="main-caption">
		<div class="logo">
			<img src="img/jk.png" alt="logo" />
		</div>
			<!-- slider -->
	<div id="flex-head" class="flexslider">
		<ul class="slides">
			<li>
				<h1>Pragati</h1>	
				<h2>A Wing of Community Welfare Cell, IIT Kanpur</h2>

			</li>
			
		</ul>
	</div> 
    <!-- end slider --> 
	<nav>
		<ul>
		<li>
			<a href="#aboutMore" class="btn btnAbout btn-clear border-color color-primary btn-lg linear" >READ MORE</a>
		</li>
			<li>
				<a href="stream.php" class="btn btnAbout btn-clear border-color color-primary btn-lg linear">DISCUSSIONS</a>
			</li>
		</ul>
		</nav>
	</div><!--  end main caption -->
			
    </div>
	<!-- end header -->
    <!-- /Full Page Image Header Area -->

    
    <!-- content -->
    <div id="aboutMore" class="page">
      <div class="container">
		<div class="row">
          <div class="col-md-10  col-md-offset-1">
		    <div class="build title-page">
				<h2 class="text-center">About Us</h2>	
				<div class="line-title bg-primary" style="background-color:#3366CC"></div>
			</div>
		   </div><!-- end col -->
		</div><!-- end row -->
		<div class="about-us" align="center">
			<p style="font-size: 150%">
				Pragati is a social innovation wing that works on the principles of serving the society. Our society is facing various economic, environmental and social problems. The wing believes that innovations are the key to tackle these problems to improve our communities. Based on these beliefs, the wing shall work on creating, developing and implementing practices as well as providing innovative solutions to some of the common problems that exist now.
			</p>
		</div>
		<!--<img src="img/avatar.jpg" alt="avatar" />
        <div class="row">
           <div class="col-md-6">
			   <div class="build main-about">
				   <div class="row">
				       <div class="col-md-3">
				            <div class="main-avatar text-center">
				                <div class="avatar img-thumbnail img-circle">
				                
				                </div>
				            </div>
				            
				       </div>
				       <div class="col-md-9">
				            <div class="about-content">
						<p ></p>
						
					</div>
				       </div>
				   </div>
				  
					
				</div>
            </div>end col -->
		  
        <!-- <div class="col-md-6">
                <div class="build progressbar-a">
                    <div class="wrapp-progress">
                        <p class="pull-left">PHOTOSHOP</p> 
                        <div class="progress">
                          
                          <div class="progress-bar  clearfix" role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                            <span class="precent-value"></span>
							<i class="fa fa-caret-down"></i>
                          </div>
                        </div>
                    </div>
                    <div class="wrapp-progress">
                        <p class="pull-left">HTML & CSS</p> 
                        <div class="progress">
                          
                          <div class="progress-bar  clearfix" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                            <span class="precent-value"></span>
							<i class="fa fa-caret-down"></i>
                          </div>
                        </div>
                    </div>
                    <div class="wrapp-progress">
                        <p class="pull-left">ILLUSTRATOR</p> 
                        <div class="progress">
                          
                          <div class="progress-bar  clearfix" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                           <span class="precent-value"></span>
						   <i class="fa fa-caret-down"></i>
                          </div>
                        </div>
                    </div>
                    <div class="wrapp-progress">
                        <p class="pull-left">WORDPRESS</p> 
                        <div class="progress">
                          
                          <div class="progress-bar  clearfix" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                           <span class="precent-value"></span>
						   <i class="fa fa-caret-down"></i>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end row -->
      </div>
      </div>
    
    <!-- /Intro -->   

    <!-- Portfolio -->
    <div id="work" class="page clearfix">
      <div class="container">
		<div class="row">
          <div class="col-md-10  col-md-offset-1">
		    <div class="build title-page">
				<h2 class="text-center">ONGOING PROJECTS</h2>	
				<div class="line-title bg-primary" style="background-color:#3366CC"></div>
			</div>
		   </div><!-- end col -->
		</div><!-- end row -->
		   <div class="col-md-12">
                
                <ul id="filterOptions" class="clearfix">
                    <li class="cur"><a class="btn btn-link linear" href="#" data-group="all">All</a></li>
                    <li><span>/</span></li>
                    <li><a class="btn btn-link linear" href="#" data-group="mobile">Mobile</a></li>
					<li><span>/</span></li>
                    <li><a class="btn btn-link linear" href="#" data-group="ilustrator">Ilustrator</a></li> 
                    
                </ul>
               
            </div><!--end-col-->
		  <div class="col-md-12">
		  <div class="folio-content clearfix">
		   <div class="row">
		   <div class="container_folio clearfix gallery" id="grid">
			<div class="col-xs-12 col-sm-4 col-md-4 box" data-groups='["all", "ilustrator"]'>
			<div class="folio-img">
				<div class="portfolio-item ">
					<div class="thumbnail">
					   <div class="thumb-img">
					  
					  <div class="link-attr">
						    <a href="img/portfolio/campus.jpg" data-gallery="global-gallery" data-parent="" data-toggle="lightbox" data-title="Image Title Here" class="link-search animated linear"><i class="fa fa-search"></i></a>
						   <a href="#" class="link-chain animated linear"><i class="fa  fa-chain"></i></a>
					   </div>
						<img class="linear img-portfolio img-responsive" src="img/portfolio/campus.jpg" alt="This Is Image">
					  
					   
					   <div class="folio-caption">
					   <i class="fa fa-caret-up"></i>
					       <p>Campus Aesthetic</p>
					      
					   </div>
					   </div>
					</div>
				
				</div>
			</div>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4 box" data-groups='["all", "mobile"]'>
				<div class="folio-img">
					<div class="portfolio-item">
						<div class="thumbnail">
						<div class="thumb-img">
						 <div class="link-attr">
						    <a href="img/portfolio/Water.jpg" data-gallery="global-gallery" data-parent="" data-toggle="lightbox" data-title="Image Title Here" class="link-search animated linear"><i class="fa fa-search"></i></a>
						   <a href="#" class="link-chain animated linear"><i class="fa  fa-chain"></i></a>
					   </div>
						<img class="linear img-portfolio img-responsive" src="img/portfolio/Water.jpg" alt="This Is Image">
						 <div class="link"><a href="#">This Is Folio Link2</a></div>
						<div class="folio-caption">
						<i class="fa fa-caret-up"></i>
					       <p>Water Scarcity In Bundelkhand</p>
					   </div>
						</div>
					    </div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4 box" data-groups='["all", "mobile", "ilustrator"]'>
				<div class="folio-img">
					<div class="portfolio-item">
						<div class="thumbnail">
						<div class="thumb-img">
						<div class="link-attr">
						    <a href="img/portfolio/water_harv.jpg" data-gallery="global-gallery" data-parent="" data-toggle="lightbox" data-title="Image Title Here" class="link-search animated linear"><i class="fa fa-search"></i></a>
						   <a href="#" class="link-chain animated linear"><i class="fa  fa-chain"></i></a>
					   </div>
						 <img class="linear img-portfolio img-responsive" src="img/portfolio/water_harv.jpg" alt="This Is Image">
						   <div class="link"><a href="#">This Is Folio Link3</a></div>
						   <div class="folio-caption">
						   <i class="fa fa-caret-up"></i>
					       <p>Water Harvesting</p>
					       </div>
					       </div>
						</div>
					    
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4 box" data-groups='["all", "mobile", "ilustrator"]'>
				<div class="folio-img">
					<div class="portfolio-item">
						<div class="thumbnail">
						<div class="thumb-img">
						<div class="link-attr">
						    <a href="img/portfolio/electricity.jpg" data-gallery="global-gallery" data-parent="" data-toggle="lightbox" data-title="Image Title Here" class="link-search animated linear"><i class="fa fa-search"></i></a>
						   <a href="#" class="link-chain animated linear"><i class="fa  fa-chain"></i></a>
					   </div>
						<img class="linear img-portfolio img-responsive" src="img/portfolio/electricity.jpg" alt="This Is Image">
						  <div class="link"><a href="#">This Is Folio Link4</a></div>
						  <div class="folio-caption">
						  <i class="fa fa-caret-up"></i>
					       <p>Electricity Consumption</p>
					       </div>
					     </div>
						</div>
					
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4 box" data-groups='["all", "mobile", "ilustrator"]'>
				<div class="folio-img">
					<div class="portfolio-item">
						<div class="thumbnail">
						<div class="thumb-img">
						<div class="link-attr">
						    <a href="img/portfolio/horticulture.jpg" data-gallery="global-gallery" data-parent="" data-toggle="lightbox" data-title="Image Title Here" class="link-search animated linear"><i class="fa fa-search"></i></a>
						   <a href="#" class="link-chain animated linear"><i class="fa  fa-chain"></i></a>
					   </div>
						<img class="linear img-portfolio img-responsive" src="img/portfolio/horticulture.jpg" alt="This Is Image">
						<div class="link"><a href="#">This Is Folio Link5</a></div>
						<div class="folio-caption">
						<i class="fa fa-caret-up"></i>
					       <p>Irrigation and Horticulture</p>
					       </div>
						</div>
						</div>
					
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4 box" data-groups='["all", "ilustrator"]'>
				<div class="folio-img">
					<div class="portfolio-item">
						<div class="thumbnail">
						<div class="thumb-img">
						<div class="link-attr">
						    <a href="img/portfolio/waste_disposal.jpg" data-gallery="global-gallery" data-parent="" data-toggle="lightbox" data-title="Image Title Here" class="link-search animated linear"><i class="fa fa-search"></i></a>
						   <a href="#" class="link-chain animated linear"><i class="fa  fa-chain"></i></a>
					   </div>
						<img class="linear img-portfolio img-responsive" src="img/portfolio/waste_disposal.jpg" alt="This Is Image">
						<div class="link"><a href="#">This Is Folio Link6</a></div>
						<div class="folio-caption">
						<i class="fa fa-caret-up"></i>
					       <p>Waste Disposal</p>
					       </div>
						</div>
						</div>
					
					</div>
				</div>
			</div>
		  
		   </div>
		  
		   </div>
		  </div><!-- end folio content -->
		  </div><!-- end col -->
      </div><!--end container-->
	 
	 
    </div>
    <!-- /Portfolio -->
    
    <!--contact-->
    <div id="contact" class="page page-bgcolor">
		<div class="container">
		<div class="row">
          <div class="col-md-10  col-md-offset-1">
		    <div class="build title-page">
				<h2 class="text-center">GET IN TOUCH</h2>	
				<div class="line-title bg-primary" style="background-color:#3366CC"></div>
			</div>
		   </div><!-- end col -->
		</div><!-- end row -->
	  	<div class="row">
			<div class="col-md-4 ">
				<div class="build contact clearfix text-center">
					<span class="fa fa-map-marker"></span>
						<p>Community Welfare Cell <br/>Student Gymkhana, IIT Kanpur<p>
				</div>			
			</div><!-- end col -->
			<div class="col-md-4 ">
				<div class="build contact clearfix text-center">
					<span class="fa fa-phone"></span>
					<p>tel.<a href="tel:+919151636052">+91 9151636052</a></p>
					
					
				</div>
			</div>
			<div class="col-md-4 ">
				<div class="build contact clearfix text-center">
					<span class="fa fa-envelope"></span>
					<p>argons@gmail.com</p>
					
				</div>
			</div>
		</div><!-- end row -->
	
	  </div><!-- end container -->
	</div>
    <!--contact-->
    
    <!-- Footer -->
    <footer class="bg-black">
      <div class="container">
        <div class="row">
			<div class="col-md-6 ">
				<div class="cp-right">
					<p>&copy; 2016 <a href="http://omahpsd.com" class="color-primary linear">ArgonS</a>. All Rights Reserved. </p>
				</div><!-- end build -->
			</div><!-- end col -->
			
			<div class="col-md-6 text-right">
		
			<ul class="list-inline">
			<li><a href="#" class="socIcon color-primary linear"><i class="fa fa-facebook fa-2x"></i></a></li>
			<li><a href="#" class="socIcon color-primary linear"><i class="fa fa-twitter fa-2x"></i></a></li>
			<li><a href="#" class="socIcon color-primary linear"><i class="fa fa-dribbble fa-2x"></i></a></li>
			</ul>
		
			</div>
        </div>
      </div>
    </footer>
    <!-- /Footer -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
	<script src="js/jquery.sticky.js" ></script>
	 <script src="js/jquery.nav.js"></script>
    <script src="js/jquery.scrollTo.js" ></script>
    <script src="js/jquery.flexslider.js" ></script>
   <script type="text/javascript" src="js/ekko-lightbox.js"></script>
   <script src="js/jquery.easing.1.3.js" ></script>
   <script src="js/jquery.shuffle.js" ></script>
    <script src="js/script.js"></script>

    <!-- Custom JavaScript for the Side Menu and Smooth Scrolling -->

  </div>
  </body>

</html>
