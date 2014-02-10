(function ($) {

	Tc.Module.LangMenu = Tc.Module.extend({

		init: function ($ctx, sandbox, modId) {

			// call parent constructor
			this._super($ctx, sandbox, modId);

			// Do stuff here
			//...

		},

		on: function (callback) {

//			$('.dropdown', this.$ctx).dropdown();

			// callback
			callback();
		},

		after: function() {

		}

	});

})(Tc.$);
