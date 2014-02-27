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

<!-- Fcebook API !-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Google Analytics !-->
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-42203121-1', 'whole-body-cryotherapy.com');
	ga('send', 'pageview');
</script>

</body>
</html>