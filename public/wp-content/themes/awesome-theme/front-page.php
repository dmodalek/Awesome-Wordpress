<? get_header(); ?>

<h1>Awesome</h1>

<?php
	// Start the Loop.
	while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php
			the_title( '<header class="entry-header"><h2 class="entry-title">', '</h2></header><!-- .entry-header -->' );
		?>

		<div class="entry-content">
			<?php
				the_content();
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfourteen' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
			?>
		</div>
	</article>
<?
	endwhile;
?>

<?= module('example') ?>

<? get_sidebar(); ?>

<? get_footer(); ?>
