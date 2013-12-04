/**
 * Terrific Bootstrap
 */
(function ($) {
	$(document).ready(function () {
		var $page = $('body');
		window.application = new Tc.Application($page);
		application.registerModules();
		application.registerModule($page, 'layout');
		application.start();
	});
})(Tc.$);