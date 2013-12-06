(function($) {

    Tc.Module.Layout.Dev = function(parent) {

        this.on = function(callback) {

			var  $ctx = this.$ctx
				,$badge = $('<div class="badge">DEV</div>')
			;

			this.$ctx.prepend($badge);
			$badge.on('click', function() {
				$ctx.toggleClass('gridle-debug');
			});

			$ctx.on('keydown', function(ev) {

				if(ev.keyCode == 68) { // d
					$ctx.toggleClass('gridle-debug');
				}
			})



			// calling parent method
			parent.on(callback);
        };
    };
})(Tc.$);
