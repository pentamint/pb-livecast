<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Pentamint_WP_Theme
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

</div><!-- #content -->

<footer id="colophon" class="site-footer collapse navbar-collapse" role="contentinfo">
	<div class="footer-wrapper container-fluid ">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8">
					<div class="site-info">
						All Rights Reserved © <?php echo date("Y"); ?> <span class="sep"> | </span><a href="https://www.pariscroissant.co.kr/"><span class="enfont">Paris Croissant Co., Ltd.</span></a>
					</div><!-- .site-info -->

				</div><!-- .col-md-8 -->
				<div class="col-md-4">
					<div class="pm-system-info">
						System Version
						<?php
						$my_theme = wp_get_theme('pentamint-wp-theme');
						if ($my_theme->exists())
							echo $my_theme->get('Version');
						?>
					</div>
				</div><!-- .col-md-4 -->
			</div><!-- .row -->
		</div><!-- .container-fluid -->
	</div><!-- .footer-wrapper -->
</footer><!-- #colophon -->

</div><!-- #pm-wrapper -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>