<?php

	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once 'dbconfig.php';
	
	
	
	
	if(isset($_POST['btnsave']))
	{
		$pro_cat 	= $_POST['category'];
		$offer 		= $_POST['offer'];
		
		
		if(empty($pro_cat))
		{
			$errMSG = "Please Enter Category's Name.";
		}
		elseif (empty($offer)) 
		{
			$errMSG = "Please select either goods or services.";
		}
		else
		{
			// if no error occured, continue ....
    		if(!isset($errMSG))
	    	{
		    	$stmt = $DB_con->prepare('INSERT INTO categories(cat_title, offer)
                                            			  VALUES(:cat, :offer)');
		    	$stmt->bindParam(':cat',$pro_cat);
		    	$stmt->bindParam(':offer',$offer);
			
	    		if($stmt->execute())
    			{
				    $successMSG = "new record succesfully inserted ...";
			    	header("refresh:5;view_all_categories.php"); // redirects image view page after 5 seconds.
		    	}
	    		else
    			{
			    	$errMSG = "error while inserting....";
		    	}
	    	}
		}
		
		
		
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add New Category</title>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

</head>
<body style = "font-family:cambria; font-size:16px;">

<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
 
         <div class="navbar-header" >
            <a class="navbar-brand" style = "color:green;" href="../index.php" title='https://www.africos.net16.net' onclick = "return confirm('Quit to go to shop?')">Go to Shop</a>
			<a class="navbar-brand" href="index.php" title='Manage Products'>Manage Products</a>
			<a class="navbar-brand" href="view_all_brands.php" title='Manage Brands'>Manage Brands</a>
			<a class="navbar-brand" href="view_all_customers.php" title='Manage Customers'>Manage Customers</a>
        </div>
 
    </div>
</div>

<div class="container">


	<div class="page-header">
    	<h3 class="h3">add a new category. <a class="btn btn-default" href="view_all_categories.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; view all categories</a></h1>
    </div>
    

	<?php
	if(isset($errMSG)){
			?>
            <div class="alert alert-danger">
            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
	}
	else if(isset($successMSG)){
		?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
	}
	?>   

<form method="post" enctype="multipart/form-data" class="form-horizontal">
	    
	<table class="table table-bordered table-responsive">
    
    	<tr>
        	<td><label class="control-label">Goods/Services</label></td>
            <td>
            	<input type="radio" name="offer" value="Goods"> Goods
            	<input type="radio" name="offer" value="Services"> Services
            </td>
        </tr>
        <tr>
        	<td><label class="control-label">Category title</label></td>
            <td>
            	<input class="form-control" type="text" name="category" placeholder="Enter Category's Name" value="<?php echo $pro_cat; ?>"/>
            </td>
        </tr>
	
	    <tr>
            <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
            <span class="glyphicon glyphicon-save"></span> &nbsp; save
            </button>
        </td>
    </tr>
    
    </table>
    
</form>



<div class="alert alert-info">
    <strong><a href = "index.php">Go back to admin home page</a></strong>
</div>

    

</div>



	


<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>


</body>
</html>