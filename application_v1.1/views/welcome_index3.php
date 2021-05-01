<?php 
	session_start();  
	?>
<!DOCTYPE>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Blood bank Management System</title>

	<link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/images/system/favicon.png') ?>">

	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->  
	<link rel="stylesheet" href="<?php echo base_url('assets/deesynertz/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/deesynertz/StyleSheet.css') ?>">
	<!--slider-->
	<link rel="stylesheet" href="<?php echo base_url('assets/deesynertz/css/style.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/deesynertz/css/flexslider.css') ?>">

	<link href="myboostrap/js/bootstrap.min.js.css" rel="stylesheet" type="text/css">


	<!-- Font Awesome -->  
	<link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css') ?>">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css') ?>">


	<!-- Daterange picker -->  
	<link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.css') ?>">
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>">
	<!-- Select2 -->
	<link rel="stylesheet" href="<?php echo base_url('assets/bower_components/select2/dist/css/select2.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/plugins/fileinput/fileinput.min.css') ?>">







	<!-- jQuery 3 -->
	<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="<?php echo base_url('assets/bower_components/jquery-ui/jquery-ui.min.js') ?>"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
	$.widget.bridge('uibutton', $.ui.button);
	</script>
	<!-- Bootstrap 3.3.7 -->
	<script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
	<!-- Morris.js charts -->
	<script src="<?php echo base_url('assets/bower_components/raphael/raphael.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/bower_components/morris.js/morris.min.js') ?>"></script>
	<!-- Sparkline -->
	<script src="<?php echo base_url('assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') ?>"></script>
	<!-- jvectormap -->
	<script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>"></script>
	<!-- jQuery Knob Chart -->
	<script src="<?php echo base_url('assets/bower_components/jquery-knob/dist/jquery.knob.min.js') ?>"></script>
	<!-- daterangepicker -->
	<script src="<?php echo base_url('assets/bower_components/moment/min/moment.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
	<!-- datepicker -->
	<script src="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>
	<!-- Bootstrap WYSIHTML5 -->
	<script src="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>"></script>
	<!-- Slimscroll -->
	<script src="<?php echo base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
	<!-- FastClick -->
	<script src="<?php echo base_url('assets/bower_components/fastclick/lib/fastclick.js') ?>"></script>
	<!-- Select2 -->
	<script src="<?php echo base_url('assets/bower_components/select2/dist/js/select2.full.min.js') ?>"></script>
	<!-- AdminLTE App -->  
	<script src="<?php echo base_url('assets/dist/js/adminlte.min.js') ?>"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="<?php echo base_url('assets/dist/js/pages/dashboard.js') ?>"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?php echo base_url('assets/dist/js/demo.js') ?>"></script>
	<script src="<?php echo base_url('assets/plugins/fileinput/fileinput.min.js') ?>"></script>

	<!-- ChartJS -->
	<script src="<?php echo base_url('assets/bower_components/Chart.js/Chart.js') ?>"></script>

	<!-- icheck -->
	<script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js') ?>"></script>

	<!-- DataTables -->
	<script src="<?php echo base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>

	<script type="text/javascript">
			 $(function () {
				 SyntaxHighlighter.all();
			 });
			 $(window).load(function () {
				 $('.flexslider').flexslider({
					 animation: "slide",
					 animationLoop: false,
					 itemWidth: 210,
					 itemMargin: 5,
					 minItems: 2,
					 maxItems: 4,
					 start: function (slider) {
						 $('body').removeClass('loading');
					 }
				 });
			 });
		 </script>
</head>
<body>

<!--Every page requre connection in thhe database must get permision in the 
admin folder in oder to get coccention to the databse-->


 <header id="header">
	<div class="container">
		<div class="row">
			<div class="col-md-10">

				<h1><img src="<?php echo base_url('assets/images/system/Mylogo.png') ?>" alt="" style="height: 100px; cursor: pointer"></h1>
			</div>
		</div>
		<div id="authbutton">
			<a class='btn btn-primary btn' data-toggle='modal' data-target='#myModal' id="logbtn">Login</a>
			<a href="#contact" class='btn btn-primary btn' id="serh">Help</a>
		</div>

	<!--==============================NAVIGATION MENU==============================-->					
<nav class="navbar navbar-default">
		  <div class="container">
			<div id="navbarme" class="collapse navbar-collapse">
			  <ul class="nav navbar-nav">
			  <li class="active"><a href="index.php">Home</a></li>
				<li><a href="camps.php">Camps</a></li>
				<li><a href="donar.php">Donor</a></li>
				<li><a href="#about">About</a></li>
				<li><a href="#cus">Contact us</a></li>
			  </ul>
			</div><!--/.nav-collapse -->
		  </div>
		</nav>
    </div>
</header>
<!--==============================END OF THE HEADER==============================-->

<!--==============================SECTION CONTAINER============================== -->
 <section id="main">
 <div class="h_btm_bg">
 	<div class="container">  
     <!--<div class="wrap"> removed to inclease container-->
     <!-- WELCOME PART --> 
		<div class="h_btm">
			<div class="header-para">
			<!-- was somethng to fix -->
				</div>  
			<div class="clear"></div>
		</div>
	</div>
</div>
<!--Wecome part of the website end here-->
<!--===============================LOGIN FORM========================-->	
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">USER LOGIN</h4>
                       </div>
							<form method="post" action="Admin/server/server_function.php">
                                  <div class="modal-body">
                                       <div class="form-group">
                                       		<label>Email</label>
                                       		<input type="email" name="donor_email"  class="form-control" placeholder="Enter Email" required="required">
										</div>
                                           
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="donor_password"  class="form-control" placeholder="Enter Password" required="required">
										</div>
                                   </div>
										
                                   <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											
                                	   <input type="submit" name="donor_login" value="Login" class="btn btn-primary">
								</div>
							</form>
					 </div>
				 </div>
			 </div>

<!--Picture apper on the welcome page slides --->
<div class="h_btm_bg">
	<div class="wrap">
			<div class="main_cont">
			<section class="slider">
				<div class="flexslider carousel">
			  		<ul class="slides">
						<!-- something to fix -->
          			</ul>
       		 	</div>
      		</section>    		
<!--Ribon apper under the picture table on the welcome page slides-->   		
<div class="ribben">
	    <div class="l-triangle-top"></div>
	   	<div class="l-triangle-bottom"></div>
		<div class="rectangle"></div>
	    <div class="r-triangle-top"></div>
	   	<div class="r-triangle-bottom"></div>
	   	<div class="clear"></div>
	</div>
</div>
<!-- the container of Blood bank management system excription  and latest news side bar apper on the welcome page slides-->
<div class="main">
	<!-- FIX SOMETHING HERE -->
			
		
	<!--Sidebar of latest new apper on the welcome page start  here -->
	<div class="sidebar" id="note">
	 	<div class="blog_posts">
				<!-- SOMETHING TO FIX -->
		</div>
	</div>
</div>
<div class="clear"></div>
		 
	<!--Desciption of about page-->
<div class="cont_main" id="about">
	<div class="content">	
					<!-- FIX CATEGORY -->
	</div>
	<div class="sidebar"> 
			<!-- FIX SIDE BAR -->
	</div>
	<div class="clear"></div>
</div>
<div class="clear"></div>	
<!-- =============================CONTACT PAGE============================= -->
<section class="contact-w3ls" id="contact">
	<div class="container" id="contact">
		<div class="col-lg-6 col-md-6 col-sm-6 contact-w3-agile2" data-aos="flip-left">
			<div class="contact-agileits">
				<h2>Contact Us</h2>
				<form  method="post" id="contactForm" action="Admin/function.php">
				<div class="control-group form-group">
                        
                <input type="text" class="form-control" placeholder="Full Name" name="cfname" id="name" required="required" pattern="[a-zA-Z _]{4,30}" title="please enter character  between 4 to 30 only ">
                <p class="help-block"></p>
                </div>
                   	
                <div class="control-group form-group">
                <input type="tel" class="form-control" placeholder="Phone Number" name="ctelno" id="phone" required="required" pattern="[0-9]{10,10}" title="please enter only  10 numbers for Phone" >
				<p class="help-block"></p>
				</div>
                   
                <div class="control-group form-group">
                <input type="email" class="form-control" placeholder="Email Address" name="cemail" id="email" required="email">
				<p class="help-block"></p>
                </div>
                <div class="control-group form-group">
                <select class="form-control" name="ckind" id="category" required><option value="">Select Message Category</option>
								<?php
									$cn=makeconnection();
										$s="SELECT * FROM kind_of_contact";
										$result=mysqli_query($cn,$s);
										$r=mysqli_num_rows($result);
											//echo $r;
											while($data=mysqli_fetch_array($result))
											{
												if(isset($_POST["show"])&& $data[0]==$_POST["ckind"])
												{
													echo "<option value=$data[0] selected>$data[1]</option>";
												}
												else
												{
													echo "<option value=$data[0]>$data[1]</option>";
												}
											}
											mysqli_close($cn);

										?>
				</select>
				<p class="help-block"></p>
                </div>
                    
                <div class="control-group form-group">
				<input type="text" class="form-control" placeholder="Subject" name="csbject" id="sms" required>
				<p class="help-block"></p>
					<!--<span class="shadow-input1"></span>-->
				</div>
                <input type="submit" name="addmessage" value="Send Now" class="btn btn-primary">	
				</form>
			</div>
		</div>
<div class="col-lg-6 col-md-6 col-sm-6" data-aos="flip-right" id="cus">
			<h3>Connect With Us</h3>
			<?php
						$con=makeconnection();
						$sql = "SELECT * FROM contact_us";
						$re = mysqli_query($con,$sql);
						$f =0;
						while($row= mysqli_fetch_array($re))
						{
							$rid = $row['contact_us_id'];
							$id = $row['category_id'];
							$f = $f + 1;
							if($id == "4") 
							{
								echo" 
			<h5 class='top'>".$row['title']."</h5>
			<p class='contact-agile1'><strong>Tel :</strong>".$row['tell']."</p>
			<p class='contact-agile1'><strong>Fax :</strong>".$row['fax']."</p>
			<p class='contact-agile1'><strong>Email :</strong> <a href='#'>".$row['email']."</a></p>
			<p class='contact-agile1'><strong>Address :</strong>".$row['address']."</p>
			
			<!-- social media-->
			<div class='social-bnr-agileits footer-icons-agileinfo'>
				<ul class='social-icons3'>
					<li><a href='".$row['facebook']."' class='fa fa-facebook icon-border facebook'> </a></li>
					<li><a href='".$row['twitter']."' class='fa fa-twitter icon-border twitter'> </a></li>
					<li><a href='".$row['instagram']."' class='fa fa-instagram icon-border instagram'> </a><li> 
				</ul>
			</div>
			 	 	 
			";
							}
						}
					?>	
											
				</div>
					<div class="clearfix"></div>
				</div></div></div>
		<!-- =====================END CONTACT=====================--> 	
			</div>
		</div>
</section> 


 <!--FOOTER--> 
<div class="clear"></div> 		 
<!-- ====================Bootstrap core JavaScript ================ -->
    <!-- Placed at the end of the document so the pages load faster -->
 
  <script src="myboostrap/js/bootstrap.min.js"></script>
	
<!--Footer of wwhich combain button-menu and copyright linked in footer.php form-->
<div class="ftr-bg" id="footerme">
	<div class="wrap">
		<div class="footer">
			<div class="f_nav">
				<ul>
					<li class="yactive"><a href="index.php">Home</a></li>			
					<li><a href="donar.php">Donor</a></li>
					<li><a href="login.php" data-toggle='modal' data-target='#myModal'>log In</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#contact">Contact Us</a></li>
            			</ul>
							</div>
							<div class="copy">
							<p class="title">&copy;2018 All Rights Reserved by BBMS </p> <br>
						<!--<p class="title">Design by Dee'synerTz LTD Co</p>-->
					</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</body>
</html>