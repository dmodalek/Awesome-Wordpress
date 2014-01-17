<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the .site-wrapper and .site-main
 */
?>
			</div><!-- .site-main -->

			<footer class="site-footer" role="complementary">
				<?php echo module('footer') ?>
				<?php get_sidebar( 'footer' ); ?>
			</footer>

		</div><!-- .site-wrapper -->

		<?php wp_footer(); ?>
	</body>
</html>