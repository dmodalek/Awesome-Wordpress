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
	<?php get_sidebar('footer'); ?>
</footer>

</div><!-- .site-wrapper -->

<?php wp_footer(); ?>

<script type="text/javascript">

	/**
	 * Terrific Bootstrap
	 *
	 * Defined here in PHP instead as single JS file in order
	 * to use PHP path functions like get_template_directory_uri()
	 *
	 */

	(function ($) {
		$(document).ready(function () {
			var $html = $('html');
			window.application = new Tc.Application($html);
			application.config = {
				themeDir: '<?= get_template_directory_uri() ?>'
			};

			application.registerModules($html);
			application.start();
		});
	})(Tc.$);

</script>

</body>
</html>