(function ($) {

	Tc.Module.LangMenu = Tc.Module.extend({

		init: function ($ctx, sandbox, modId) {

			// call parent constructor
			this._super($ctx, sandbox, modId);

			// Do stuff here
			//...

		},

		on: function (callback) {

			$('.nav-item-link', this.$ctx).first().on('click', function(e) {
				e.preventDefault();
			});

			// callback
			callback();
		},

		after: function() {

		}

	});

})(Tc.$);
