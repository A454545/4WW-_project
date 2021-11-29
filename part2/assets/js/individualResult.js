function generateMap() {
	//Get longitude and longitude
	let latitude = 43.653225;
	let longitude = -79.383186;

	//Create interactive map
	myMap = L.map('map').setView([latitude, longitude], 14);
	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		maxZoom: 18,
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1,
		accessToken: 'pk.eyJ1IjoibWlrbG92ZXI4OSIsImEiOiJja3ZjeHh1ejkwcm9jMm9ueWpibzFjaTRtIn0.H8R3XwTyGWRGskV7WVnnYg'
	}).addTo(myMap);
	//Create a marker
	L.marker([latitude, longitude]).addTo(myMap);
	/* Image gallery code*/

	window.slideIndex = 1;
	showSlides(slideIndex);
}

// Next/previous controls
function plusSlides(n) {
	showSlides(slideIndex += n);
	
}
// Thumbnail image controls
function currentSlide(n) {
	showSlides(slideIndex = n);
}

// Image gallery function (cycles through slides)
function showSlides(n) {
	var i;
	var slides = document.getElementsByClassName("mySlides");
	if (n > slides.length) {
		slideIndex = 1;
	}
	if (n < 1) {
		slideIndex = slides.length;
	}
	for (i = 0; i < slides.length; i++) {
		slides[i].style.display = "none";
	}
	slides[slideIndex - 1].style.display = "flex";
}
