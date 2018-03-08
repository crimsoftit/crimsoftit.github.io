<?php
	session_start();
	require_once 'connection.php';
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
		<title>ADMIN | CATEGORIES DASHBOARD</title>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
		<link rel = "stylesheet" href = "styles/style.css" media = "all" />

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
    		<h1 class="h2">all categories. / 
		    	<a class='btn btn-default' href="addnewcategory.php"><span class="glyphicon glyphicon-plus"></span> click to add a new category</a>
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
  					<th>Category Title</th>
    				<th>Goods/Services</th>
					<th>Edit Details </th>
					<th>Delete Category </th>
  				</tr>
   			</thead>
   			<tbody>
                <?php

	
	$q="SELECT * FROM categories ORDER BY cat_id ASC";
	$ros=mysqli_query($con, $q);
	if(!$ros)
	{
		echo "Error! " . $q . "<br/>" . $con ->error;
		exit;
	}
	while($row=mysqli_fetch_array($ros))
	{
		echo '<tr>';
		echo '<td align=center>' . $row['cat_title'];
		echo '<td align=center>' . $row['offer'];

		echo "<td align=center><a class='btn btn-info' title='Click here to edit file in file.' 
		     href='edit_file.php?id={$row['cat_id']}'><span class='glyphicon glyphicon-edit'></span> Edit </a>";

		echo "<td align=center><a class='btn btn-danger' title='Click here to delete file.' 
		     href='deleteById.php?id={$row['cat_id']}' onclick = 'return confirm('sure to delete?')' ><span class='glyphicon glyphicon-remove-circle'></span> Delete</a>"; 

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
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
                        
						
  

