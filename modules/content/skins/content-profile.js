(function ($) {

	Tc.Module.Content.Profile = function(parent) {

		this.on = function (callback) {

			var $langItems = $('.lang-switch-item', this.$ctx),
				$descItems = $('.desc-item', this.$ctx);

			// Click on Tab Item
			$langItems.on('click', function(ev) {

				var $clickedLangItem = $(this),
					index = $clickedLangItem.index();

				// Toggle Classes
				$langItems.removeClass('active');
				$(this).addClass('active');

				// Toggle visible desc
				$descItems.hide().eq(index).show();
			});

			// call parent constructor
			parent.on(callback);
		};

	};

})(Tc.$);