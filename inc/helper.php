<?php

 	function getMarkupFromAttachment($attachment_id) {

		$output = '';

		// Attachment Properities
		$url = wp_get_attachment_url( $attachment_id );
		$title = get_the_title( $attachment_id );
		$alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
		$fileext = pathinfo($url, PATHINFO_EXTENSION);
		$image = wp_get_attachment_image_src($attachment_id, 'theme-profile-medium');

		// Custom Icons
		$pdfIcon = '/wp-includes/images/crystal/document.png';

		switch($fileext) {

			// Images as Thumbs with Caption and Link to Full Image,
			case 'png':
			case 'jpeg':
			case 'jpg':
			case 'gif':
				$output = sprintf('<a href="%s" target="_blank"><img src="%s" width="%s" height="%s" alt="%s"/><p class="wp-caption-text">%s</p></a>', $url, $image[0],  $image[1], $image[2], $alt, $title);
				break;

			// PDFs as Icon with Caption and Link to File
			case 'pdf':
			case 'doc':
			case 'docx':
			case 'ppt':
			case 'pptx':
			case 'pps':
			case 'ppsx':
			case 'odt':
			case 'xls':
			case 'xlsx':
				$output = sprintf('<a href="%s" target="_blank"><img src="%s" alt="%s" /><p class="wp-caption-text">%s</p></a>', $url, $pdfIcon, $alt, $title);
				break;
			// ZIP as Icon with Caption and Link to File
			case 'zip':
				$output = sprintf('<a href="%s" target="_blank"><img src="%s" width="%s" height="%s"/></a>', $url, $image[0],  $image[1], $image[2]);
				break;
			// Video Files as Icon with Caption and Link to File
			case 'mp4':
				$output = sprintf('<a href="%s" target="_blank"><img src="%s" width="%s" height="%s"/></a>', $url, $image[0],  $image[1], $image[2]);
				break;
			// Fallback
			default:
				$output = sprintf('<a href="%s" target="_blank"><img src="%s" width="%s" height="%s"/></a>', $url, $image[0],  $image[1], $image[2]);
		}

		return $output;
	}
?>
