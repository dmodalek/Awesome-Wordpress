(function ($) {

	Tc.Module.Debug = Tc.Module.extend({

		init: function ($ctx, sandbox, modId) {
			// call base constructor
			this._super($ctx, sandbox, modId);
		},

		on: function (callback) {
			var self = this,
				$ctx = this.$ctx;


			callback();
		}

	});
})(Tc.$);
