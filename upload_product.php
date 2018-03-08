<?php
    error_reporting( ~E_NOTICE );
    

    session_start();
    include_once("connection.php");
    include_once("functions.php");
    global $con;




    //GET ACCOUNT DETAILS FROM THE DATABASE
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
        $u_email = $_SESSION['email'];

        //get profile details from the database
        $sql = "select * from client_profile where email like '$u_email'";
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
                $cell_phone             = $details['cell_phone'];
                $business_age           = $details['bus_age'];
                $bus_desc               = $details['bus_desc'];
                $bus_location           = $details['location'];
                $verification_status    = $details['verified'];
                $business_logo          = "prof_pics/" . $details['bus_logo'];

                if(empty($business_logo))
                {
                    $business_logo       = "img/avatar.png";
                }
                else
                {
                    $business_logo       = "prof_pics/" . $details['bus_logo'];
                }

                
            }
        }
    }
    





    // UPLOAD PRODUCT
    if(isset($_POST['update']))
    {
        $name          = test_input($_POST["company"]);
        $email         = test_input($_POST["email"]);
        $phone         = test_input($_POST["phone"]);
        $age           = test_input($_POST["bus_age"]);
        $location      = test_input($_POST["location"]);
        $p_desc        = test_input($_POST["pro_desc"]);
        $pass          = test_input($_POST["account_password"]);
        $confirm_pass  = test_input($_POST["confirm_password"]);


        $business_name  = $name;
        $business_email = $email;
        $cell_phone     = $phone;
        $business_age   = $age;
        $bus_location   = $location;
        $bus_desc       = $p_desc;




        //validate email address and check if it has already been registered to the database
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $business_email = test_input($_POST["email"]);
            $emailErr = "*Invalid email format"; 
            $error = "error";
        }

        $check_email = "select * from client_profile where email like '$email'";
        $run_check_email = mysqli_query($con, $check_email);
        if (!$run_check_email)
        {
            $errMsg = "Error: " . $check_email . $con ->error;
            $error = "error";
        }
        else
        {
            if(mysqli_num_rows($run_check_email) >= 1)
            {
                if($email != $business_email)
                {
                    $business_email = test_input($_POST["email"]);
                    $emailErr = "*Sorry, this email address has already been registered"; 
                    $error = "error";
                }
                
            }
        }




        //validate phone no. and check if it exists in the database
        if (!preg_match("/^(\(?\+?[0-9]*\)?)?[0-9_\- \(\)]*$/", $phone))
        {
            $cell_phone = test_input($_POST["phone"]);
            $phoneErr = "*Invalid phone number format"; 
            $error = "error";
        }
        if (strlen($phone) < 10)
        {
            $cell_phone = test_input($_POST["phone"]);
            $phoneErr = "*Invalid phone number (too short)"; 
            $error = "error";
        }
        if (strlen($phone) > 13)
        {
            $cell_phone = test_input($_POST["phone"]);
            $phoneErr = "*Invalid phone number (too long)"; 
            $error = "error";
        }

        $check_phone = "select * from client_profile where cell_phone like '$phone'";
        $run_check_phone = mysqli_query($con, $check_phone);
        if (!$run_check_phone)
        {
            $errMsg = "Error: " . $check_phone . $con ->error;
            exit;
        }
        else
        {
            if(mysqli_num_rows($run_check_phone) >= 1)
            {
                if($phone != $cell_phone)
                {
                    $cell_phone = test_input($_POST["phone"]);
                    $phoneErr = "*Sorry, this phone number has already been registered"; 
                    $error = "error";
                }
                
            }
        }

        //validate business age
        if(!is_numeric($age))
        {
            $business_age = test_input($_POST["bus_age"]);
            $ageErr = "*invalid entry for yrs in business";
            $error = "error";
        }


        //validate business location
        if (!preg_match("/^\w+$/", $location))
        {
            $locationErr = "*invalid entry for business location";
            $error = "error";
        }




        //validate product description
        if (strlen($p_desc) < 5)
        {
            $pro_descErr = "*Product/Service description is too short";
            $error = "error";
        }
        if(!preg_match("/^[a-zA-Z ]+$/", $p_desc))
        {
            $pro_descErr = "*Only letters and white space allowed for product/service description";
            $error = "error";
        }




        //update account details
        if(!isset($error))
        {
            
            $update = "update client_profile  set bus_name      = '$name',
                                                    email       = '$email',
                                                    cell_phone  = '$phone',
                                                    bus_age     = '$age', 
                                                    location    = '$location',
                                                    bus_desc    = '$p_desc'
                                            where email like '$u_email'";
            $run_update = mysqli_query($con, $update);
            if(!$run_update)
            {
                echo "Error: " . $update . $con ->error;
                exit;
            }
            else
            {
                $successMsg = "Account details SUCCESSFULLY updated!";
                $_SESSION['email'] = $email;
                header("Refresh:1; url=my_account.php");
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
    <title>CHIROWA | UPLOAD PRODUCT/SERVICE</title>



    <!-- jQuery -->
    <script type="text/javascript" src="libs/jquery/jquery.js"></script>

    


    <!-- login modal script source -->
    <script type="text/javascript" src="login_modal.js"></script>




    
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







    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>











    <!-- jQuery referencing -->
    <script src="jquery-3.3.1.js"></script>


    <!-- custom javascript -->

    <style type="text/css">
        #success
        {
            background: #0C9C1B;
            color: white;
            width: 60%;
            margin: 0 auto;
            text-align: center;
            padding: 15px;
            z-index: 999;
            box-sizing: border-box;
            border-radius: 5px;
            -moz-box-sizing: border-box; /*Firefox 1-3*/
            -webkit-box-sizing: border-box; /* Safari */
        }
        .upload_label
        {
            color: #18AAE7;
            font-weight: 400;
        }
    </style>



   

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body style="font-family:raleway; background:#FBFBFB;">



    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="#">Hi, Welcome to Chirowa Kenya</a></li>
                            


                            <?php
                                if(isset($_SESSION['email']))
                                {
                                    ?>
                                        <li><a href="logout.php?c_url=registration.php"><i class="fa fa-user"></i> Logout</a></li>
                                    <?php

                                }
                            ?>



                            <li><a href="my_account.php"><i class="fa fa-user"></i> My Account</a></li>
                            <li><a href="#"><i class="fa fa-heart"></i> Wishlist</a></li>
                            <li><a href="cart.php"><i class="fa fa-user"></i> My Cart</a></li>
                            <li><a href="checkout.php"><i class="fa fa-user"></i> Checkout</a></li>
                            
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">currency :</span><span class="value">Kshs. </span></a>
                                
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









        <div class="container" style="margin-top:10px;">
            <div class="row">
                
                <div class="">
                    <div class="product-content-right">
                        <div class="woocommerce" >

                            <div id="message">
                                    <?php
                                        
                                        if(isset($error))
                                        {
                                            ?>

                                            <script>
                                                $(document).ready(function()
                                                {
                                                    $('#user_login').hide()
                                                    $("#error")[0].scrollIntoView(
                                                        {
                                                            behavior: "smooth", // or "auto" or "instant"
                                                            block: "start" // or "end"
                                                        });
                                                });
                                            </script>





                                                <div id="error">
                                                    
                                                    <i class="fa fa-exclamation-circle" style='font-size:28px; color:white;'></i>
                                                    <a href="#" style="color:white; font-size:18px;">
                                                        <?php 
                                                            if(isset($passErr))
                                                            {
                                                                echo $passErr; 
                                                            }
                                                            else
                                                            {
                                                                echo "You have keyed in one or more invalid entries";
                                                            }
                                                        ?></a>
                                                </div><br/>
                                            <?php
                                        }
                                        else if($successMsg)
                                        {
                                            ?>
                                            <div id="success">
                                                    
                                                    <i class="fa fa-check-circle" style='font-size:28px; color:white;'></i>
                                                    <a href="#" style="color:white; font-size:18px;">
                                                        <?php 
                                                            echo $successMsg; 
                                                            
                                                        ?></a>
                                                </div><br/>
                                                <?php
                                        }
                                    ?>
                                </div>





                                
                                        
                                    

                                    <div class="clear"></div>
                                </form>
                                






                                <div class="woocommerce-info"  style="border-radius:10px; margin-bottom:5px;">
                                    <button class="showlogin" href="">
                                        Upload product
                                    </button> 
                                </div>

                            </div>
                            <!-- LOGIN FORM ENDS HERE -->



                            








                            



                            


                            <!-- PROFILE EDIT FORM BEGINS HERE -->
                            <form method="post" id="reg-form-wrap" style="border-radius:10px;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">

                                <div id="customer_details" class="col2-set">
                                    <div class="">
                                        <div class="woocommerce-billing-fields">

                                            <table cellspacing="30" style="width:50%; margin:0 auto; margin-top: 10px;">
                                                
                                                <tr>
                                                    <td width="30%" style="font-weight:200;">
                                                        <label class="upload_label" for="company_name">
                                                            Product Name &nbsp;
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <span class="error" id="name_error"><?php echo $nameErr;?></span>
                                                        <input type="text" value="" placeholder="Company/Business Name" id="p_name" name="p_name" class="c_name" onfocus="hideNameError(this.id);" required />
                                                        <div class="clear"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="upload_label" for="company_email">
                                                            Email Address &nbsp;
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <span class="error" id="email_error"><?php echo $emailErr;?></span>
                                                        <input type="text" value="" placeholder="Email Address" id="company_email" name="email" class="input-text" onfocus="hideEmailError(this.id);" required />
                                                        
                                                        <div class="clear"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="upload_label" for="company_phone">Product Category &nbsp;
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <span class="error" id="phone_error"><?php echo $phoneErr;?></span>
                                                        <select name="category_list" class="input-text">


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
                                                                        echo "<option>$good_categories</option>";
                                                                    }
                                                                        ?>

                                                                        <a href="#" data-toggle="collapse" data-target="#demo">
                                                                            <option value="Other">Other</option></a>

                                                                        <div id="demo" class="collapse">
                                                                            Lorem ipsum dolor text....
                                                                        </div>

                                                                    <?php
                                                                }
                                                            ?>



                                                        </select>
                                                        
                                                        <div class="clear"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label >Years in Business &nbsp; </label>
                                                    </td>
                                                    <td>
                                                        <span class="error" id="location_error"><?php echo $ageErr;?></span>
                                                        <input list="numbers" type="text" value="<?php echo $business_age; ?>" placeholder="years in business" id="company_age" name="bus_age" class="input-text" required>
                                                        <datalist id="numbers">
                                                          <option value="1">
                                                          <option value="2">
                                                          <option value="3">
                                                          <option value="4">
                                                          <option value="5">
                                                        </datalist>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="" for="business_location">
                                                            Business Location 
                                                            &nbsp;
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <span class="error" id="location_error"><?php echo $locationErr;?></span>
                                                        <input type="text" value="<?php echo $bus_location; ?>" placeholder="Company/Business Location" id="company_location" name="location" class="input-text" onfocus="hideLocationError(this.id);" required>
                                                        
                                                        <div class="clear"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="" for="pro_desc">
                                                            What do you do/sell?
                                                            &nbsp;
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <span class="error" id="pro_desc_error"><?php echo $pro_descErr;?></span>
                                                        <div class="clear"></div>
                                                        <input type="text" name="pro_desc" class="input-text" placeholder="Describe your products/services" id="pro_desc"  onfocus="hideDescError(this.id);" value="<?php echo $bus_desc; ?>" required>
                                                        
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <td colspan="2" align="right">
                                                        <input type="submit" class="manu" data-value="Submit" value="Update" name="update" id = "submit_btn">
                                                        <div class="clear"></div>
                                                    </td>
                                                </tr>
                                            </table>

                                        
                                        </div>
                                    </div>

                                    

                                </div>





                            </form>

                            <p id="error_para" ></p>
                            <!-- PROFILE EDIT FORM ENDS HERE -->




                        </div>                       
                    </div>                    
                </div>
            </div>
        </div>


    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
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
                            <li><a href="">My account</a></li>
                            <li><a href="">Order history</a></li>
                            <li><a href="">Wishlist</a></li>
                            <li><a href="">Vendor contact</a></li>
                            <li><a href="">Front page</a></li>
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