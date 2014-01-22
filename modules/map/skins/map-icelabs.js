(function ($) {

	Tc.Module.Map.Icelabs = function (parent) {

		this.mapsReadyCallback = 'mapsReadyCallback';
		this.map = null;
		this.marker = [];

		//////////////////////////////////////////////////////////////////////////////


		this.on = function (callback) {

			var self = this;

			// Init Map on Callback
			$(document).on(this.mapsReadyCallback, function() {
				$.proxy(self.initMapData(), self);
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


		this.bindFilterChange = function() {

			var self = this,
				$filterItems = $('.filter-item', this.$ctx);

			$filterItems.on('change', function(e) {

				var $filter = $('input:checked', $filterItems);
				self.filterMapBy($filter);
			});
		};


		//////////////////////////////////////////////////////////////////////////////


		/**
		 *
		 * Load Google Maps API
		 *
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
		 *
		 * Initialize Google Map
		 *
		 */

		this.initMapData = function () {

			var self = this,
				geocoder = new google.maps.Geocoder(),
				facts = modMapIcelabFacts;

			this.map = new google.maps.Map(document.getElementById('map-canvas'), { zoom: 4 });

			$.each(facts, function(index, fact) {

				var custom_fields = fact.custom_fields;

				// Async
				geocoder.geocode({ 'address': custom_fields.fact_plz_city + ' ' + custom_fields.fact_country }, function (results, status) {
					if (status == google.maps.GeocoderStatus.OK) {

						self.marker.push(new google.maps.Marker({
							position: results[0].geometry.location,
							title: fact.post_title
						}));

						self.marker[self.marker.length - 1].infoWindow = new google.maps.InfoWindow({
							content: fact.post_content
						});

						self.addMarker(self.marker[self.marker.length - 1]);
						self.map.setCenter(self.marker[0].position);
					}
				});
			});
		};


		//////////////////////////////////////////////////////////////////////////////


		this.filterMapBy = function($filter) {

			var ids = [];

			// Get Ids of the active filter
			$filter.each(function(index, item) {
				ids.push($(item).attr('id'));
			});
		};


		//////////////////////////////////////////////////////////////////////////////


		this.addMarker = function(marker) {

			var self = this;
			$.each(this.marker, function(index, marker) {

				marker.setMap(self.map);

				google.maps.event.addListener(marker, 'click', function () {

					marker.infoWindow.open(self.map, marker);
				});
			});
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