(function ($) {
	/**
	 * NavMain module implementation.
	 *
	 * @namespace Tc.Module
	 * @class NavMain
	 * @extends Tc.Module
	 */
	Tc.Module.MainMenu = Tc.Module.extend({

		/**
		 * Initializes the NavMain module.
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
		},

		/**
		 * Hook function to do all of your module stuff.
		 *
		 * @method on
		 * @param {Function} callback function
		 * @return void
		 */
		on: function (callback) {
			var self = this,
				$ctx = this.$ctx;
				console.log('Module Main Menu Loaded');
			callback();
		}

	});
})(Tc.$);
