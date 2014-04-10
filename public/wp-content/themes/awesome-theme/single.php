<?php
// The Template for displaying all single posts

get_header(); ?>

	<div class="primary content-area">
		<div class="content site-content" role="main">
			<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'content', get_post_format() );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				endwhile;
			?>
		</div>
	</div>

<?php
get_sidebar();
get_footer();
