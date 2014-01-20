(function ($) {

	Tc.Module.Example.Woot = function(parent) {

		this.on = function (callback) {

			// call parent constructor, must be called last
			parent.on(callback);
		},

		this.after = function () {

			// callback, must be called last
			parent.after();
		}

	};

})(Tc.$);