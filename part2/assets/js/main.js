// global variables
let map_holder = document.getElementById("mapholder");
//map_holder.style.zIndex = '0';
var latitude = 0.0;
var longitude = 0.0;
var useUserLocation = false;
//map_holder.innerHTML = "boop";
let markerText = "Geolocation is not supported by this browser."

// Geolocation code: retrieves user's current position and displays it as a marker on a map
function getLocation() {
	if (navigator.geolocation) {
		markerText = "Your location!";
		navigator.geolocation.getCurrentPosition(showPosition, errorHandler);
	}
	else {
		map_holder.innerHTML = markerText;
	}
}

function errorHandler(error) {
	switch (error.code) {
		case error.PERMISSION_DENIED:
			map_holder.innerHTML = "User denied the request for Geolocation."
		break;
		case error.POSITION_UNAVAILABLE:
			map_holder.innerHTML = "Location information is unavailable."
			break;
		case error.TIMEOUT:
			map_holder.innerHTML = "The request to get user location timed out."
			break;
		case error.UNKNOWN_ERROR:
			map_holder.innerHTML = "An unknown error occurred."
			break;
	}
}

function showPosition(position) {
	latitude = position.coords.latitude;
	longitude = position.coords.longitude;
	myMap.setView([latitude, longitude]);
	// Create marker and popup
	let marker = L.marker([latitude, longitude]).addTo(myMap);
	var popup = L.popup();
	marker.bindPopup(markerText).openPopup();
}

// Generate interactive map
function generateMap() {
	window.myMap = L.map('mapholder').setView([0, 0], 13, true);
	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		maxZoom: 18,
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1,
		accessToken: 'pk.eyJ1IjoibWlrbG92ZXI4OSIsImEiOiJja3ZjeHh1ejkwcm9jMm9ueWpibzFjaTRtIn0.H8R3XwTyGWRGskV7WVnnYg'
		}).addTo(myMap);
}