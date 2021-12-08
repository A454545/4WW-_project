<?php 
	session_start();
	
	session_unset();
	
	session_destroy();
	
	$url = "http://localhost/4WW3_project/";
	
	header('Location: ' . $url);
?>