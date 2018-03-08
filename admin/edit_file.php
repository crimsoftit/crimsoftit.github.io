<?php

	session_start();

	error_reporting( ~E_NOTICE );
	
	require_once 'connection.php';

	$id = $_GET['id'];
	global $con;


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
		<title>Edit File</title>
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

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Edit File</title>
    
        <?php
			if(!empty($_POST))
			{
				$subject = $_POST["sub"];
				$topic = $_POST["pre"];
				$file = $_FILES["file"]["name"];


				if (!$con)
					echo('Could not connect: ' . mysqli_error());
				else
				{
					if (file_exists("download/" . $_FILES["file"]["name"]))
					{
						$sql = "UPDATE presentation set subject = '$subject',
														topic = '$topic'
								where id like '$id'";
						if (!mysqli_query($con, $sql))
						{
							echo('Error : ' . mysqli_error());
						}
						else
						{
							$successMSG = "File was successfully updated";
							header("refresh:3; index.php");
						}
					}
					else
					{
						move_uploaded_file($_FILES["file"]["tmp_name"],
						"download/" . $_FILES["file"]["name"]) ;
						$sql = "UPDATE presentation set subject = '$subject',
														topic = '$topic',
														file = '$file'
								where id like '$id'";
						if (!mysqli_query($con, $sql))
							echo('Error : ' . mysqli_error());
						else
							$successMSG = "File was successfully updated";
							header("refresh:3; index.php");
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
    	<h3 class="h3">edit file. <a class="btn btn-default" href="index.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; click to view all files</a>
		
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





		<?php

			if(isset($_GET['id']) && !empty($_GET['id']))
			{
				
				$sql = "select * from presentation where id like '$id'";
				$run_sql = mysqli_query($con, $sql);
				if(!$run_sql)
				{
					echo "Error! " . $sql . "<br/>" . $con ->error;
					exit;
				}
				else
				{
					while($row_files = mysqli_fetch_array($run_sql))
					{
						$subject = $row_files['subject'];
						$topic = $row_files['topic'];
						$cur_file = $row_files['file'];
					}
				}
			}
			else
			{
			    echo "<script>alert('error!, edit_id not forwarded')</script>";
				header("Location: index.php");
			}
					
		?>





        <form id="form3" enctype="multipart/form-data" method="post">
             <table class="table table-bordered">         	
                <tr>
                    <td><label class="control-label"> Title: </label>	</td>
                    <td><input type="text" name="sub" value = "<?php echo $subject; ?>" id="sub" class="form-control"  
					         required autofocus placeholder="Title of the subject"/>
					</td>
                </tr>
                <tr>
                    <td valign="top" align="left"><label class="control-label">File Format:</label></td>
                    <td valign="top" align="left">
         	           <input type="text" name="pre" value = "<?php echo $topic; ?>"cols="50" rows="10" id="pre"  placeholder="File Format"
						class="form-control" required>
					</td>
                </tr>
                <tr>
                    <td><label class="control-label">File:</label></td>
                    <td><input class="form-control" type="file" name="file" id="file" 
                        title="Click here to select file to upload." /> &nbsp <?php echo $cur_file; ?></td>
                </tr>
                <tr align="right">
					<td colspan="2" align="right">		    
						<button id="upload" type="submit" name="upload" class="btn btn-default" > 
							<span class="glyphicon glyphicon-save"></span> &nbsp; Save Changes
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
