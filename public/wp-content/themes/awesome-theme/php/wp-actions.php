<?php

function my_remove_menu_pages() {

    global $user_ID;

    if ( current_user_can( 'author' ) ) {
		remove_menu_page('index.php'); 			// Dashboard
		remove_menu_page('edit.php'); 			// Posts
		remove_menu_page('upload.php'); 		// Media
		remove_menu_page('edit-comments.php'); 	// Comments
		remove_menu_page('tools.php'); 			// Tools
    }
}
add_action( 'admin_init', 'my_remove_menu_pages' );

?>