(function ($) {

	Tc.Module.Map.Icelabs = function (parent) {

		this.mapsReadyCallback = 'mapsReadyCallback';

		this.on = function (callback) {

			$(document).on(this.mapsReadyCallback, this.initMap);

			// call parent constructor, must be called last
			parent.on(callback);
		};

		this.initMap = function () {

			var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions),
				geocoder = new google.maps.Geocoder(),
				facts = modMapIcelabsFacts,
				mapOptions = {
					zoom: 4,
					center: myLatlng
				};

			facts.forEach(function (fact) {

				console.log(fact);

			});


			var myLatlng = new google.maps.LatLng(-25.363882, 131.044922);
			var infowindow = new google.maps.InfoWindow({
				content: 'Inhalt'
			});

			geocoder.geocode({ 'address': 'Poststrasse 3 8546 Islikon'}, function (results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					map.setCenter(results[0].geometry.location);

					var marker = new google.maps.Marker({
						position: results[0].geometry.location,
						map: map,
						title: 'Uluru (Ayers Rock)'
					});
					google.maps.event.addListener(marker, 'click', function () {
						infowindow.open(map, marker);
					});
				} else {
					alert("Geocode was not successful for the following reason: " + status);
				}

			});
		};

		this.after = function () {

			this.loadMapAPI();

			// callback, must be called last
			parent.after();
		};

		this.loadMapAPI = function () {

			var apiKey = 'AIzaSyCHfBbGLxR4PCDV_OCaqcF20AzV2KADA1Y',
				script = document.createElement('script');

			script.type = 'text/javascript';
			script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&API_KEY=' + apiKey + '&sensor=false&' +
				'callback=' + this.mapsReadyCallback;
			document.body.appendChild(script);
		};
	};
})(Tc.$);


/**
 * Listen for global Google Maps API Callback
 */

window.mapsReadyCallback = function () {
	$(document).trigger('mapsReadyCallback');

};