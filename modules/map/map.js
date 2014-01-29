(function ($) {

	Tc.Module.Map = Tc.Module.extend({

		init: function ($ctx, sandbox, modId) {

			// call parent constructor
			this._super($ctx, sandbox, modId);
		},

		on: function (callback) {

			// callback, must be called at the end
			callback();
		},

		after: function() {

		}

	});

})(Tc.$);
