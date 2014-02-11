(function($) {

    Tc.Module.Layout.Dev = function(parent) {

        this.on = function(callback) {

			var $ctx = this.$ctx,
				$badge = $('<div class="badge" title="— Press G for Grid Helper\n— Press C for CSS Hint">DEV</div>');

			this.$ctx.prepend($badge);

			$ctx.on('keydown', function(ev) {

				if(ev.keyCode == 67) { // c
					$ctx.toggleClass('css-debug');
				}

				if(ev.keyCode == 71) { // g
					$ctx.toggleClass('grid-debug');
				}
			});

			// calling parent method
			parent.on(callback);
        };
    };
})(Tc.$);
