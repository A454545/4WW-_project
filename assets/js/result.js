function generateMap() {
	// Address generation

	//Interactive map generation
	let centerLatitude = document.querySelector("section.searchResults div:first-child span.dlat").innerHTML;
	let centerLongitude = document.querySelector("section.searchResults div:first-child span.dlong").innerHTML;

	//initializing the map
	let myMap = L.map('map').setView([centerLatitude, centerLongitude], 13)
	// formating the map
	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		maxZoom: 18,
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1,
		accessToken: 'pk.eyJ1IjoibWlrbG92ZXI4OSIsImEiOiJja3ZjeHh1ejkwcm9jMm9ueWpibzFjaTRtIn0.H8R3XwTyGWRGskV7WVnnYg'
	}).addTo(myMap);
	
	// Generate individual result cards and map markers
	var listings = document.getElementById("searchResults");
	for (i = 0; i < listings.childNodes.length; i++){
		// Generate map markers
		var lat = listings.childNodes[i].querySelector("span.dlat").innerHTML;
		var long = listings.childNodes[i].querySelector("span.dlong").innerHTML;
		var address = listings.childNodes[i].querySelector("span.address").innerHTML;

		let marker = L.marker([lat, long]).addTo(myMap);
		var popup = L.popup();
		marker.bindPopup(address + '<br></br>' + '<a href="individualResult.html"> Go</a>').openPopup();
	}
	
	// related to satellite view and location
	const api_url = 'https://api.wheretheiss.at/v1/satellites/25544';
	async function getISS() {
		const response = await fetch(api_url);
		const data = await response.json();
		const { latitude, longitude } = data;
	}
	getISS();
}
