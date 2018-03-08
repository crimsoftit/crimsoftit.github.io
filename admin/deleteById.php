<?php 
    session_start();

	require_once 'connection.php';
	require_once 'dbconfig.php';
	
	
	if(isset($_GET['id']))
	{
	    if(!isset($_SESSION['email']))
		{
				
			echo "<script>window.open('u_login.php','_self')</script>";
				
		}
		else
		{
		
		    // select file from db to delete
    		$stmt_select = $DB_con->prepare('SELECT * FROM client_profile WHERE id =:uid');
	    	$stmt_select->execute(array(':uid'=>$_GET['id']));
		    $fileRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		
    		// it will delete an actual record from db
	    	$stmt_delete = $DB_con->prepare('DELETE FROM client_profile WHERE id =:uid');
		    $stmt_delete->bindParam(':uid',$_GET['id']);
     		$stmt_delete->execute();
		
    		echo "<script>alert('Entry Deleted!')</script>";
    		header("Location: index.php");
		
		}
		
	}
	else
	{
		echo "<script>alert('FILE ID UNKNOWN!...')</script>";
	}
?>


