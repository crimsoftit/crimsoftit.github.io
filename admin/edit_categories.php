<?php

	error_reporting( ~E_NOTICE );
	
	require_once 'dbconfig.php';
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM categories WHERE cat_id =:id');
		$stmt_edit->execute(array(':id'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: view_all_categories.php");
	}
	
	
	
	if(isset($_POST['btn_save_updates']))
	{
		$pro_cat = $_POST['category'];
		
		if(empty($pro_cat))
		{
		    $errMSG = "Please Enter Category's Title";
		}
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE categories 
									     SET cat_title=:cat_title
								       WHERE cat_id=:id');
			
			$stmt->bindParam(':id',$id);
			$stmt->bindParam(':cat_title',$pro_cat);
				
			if($stmt->execute()){
				?>
                <script>
		    		alert('Successfully Updated ...');
			    	window.location.href='view_all_categories.php';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}
		
		}
		
						
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Category</title>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

<!-- custom stylesheet -->
<link rel="stylesheet" href="style.css">

<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<script src="jquery-1.11.3-jquery.min.js"></script>
</head>
<body style = "font-family:cambria; font-size:16px;">

<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
 
        <div class="navbar-header">
            <a class="navbar-brand" style = "color:green;" href="../index.php" title='https://www.africos.net16.net' onclick = "return confirm('Quit to go to shop?')">Go to Shop</a>
			<a class="navbar-brand" href="index.php" title='Manage Products'>Manage Products</a>
			<a class="navbar-brand" href="view_all_brands.php" title='Manage Brands'>Manage Brands</a>
			<a class="navbar-brand" href="view_all_customers.php" title='Manage Customers'>Manage Customers</a>
        </div>
 
    </div>
</div>


<div class="container">


	<div class="page-header">
    	<h1 class="h2">update category. <a class="btn btn-default" href="view_all_categories.php"><span class="glyphicon glyphicon-eye-open"></span> &nbsp; view all categories</a></h1>
    </div>

<div class="clearfix"></div>

<form method="post" enctype="multipart/form-data" class="form-horizontal">
	
    
    <?php
	if(isset($errMSG)){
		?>
        <div class="alert alert-danger">
          <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
        </div>
        <?php
	}
	?>
   
    
	<table class="table table-bordered table-responsive">
	
    <tr>
    	<td><label class="control-label">Category Title</label></td>
        <td><input class="form-control" type="text" name="category" placeholder="Enter Category's Name" value="<?php echo $cat_title; ?>" /></td>
    </tr>
	
    <tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-default" href="view_all_categories.php"> <span class="glyphicon glyphicon-backward"></span> cancel </a>
        
        </td>
    </tr>
    
    </table>
</form>


<div class="alert alert-info">
    <strong><a href = "index.php">Go back to admin home page</a></strong>
</div>

</div>
</body>
</html>