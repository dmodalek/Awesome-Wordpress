(function () {

	'use strict';

	Tc.Module.MainNav = Tc.Module.extend({

		init: function ($ctx, sandbox, modId) {

			// call parent constructor
			this._super($ctx, sandbox, modId);

			// Do stuff here
			//...

			var $mobileToggle = $('.mobile-toggle', this.$ctx);

		},

		on: function (callback) {

			// Do stuff here
			//...

			// callback
			callback();
		},

		after: function() {

		}

	});

})(Tc.$);