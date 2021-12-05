<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="Submit Listing">
		<meta name="keywords" content="4WW3">
		<meta name="author" content="Abeer Al Yasiri">
		<!--To make the view fit to screen of the device-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>New Listing Page</title>
		<!--styling to the main page-->
		<!-- <link href="4WW3_project/assets/css/header_footer.css" rel="stylesheet"/> -->
		<!-- <link type="text/css" href="4WW3_project/assets/css/submit.css" rel="stylesheet"/> -->
		<link href="assets/css/header_footer.css" rel="stylesheet"/>
		<link type="text/css" href="assets/css/submit.css" rel="stylesheet"/>
		<!--load icon library for search bar-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
		<!-- js script for geolocation and submit -->
		<script type="text/javascript" src="assets/js/submit.js"></script>
		<!-- Animation resource -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	</head>
	<body>
		<!--include header-->
		<?php
			include "assets/php/header.php";
		?>	
		
		<div class="title">
			<h2><u>Submit New Listing</u></h2>
		</div> 
		
		<!--submission form for new object review with name, description, location as latitude longtitude coordinates, and upload-->
		<!--this section is similar to what was used in submit.html so commenting would be the same the difference here is what is being asked to enter-->
		<!-- animation is added using the css animate library -->
		<div class="submission-container">
			<form class="submission-form animate__animated animate__lightSpeedInRight" action="#" onsubmit="return validateSubmission(this)">
				<div class="line-form">
					<div class="title-line-form">
						<label for="rname">Listing Name</label>
					</div>
					<div class="field-line-form">
						<input type="text" id="rname" name="reviewname" placeholder="listing title.." required>
					</div>
				</div>
				<div class="line-form">
					<div class="title-line-form">
						<label for="address">Address</label>
					</div>
					<div class="field-line-form">
						<input type="text" id="address" name="address" placeholder="listing addrees..">
					</div>
				</div>
				<!-- Add button for Geolocation API autofill coordinates -->
				<div class="line-form">
					<div class="title-line-form">
						<label>Use Current Location</label>
					</div>
					<div class="field-line-form">
						<p style="padding-left: 10px;" id="useLocation"><a class="useLocationBtn" onclick="getLocation()"><i class="fas fa-street-view">&nbsp My Location</i></a></p>
					</div>
				</div>
				<div class="line-form">
					<div class="title-line-form">
						<label for="locationl">Location Latitude</label>
					</div>
					<div class="field-line-form">
						<input type="text" id="locationl" name="latitude" placeholder="float to 4 decimals.." required>
					</div>
				</div>
				<div class="line-form">
					<div class="title-line-form">
						<label for="locationlo">Location Longtitde</label>
					</div>
					<div class="field-line-form">
						<input type="text" id="locationlo" name="longtitude" placeholder="float to 4 decimals.." required>
					</div>
				</div>
				<div class="line-form">
					<div class="title-line-form">
						<label for="price">Listing Price (CAD$)</label>
					</div>
					<div class="field-line-form">
						<input type="text" id="price" name="price" placeholder="integer.." required>
					</div>
				</div>
				<div class="line-form">
					<div class="title-line-form">
						<label for="listinglink">Source Listing Link</label>
					</div>
					<div class="field-line-form">
						<input type="url" id="listinglink" name="link" placeholder="URL.." required>
					</div>
				</div>
				<div class="line-form">
					<div class="title-line-form">
						<label for="picture">Upload Image</label>
					</div>
					<div class="field-line-form">
						<input type="file" id="picture" name="picture" accept="image/*" multiple required>
					</div>
				</div>
				<br>
				<div class="line-form">
					<input type="submit" value="Submit">
				</div>
			</form>
		</div>
		
		<!--include the footer of the webpage-->
		<?php
			include "assets/php/footer.php";
		?>
	</body>
</html>