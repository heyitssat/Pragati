    
    <!-- content -->
    <div id="aboutMore" class="page">
      <div class="container">
		<div class="row">
          <div class="col-md-10  col-md-offset-1">
		    <div class="build title-page">
				<h2 class="text-center">About Us</h2>	
				<div class="line-title bg-primary"></div>
			</div>
		   </div><!-- end col -->
		</div><!-- end row -->
		<div class="about-us" align="center">
			<p style="font-size: 150%">
				Pragati is a social innovation wing that works on the principles of serving the society. Our society is facing various economic, environmental and social problems. The wing believes that innovations are the key to tackle these problems to improve our communities. Based on these beliefs, the wing shall work on creating, developing and implementing practices as well as providing innovative solutions to some of the common problems that exist now.
			</p>
		</div>
	
      </div>
      </div>
    
    <!-- /Intro -->   

    <!-- Portfolio -->
    <!-- /Portfolio -->
    
    <!--contact-->
    <div id="contact" class="page page-bgcolor">
		<div class="row">
          <div class="col-md-10  col-md-offset-1">
		    <div class="build title-page">
				<h2 class="text-center">GET IN TOUCH</h2>	
				<div class="line-title bg-primary"></div>
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
					<p>argon@gmail.com</p>
					
				</div>
			</div>
		</div><!-- end row -->
	
	</div>
    <!--contact-->
    
    <!-- Footer -->
    <footer class="bg-black">
      <div class="container">
        <div class="row">
			<div class="col-md-6 ">
				<div class="cp-right">
					<p>&copy; 2016 <a href="http://omahpsd.com" class="color-primary linear">ArGoNS</a>. All Rights Reserved. </p>
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
<script type="text/javascript">
function edit(){
    var x = "(<?php echo $phpvar ?>)";
    <?php echo "$phpvar"; ?>
    document.getElementById("editq").innerHTML="<form method='post' ><input type='text' name='editedq' value="+x+"  ><input value='post' type='submit'></form>";
}
</script>
<script type="text/javascript">
function vote(x){
	
	<?php 
		$sql= "SELECT qvote,vote_up,vote_down FROM master WHERE qid=$pid";
    	$result = mysqli_query($conn,$sql);
    	$row = $result->fetch_assoc();
        $vote=$row['qvote'];
        echo "dkjfdkj";
        echo $pid;
        ?>
    if(x==1){
<?php    
	$v=$row['vote_up'];
	$v++;
    
	 $sql="UPDATE `master` SET `vote_up`= $v WHERE qid=$pid";   
	 ?>

    }else if(x==0){
<?php    
    $v=$row['vote_down'];    
	 $v--;
	 $sql="UPDATE `master` SET `vote_down`= $v WHERE qid=$pid";
	 ?>
    }
<?php
    $sql="UPDATE `master` SET `qvote`= $vote WHERE qid=$pid";
                     
                if($conn->query($sql)){
echo "  updated ";
				}
    
?>	
	
}
</script>

</body>

</html>
