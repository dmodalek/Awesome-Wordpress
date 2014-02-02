(function ($) {

	Tc.Module.Map = Tc.Module.extend({

		init: function ($ctx, sandbox, modId) {

			// call parent constructor, must be called first
			this._super($ctx, sandbox, modId);

			this.mapsReadyCallback = 'mapsReadyCallback';
			this.map = null;
			this.markers = [];
		},

		on: function (callback) {

			var self = this;

			// Wait for Google Map API Callback
			$(document).on(this.mapsReadyCallback, function () {
				$.proxy(self.initMapMarkers(), self);
			});

			// Load the Google Map API
			this.loadMapAPI();

			// callback, must be called at the end
			callback();
		},

		//////////////////////////////////////////////////////////////////////////////


		/**
		 * Load Google Maps API
		 */

		loadMapAPI: function() {

			var apiKey = 'AIzaSyCHfBbGLxR4PCDV_OCaqcF20AzV2KADA1Y',
				script = document.createElement('script');

			script.type = 'text/javascript';
			script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&API_KEY=' + apiKey + '&sensor=false&' +
				'callback=' + this.mapsReadyCallback;
			document.body.appendChild(script);
		},


		//////////////////////////////////////////////////////////////////////////////


		/**
		 * Initialize Google Map
		 */

		initMapMarkers: function () {

			var self = this,
				geocoder = new google.maps.Geocoder(),
				markers = JSON.parse($('.map-marker').html());

			this.map = new google.maps.Map(document.getElementsByClassName('map-canvas')[0], { zoom: 4 });

			$.each(markers, function (index, marker) {

				var custom_fields = marker.custom_fields;

				// Async
				geocoder.geocode({ 'address': custom_fields.fact_plz_city + ' ' + custom_fields.fact_country }, function (results, status) {

					if (status == google.maps.GeocoderStatus.OK) {

						self.markers.push(new google.maps.Marker({
							position: results[0].geometry.location,
							title: marker.post_title,
							custom_fields: marker.custom_fields
						}));

						self.markers[self.markers.length - 1].infoWindow = new google.maps.InfoWindow({
							content: marker.post_content
						});

						self.addMarker(self.markers[self.markers.length - 1]);
						self.map.setCenter(self.markers[0].position);
					}
				});
			});
		},

		//////////////////////////////////////////////////////////////////////////////

		/**
		 * Add Marker
		 */

		addMarkers: function (markers) {

			var self = this;

			$.each(markers, function (index, marker) {
				self.addMarker(marker);
			});
		},

		addMarker: function(marker) {

			var self = this;

			if (marker.getMap() === undefined) {
				marker.setMap(self.map);

				google.maps.event.addListener(marker, 'click', function () {
					marker.infoWindow.open(self.map, marker);
				});
			}
		},

		//////////////////////////////////////////////////////////////////////////////

		/**
		 * Remove Marker
		 */

		removeMarkers: function(markers) {

			var self = this;
			$.each(markers, function (index, marker) {
				self.removeMarker(marker);
			});
		},

		removeMarker: function (marker) {

			if (marker.getMap() !== undefined) {
				marker.setMap(undefined);
			}
		}

		//////////////////////////////////////////////////////////////////////////////

	});

})(Tc.$);


/**
 *
 * Listen for global Google Maps API Callback
 *
 */

window.mapsReadyCallback = function () {
	$(document).trigger('mapsReadyCallback');

};