<?php

 	function getMarkupFromAttachment($attachment_id, $size) {

		$output = '';

		// Attachment Properities
		$url = wp_get_attachment_url( $attachment_id );
		$title = get_the_title( $attachment_id );
		$caption = get_post_field('post_excerpt', $attachment_id);
		$alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
		$fileext = pathinfo($url, PATHINFO_EXTENSION);
		$image = wp_get_attachment_image_src($attachment_id, $size);

		// Custom Icons
		$iconPath = '/wp-includes/images/crystal';

		switch($fileext) {

			// Images as Thumbs with Caption and Link to Full Image,
			case 'png':
			case 'jpeg':
			case 'jpg':
			case 'gif':
				$output = sprintf('<a class="attachement-link" href="%s" target="_blank"><div class="img-wrapper"><img class="attachement-icon" src="%s" width="%s" height="%s" alt="%s"/></div><p class="wp-caption-text">%s</p></a>', $url, $image[0],  $image[1], $image[2], $alt, $title, $caption);
				break;

			// PDFs as Icon with Caption and Link to File
			case 'pdf':
				$output = sprintf('<a class="attachement-link" href="%s" target="_blank"><div class="img-wrapper"><img class="attachement-icon" src="%s" alt="%s" /></div><p class="wp-caption-text">%s</p></a>', $url, $iconPath . '/document.png', $alt, $title);
				break;
			// Audio Files as Icon with Caption and Link to File
			case 'mp3':
			case 'm4a':
				$output = sprintf('<a class="attachement-link" href="%s" target="_blank"><div class="img-wrapper"><img class="attachement-icon" src="%s" alt="%s" /></div><p class="wp-caption-text">%s</p></a>', $url, $iconPath . '/audio.png', $alt, $title);
				break;

			// Video Files as Icon with Caption and Link to File
			case 'mov':
			case 'avi':
			case 'wmv':
				$output = sprintf('<a class="attachement-link" href="%s" target="_blank"><div class="img-wrapper"><img class="attachement-icon" src="%s" alt="%s" /></div><p class="wp-caption-text">%s</p></a>', $url, $iconPath . '/video.png', $alt, $title);
				break;

			// Fallback
			default:
				$output = sprintf('<a class="attachement-link" href="%s" target="_blank"><div class="img-wrapper"><img class="attachement-icon" src="%s" alt="%s" /></div><p class="wp-caption-text">%s</p></a>', $url, $iconPath . '/document.png', $alt, $title);
		}

		return $output;
	}
?>
