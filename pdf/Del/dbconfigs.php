<?php
	
	$DBhost = "localhost";
	$DBuser = "t2";
	$DBpass = "t2";
	$DBname = "del";
	
	try{
		
		$DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
		$DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	}catch(PDOException $ex){
		
		die($ex->getMessage());
	}