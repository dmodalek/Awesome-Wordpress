<?php

/**
 * This is the wordpress functions.php file
 *
 * All the wordpress theme settings get included here.
 * Everything is splitted up in several file to keep it organised.
 *
 */

require get_template_directory() . '/inc/theme-setup.php';

require get_template_directory() . '/inc/helper.php';

require get_template_directory() . '/inc/posttypes.php';

require get_template_directory() . '/inc/taxonomies.php';

require get_template_directory() . '/inc/walker.php';