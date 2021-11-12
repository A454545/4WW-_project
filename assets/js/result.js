//Interactive map generation
function generateMap() {
	//initializing the map
	let myMap = L.map('map').setView([43.653225, -79.383186], 13)
	// formating the map
	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		maxZoom: 18,
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1,
		accessToken: 'pk.eyJ1IjoibWlrbG92ZXI4OSIsImEiOiJja3ZjeHh1ejkwcm9jMm9ueWpibzFjaTRtIn0.H8R3XwTyGWRGskV7WVnnYg'
	}).addTo(myMap);
	
	//Random rank, street address and marker generation
	for (let i = 1; i < 5; i++){
		// code to make it random -- this will be removed later
		let selector = ".result-ranking #ranking-" + i;
		let rank = document.querySelector(selector);
		rank.innerHTML = i + Math.floor(Math.random() * 11);

		selector = ".result-description .address #" + i;
		let address = document.getElementsByClassName('result-description')[i-1];
		address = address.querySelector('.address');
		address.innerHTML = i + Math.floor(Math.random() * 100);
		address.innerHTML += " Street, Toronto";

		let stars = document.getElementsByClassName('result-stars')[i-1];
		/* 	for (let j = 1; j < 5; j++) {
			var icn = document.createElement("span");
			icn.innerHTML = '<i class="fa fa-star"></i>';
			stars.appendChild(icn);
		} */

		let incr = i * 0.02 * Math.random();
		// adding the marker
		let marker = L.marker([43.650400+incr, -79.379310-incr]).addTo(myMap);
		var popup = L.popup();
		marker.bindPopup(address.innerHTML + '<br></br>' + '<a href="individualResult.html"> Go</a>').openPopup();
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

