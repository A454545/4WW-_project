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
		
		// Generate card content: addresses
		var selector = "" + (i+1); // Grab the right card
		var address_field = document.getElementById(selector).innerHTML;
		// Insert the listing address into the address field
		address_field = address;
	}

	//Random rank, street address and marker generation
	for (let i = 1; i < 5; i++){
		// code to make it random
		selector = ".result-ranking #ranking-" + i;
		let rank = document.querySelector(selector);
		let stars = document.getElementsByClassName('result-stars')[i-1];
		 	for (let j = 1; j < 5; j++) {
			var icn = document.createElement("span");
			icn.innerHTML = '<i class="fa fa-star"></i>';
			stars.appendChild(icn);
		} 
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
