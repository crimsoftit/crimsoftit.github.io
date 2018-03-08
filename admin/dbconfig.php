<?php

	$DB_HOST = 'localhost';
	$DB_USER = 'id4438251_chirowa';
	$DB_PASS = 'soen30010010';
	$DB_NAME = 'id4438251_chirowa';
	
	try{
		$DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
		$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
	
