<?php 
	session_start();
	
	session_unset();
	
	session_destroy();
	
	$url = "https://www.trueroofs.live/";
	
	header('Location: ' . $url);
?>