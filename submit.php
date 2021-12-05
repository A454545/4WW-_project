<!DOCTYPE html>
<html lang="en-US">
	<head>
		<!--Meta tag info-->
		<meta charset="UTF-8">
		<meta name="description" content="Submit Review">
		<meta name="keywords" content="4WW3">
		<meta name="author" content="Abeer Al Yasiri">
		<!--To make the view fit to screen of the device-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Submit Page</title>
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
		<!--page title-->
		<div class="title">
			<h2><u>Submit Review</u></h2>
		</div> 
		
		<!--submission form for new object review with name, description, location as latitude longtitude coordinates, and upload-->
		<!--this submission form is for a review-->
		<!-- animation is added using the css animate library -->
		<div class="submission-container">
			<form class="submission-form" method="post" action="#" onsubmit="return validateSubmission(this)">
				<!--each line form div form will represent a row in the form-->
				<div class="line-form animate__animated animate__fadeInDown">
					<!--what we need to enter-->
					<div class="title-line-form">
						<label for="rname">Review Name</label>
					</div>
					<!--text box to enter the info-->
					<div class="field-line-form">
						<input type="text" id="rname" name="reviewname" placeholder="review title.." required>
					</div>
				</div>
				<div class="line-form animate__animated animate__fadeInDown animate__delay-1s">
					<div class="title-line-form">
						<label for="address">Address</label>
					</div>
					<div class="field-line-form">
						<input type="text" id="address" name="address" placeholder="listing addrees (if known)">
					</div>
				</div>
				<!-- Add button for Geolocation API autofill coordinates -->
				<div class="line-form animate__animated animate__fadeInDown animate__delay-2s">
					<div class="title-line-form">
						<label>Use Current Location</label>
					</div>
					<div class="field-line-form">
						<p style="padding-left: 10px;" id="useLocation"><a class="useLocationBtn" onclick="getLocation()"><i class="fas fa-street-view">&nbsp My Location</i></a></p>
					</div>
				</div>
				<div class="line-form animate__animated animate__fadeInDown animate__delay-2s">
					<div class="title-line-form">
						<label for="locationl">Location Latitude</label>
					</div>
					<div class="field-line-form">
						<input type="text" id="locationl" name="latitude" placeholder="float to 4 decimals.." required>
					</div>
				</div>
				<div class="line-form animate__animated animate__fadeInDown animate__delay-2s">
					<div class="title-line-form">
						<label for="locationlo">Location Longtitde</label>
					</div>
					<div class="field-line-form">
						<input type="text" id="locationlo" name="longtitude" placeholder="float to 4 decimals.." required>
					</div>
				</div>
				<div class="line-form animate__animated animate__fadeInDown animate__delay-3s">
					<div class="title-line-form">
						<label for="rate" title="will be a dynamic rating in part 2">Rating Score</label>
					</div>
					<div class="field-line-form">
						<select id="rate" name="rate">
							<option value="1">1 star</option>
							<option value="2">2 star</option>
							<option value="3">3 star</option>
							<option value="4">4 star</option>
							<option value="5">5 star</option>
						</select>
					</div>
				</div>
				<div class="line-form animate__animated animate__fadeInDown animate__delay-3s">
					<div class="title-line-form">
						<label for="description">Description</label>
					</div>
					<div class="field-line-form">
						<!--use textarea instead of input becuase we want a larger box-->
						<textarea id="description" name="description" placeholder="what do you think??" style="height:5em" required></textarea>
					</div>
				</div>
				<div class="line-form animate__animated animate__fadeInDown animate__delay-4s">
					<div class="title-line-form">
						<label for="pictures">Upload Images</label>
					</div>
					<div class="field-line-form">
						<input type="file" id="pictures" name="pictures" accept="image/*" multiple required>
					</div>
				</div>
				<!--Task 1 in Add On 2: upload a video-->
				<div class="line-form animate__animated animate__fadeInDown animate__delay-4s">
					<div class="title-line-form">
						<label for="video">Upload video</label>
					</div>
					<div class="field-line-form">
						<input type="file" id="video" name="video" accept="video/*" required>
					</div>
				</div>
				<br>
				<!--submit button-->
				<div class="line-form animate__animated animate__fadeInDown animate__delay-5s">
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
