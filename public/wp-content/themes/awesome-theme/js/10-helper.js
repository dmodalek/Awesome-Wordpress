
// Set element 100% Viewport Height

function setFullHeight($els, resize) {

	var resizeListener = typeof resize !== 'undefined' ? resize : true,
		$window = $(window),
		windowHeight = $window.height() - $('.header').height();

	$.each($els, function (index, el) {

		if (windowHeight > $(el).height()) {
			$(el).css({'height': windowHeight + 'px'});
		}
	});

	if(resizeListener) {
		$(window).resize(function () {
			setFullHeight($els, false);
		});
	}
}