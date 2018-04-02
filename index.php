	<!DOCTYPE html>
	<html lang="en" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="Colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Event Booking</title>







		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
	function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!-- Custom Theme files -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/fasthover.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<!-- //Custom Theme files -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery.min.js"></script>
<link rel="stylesheet" href="css/jquery.countdown.css" /> <!-- countdown --> 
<!-- //js -->  




	<!-- add sweetalert -->
	<script src="js/sweetalert.min.js"></script>






<!-- web fonts --> 
<link href='//fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>



		

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">=
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link href="css/availability-calendar.css" rel="stylesheet">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/main.css">
		</head>
		<body>

			<!-- Start Header Area -->
			<header class="default-header">
				<div class="container">
					<div class="header-wrap">
						<div class="header-top d-flex justify-content-between align-items-center">
							<div class="logo">
								<a href="#home"><img src="img/logo.png" alt=""></a>
							</div>
							<div class="main-menubar d-flex align-items-center">
								<nav class="hide">
									<a href="#home">Home</a>
									<a href="#functionalities">Register Now</a>
									<a href="#speaker">Speaker</a>
									<a href="#upcoming">Upcoming event</a>
								</nav>
								<div class="menu-bar"><span class="lnr lnr-menu"></span></div>
							</div>
						</div>
					</div>
				</div>
			</header>
			<!-- End Header Area -->

			<!-- start banner Area -->
			<section class="banner-area relative" id="home">
				<div class="overlay overlay-bg"></div>
				<div class="container">
						<div class="row fullscreen align-items-center justify-content-center" style="height: 915px;">
							<div class="banner-content col-lg-6 col-md-12">
								<h1>
									Our Next Event Starts in
								</h1>
				        		<div class="row clock_sec d-flex flex-row justify-content-between" id="clockdiv">
				                    <div class="clockinner">
				                        <span class="days"></span>
				                        <div class="smalltext">Days</div>
				                    </div>
				                    <div class="clockinner">
				                        <span class="hours"></span>
				                        <div class="smalltext">Hours</div>
				                    </div>
				                    <div class="clockinner">
				                        <span class="minutes"></span>
				                        <div class="smalltext">Minutes</div>
				                    </div>
				                    <div class="clockinner">
				                        <span class="seconds"></span>
				                        <div class="smalltext">Seconds</div>
				                    </div>

				                </div>
							</div>
						</div>
				</div>
			</section>
			<!-- End banner Area -->

			<!-- Start facilities Area -->
			<section class="facilities-area section-gap" id="functionalities">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="col-md-8 pb-80 header-text">
							<h1>Don't Wait Register Now</h1>
							<div class="col-md-8 modal_body_left modal_body_left1" style="border-right: 1px dotted #C2C2C2;padding-right:3em;">
							<div class="sap_tabs">	
								<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
									<ul>
										<li class="resp-tab-item" aria-controls="tab_item-0"><span>Sign in</span></li>
										<li class="resp-tab-item" aria-controls="tab_item-1"><span>Sign up</span></li>
									</ul>		
									<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
										<div class="facts">
											<div class="register">
												<form id="login_form" action="#" method="post">		
													<div id="msg"></div>	
													<input name="login_email" id="login_email" placeholder="Email Address" type="text" required>						
													<input name="login_password" id="login_password" placeholder="Password" type="password" required="">										
													<div class="sign-up">
														<input name="user_login_btn" id="user_login_btn" type="submit" value="Sign in"/>
													</div>
												</form>
											</div>
										</div> 
									</div>	

									<div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
										<div class="facts">
											<div class="register">	
												<form id="reg_form" action="#" method="post">	
																							
													<input placeholder="Name" name="reg_name" id="reg_name" type="text" required="">
													
													<input placeholder="Email Address" name="reg_email" id="reg_email" type="email" required="">
													<span class="error" id="reg_email_error"></span>	
														
													<input placeholder="Password" name="reg_password" id="reg_password" type="password" required="">													

													<input placeholder="Confirm Password" name="reg_confirm_pass" id="reg_confirm_pass" type="password" required="">
													<span class="error" id="reg_pass_error"></span>
													<div class="sign-up">
														<input type="submit" name="user_reg_btn" id="user_reg_btn" value="Create Account"/>
													</div>
												</form>
											</div>
										</div>
									</div> 			        					            	      
								</div>	
							</div>
							<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
							<script type="text/javascript">
								$(document).ready(function () 
								{
									$('#horizontalTab').easyResponsiveTabs({
										type: 'default', //Types: default, vertical, accordion           
										width: 'auto', //auto or any width like 600px
										fit: true   // 100% fit in a container
									});


									var redirect_url = "index.php";

									/* user login script */
									$("#login_form").submit(function(evt)
									{
										evt.preventDefault();

										var login_email 	= $("#login_email").val();
										var login_password 	= $("#login_password").val();

										var dataString = "login_email="+ login_email + "&login_password="+ login_password;
										//alert(dataString); return false;
										$.ajax(
										{
											type: "post",
											url: "php_action/user_login_action.php",
											data: dataString,
											cache: false,
											success: function(login_result)
											{
												//alert(login_result);
												if(login_result == "user login")
												{
													redirect_url = "index.php";
													$("#myModal88").modal("hide");
													swal("Login Successful", "", "success");
											    	DelayRedirect();
												}
												else if(login_result == "merchant login")
												{
													redirect_url = "my_account.php";
													$("#myModal88").modal("hide");
													swal("Login Successful", "", "success");
											    	DelayRedirect();
												}
												else if(login_result == "login fail")
												{
													document.getElementById("msg").innerHTML = "*invalid email or password";
													$("#msg").css("text-align", "center");
													$("#msg").css("background", "#e84d58");
						        					$("#msg").css("color", "white");
						        					$("#msg").css("padding", "10px");
						        					$("#msg").css("border-radius", "3px");
												}
											}
										});
									});


									
									/* user registration script */
									$("#reg_form").submit(function(e) 
									{
									    e.preventDefault();

									    var regStatus 			= 1;
									    var reg_name 			= $("#reg_name").val();
									    var reg_email 			= $("#reg_email").val();
									    var reg_password 		= $("#reg_password").val();
										var reg_confirm_pass 	= $("#reg_confirm_pass").val();						

										validateRegForm();

									    // validate reg email	
									    function validateRegForm()
									    {
									    	$.ajax(
										    {
										    	type: "post",
										    	url: "check_email.php",
										    	data: {reg_email: reg_email},
										    	cache: false,
										    	success: function(response)
										    	{
										    		//alert(response);
										    		if(response == "proceed")
										    		{
										    			document.getElementById("reg_email_error").innerHTML = "";
										    			$("#reg_email").css("border-color", "#ddd");

										    			// check if passwords match
										    			if(reg_password == reg_confirm_pass)
										    			{
										    				regPassErr = "";
											    			document.getElementById("reg_pass_error").innerHTML = "";
											    			$("#reg_password").css("border-color", "#ddd");
											    			$("#reg_confirm_pass").css("border-color", "#ddd");

											    			//save data into the database
											    			var dataString = "reg_name="+ reg_name + "&reg_email="+ reg_email + "&reg_password="+ reg_password;
											    			//alert (dataString); return false;
											    			$.ajax(
											    			{
											    				type: "post",
											    				url: "php_action/user_reg_action.php",
											    				data: dataString,
											    				cache: false,
											    				success: function(result)
											    				{
											    					//alert(result);
											    					if(result == "reg success")
											    					{
											    						$("#myModal88").modal("hide");
											    						swal("Account Created Successfully", "", "success");
											    						DelayRedirect();
											    					}
											    					else
											    					{
											    						swal("Registration Error, try again", "", "error");
											    					}
											    				}
											    			});
										    			}
										    			else
										    			{
										    				regPassErr = "*passwords DO NOT match";
											    			document.getElementById("reg_pass_error").innerHTML = regPassErr;
											    			$("#reg_password").css("border-color", "red");
											    			$("#reg_confirm_pass").css("border-color", "red");
										    			}
										    		}
										    		else if(response == "proceed NOT")
										    		{
										    			regEmailErr = "*email already registered";
										    			document.getElementById("reg_email_error").innerHTML = regEmailErr;
										    			$("#reg_email").css("border-color", "red");
										    		}
										    	}
										    });
									    }								    
									    
										
									});


									// function to redirect page after 2 seconds
						        	function DelayRedirect()
									{
										var seconds = 2;
										
									    setInterval(function()
									    {
									    	seconds--;
									    	if (seconds == 0) 
									    	{
									            window.location = redirect_url;
									        }
									    }, 1000);
									}
								});
							</script>
							<div id="OR" class="hidden-xs">OR</div>
						</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End facilities Area -->

			<!-- Start speaker Area -->
			<section class="speaker-area section-gap" id="speaker">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="col-md-8 pb-80 header-text">
							<h1>Our Speakers</h1>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> labore  et dolore magna aliqua.
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-4 speaker-wrap">
							<div class="single-speaker">
								<div class="content">
								    <a href="#" target="_blank">
								      <div class="content-overlay"></div>
								  		 <img class="content-image img-fluid d-block mx-auto" src="img/s1.jpg" alt="">
								      	<div class="content-details fadeIn-bottom"></div>
								    </a>
								 </div>
							</div>
						  	<h2>Andy Florence</h2>
						  	<p>inappropriate behavior</p>
						</div>
						<div class="col-lg-4 col-md-4 speaker-wrap">
							<div class="single-speaker">
								<div class="content">
								    <a href="#" target="_blank">
								      <div class="content-overlay"></div>
								  		 <img class="content-image img-fluid d-block mx-auto" src="img/s2.jpg" alt="">
								      	<div class="content-details fadeIn-bottom"></div>
								    </a>
								 </div>
							</div>
						  	<h2>Andy Florence</h2>
						  	<p>inappropriate behavior</p>
						</div>
						<div class="col-lg-4 col-md-4 speaker-wrap">
							<div class="single-speaker">
								<div class="content">
								    <a href="#" target="_blank">
								      <div class="content-overlay"></div>
								  		 <img class="content-image img-fluid d-block mx-auto" src="img/s3.jpg" alt="">
								      	<div class="content-details fadeIn-bottom"></div>
								    </a>
								 </div>
							</div>
						  	<h2>Andy Florence</h2>
						  	<p>inappropriate behavior</p>
						</div>

					</div>
				</div>
			</section>
			<!-- End speaker Area -->


			<!-- Start calender Area -->
			<section class="calender-area relative section-gap">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="col-md-8 pb-80 header-text">
							<h1>Event Calendar</h1>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> labore  et dolore magna aliqua.
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 calender-wrap" id="calendar"></div>
						<div class="col-lg-12 event-dates">
							<div class="single-event d-flex flex-row">
								<p class="col">
									Dec 01
								</p>
								<p class="col-8">
									World AIDS Day
								</p>
								<p class="col text-right">
									<span class="lnr lnr-highlight"></span>
									<span class="lnr lnr-trash"></span>
								</p>
							</div>
							<div class="single-event d-flex flex-row">
								<p class="col">
									Dec 16
								</p>
								<p class="col-8">
									Victory Day of people republic of Bangladesh
								</p>
								<p class="col text-right">
									<span class="lnr lnr-highlight"></span>
									<span class="lnr lnr-trash"></span>
								</p>
							</div>
							<div class="single-event d-flex flex-row">
								<p class="col">
									Dec 25
								</p>
								<p class="col-8">
									Chrismas Day Arrangement
								</p>
								<p class="col text-right">
									<span class="lnr lnr-highlight"></span>
									<span class="lnr lnr-trash"></span>
								</p>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End calender Area -->


			<!-- Start events Area -->
			<section class="events-area section-gap" id="upcoming">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="col-md-8 pb-80 header-text">
							<h1>Upcoming Events</h1>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> labore  et dolore magna aliqua.
							</p>
						</div>
					</div>
					<div class="row no-padding">
						<div class="col-lg-6 col-sm-6">
							<div class="single-events row no-padding">
								<div class="col-lg-4 image">
									<img src="img/e1.jpg" alt="">
								</div>
								<div class="col-lg-7 details">
									<a href="#">
										<h4>Addiction When Gambling
										Becomes A Problem</h4>
									</a>
									<p>
										inappropriate behavior Lorem ipsum dolor sit amet, consectetur.
									</p>
									<p class="meta"><span class="lnr lnr-heart"></span> <span class="likes">05 likes</span> <span class="lnr lnr-bubble"></span> <span class="likes">06 comments</span></p>
								</div>
							</div>
							<div class="single-events row no-padding">
								<div class="col-lg-4 image">
									<img src="img/e2.jpg" alt="">
								</div>
								<div class="col-lg-7 details">
									<a href="#">
										<h4>Addiction When Gambling
										Becomes A Problem</h4>
									</a>
									<p>
										inappropriate behavior Lorem ipsum dolor sit amet, consectetur.
									</p>
									<p class="meta"><span class="lnr lnr-heart"></span> <span class="likes">05 likes</span> <span class="lnr lnr-bubble"></span> <span class="likes">06 comments</span></p>
								</div>
							</div>
							<div class="single-events row no-padding">
								<div class="col-lg-4 image">
									<img src="img/e3.jpg" alt="">
								</div>
								<div class="col-lg-7 details">
									<a href="#">
										<h4>Addiction When Gambling
										Becomes A Problem</h4>
									</a>
									<p>
										inappropriate behavior Lorem ipsum dolor sit amet, consectetur.
									</p>
									<p class="meta"><span class="lnr lnr-heart"></span> <span class="likes">05 likes</span> <span class="lnr lnr-bubble"></span> <span class="likes">06 comments</span></p>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-sm-6">
							<div class="single-events row no-padding">
								<div class="col-lg-4 image">
									<img src="img/e4.jpg" alt="">
								</div>
								<div class="col-lg-7 details">
									<a href="#">
										<h4>Addiction When Gambling
										Becomes A Problem</h4>
									</a>
									<p>
										inappropriate behavior Lorem ipsum dolor sit amet, consectetur.
									</p>
									<p class="meta"><span class="lnr lnr-heart"></span> <span class="likes">05 likes</span> <span class="lnr lnr-bubble"></span> <span class="likes">06 comments</span></p>
								</div>
							</div>
							<div class="single-events row no-padding">
								<div class="col-lg-4 image">
									<img src="img/e5.jpg" alt="">
								</div>
								<div class="col-lg-7 details">
									<a href="#">
										<h4>Addiction When Gambling
										Becomes A Problem</h4>
									</a>
									<p>
										inappropriate behavior Lorem ipsum dolor sit amet, consectetur.
									</p>
									<p class="meta"><span class="lnr lnr-heart"></span> <span class="likes">05 likes</span> <span class="lnr lnr-bubble"></span> <span class="likes">06 comments</span></p>
								</div>
							</div>
							<div class="single-events row no-padding">
								<div class="col-lg-4 image">
									<img src="img/e6.jpg" alt="">
								</div>
								<div class="col-lg-7 details">
									<a href="#">
										<h4>Addiction When Gambling
										Becomes A Problem</h4>
									</a>
									<p>
										inappropriate behavior Lorem ipsum dolor sit amet, consectetur.
									</p>
									<p class="meta"><span class="lnr lnr-heart"></span> <span class="likes">05 likes</span> <span class="lnr lnr-bubble"></span> <span class="likes">06 comments</span></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End events Area -->


			<!-- start footer Area -->
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-3  col-md-12">
							<div class="single-footer-widget">
								<h6>Top Products</h6>
								<ul class="footer-nav">
									<li><a href="#">Managed Website</a></li>
									<li><a href="#">Manage Reputation</a></li>
									<li><a href="#">Power Tools</a></li>
									<li><a href="#">Marketing Service</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-6  col-md-12">
							<div class="single-footer-widget newsletter">
								<h6>Newsletter</h6>
								<p>You can trust us. we only send promo offers, not a single spam.</p>
								<div id="mc_embed_signup">
									<form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">

										<div class="form-group row" style="width: 100%">
											<div class="col-lg-8 col-md-12">
												<input name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">
												<div style="position: absolute; left: -5000px;">
													<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
												</div>
											</div>

											<div class="col-lg-4 col-md-12">
												<button class="nw-btn primary-btn">Subscribe<span class="lnr lnr-arrow-right"></span></button>
											</div>
										</div>
										<div class="info"></div>
									</form>
								</div>
							</div>
						</div>
						<div class="col-lg-3  col-md-12">
							<div class="single-footer-widget mail-chimp">
								<h6 class="mb-20">Instragram Feed</h6>
								<ul class="instafeed d-flex flex-wrap">
									<li><img src="img/i1.jpg" alt=""></li>
									<li><img src="img/i2.jpg" alt=""></li>
									<li><img src="img/i3.jpg" alt=""></li>
									<li><img src="img/i4.jpg" alt=""></li>
									<li><img src="img/i5.jpg" alt=""></li>
									<li><img src="img/i6.jpg" alt=""></li>
									<li><img src="img/i7.jpg" alt=""></li>
									<li><img src="img/i8.jpg" alt=""></li>
								</ul>
							</div>
						</div>
					</div>

					<div class="row footer-bottom d-flex justify-content-between">
						<p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
						<div class="col-lg-4 col-sm-12 footer-social">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div>
				</div>
			</footer>
			<!-- End footer Area -->

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/availability-calendar.js"></script>
			<script src="js/jquery.sticky.js"></script>
			<script src="js/parallax.min.js"></script>
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
			<script src="js/countdown.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>
			<script src="js/main.js"></script>
		</body>
	</html>
