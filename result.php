<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en-US">

<head>
	<!--Meta tag info-->
	<meta charset="UTF-8">
	<meta name="description" content="Reviewing estate listings">
	<meta name="keywords" content="4WW3">
	<meta name="author" content="Lin Rozenszajn">
	<!--To make the view fit to screen of the device-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Result Page</title>
	<!--styling to the main page-->
	<link href="assets/css/header_footer.css" rel="stylesheet" />
	<link href="assets/css/result.css" rel="stylesheet" />
	<!--load icon library for search bar-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css"
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<!--add Leaflet CSS and Javascript-->
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
		integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
		crossorigin="" />
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
		integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
		crossorigin=""></script>
	<!-- Animation resource -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	<!-- javascript file -->
	<script type="text/javascript" src="assets/js/result.js"></script> 
</head>

<body onload="generateMap();">
	<!--include header-->
	<!--same comments on the indext/html-->
	<?php
		include "assets/php/header.php";
	?>

	<!--Dropdown buttons bar, each button is a search filter (to be added later with JavaScript-->>
	<div class="filter-bar"></div>
<?php

echo '<section class="searchResults" id="searchResults" style="display:none; visibility: hidden;">';
	foreach ($_SESSION['searchResults'] as $row => $columns){
		echo '<div id="' . $row . '"><span class="name">' . $columns[0] .
			'</span> <span class="description">' . $columns[4] . 
			'</span> <span class="address">' . $columns[1] .
			'</span> <span class="dlat">' . $columns[2] .
			'</span> <span class="dlong">' . $columns[3] .
			'</span> <span class="price">' . $columns[5] .
			'</span></div>';
	}
echo '</section>';

	// Create the markers
	//echo ("addMarker($dlat, $dlong,'<b>$name</b><br/>$description');\n");
?>
	<!--page containing the results of a search-->
	<!--contains a dynamic map showing location of each result, as well as a card displaying-->
	<!--the address, mls listing number and synopsis of each result, along with a button to access its individual result page-->
	<!-- animation is added using the css animate library -->
	<div class="content-container">
		<!--Dynamic map-->
		<div class="content-child animate__animated animate__zoomInLeft" id="map">
		</div>
		<!--Results display-->
		<div class="content-child animate__animated animate__zoomInRight" id="results">
			<!--Individual results card-->
			<div class="content-grandchild">
				<div class="result-top-image-container">
				</div>
				<!--Div that contains each listing's rank-->
				<div class="result-ranking">
					Ranked # <span id="ranking-1">1256</span>
				</div>
				<!-- Stars -->
				<div class="result-stars">
					    <i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
					<span class="text">(0 reviews)</span>
				</div>
				<div class="result-description">
					<div class="address" id="1"></div>
				<!-- Description! -->
					<div class="listing-desc">Cozy three-bedroom , 1 bathroom apartment in the Main Street West
						neighborhood.</div>
					<p class="beds-baths" style="margin:0; padding: 1vh 0.5vw 0 0.5vw"><i class="fa fa-bed"></i> 3 Bed
						<i class="fa fa-bath"></i> 1 Bath
					</p>
				</div>
				<div class="check-button">
					<input type="submit" value="View listing" onclick="location.href = 'individualResult.php';">
				</div>
			</div>
			<!--Individual results card-->
			<div class="content-grandchild">
				<div class="result-top-image-container">
				</div>
				<div class="result-ranking">
					Ranked # <span id="ranking-2">1256</span>
				</div>
				<div class="result-stars">
					<span class="stars-two"><i class="fas fa-star"></i><i class="fas fa-star"></i><i
							class="fas fa-star"></i></span>
					<span class="text">(0 reviews)</span>
				</div>
				<div class="result-description">
					<div class="address" id="2"></div>
					<div class="listing-desc">Cozy three-bedroom , 1 bathroom apartment in the Main Street West
						neighborhood.</div>
					<p class="beds-baths" style="margin:0; padding: 1vh 0.5vw 0 0.5vw"><i class="fa fa-bed"></i> 3 Bed
						<i class="fa fa-bath"></i> 1 Bath
					</p>
				</div>
				<div class="check-button">
					<input type="submit" value="View listing" onclick="location.href = 'individualResult.php';">
				</div>
			</div>
			<!--Individual results card-->
			<div class="content-grandchild">
				<div class="result-top-image-container">
				</div>
				<div class="result-ranking">
					Ranked # <span id="ranking-3">1256</span>
				</div>
				<div class="result-stars">
					<span class="stars-three"><i class="fas fa-star"></i><i class="fas fa-star"></i><i
							class="fas fa-star"></i></span>
					<span class="text">(0 reviews)</span>
				</div>
				<div class="result-description">
					<div class="address" id="3"></div>
					<div class="listing-desc">Cozy three-bedroom , 1 bathroom apartment in the Main Street West
						neighborhood.</div>
					<p class="beds-baths" style="margin:0; padding: 1vh 0.5vw 0 0.5vw"><i class="fa fa-bed"></i> 3 Bed
						<i class="fa fa-bath"></i> 1 Bath
					</p>
				</div>
				<div class="check-button">
					<input type="submit" value="View listing" onclick="location.href = 'individualResult.php';">
				</div>
			</div>
			<!--Individual results card-->
			<div class="content-grandchild">
				<div class="result-top-image-container">
				</div>
				<div class="result-ranking">
					Ranked # <span id="ranking-4">1256</span>
				</div>
				<div class="result-stars">
					<span class="stars-four"><i class="fas fa-star"></i><i class="fas fa-star"></i><i
							class="fas fa-star"></i></span>
					<span class="text">(0 reviews)</span>
				</div>
				<div class="result-description">
					<div class="address" id="4"></div>
					<div class="listing-desc">Cozy three-bedroom , 1 bathroom apartment in the Main Street West
						neighborhood.</div>
					<p class="beds-baths" style="margin:0; padding: 1vh 0.5vw 0 0.5vw"><i class="fa fa-bed"></i> 3 Bed
						<i class="fa fa-bath"></i> 1 Bath
					</p>
				</div>
				<div class="check-button">
					<input type="submit" value="View listing" onclick="location.href = 'individualResult.php';">
				</div>
			</div>
			<div class="next-button">
				<input type="submit" value="Next" onclick="location.href = 'individualResult.php';">
			</div>
		</div>
	</div>
	<!--include the footer of the webpage-->
	<?php
		include "assets/php/footer.php";
	?>
</body>
</html>
