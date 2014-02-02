(function ($) {

	Tc.Module.Content.Profile = function(parent) {

		this.on = function (callback) {

			// Do stuff here
			//...

			var $langItems = $('.lang-switch-item', this.$ctx);

			$langItems.on('click', function(ev) {

				$langItems.removeClass('active');
				$(this).addClass('active');

				// Todo: Hide and Show EN / DE, hide Switcher if only one Language
			});

			// call parent constructor
			parent.on(callback);
		};

	};

})(Tc.$);