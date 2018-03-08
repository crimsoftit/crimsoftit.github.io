<?php
    error_reporting( ~E_NOTICE );
    

    session_start();
    include_once("connection.php");
    include("login.php");
    include_once("functions.php");
    global $con;


    $name = $email = $phone = $location = $p_desc = "";
    
    


    // define variables and set to empty values

    if(isset($_POST['register']))
    {
        $name               = test_input($_POST["company"]);
        $email              = test_input($_POST["email"]);
        $phone              = test_input($_POST["phone"]);
        $age                = test_input($_POST["bus_age"]);
        $location           = test_input($_POST["location"]);
        $p_desc             = test_input($_POST["pro_desc"]);
        $pass               = test_input($_POST["account_password"]);
        $confirm_pass       = test_input($_POST["confirm_password"]);







        $target_dir = "prof_pics/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) 
        {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        }
        else 
        {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) 
        {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) 
        {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) 
        {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }














        //validate company/business name
        if (!preg_match("/^[a-zA-Z ]+$/", $name)) 
        {
            $nameErr = "*Only letters and white space allowed for business/company name"; 
            $error = "error";
        } 



        //validate email address and check if it has already been registered to the database
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
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
                $emailErr = "*Sorry, this email address has already been registered"; 
                $error = "error";
            }
        }




        //validate phone no. and check if it exists in the database
        if (!preg_match("/^(\(?\+?[0-9]*\)?)?[0-9_\- \(\)]*$/", $phone))
        {
            $phoneErr = "*Invalid phone number format"; 
            $error = "error";
        }
        if ((strlen($phone) < 10) && (strlen($phone) > 13))
        {
            $phoneErr = "*Invalid phone number(too short)"; 
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
                $phoneErr = "*Sorry, this phone number has already been registered"; 
                $error = "error";
            }
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




        //check if passwords match
        if($pass != $confirm_pass)
        {
            $passErr = "Passwords Do NOT Match";
            $error = "error";
        }

    


        //upload profile picture and insert data into the database
        if(!isset($error))
        {






            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) 
            {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } 
            else 
            {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
                {
                    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                }             
                else 
                {
                    echo "Sorry, there was an error uploading your file.";
                }






            $insert = "insert into client_profile (bus_name, email, cell_phone, bus_logo, bus_age, location, bus_desc, password, verified)
                                            values('$name','$email','$phone','$p_pic', '$age','$location','$p_desc','$pass','NO')";
            $run_insert = mysqli_query($con, $insert);
            if(!$run_insert)
            {
                $errMsg = "Error: " . $insert . $con ->error;
                exit;
            }
            else
            {
                $successMsg = "Business Registration Successful!";
                $_SESSION['email'] = $email;
                ?>
                    <script type="text/javascript">
                        document.getElementById("success").style.visibility = "visible";
                        document.getElementById("success").style.color = "green";
                    </script>
                <?php
                echo "<script>window.open('my_account.php', '_self')</script>";
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
    <title>Register Your Business</title>
    
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


    <!-- CSS FILE LINK FOR LOGIN POPUP MODAL -->
    <link rel="stylesheet" type="text/css" href="login.css">



    <!-- SmartMenus core CSS (required) -->
    <link href="css/sm-core-css.css" rel="stylesheet" type="text/css" />

    <!-- "sm-blue" menu theme (optional, you can use your own CSS, too) -->
    <link href="css/sm-blue/sm-blue.css" rel="stylesheet" type="text/css" />




    <style type="text/css">
        #reach_customers
        {
            font-style: oblique;
            font-size: 18px;
            color: #FFAF33;
        }
        #message
        {
            width: 90%;
            margin: 0;
            text-align: center;
        }
        #error
        {
            border: 1px solid #dddddd;
            position: absolute;
            background: #FF5733;
            color: white;
            width: 92.5%;
            margin-bottom: 10px;
            text-align: center;
            padding: 5px;
            z-index: 999;
            box-sizing: border-box;
            -moz-box-sizing: border-box; /*Firefox 1-3*/
            -webkit-box-sizing: border-box; /* Safari */
        }

        #success 
        {
            border: 1px solid #dddddd;
            position: absolute;
            background: #3380FF;
            color: white;
            width: 92.5%;
            margin-bottom: 10px;
            text-align: center;
            padding: 5px;
            z-index: 999;
            box-sizing: border-box;
            -moz-box-sizing: border-box; /*Firefox 1-3*/
            -webkit-box-sizing: border-box; /* Safari */
        }
    </style>

    <!-- jQuery referencing -->
    <script src="jquery-3.3.1.js"></script>

    <script type="text/javascript">
        document.getElementById("success").style.visibility = "hidden";




    </script>

    <!-- custom javascript -->


    <script type="text/javascript">
    function topFunction() 
    {
        document.documentElement.scrollTop = 100px; // For Chrome, Firefox, IE and Opera
    }

    function hideNameError(nameField)
    {
        document.getElementById("name_error").style.visibility = "hidden";
        document.getElementById("error").style.visibility = "hidden";
    }

    function hideEmailError(emailField)
    {
        document.getElementById("email_error").style.visibility = "hidden";
        document.getElementById("error").style.visibility = "hidden";
    }

    function hidePhoneError(phoneField)
    {
        document.getElementById("phone_error").style.visibility = "hidden";
        document.getElementById("error").style.visibility = "hidden";
    }

    function hideLocationError(locationField)
    {
        document.getElementById("location_error").style.visibility = "hidden";
        document.getElementById("error").style.visibility = "hidden";
    }

    function hideDescError(descField)
    {
        document.getElementById("pro_desc_error").style.visibility = "hidden";
        document.getElementById("error").style.visibility = "hidden";
    }

</script>

   

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body style="font-family: cambria;">








   
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="my_account.php"><i class="fa fa-user"></i> My Account</a></li>

                            <?php
                                if(isset($_SESSION['email']))
                                {
                                    ?>
                                        <li><a href="logout.php?c_url=registration.php"><i class="fa fa-user"></i> Logout</a></li>
                                    <?php

                                }
                                else
                                {
                                    ?>
                                        <li><a href="#" onclick="document.getElementById('id01').style.display='block'"><i class="fa fa-user"></i> Login</a></li>
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




    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="" id="form">
                            <input type="text" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Products</h2>
                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$100.00</del>
                            </div>                             
                        </div>
                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$100.00</del>
                            </div>                             
                        </div>
                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Services</h2>
                        <ul>
                            <li><a href="single-product.html">Sony Smart TV - 2015</a></li>
                            <li><a href="single-product.html">Sony Smart TV - 2015</a></li>
                            <li><a href="single-product.html">Sony Smart TV - 2015</a></li>
                            <li><a href="single-product.html">Sony Smart TV - 2015</a></li>
                            <li><a href="single-product.html">Sony Smart TV - 2015</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">

                            <div id="message">
                                    <?php
                                        if(isset($successMsg))
                                        {
                                            ?>
                                                <table id="success">
                                                    <tr>
                                                        <td align="right" width="28%">
                                                            <i class="fa fa-check-square-o" style="font-size:48px; color:white;"></i>
                                                        </td>
                                                        <td align = "left" width="72%">
                                                            <a href="#" style="color:white; font-family:maiandra GD; font-size:18px;">
                                                                <?php
                                                                        echo $successMsg; 
                                                                ?>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    
                                                </table><br/>
                                            <?php

                                        }

                                        if(isset($error))
                                        {
                                            ?>
                                                <table id="error">
                                                    <tr>
                                                        <td align="right" width="28%">
                                                            <i class='material-icons' style='font-size:48px;color:white;'>error_outline</i>
                                                        </td>
                                                        <td align = "left" width="72%">
                                                            <a href="#" style="color:white; font-family:maiandra GD; font-size:18px;">
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
                                                        </td>
                                                    </tr>
                                                    
                                                </table><br/>
                                            <?php
                                        }
                                    ?>
                                </div>






                                <!-- LOGIN FORM BEGINS HERE -->
                                <form method="post" action="#">
                                    <table width="80%;">
                                        <tr>
                                            <td><label for="username">Email <span class="       required">*</span>
                                                </label>
                                            </td>
                                            <td>
                                                <input type="text" id="username" name="username" class="input-text" style="width:100%;" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="password">Password <span class="required">*</span>
                                                </label>
                                            </td>
                                            <td>
                                                <input type="password" id="password" name="password" class="input-text" style="width:100%;" required>
                                                <div class="clear"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="right">
                                                <label class="inline" for="rememberme"><input type="checkbox" value="forever" id="rememberme" name="rememberme"> Remember me </label>
                                                <input type="submit" value="Login" name="login" class="button">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="right">
                                                <p class="lost_password" style="color:#FF5733;">
                                                    <a href="#">Lost your password?</a>
                                                </p>
                                            </td>
                                        </tr>
                                    </table>
                                

                                <div class="clear"></div>
                            </form>
                            <!-- LOGIN FORM ENDS HERE -->









                            <div class="woocommerce-info">Dont have an Account? <a class="showlogin" data-toggle="collapse" href="#reg-form-wrap" aria-expanded="false" aria-controls="reg-form-wrap">Click here to sign up</a>
                            </div>

                            


                            <!-- BUSINESS REGISTRATION FORM BEGINS HERE -->
                            <form method="post" class="reg collapse" id="reg-form-wrap" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">

                                <div id="customer_details" class="col2-set">
                                    <div class="col-1">
                                        <div class="woocommerce-billing-fields">

                                            <h3>Fill out your details below:</h3>

                                            <p id="name_field" class="form-row form-row-wide">
                                                <label class="" for="company_name">Company/Business Name</label>
                                                <input type="text" value="<?php echo $name; ?>" placeholder="Company/Business Name" id="company_name" name="company" class="c_name" onfocus="hideNameError(this.id);" required>
                                                <span class="error" id="name_error"><?php echo $nameErr;?></span>
                                            </p>
                                            <div class="clear"></div>

                                            <p id="email_field" class="form-row form-row-first validate-required validate-email">
                                                <label class="" for="company_email">Email Address <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="<?php echo $email; ?>" placeholder="Email Address" id="company_email" name="email" class="input-text" onfocus="hideEmailError(this.id);" required>
                                                <span class="error" id="email_error"><?php echo $emailErr;?></span>
                                            </p>
                                            <div class="clear"></div>

                                            <p id="phone_field" class="form-row form-row-last validate-required validate-phone">
                                                <label class="" for="company_phone">Phone Number<abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="<?php echo $phone; ?>" placeholder="eg. 0700000000" id="company_phone" name="phone" class="input-text"  onfocus="hidePhoneError(this.id);" required>
                                                <span class="error" id="phone_error"><?php echo $phoneErr;?></span>
                                            </p>
                                            <div class="clear"></div>

                                            <p id="prof_pic_field" class="form-row form-row-last validate-required validate-prof_pic">
                                                <label class="" for="prof_pic">Profile Picture(optional)<abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="file" name="fileToUpload" id="fileToUpload">
                                                <span class="error" id="file_error"></span>
                                            </p>
                                            <div class="clear"></div>

                                            <p id="bizage_field" class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated">
                                                <label >Years in Business<abbr title="required" class="required">*</abbr>
                                                </label>
                                                <select class="country_to_state country_select" id="company_age" name="bus_age">
                                                    <option value="1">1</option> 
                                                    <option value="2">2</option>
                                                    <option value="3">3</option> 
                                                    <option value="4">4</option>
                                                    <option value="5">5</option> 
                                                    <option value="6">6</option>
                                                </select>
                                            </p>

                                            <p id="location_field" class="form-row form-row-wide">
                                                <label class="" for="company_location">Business Location</label>
                                                <input type="text" value="<?php echo $location; ?>" placeholder="Company/Business Location" id="company_location" name="location" class="input-text" onfocus="hideLocationError(this.id);" required>
                                                <span class="error" id="location_error"><?php echo $locationErr;?></span>
                                            </p>
                                            <div class="clear"></div>

                                            <p id="desc_field" class="form-row form-row-wide">
                                                <label class="" for="pro_desc">What do you do/sell?</label>
                                                <textarea value="<?php echo $p_desc; ?>" placeholder="Describe your products/services" id="pro_desc" name="pro_desc" class="input-text" onfocus="hideDescError(this.id);" required></textarea>
                                                <span class="error" id="pro_desc_error"><?php echo $pro_descErr;?></span>
                                            </p>
                                            <div class="clear"></div>

                                            <div class="create-account">
                                                <p>Create an account by entering the information below. </p>
                                                <p id="account_password_field" class="form-row validate-required">
                                                    <label class="" for="account_password">Account password <abbr title="required" class="required">*</abbr>
                                                    </label>
                                                    <input type="password" value="" placeholder="Password" id="u_password" name="account_password" class="input-text" required>
                                                    <label class="" for="account_password">Confirm password <abbr title="required" class="required">*</abbr>
                                                    </label>
                                                    <input type="password" value="" placeholder="Confirm Password" id="confirm_password" name="confirm_password" class="input-text" required>
                                                </p>
                                                <div class="clear"></div>
                                            </div>

                                            <div class="form-row place-order">

                                            <input type="submit" data-value="Submit" value="Register" name="register" id = "submit_btn" class="button alt" onclick="topFunction()">


                                        </div>

                                        <div class="clear"></div>
                                        </div>
                                    </div>

                                    

                                </div>
                            </form>

                            <p id="error_para" ></p>
                            <!-- BUSINESS REGISTRATION FORM ENDS HERE -->




                        </div>                       
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

    <!-- jQuery -->
    <script type="text/javascript" src="libs/jquery/jquery.js"></script>

    <!-- SmartMenus jQuery plugin -->
    <script type="text/javascript" src="jquery.smartmenus.js"></script>


    <!-- login modal script source -->
    <script type="text/javascript" src="login_modal.js"></script>



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