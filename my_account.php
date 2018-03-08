<?php
    session_start();
    include_once("connection.php");
    include_once("avatar_upload.php");
    global $con;


    if(!isset($_SESSION['email']))
    {
        ?>
            <script type="text/javascript">
                setTimeout("window.open('client_login.php', '_self');", 0);
            </script>
        <?php
    }
    else
    {        
        $email = $_SESSION['email'];

        //get profile details from the databas
        $sql = "select * from client_profile where email like '$email'";
        $run_sql = mysqli_query($con, $sql);
        if(!$run_sql)
        {
            echo "Error: " . $sql . $con ->error;
            exit;
        }
        else
        {
            while($details=mysqli_fetch_array($run_sql))
            {
                $business_name          = $details['bus_name'];
                $business_email         = $details['email'];
                $phone                  = $details['cell_phone'];
                $company_logo           = $details['bus_logo'];
                $bus_desc               = $details['bus_desc'];
                $bus_location           = $details['location'];
                $verification_status    = $details['verified'];

                if(empty($company_logo))
                {
                    $company_logo       = "img/avatar.png";
                    $upload_link_text   = "<i class='fa fa-upload' style='font-size:16px;'></i> upload avatar";
                }
                else
                {
                    $company_logo       = "prof_pics/" . $details['bus_logo'];
                    $upload_link_text   = "<i class='fa fa-edit style='font-size:16px;'></i> change avatar";
                }

                
            }
        }
    }
?>









<!DOCTYPE html>
<!--
	ustora by freshdesignweb.com
	Twitter: https://twitter.com/freshdesignweb
	URL: https://www.freshdesignweb.com/ustora/
-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CHIROWA | MY ACCOUNT</title>








    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">





    <!-- SmartMenus core CSS (required) -->
    <link href="css/sm-core-css.css" rel="stylesheet" type="text/css" />

    <!-- "sm-blue" menu theme (optional, you can use your own CSS, too) -->
    <link href="css/sm-blue/sm-blue.css" rel="stylesheet" type="text/css" />






    <!-- MODAL LINKS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $('#msg').hide();
    </script>












    <!-- CSS FILE LINK FOR LOGIN POPUP MODAL -->
    <link rel="stylesheet" type="text/css" href="login.css">



    <!-- SmartMenus core CSS (required) -->
    <link href="css/sm-core-css.css" rel="stylesheet" type="text/css" />

    <!-- "sm-blue" menu theme (optional, you can use your own CSS, too) -->
    <link href="css/sm-blue/sm-blue.css" rel="stylesheet" type="text/css" />





    <!-- jQuery referencing -->
    <script src="jquery-3.3.1.js"></script>






    <!-- Add Dropzone -->
    <link rel="stylesheet" type="text/css" href="css/dropzone.css" />
    <script type="text/javascript" src="js/dropzone.js"></script>


    <style type="text/css">
        #myModal
        {
            z-index: 99999999999999999;
        }
        #uploadModal
        {
            z-index: 99999999999999999;
        }
        #manage
        {
            margin: 0 auto;
            width: 230px;
            overflow-x: auto;
            background: white;
            padding: 20px 20px 20px;
            border-radius: 10px;
        }
        
        #manage:hover, #manage a:hover
        {
            background: green;
            color: white;
            text-decoration: none;
        }
    </style>






    <!-- custom javascript -->
   

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body style="font-family:raleway;">





    

    
    


    <script type="text/javascript">
        $(document).ready(function()
        {
            $('#avatar').click(function()
            {
                $('#myModal').modal({
                    backdrop: 'static'
                });
            }); 


        });


        function reload_and_close_modal(manu)
        {
            window.setTimeout(window.location.href = "my_account.php",1000);
        }
    </script>









   
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="#">Hi 
                                <?php
                                    echo $business_name . ",";
                                ?>
                                welcome to Chirowa Kenya.</a></li>

                                <?php
                                if(isset($_SESSION['email']))
                                {
                                    ?>
                                        <li><a href="logout.php?c_url=index.php"><i class="fa fa-user"></i> Logout</a></li>
                                    <?php

                                }
                            ?>


                            







                            <li><a href="#"><i class="fa fa-heart"></i> Wishlist</a></li>
                            <li><a href="cart.html"><i class="fa fa-user"></i> My Cart</a></li>
                            <li><a href="checkout.html"><i class="fa fa-user"></i> Checkout</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="value">Currency: Kshs.</span></a>
                            </li>

                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">language :</span><span class="value">English </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->
    
     <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="index.php"><img src="img/logo.jpg"></a></h1>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="cart.html">Cart - <span class="cart-amunt">$100</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">5</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    







<div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                










                <div class="navbar-collapse collapse">

                   <nav id="main-nav" >         
                        <!-- Sample menu definition -->
                        <ul id="main-menu" class="sm sm-blue" >


                        <li><a href="#"><i class="fa fa-bars"></i> &nbsp;Shop by category</a>
                            <ul>



                                <!-- display categories for goods -->
                                <li><a href="#">Goods</a>
                                  <ul>
                                    <?php
                                        $pro_cat = "select * from categories where offer like 'Goods'";
                                        $run_pro_cat = mysqli_query($con, $pro_cat);
                                        if(!$run_pro_cat)
                                        {
                                            echo "<script>alert('IMEKATAA BRADHEE!')</script>";
                                            echo "Error: " . $pro_cat . "<br/>" . $con ->error;
                                            exit;
                                        }
                                        else
                                        {
                                            while($row=mysqli_fetch_array($run_pro_cat))
                                            {
                                                $good_categories = $row['cat_title'];
                                                echo "<li><a href='#'>$good_categories</a></li>";
                                            }
                                            
                                        }
                                    ?>

                                  </ul>
                                </li>


                                <!-- display categories for services -->
                                <li><a href="#">Services</a>
                                  <ul>
                                    <?php
                                        $services_cat = "select * from categories where offer like 'Services'";
                                        $run_services_cat = mysqli_query($con, $services_cat);
                                        if(!$run_services_cat)
                                        {
                                            echo "<script>alert('IMEKATAA BRADHEE!')</script>";
                                            echo "Error: " . $services_cat . "<br/>" . $con ->error;
                                            exit;
                                        }
                                        else
                                        {
                                            while($services=mysqli_fetch_array($run_services_cat))
                                            {
                                                $services_categories = $services['cat_title'];
                                                echo "<li><a href='#'>$services_categories</a></li>";
                                            }
                                            
                                        }
                                    ?>
                                  </ul>
                                </li>


                              </ul>
                            </li>

                            <li><a href="#"><img src="img/hot.png"> Top Selection</a></li>
                            <li><a href="#"><img src="img/hot.png"> Flash Sales</a></li>
                            <li><a href="shop.php"> Shop Now</a></li>
                            <li><a href="registration.php"> Sell on Chirowa</a></li>
                            <li><a href="#">Docs</a></li>
                        
                        
                        </ul>
                    </nav>

            </div>


            </div>
        </div>
    </div> <!-- End mainmenu area -->


    






    <div class="single-product-area" style="margin-top:-30px;">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar" style="height:318px;">
                        <img src="<?php echo $company_logo; ?>">
                        <p style="text-align:left; margin-left:10px;">
                            <a id="avatar" title='Click here to change profile picture.' 
                        href='#' style="width:50%; margin:0 auto; margin-top:10px;"><?php echo $upload_link_text; ?> 
                            </a>
                            <a title='Click here to edit.' href='#' style="width:50%; margin:0 auto; margin-top:10px;">
                                <span class="glyphicon glyphicon-eye-open"></span> manage products
                            </a>
                        </p>
                        
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">

                            <div style="overflow-x:auto;">
                                <table id="business_details">
                                <tr>
                                    <td id="pimp" width="30%">
                                    </td>
                                    <td>
                                        <h3><?php echo $business_name; ?></h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td id="pimp" width="30%" align="right" style="color:#919090;">
                                        Forte:
                                    </td>
                                    <td id="pimp">
                                        <?php echo $bus_desc; ?> 
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right"><i class="fa fa-phone" style="font-size:18px; color:#919090;"></i>
                                    </td>
                                    <td>
                                        <?php echo $phone; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">
                                        <i class="fa fa-envelope" style="font-size:18px; color:#919090;"></i>
                                    </td>
                                    <td>
                                        <a id="bus_email" href="#">
                                            <?php echo $business_email; ?>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right"><i class="fa fa-map-marker" style="font-size:18px; color:#919090;"></i>
                                    </td>
                                    <td>
                                        <?php echo $bus_location; ?>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td align="right" style="color:#919090;">
                                        Verification Status:
                                    </td>
                                    <td>
                                        <?php
                                            if($verification_status == "NO")
                                            {
                                                ?>
                                                    <div id="not_verified">
                                                        <i class='fa fa-info-circle'></i> Pending
                                                    </div>
                                                <?php 
                                            }
                                            if($verification_status == "YES")
                                            {
                                                ?>
                                                    <div id="verified" style="color: #0C9C1B;">
                                                        <i class='fa fa-check-circle'></i> Verified
                                                    </div>
                                                <?php
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">
                                        
                                    </td>
                                    <td>
                                        <a href="edit_profile.php" id="edit" style="font-family:raleway;"><i class="fa fa-edit"></i> Edit Account Details
                                        </button>
                                    </td>
                                </tr>
                            </table>
                            </div>

                            

                            











                        </div>                       
                    </div>                    
                </div>
            </div>
        </div>
    </div>




    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center" style="border-top:1px solid #ccc;">
                        <h3>
                           <i class="fa fa-cogs"></i> Manage Account<hr>
                        </h3>

                        <ul class="manage_account">
                            <li>
                                <button id="manage" style="text-align:center;">
                                    <i class="fa fa-edit" style="font-size:40px;"></i><br>
                                    Change A/C Password
                                </button>
                            </li>
                            
                            <li>
                                <a href="upload_product.php">
                                <button id="manage" style="text-align:center;">
                                    <i class="fa fa-upload" style="font-size:40px;"></i><br>
                                     Upload Product/Service
                                </button>
                                </a>
                            </li>


                        </ul>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div><br><br>


    







    <div class="footer-top-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2><span>Chiro</span>Wa</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
                        <div class="footer-social">
                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">User Navigation </h2>
                        <ul>
                            <li><a href="my_account.php">My account</a></li>
                            <li><a href="">Order history</a></li>
                            <li><a href="">Wishlist</a></li>
                            <li><a href="">Vendor contact</a></li>
                            <li><a href="index.php">Front page</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Categories</h2>
                        <ul>
                            <li><a href="">Mobile Phone</a></li>
                            <li><a href="">Home accesseries</a></li>
                            <li><a href="">LED TV</a></li>
                            <li><a href="">Computer</a></li>
                            <li><a href="">Gadets</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Newsletter</h2>
                        <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                        <div class="newsletter-form">
                            <input type="email" placeholder="Type your email">
                            <input type="submit" value="Subscribe">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2018 Chirowa. All Rights Reserved. <a href="#" target="_blank">Crimsoft IT Solutions</a></p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="js/main.js"></script>






    <!-- Slider -->
    <script type="text/javascript" src="js/bxslider.min.js"></script>
    <script type="text/javascript" src="js/script.slider.js"></script>

    <!-- jQuery -->
    <script type="text/javascript" src="libs/jquery/jquery.js"></script>

    <!-- SmartMenus jQuery plugin -->
    <script type="text/javascript" src="jquery.smartmenus.js"></script>


    <!-- login modal script source -->
    <script type="text/javascript" src="login_modal.js"></script>




    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



    <!-- SmartMenus jQuery plugin -->
    <script type="text/javascript" src="jquery.smartmenus.js"></script>

    <!-- SmartMenus jQuery init -->
    <script type="text/javascript">
        $(function() {
            $('#main-menu').smartmenus({
                subMenusSubOffsetX: 1,
                subMenusSubOffsetY: -8
            });
        });
    </script>


  </body>
</html>