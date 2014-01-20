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




<script src="<?= get_template_directory_uri() ?>/javascript/require.js"></script>
<script type="text/javascript">


	require.config({
		baseUrl: '<?= get_template_directory_uri() ?>',
		paths: {
			'jQuery': 'javascript/jquery',
			'Terrific': 'javascript/terrific'
		},
		shim: {
			'jQuery': {
				exports: '$'
			},
			'Terrific': {
				deps: ['jQuery'],
				exports: 'Tc'
			}
		}
	});

	require(['jQuery', 'Terrific'], function ($, Tc) {

		/**
		 * Terrific Bootstrap
		 *
		 * Defined here in PHP instead as single JS file in order
		 * to use PHP path functions like get_template_directory_uri()
		 *
		 */

		$(document).ready(function () {

			var $html = $('html');
			window.application = new Tc.Application($html);
			application.config = {
				themeDir: '<?= get_template_directory_uri() ?>'
			};

			application.start();

			// Iterate over Markup to find all Modules
			$html.find('[class^="mod"]').each(function(index, mod) {

				var $mod = $(mod).wrap('<div>').parent();

				// Register and Start Module
				application.sandbox.registerModule($mod);
				application.sandbox.startModules($mod);
			});
		});
	});


</script>

</body>
</html>