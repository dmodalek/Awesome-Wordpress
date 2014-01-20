(function ($) {

	Tc.Module.Map = Tc.Module.extend({

		init: function ($ctx, sandbox, modId) {

			// call parent constructor, must be called first
			this._super($ctx, sandbox, modId);

		},

		on: function (callback) {

			// callback, must be called last
			callback();
		},

		after: function() {

		}

	});

})(Tc.$);
