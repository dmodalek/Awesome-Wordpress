(function ($) {

	/**
	 * Layout module implementation.
	 *
	 * @namespace Tc.Module
	 * @class Layout
	 * @extends Tc.Module
	 */
	Tc.Module.IcelabList = Tc.Module.extend({

		/**
		 * Initializes the Layout module.
		 *
		 * @method init
		 * @constructor
		 * @param {jQuery} $ctx the jquery context
		 * @param {Sandbox} sandbox the sandbox to get the resources from
		 * @param {String} modId the unique module id
		 */
		init: function ($ctx, sandbox, modId) {

			// call base constructor
			this._super($ctx, sandbox, modId);

			this.icelabList = null;

			this.sandbox.subscribe('map', this);
		},

		/**
		 * Hook function to do all of your module stuff.
		 *
		 * @method on
		 * @param {Function} callback function
		 * @return void
		 */
		on: function (callback) {

			var listOptions = {
				valueNames: [ 'name', 'area_wellness', 'area_sport', 'area_med', 'country' ]
			};

			this.icelabList = new List('facts-table', listOptions);

			callback();
		},

		onMapChange: function (data) {

			var filterBy = data.filterBy,
				keepInList = null;

			this.icelabList.filter(function (item) {

				keepInList = false;

				if (item.values().area_wellness == 'yes' && _.indexOf(filterBy, 'wellness') !== -1) {
					keepInList = true;
				}

				if (item.values().area_sport == 'yes' && _.indexOf(filterBy, 'sport')  !== -1) {
					keepInList = true;
				}
				if (item.values().area_med == 'yes' && _.indexOf(filterBy, 'medical')  !== -1) {
					keepInList = true;
				}

				return keepInList;
			});
		}
	});

})(Tc.$);
