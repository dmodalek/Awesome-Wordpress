(function ($) {

	Tc.Module.Map.Icelabs = function (parent) {

		this.mapsReadyCallback = 'mapsReadyCallback';
		this.map = null;
		this.markers = [];

		//////////////////////////////////////////////////////////////////////////////

		this.on = function (callback) {

			var self = this;

			this.sandbox.subscribe('map', this);

			// Init Map on Callback
			$(document).on(this.mapsReadyCallback, function () {
				$.proxy(self.initMapMarkers(), self);
			});

			// Bind Change Filter
			this.bindFilterChange();

			// call parent constructor, must be called last
			parent.on(callback);
		};

		this.after = function () {

			this.loadMapAPI();

			// callback, must be called last
			parent.after();
		};


		//////////////////////////////////////////////////////////////////////////////


		this.bindFilterChange = function () {

			var self = this,
				$filterItems = $('.filter-item', this.$ctx);

			$filterItems.on('change', function (e) {

				var $filterItems = $('input:checked', $filterItems),
					filterBy = [];

				// Get Ids of the active filter
				$filterItems.each(function (index, item) {
					filterBy.push($(item).attr('id'));
				});

				// Filter the map
				self.filterMapBy(filterBy);

				// Fire map change to List
				self.fire('mapChange', { 'filterBy' : filterBy }, ['map']);
			});
		};


		//////////////////////////////////////////////////////////////////////////////


		/**
		 * Load Google Maps API
		 */

		this.loadMapAPI = function () {

			var apiKey = 'AIzaSyCHfBbGLxR4PCDV_OCaqcF20AzV2KADA1Y',
				script = document.createElement('script');

			script.type = 'text/javascript';
			script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&API_KEY=' + apiKey + '&sensor=false&' +
				'callback=' + this.mapsReadyCallback;
			document.body.appendChild(script);
		};


		//////////////////////////////////////////////////////////////////////////////


		/**
		 * Initialize Google Map
		 */

		this.initMapMarkers = function () {

			var self = this,
				geocoder = new google.maps.Geocoder(),
				facts = modMapIcelabFacts;

			this.map = new google.maps.Map(document.getElementsByClassName('map-canvas')[0], { zoom: 4 });

			$.each(facts, function (index, fact) {

				var custom_fields = fact.custom_fields;

				// Async
				geocoder.geocode({ 'address': custom_fields.fact_plz_city + ' ' + custom_fields.fact_country }, function (results, status) {

					if (status == google.maps.GeocoderStatus.OK) {

						self.markers.push(new google.maps.Marker({
							position: results[0].geometry.location,
							title: fact.post_title,
							custom_fields: fact.custom_fields
						}));

						self.markers[self.markers.length - 1].infoWindow = new google.maps.InfoWindow({
							content: fact.post_content
						});

						self.addMarker(self.markers[self.markers.length - 1]);
						self.map.setCenter(self.markers[0].position);
					}
				});
			});
		};


		//////////////////////////////////////////////////////////////////////////////

		this.filterMapBy = function (filterBy) {

			var areas = '',
				found = false;

			// Iterate over each markers
			var markersToAdd = _.filter(this.markers, function (marker) {

				areas = marker.custom_fields.fact_areas.toString();
				found = false;

				// Iterate over each filter
				_.each(filterBy, function (filter) {

					if ((areas.indexOf(filter) !== -1)) {
						found = true;
					}
				});

				return found;
			});

			var markersToRemove = _.difference(this.markers, markersToAdd);

			this.removeMarkers(markersToRemove);
			this.addMarkers(markersToAdd);
		};

		//////////////////////////////////////////////////////////////////////////////

		this.removeMarkers = function (markers) {

			var self = this;
			$.each(markers, function (index, marker) {
				self.removeMarker(marker);
			});
		};

		this.removeMarker = function (marker) {

			if (marker.getMap() !== undefined) {
				marker.setMap(undefined);
			}
		};

		//////////////////////////////////////////////////////////////////////////////


		this.addMarkers = function (markers) {

			var self = this;

			$.each(markers, function (index, marker) {
				self.addMarker(marker);
			});
		};

		this.addMarker = function(marker) {

			var self = this;

			if (marker.getMap() === undefined) {
				marker.setMap(self.map);

				google.maps.event.addListener(marker, 'click', function () {
					marker.infoWindow.open(self.map, marker);
				});
			}
		};


		//////////////////////////////////////////////////////////////////////////////

	};

})(Tc.$);


/**
 *
 * Listen for global Google Maps API Callback
 *
 */

window.mapsReadyCallback = function () {
	$(document).trigger('mapsReadyCallback');

};