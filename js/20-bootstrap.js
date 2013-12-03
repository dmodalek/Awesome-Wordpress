/**
 * Terrific Bootstrapping
 */
(function ($) {
	$(document).ready(function () {
		var $page = $('body')
			,config = {
				dependencyPath: {
					library: window.assetsUrl + '/scripts/libs-dyn/',
					plugin:  window.assetsUrl + '/scripts/plugins-dyn/'
				}

				// !! See 400-grid.less for CSS Mediaqueries

				,mediaqueries: {
					'phone-max':	'(max-width: 620px)',
					'tablet-min':	'(min-width: 621px)',
					'tablet-max':	'(max-width: 1240px)',
					'desktop-min':	'(min-width: 1241px)'
				}
			};
		window.application = new Tc.Application($page, config);
		application.registerModules();
		application.registerModule($page, 'Layout');
		application.start();
	});
})(Tc.$);