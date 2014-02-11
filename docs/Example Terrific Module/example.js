(function ($) {

	Tc.Module.Example = Tc.Module.extend({

		init: function ($ctx, sandbox, modId) {

			// call parent constructor
			this._super($ctx, sandbox, modId);

			// Do stuff here
			//...

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
