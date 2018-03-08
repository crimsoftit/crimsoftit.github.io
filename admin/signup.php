<?php

  session_start();

  require_once 'connection.php';

  error_reporting( ~E_NOTICE );


  if(isset($_POST['signup']))
  {
    //validate full name
    $name = $_POST['reg_username'];
    if(!preg_match("/^[a-zA-Z ]*$/",$name))
    {
      $errMSG = "Only letters and white space allowed for full name";
    }

    //validate email address
    $email = $_POST['reg_email'];
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
      $errMSG = "Invalid email format";
    }

    //confirm if passwords match
    $password = $_POST['reg_password'];
    $c_password = $_POST['reg_password_confirm'];
    if($password != $c_password)
    {
      $errMSG = "Passwords do not match!";
    }

    //validate agree with terms checkbox
    $agree = $_POST['reg_agree'];
    if(!isset($agree))
    {
      $errMSG = "Agree with terms to proceed!";
    }

    //check if email is already registered
    $check_email = "select * from register where email like '$email'";
    $run_check_email = mysqli_query($con, $check_email);
    if(!$run_check_email)
    {
      $errMSG = "Error: " . $sku . $con ->error;
      exit;
    }
    else
    {
      if(mysqli_num_rows($run_check_email) > 0)
      {
        $errMSG = "sorry, this email address has already been taken...";
      }
    }


    //if no error occured, submit form
    if(!isset($errMSG))    
    {
      $stmt = $DB_con->prepare('insert into register(name, email, password) 
                                             values(:u_name, :u_email, :u_pass)');
      $stmt->bindParam(':u_name', $name);
      $stmt->bindParam(':u_email', $email);
      $stmt->bindParam(':u_pass', $password);
      if($stmt->execute())
      {          
        $successMSG = "Congrats. Registration successful...";
        $_SESSION['email'] = $email;
        header("refresh:5; index.php");
      }
      else
      {
        $errMSG = "Oops! Registration NOT Successful!";
      }
    }
  }

?>





<html lang="en">

<head>

<!-- All the files that are required -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<script src="js/js.js"></script>



<title>User Registration</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
<link rel = "stylesheet" href = "styles/style.css" media = "all" />




<link rel = "stylesheet" href = "styles/lg_css.css" media = "all" />




</head>

<body>


<?php
  if(isset($errMSG)){
      ?>
        <div class="alert alert-danger" style="text-align:center; width:40%; margin:auto;">
              <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
  }
  else if(isset($successMSG)){
    ?>
        <div class="alert alert-success" style="text-align:center; width:40%; margin:auto;">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
  }
  ?>

<!-- Where all the magic happens -->


<!-- REGISTRATION FORM -->
<div class="text-center" style="margin:auto; width:70%; padding:50px 0">
	<div class="logo" style="margin:auto;">Sign Up</div>
	<!-- Main Form -->
	<div class="login-form-1">
		<form id="register-form" class="text-left" method="POST" enctype="multipart/form-data">
			<div class="login-form-main-message"></div>
			<div class="main-login-form">
				<div class="login-group">

					<div class="form-group">
						<input type="text" class="form-control" id="reg_username" name="reg_username" placeholder="Full name" value="<?php echo $name; ?>" required>
					</div>
          <div class="form-group">
            <input type="text" class="form-control" id="reg_email" name="reg_email" placeholder="email" value="<?php echo $email; ?>" required>
          </div>
					<div class="form-group">
						<input type="password" class="form-control" id="reg_password" name="reg_password" placeholder="password" value="<?php echo $password; ?>" required>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="reg_password_confirm" name="reg_password_confirm" placeholder="confirm password" value="<?php echo $c_password; ?>" required>
					</div>					
					<div class="form-group login-group-checkbox">
						<br><input type="checkbox" id="reg_agree" name="reg_agree">
						<label for="reg_agree">i agree with <a href="#">terms</a></label>
					</div>
				</div>
				<button type="submit" name="signup" class="login-button"><i class="fa fa-chevron-right"></i></button>
			</div>
			<div class="etc-login-form" style="text-align:right;">
				<p>already have an account? <a href="u_login.php">login here</a></p>

        <br>
        <a class="btn btn-default" style ="color:orange; padding:10 10; font-family:andalus; font-size:16px; font-weight:bold;" href="index.php" onclick="return confirm('Do you want to leave this page?')">Go Back to Home Page?</a>


			</div>
		</form>
	</div>
	<!-- end:Main Form -->
</div>


</div>
</body>
</html>

