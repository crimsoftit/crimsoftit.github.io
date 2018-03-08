
<?php

	session_start();

	require_once 'connection.php';

  	error_reporting( ~E_NOTICE );



	if(isset($_POST['login']))
	{
		$email = $_POST['lg_email'];
		$pass = $_POST['lg_password'];
		$sql = "select * from admin_reg where email like '$email' and password like '$pass'";
		$run_sql = mysqli_query($con, $sql);
		if(!$run_sql)
		{
			echo "Error! " . $sql . "<br/>" . $con ->error;
			exit;
		}
		else
		{
			if(mysqli_num_rows($run_sql) > 0)
			{
				$_SESSION['email'] = $email;
				$successMSG = "Login Successful!";
				header("refresh:5; index.php");
			}
			else
			{
				$errMSG = "Invalid email or password...";
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
<!-- LOGIN FORM -->
<div class="text-center">
	<div class="logo" style="margin-left:13%;">User Login</div>
	<!-- Main Form -->
	<div class="login-form-1">
		<form id="login-form" method="post" enctype="multipart/form-data" class="text-left">
			<div class="login-form-main-message"></div>
			<div class="main-login-form">
				<div class="login-group">
					<div class="form-group">
						<label for="lg_username" class="sr-only">Email</label>
						<input type="text" class="form-control" id="lg_email" name="lg_email" placeholder="email" required>
					</div>
					<div class="form-group">
						<label for="lg_password" class="sr-only">Password</label>
						<input type="password" class="form-control" id="lg_password" name="lg_password" placeholder="password" required>
					</div>
					<div class="form-group login-group-checkbox">
						<input type="checkbox" id="lg_remember" name="lg_remember">
						<label for="lg_remember">remember</label>
					</div>
				</div>
				<button type="submit" name="login" class="login-button"><i class="fa fa-chevron-right"></i></button>
			</div>
			<div class="etc-login-form" style="text-align:right;">
				<p>new user? <a href="signup.php">create new account</a></p>

				<a class="btn btn-default" style ="color:orange; padding:10 10; font-family:andalus; font-size:16px; font-weight:bold;" href="index.php" onclick="return confirm('Do you want to leave this page?')">Go Back to Home Page?</a>

			</div>
		</form>
	</div>
	<!-- end:Main Form -->
</div>



</div>
</body>
</html>


