<?php


function enhanceGetPostsWithCustomFields($posts) {
	for ($i = 0; $i < count($posts); $i++) {

		$custom_fields = get_post_custom($posts[$i]->ID);
		$posts[$i]->custom_fields = $custom_fields;
	}

	return $posts;
}


function getMarkupFromAttachment($attachment_obj, $size) {

	// Attachment Properities
	$fileext = pathinfo($attachment_obj['url'], PATHINFO_EXTENSION);
	$image = wp_get_attachment_image_src($attachment_obj['id'], $size);

	// Custom Icons
	$iconPath = '/wp-includes/images/crystal';

	switch ($fileext) {

		// Images as Thumbs with Caption and Link to Full Image,
		case 'png':
		case 'jpeg':
		case 'jpg':
		case 'gif':
			$output = sprintf('<a class="attachment-link" href="%s" target="_blank"><div class="img-wrapper"><img class="attachment-icon" src="%s" width="%s" height="%s" alt="%s"/></div><p class="wp-caption-text">%s</p></a>', $attachment_obj['url'], $image[0], $image[1], $image[2], $attachment_obj['alt'], $attachment_obj['title'], $attachment_obj['caption']);
			break;

		// PDFs as Icon with Caption and Link to File
		case 'pdf':
			$output = sprintf('<a class="attachment-link" href="%s" target="_blank"><div class="img-wrapper"><img class="attachment-icon" src="%s" alt="%s" /></div><p class="wp-caption-text">%s</p></a>', $attachment_obj['url'], $iconPath . '/document.png', $attachment_obj['alt'], $attachment_obj['title']);
			break;
		// Audio Files as Icon with Caption and Link to File
		case 'mp3':
		case 'm4a':
			$output = sprintf('<a class="attachment-link" href="%s" target="_blank"><div class="img-wrapper"><img class="attachment-icon" src="%s" alt="%s" /></div><p class="wp-caption-text">%s</p></a>', $attachment_obj['url'], $iconPath . '/audio.png', $attachment_obj['alt'], $attachment_obj['title']);
			break;

		// Video Files as Icon with Caption and Link to File
		case 'mov':
		case 'avi':
		case 'wmv':
			$output = sprintf('<a class="attachment-link" href="%s" target="_blank"><div class="img-wrapper"><img class="attachment-icon" src="%s" alt="%s" /></div><p class="wp-caption-text">%s</p></a>', $attachment_obj['url'], $iconPath . '/video.png', $attachment_obj['alt'], $attachment_obj['title']);
			break;

		// Fallback
		default:
			$output = sprintf('<a class="attachment-link" href="%s" target="_blank"><div class="img-wrapper"><img class="attachment-icon" src="%s" alt="%s" /></div><p class="wp-caption-text">%s</p></a>', $attachment_obj['url'], $iconPath . '/document.png', $attachment_obj['alt'], $attachment_obj['title']);
	}

	return $output;
}

?>
