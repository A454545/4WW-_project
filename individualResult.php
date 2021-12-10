<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en-US">

<head>
	<!--Meta tag info-->
	<meta charset="UTF-8">
	<meta name="description" content="Search results">
	<meta name="keywords" content="4WW3">
	<meta name="author" content="Lin Rozenszajn">
	<!--To make the view fit to screen of the device-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Individual Object</title>
	<!--styling to the main page-->
	<link href="assets/css/header_footer.css" rel="stylesheet" />
	<link href="assets/css/individualResult.css" rel="stylesheet" />
	<!--load icon library for search bar-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css"
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<!--Start of Add-on 1-->
	<!--Task 1: Facebook open graph-->
	<meta property="og:title" content="123 Main Street West, Toronto">
	<meta property="og:type" content="Website">
	<meta property="og:site_name" content="True Roofs">
	<meta property="og:url" content="http://3.130.249.183/individualResult.html">
	<!--PUT THE LINK FOR THE Individual PAGE-->
	<meta property="og:image" content="http://3.130.249.183/assets/images/avatar.png">
	<!--PUT LINK TO THE IMAGE FROM THE SERVER TO -->
	<meta property="og:description" content="house lisiting near McMaster University">
	<!--Task 2: Twitter Card-->
	<meta name="twitter:card" content="summary">
	<meta property="twitter:title" content="123 Main Street West, Toronto">
	<meta property="twitter:site" content="@True Roofs">
	<meta property="twitter:description" content="house lisiting near McMaster University">
	<meta property="twitter:image" content="http://18.222.242.154/home/images/kingwestbooks.jpg">
	<!--Task 5: mobile saving page to home screen-->
	<!--IOS-->
	<link rel="apple-touch-icon-precomposed" href="assets/images/avatar.png" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="viewport" content="width = device-width, initial-scale = 1.0, minimum-scale = 1.0, maximum-scale = 5" />
	<!--Android-->
	<meta name="mobile-web-app-capable" content="yes">
	<!--add Leaflet CSS and Javascript-->
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
		integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
		crossorigin="" />
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
		integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
		crossorigin=""></script>
	<!-- javascript file -->
	<script type="text/javascript" src="assets/js/individualResult.js"></script> 
</head>

<body onload="generateMap2();">
	<!--include header-->
	<!--same comments on the index.php-->
	<?php
		include "assets/php/header.php";
	?>
	<!--dropdown buttons bar, each button is a search filter-to be added later with Javascript-->>
	<div class="filter-bar"></div>
	<?php
		// Transfer SESSION data into hidden fields, used to pass SESSION data to Javascript file
		$j = $_SESSION['chosenID'];
		$result = $_SESSION['searchResults']["result_$j"];
			echo '<section class="searchResults" id="searchResults" style="display:none; visibility: hidden;">';
			echo '<div id="1"> <span class="address">' . $result[1] .
				'</span> <span class="dlat">' . $result[2] .
				'</span> <span class="dlong">' . $result[3] .
				'</span> <span class="RANK">' . $result[9] .
				'</span></div>';
			echo '</section>';
	?>
	<!--page displaying information about an individual result-->
	<!--includes two photos, an interactive map, a video, text description, link to original mls listing, and reviews-->
	<div class="container">
		<div class="slideshow-and-map-container">
			<!--Slideshow container-->
			<div class="slideshow-container">
				<div class="prev-next-buttons">
					<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
					<a class="next" onclick="plusSlides(1)">&#10095;</a>
				</div>
				<div class="mySlides fade" id="main">
					<!--Task 2 in Add On 2: use <picture> and <source> tags to add customizable images-->
					<picture>
						<source media="(max-width: 450px)" srcset="assets/images/main-0.25x.png, main-0.25x.png 0.25x">
						<img src="assets/images/main-0.5x.png" alt="main listing photo">
					</picture>
				</div>
				<div class="mySlides fade" id="top-photo">
					<img src="assets/images/top.jpg">
				</div>
				<!--Addon 1 Task 3-->
				<!-- Next and previous buttons -->
			</div>
			<!--Map-->
			<div id="map">
				<div class="locationOnMap" itemscope itemtype="https://schema.org/Place">
				</div>
			</div>
		</div>
		<div class="object">
			<!--Task 1 in Add On 2: add a video-->
			<div class="object-video"><video controls>
					<source src="assets/images/apartment-tour.mp4" type="video/mp4">
					Your browser does not support the video tag.
				</video></div>
			<div class="object-content">
				<!--Addon 1 Task 3-->
				<div class="locationOnMap" itemscope itemtype="https://schema.org/Place">
					<h2 class="address"> <?php echo $result[1]; ?></h2>

					<div class="geographicCoordinate" itemscope itemtype="https://schema.org/GeoCoordinates">
						<h2 class="coordinates" style="display:none; visibility:hidden"> 44.5W 70N</h2>
						<meta itemprop="latitude" content="44.5W" />
						<meta itemprop="longtitude" content="70N" />
					</div>
				</div>
				<p class="listing-link"><a href=<?php echo $result[9];?>> Link to original listing </a></p>
				<?php echo $result[4];?>
			</div>
		</div>
		<div class="object-reviews">
			<?php
			//Dynamically generate page content
			for ($i = 0; $i < count($_SESSION['reviewResults']); $i++){
				$result = $_SESSION['reviewResults']["reviewResult_$i"];
			echo '<div class="reviewGroup" itemscope itemtype="https://schema.org/Review">
			<div itemprop="author" itemscope itemtype="https://schema.org/Person">
				<meta itemprop="name" content="Nikki Smith">
			</div>
			<div class="review">
				<div class="reviewer-info">
					<div class="avatar-image">
						<picture>
							<source media="(min-width: 1920px)" srcset="avatar-2x.png, avatar-2x.png 2x">
							<img src="assets/images/avatar-1x.png" alt="profile-avatar">
						</picture>
					</div>
					<div class="reviewer-name" style="font-weight: bolder;">Nikki Smith</div>
					<div class="reviewer-date">(' . $result[2] .')</div>
					</div>
					<div class="reviewer-rating">';
			for ($j = 0; $j < $result[3]; $j++){
				echo '<i class="fa fa-star" aria-hidden="true"></i>';
			}
			echo '</div><meta itemprop="reviewRating" content="4">
					<meta itemprop="reviewBody" content="' . $result[4] .
					'<div class="review-content">' . $result[4] . '</div>
				</div>
			</div>
			<div class="empty"></div>';
			}
						 /*$_SESSION['reviewerName_'.$i] = $row['reviewerName'];
							$_SESSION['reviewName_'.$i] = $row['name'];
							$_SESSION['reviewDate_'.$i] = $row['created'];
							$_SESSION['reviewRating_'.$i] = $row['rating'];
							$_SESSION['reviewContent_'.$i] = $row['content']; */
			?>
		</div>
	</div>

	<!--include the footer of the webpage-->
	<?php
		include "assets/php/footer.php";
	?>
</body>
</html>
