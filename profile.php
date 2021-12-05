<!DOCTYPE html>
<html lang="en-US">
	<head>
		<!--Meta tag info-->
		<meta charset="UTF-8">
		<meta name="description" content="PRofile">
		<meta name="keywords" content="4WW3">
		<meta name="author" content="Abeer Al Yasiri">
		<!--To make the view fit to screen of the device-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Profile</title>
		<!--styling to the main page-->
		<!-- <link href="4WW3_project/assets/css/header_footer.css" rel="stylesheet"/> -->
		<!-- <link href="4WW3_project/assets/css/profile.css" rel="stylesheet"/> -->
		<link href="assets/css/header_footer.css" rel="stylesheet"/>
		<link href="assets/css/profile.css" rel="stylesheet"/>
		<!--load icon library for search bar-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
		<!-- Animation resource -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	</head>
	<body>
		<!--include header-->
		<!--same comments on the indext/html for nav bar-->
		<?php
			include "assets/php/header.php";
		?>	
		<!--title section on the webpage-->
		<div class="title">
			<h2><u>Profile</u></h2>
		</div> 
		<!--presenting the info of the logged in user, this is an example-->
		<!-- animation is added using the css animate library -->
		<div class="profile animate__animated animate__bounceIn">
			<!--this image is used just to make the picture nice it is not a placeholder-->
			<img src="assets/images/avatar.png" alt="Avatar profile icon">
			<h3>Some Username</h3>
			<h3>Some Email</h3>
			<h3>Number of Reviews</h3>
			<button>Log out</button>
		</div>
		
	<!--include the footer of the webpage-->
	<?php
		include "assets/php/footer.php";
	?>
	</body>
</html>
