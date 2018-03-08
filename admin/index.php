<?php
	session_start();
	require_once 'connection.php';
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
		<title>ADMIN | HOME</title>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
		<link rel = "stylesheet" href = "styles/style.css" media = "all" />


		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<style>
    
		    th, tr, td
			{
			    padding: 5px;
				text-align: center;
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

	</head>





<body style="font-family: cambria;">

	<div class="navbar navbar-default navbar-static-top" role="navigation">
	    <div class="container">
 
    	    <div class="navbar-header" >
            <a class="navbar-brand" style = "color:green;" href="index.php" >Dashboard</a>
			<a class="navbar-brand" href="index.php" title='Manage Products'>Manage Products</a>
			<a class="navbar-brand" href="view_all_categories.php" title='Manage Brands'>Manage Categories</a>
			<a class="navbar-brand" href="view_all_customers.php" title='Manage Customers'>Manage Customers</a>
        	</div>
			<!--end of div id navbar-header -->

   		</div>
	</div>

	<br/>




	<div class="container">

		<div class="page-header">
    		<h1 class="h2">Registered Businesses | Dashboard. / 
		    	<a class='btn btn-default' href="upload.php"><span class="glyphicon glyphicon-plus"></span> click to add a merchant</a>
			<?php
			
			    if(!isset($_SESSION['email']))
				{
				
				    echo "<a class='btn btn-default' href='u_login.php' style = 'font-family:cambria; font-size:14px;'> login</a>";
				
				}
				else
				{
				
				     echo "<a class='btn btn-default' href='logout.php' style = 'font-family:cambria; font-size:14px;'> logout</a>";
				
				}
			
			?>
			
			<a class="btn btn-default" href="signup.php" style = "font-family:cambria; font-size:14px;"> <i class="fa fa-sign-in" aria-hidden="true">
		    </i>  Sign Up</a>
			</h1> 
   		</div>









		


 		<table class="table table-bordered table-responsive" bgcolor = "lavender">
 			<thead>
  				<tr align = "left" bgcolor = "skyblue">
  					<th>Business Title</th>
    				<th>Email</th>
    				<th>Phone No.</th>
					<th>How Old?</th>
					<th>Location</th>
					<th>Deals in:</th>
					<th>Action</th>
					<th>Edit</th>
					<th>Remove?</th>
  				</tr>
   			</thead>
   			<tbody>
                <?php

	
	$q="SELECT * FROM client_profile ORDER BY verified ASC";
	$ros=mysqli_query($con, $q);
	if(!$ros)
	{
		echo "Error! " . $q . "<br/>" . $con ->error;
		exit;
	}
	while($row=mysqli_fetch_array($ros))
	{
		$verification_status = $row['verified'];
		echo '<tr>';
		echo '<td align=center>' . $row['bus_name'];
		echo '<td align=center>' . $row['email'];
		echo '<td align=center>' . $row['cell_phone'];
		echo '<td align=center>' . $row['bus_age'] . 'yr(s)';
		echo '<td align=center>' . $row['location'];
		echo '<td align=center>' . $row['bus_desc'];


		if($verification_status == "NO")
		{
			?>

			<td align=center>
						<a class="btn btn-danger" title="Click here to verify business." 
		     			 href="verify_bus.php?verification_id=<?php echo $row['id']; ?>" onclick = "return confirm('Sure to verify?')">Approve <i class='fa fa-question-circle'></i>
		     			</a></td>

		     <?php
		}
		else if($verification_status == "YES")
		{
			?>

			<td align=center>
				<a class="btn btn-info" 
		     			 href="#"><i class="fa fa-check-circle"></i> Approved</a>
		     </td>

		     <?php
		}


		?>
		<td align=center><a onclick="return confirm('Sure to Edit?')" class='btn btn-info' title='Click here to edit.' 
		     href='edit_bus.php?id={$row['id']}'><span class='glyphicon glyphicon-edit'></span> Edit </a></td>

		

		<td align=center><a onclick="return confirm('Sure to Delete?')" class='btn btn-danger' title='Click here to delete file.' 
		     href='deleteById.php?id={$row['id']}'><span class='glyphicon glyphicon-remove-circle'></span> Remove</a></td>


		<?php

		echo '</tr>';
		
	}
	
	echo  '</tbody>';
	echo '</table>';
	echo '<br/>';
	
?>

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
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
                        
						
  

