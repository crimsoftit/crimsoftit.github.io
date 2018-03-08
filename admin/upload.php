<?php
	session_start();

	require_once 'connection.php';

	if(!isset($_SESSION['email']))
	{
	    echo "<script>window.open('u_login.php','_self')</script>";
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
		<title>Upload File</title>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
		<link rel = "stylesheet" href = "styles/style.css" media = "all" />

		<style>
    
		    th, tr, td
			{
			    padding: 5px;
				text-align: left;
				border-left: 1px solid #ddd;
				font-family: cambria;
			}
			
			input[type=button],
			input[type=submit],
			input[type=reset]
			{
			    background-color: #4CAF50;
				border:none;
				color:white;
				padding: 5px 12px;
				text-decoration:none;
				margin: 4px 2px;
				cursor: pointer;
			}
		</style>

        <?php
			if(!empty($_POST))
			{

				
					if (file_exists("download/" . $_FILES["file"]["name"]))
					{
						$errMSG = "Sorry!! Filename Already Exists...";
					}
					else
					{
						move_uploaded_file($_FILES["file"]["tmp_name"],
						"download/" . $_FILES["file"]["name"]) ;
						$sql = "INSERT INTO presentation(subject,topic,file) VALUES ('" . $_POST["sub"] ."','" . $_POST["pre"] . "','" . 
							  $_FILES["file"]["name"] ."')";
						if (!mysqli_query($con, $sql))
						{
							echo('Error : ' . mysql_error());
						}
						else
						{
							$successMSG = "Thank You!! File was Successfully Uploaded";
							header("Refresh:5; index.php");
						}
					}
				
			}
        ?>
    </head>
     <body style = "font-family:cambria; font-size:16px;">


	<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
 
         <div class="navbar-header" >
            <a class="navbar-brand" style = "color:green;" href="index.php" title='https://www.africos.net16.net' >Crimsoft File Management System(Home)</a>
			
			
			
			
        </div>
 
    </div>
</div>


<div class="container">


	<div class="page-header">
    	<h3 class="h3">add a new file. <a class="btn btn-default" href="index.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; click to view all files</a>
		
		    <?php
			
			    if(!isset($_SESSION['email']))
				{
				
				    echo "<a class='btn btn-default' href='login.php' style = 'font-family:cambria; font-size:14px;'> login</a>";
				
				}
				else
				{
				
				     echo "<a class='btn btn-default' href='logout.php' style = 'font-family:cambria; font-size:14px;'> logout</a>";
				
				}
			
			?>
		
		</h3>
    </div>
    

	<?php
	if(isset($errMSG)){
	    ?>
            <div class="alert alert-danger" style="text-align:center;">
            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
    <?php
	}
	else if(isset($successMSG))
	{
		?>
        <div class="alert alert-success" style="text-align:center;">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
	}
	?> 

        <form class="form-horizontal" id="form3" enctype="multipart/form-data" method="post" action="upload.php">
             <table class="table table-bordered table-responsive">         	
                <tr align="left">
                    <td align="left"><label class="control-label">Title: </label></td>
                    <td><input class="form-control" type="text" name="sub" id="sub" required autofocus placeholder="Title"/>	</td>
                </tr>
                <tr>
                    <td><label class="control-label">File Format:</label></td>
                    <td><input class="form-control" type="text" name="pre" cols="50" rows="10" id="pre"  
					placeholder="File Format"
					class="input-medium" required></td>
                </tr>
                <tr>
                    <td><label class="control-label">Select File:</label></td>
                    <td><input class="form-control" type="file" name="file" id="file" 
                        title="Click here to select file to upload." required /></td>
                </tr>
                <tr>
					<td colspan="2" align="right">		    
						<button id="upload" type="submit" name="upload" class="btn btn-default" > 
							<span class="glyphicon glyphicon-upload"></span> &nbsp; upload file
						</button>
					</td>
                </tr>
            </table>
        </form>

<br>
<br>
	<!-- Latest compiled and minified JavaScript -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<div class="alert alert-info">
  	  <strong><a href = "index.php">Go to home page</a></strong>
	</div>
        
		</div>
    </body>
</html>
