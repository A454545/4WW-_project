<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<!-- Meta tag information on the page -->
	<meta charset="UTF-8">
	<meta name="description" content="Rviewing estate listings">
	<meta name="keywords" content="4WW3">
	<meta name="author" content="Abeer Al Yasiri">
	<!--To make the view fit to screen of the device-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Main Page</title>
	<!--styling to the main page-->
	<!-- <link href="4WW3_project/assets/css/mainStyle.css" rel="stylesheet"/> -->
	<link href="4WW3_project/assets/css/mainStyle.css" rel="stylesheet" />
	<!--load icon library for search bar-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css"
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<!-- Animation resource -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
		<!--add Leaflet CSS and Javascript-->
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
		integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
		crossorigin="" />
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
		integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
		crossorigin="" async></script>
	<!-- javascript file -->
	<script type="text/javascript" src="4WW3_project/assets/js/main.js" async></script> 
</head>

<body onload="generateMap();">
	<!--include header-->
	<?php
		include "4WW3_project/assets/php/header.php";
	?>

	<!--Search bar of the estates-->
	<div class="main-container">
		<!--background image of the div-->
		<img src="4WW3_project/assets/images/house.jpg" alt="top view of estates"
			style="width:100%; filter: blur(5px); padding-top: 80px;">
		<!--div section that have the search bar as a form-->
		<div class="search">
			<!--title-->
			<p class="search-title" id="search-title"><u>Search Reviews</u></p>
			<!--form to pass the info use the get method because we want to allow bookmarks and ideal for search boxes-->
			<form class="search-bar" id="search-bar" method="POST" action="4WW3_project/assets/php/retrieveResults.php">
				<!--bar of the search-->
				<input type="text" placeholder= <?php if (!isset($_SESSION['searchError']))
				 {echo '"Enter a city name"';} else {echo '"No results found."';} ?> name="search">
				<!--clickable button to send the input-->
				<button type="submit" name="submitSearch" value="searchSubmitted" aria-label="submit address search"><i class="fa fa-search"></i></button>
			</form>
		</div>
	</div>
	<!--dynamic map section-->
	<div class="map">
		<!--map filters that filter the listings available on the map as icons-->
		<div class="map-checks">
			<h3>Filters</h3>
			<form class="map-filter">
				<input type="checkbox" id="checkbox1">
				<label for="checkbox1">House</label>
				<input type="checkbox" id="checkbox2">
				<label for="checkbox2">Apartment</label>
				<input type="checkbox" id="checkbox3">
				<label for="checkbox3">4+ BR</label>
				<input type="checkbox" id="checkbox4">
				<label for="checkbox4">Sale</label>
				<input type="checkbox" id="checkbox5">
				<label for="checkbox5">Lease</label>
				<button aria-label="submit filter" type="submit"><i class="fa fa-sync-alt"></i></button>
			</form>
		</div>
		<!--placeholder for the comming soon dynamic mapping that positions map on user location and display clickable icons of the listings-->
		<div id="map_button">
			<a class="useLocationBtn" onclick="getLocation()">Search by location
		</div>
					<div id="mapholder">
		</div>
	</div>

	<!--include the footer of the webpage-->
	<?php
		include "4WW3_project/assets/php/footer.php";
	?>
	
	<script type="text/javascript">
		// Wrap every letter in a span
		var textWrapper = document.querySelector('.logo');
		textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

		anime.timeline({ loop: true })
			.add({
				targets: '.logo .letter',
				opacity: [0, 1],
				easing: "easeInOutQuad",
				duration: 2250,
				delay: (el, i) => 150 * (i + 1)
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
