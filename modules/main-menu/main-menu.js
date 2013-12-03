(function ($) {
	/**
	 * NavMain module implementation.
	 *
	 * @namespace Tc.Module
	 * @class NavMain
	 * @extends Tc.Module
	 */
	Tc.Module.Mainmenu = Tc.Module.extend({

		/**
		 * Initializes the NavMain module.
		 *
		 * @method init
		 * @constructor
		 * @param {jQuery} $ctx the jquery context
		 * @param {Sandbox} sandbox the sandbox to get the resources from
		 * @param {String} modId the unique module id
		 */
		init: function ($ctx, sandbox, modId) {
			// call base constructor
			this._super($ctx, sandbox, modId);
		},

		/**
		 * Hook function to do all of your module stuff.
		 *
		 * @method on
		 * @param {Function} callback function
		 * @return void
		 */
		on: function (callback) {
			var self = this,
				$ctx = this.$ctx;

//			var $menuItems = $('.nav-item-l1 a', $ctx);
//
				// iterate over each top level menu item
//				$.each($menuItems, function(index, value) {
//
//					var $thisItem = $(this),
//						$thisSpans = $('span', $thisItem),
//						maxSpanWidth = 0;
//
//					// iterate over each span item in the current top level menu item
//					$.each($thisSpans, function(index, value) {
//
//						var thisSpanWidth = $(this).outerWidth();
//
//						if(thisSpanWidth > maxSpanWidth) { maxSpanWidth = thisSpanWidth }
//					});
//
//					maxSpanWidth = maxSpanWidth + 1;
//
//				 	$thisItem.attr('style', 'width: '+maxSpanWidth+'px;');
//				});



			callback();
		}

	});
})(Tc.$);
