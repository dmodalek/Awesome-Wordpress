<?php

	/**
	 * Row Shortcode
	 */

	function row_func($atts, $content = null){
		return '<div class="row">' . do_shortcode($content) . '</div>';
	}

	add_shortcode('row', 'row_func');
?>
