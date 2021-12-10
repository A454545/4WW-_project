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
	<link href="4WW3_project/assets/css/header_footer.css" rel="stylesheet" />
	<link href="4WW3_project/assets/css/result.css" rel="stylesheet" />
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
	<script type="text/javascript" src="4WW3_project/assets/js/result.js"></script> 
</head>

<body onload="generateMap();">
	<!--include header-->
	<!--same comments on the indext/html-->
	<?php
		include "4WW3_project/assets/php/header.php";
	?>

	<!--Dropdown buttons bar, each button is a search filter (to be added later with JavaScript-->>
	<div class="filter-bar"></div>
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


		<?php
		// Transfer SESSION data into hidden fields, used to pass SESSION data to Javascript dile
			echo '<section class="searchResults" id="searchResults" style="display:none; visibility: hidden;">';
			foreach ($_SESSION['searchResults'] as $row => $columns){
				echo '<div id="' . $row . '"></span> <span class="address">' . $columns[1] .
					'</span> <span class="dlat">' . $columns[2] .
					'</span> <span class="dlong">' . $columns[3] .
					'</span> <span class="RANK">' . $columns[6] .
					'</span></div>';
			}
			echo '</section>';
			
		// Dynamically generate individual results cards
			for ($j = 0; $j < 4; $j++){
				echo '<div class="content-grandchild">
					<div class="result-top-image-container">
					</div>';
				
				$result = $_SESSION['searchResults']["result_$j"];
				echo '<div class="result-ranking">Ranked # <span id="ranking-1">' . $result[6] . '</span></div>';
				
				echo '<div class="result-stars">';
				for ($x = 0; $x < $result[6] ; $x++){
					echo '<i class="fas fa-star"></i>';
				}
				echo '<span class="text">(0 reviews)</span></div>';

				echo '<div class="result-description"><div class="address" id="1">'. $result[1].'</div>
				<div class="listing-desc">' . $result[4] . '</div>';
				echo '<p class="beds-baths" style="margin:0; padding: 1vh 0.5vw 0 0.5vw">';

					echo '<i class="fa fa-bed"></i> ';
				echo $result[7] . " Bed ";
					echo '<i class="fa fa-bath"></i> ';
				echo  $result[8] . ' Bath </p></div>';
				echo '<form class="submit" method="POST" action="assets/php/checkResult.php">
				<input type="hidden" id="chosenID" name="chosenID" value="' . $j . '">';		 
				echo '<div class="check-button"><input type="submit" name="submitSearch" value="View listing" 
				></div>';
				echo ' </form></div>';
			}

		?>
		</div>
	</div>
	<!--include the footer of the webpage-->
	<?php
		include "4WW3_project/assets/php/footer.php";
	?>
</body>
</html>
