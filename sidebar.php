<?php

// The Sidebar containing the main widget area

if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div class="primary-sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
<?php endif; ?>

