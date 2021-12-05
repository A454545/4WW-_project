<!DOCTYPE html>
<html lang="en-US">
	<head>
		<!--Meta tag info-->
		<meta charset="UTF-8">
		<meta name="description" content="User Registeration">
		<meta name="keywords" content="4WW3">
		<meta name="author" content="Abeer Al Yasiri">
		<!--To make the view fit to screen of the device-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>User Registeration</title>
		<!--styling to the main page-->
		<!-- <link href="4WW3_project/assets/css/header_footer.css" rel="stylesheet"/> -->
		<!-- <link href="4WW3_project/assets/css/userRegisteration.css" rel="stylesheet"/> -->
		<link href="assets/css/header_footer.css" rel="stylesheet"/>
		<link href="assets/css/userRegisteration.css" rel="stylesheet"/>
		<!--load icon library for search bar-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
		<!-- js script for registration -->
		<script type="text/javascript" src="assets/js/registration.js"></script>
		<!-- Animation resource -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
	</head>
	<body>
		<!--include header-->
		<?php
			include "assets/php/header.php";
		?>	
		<!--title section on the webpage with background-image-->
		<div class="title" title="buildings up view image" style="background-image: linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)),url('assets/images/buildings.png'); background-position: bottom;">
			<h2><u>User Registration</u></h2>
		</div> 
		<!--at least 4 different HTML form elements text box, checkbox/radio item, email, search, date, password-->
		<!--beginning of the registration login part-->
		<div class="registration">
			<!--using a form to pass the info-->
			<form class="reg-form" id="Reg-login" onsubmit="return validateLogIn(this)" action="profile.php" method="POST">
				<!--what type of registration is it-->
				<div class="reg-type animate__animated animate__rubberBand">
					<p>Log In</p>
				</div>
				<div class="message animate__animated animate__flip">
					<p>Welcome Back!</p>
				</div>
				<!--what fields needs to be filed-->
				<div class="title-label">
					<label for="username">Username</label>
				</div>
				<div class="field-input">
					<input type="text" id="username" name="username" placeholder="username" required>
				</div>
				<div class="title-label">
					<label for="password">Password</label>
				</div>
				<div class="field-input">
					<input type="password" id="password" name="password" placeholder="password" required>
				</div>
				<!--placeholder to remember the password of the page-->
				<div class="remember">
					<label for="rem">Remember me?</label>
					<input id="rem" name="rem" type="checkbox">
				</div>
				<!--submit button will send to the profile page when clicked-->
				<div class="submit-button">
					<input type="submit" value="Log In">
				</div>
				<!--to switch to the sign in page instead-->
				<div class="switch-type animate__animated animate__pulse">
					<a href="signin.php">New to True Roofs? Sign in newbie!</a>
				</div>
			</form>
		</div>
		
		<!--include the footer of the webpage-->
		<?php
			include "assets/php/footer.php";
		?>
	
		<!-- animation for the title of the page - lettering of the title in a loop -->
		<script type="text/javascript">
			// Wrap every letter in a span to make it easier to animate each letter alone
			var textWrapper = document.querySelector('.logo');
			textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

			anime.timeline({loop: true})
			  .add({
				targets: '.logo .letter',
				opacity: [0,1],
				easing: "easeInOutQuad",
				duration: 2250,
				delay: (el, i) => 150 * (i+1)
			  }).add({
				targets: '.logo',
				opacity: 0,
				duration: 1000,
				easing: "easeOutExpo",
				delay: 2000
			  });
		</script>
	</body>
</html>
