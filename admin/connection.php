<?php
    $con = mysqli_connect("localhost", "id4438251_chirowa", "soen30010010", "id4438251_chirowa");
	
    //check if connection to the database was estblished
	if(mysqli_connect_errno())
	{
	    echo "Failed to connect to the database: " . mysqli_connect_error();
	}
?>