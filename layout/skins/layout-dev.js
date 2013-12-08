(function($) {

    Tc.Module.Layout.Dev = function(parent) {

        this.on = function(callback) {

			var $ctx = this.$ctx,
				$badge = $('<div class="badge">DEV</div>');

			this.$ctx.prepend($badge);

			$ctx.on('keydown', function(ev) {

				if(ev.keyCode == 68) { // d
					$ctx.toggleClass('css-hint');
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
