(function ($) {

	Tc.Module.Map.Icelabs = function (parent) {



		//////////////////////////////////////////////////////////////////////////////

		this.on = function (callback) {

			var self = this;

			this.sandbox.subscribe('map', this);

			// Bind Change Filter
			this.bindFilterChange();

			// call parent constructor, must be called last
			parent.on(callback);
		};

		//////////////////////////////////////////////////////////////////////////////


		this.bindFilterChange = function () {

			var self = this,
				$filterItems = $('.filter-item', this.$ctx);

			$filterItems.on('change', function (ev) {

				var $clickedFilter = $(ev.target).closest('.filter-item'),
					$filterItems = $('input:checked', $filterItems),
					filterBy = [];

				// Toggle Clicked Filter
				$clickedFilter.toggleClass('active');

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

	};

})(Tc.$);