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

			<footer id="colophon" class="site-footer" role="contentinfo">
				<div class="container">
					<div class="row">
						<div class="col-md-9">
							<div class="site-info">
								All Rights Reserved © <?php echo date("Y"); ?> <span class="sep"> | </span><a href="http://www.spc.co.kr"><span class="enfont">SPC Co., Ltd.</span></a>
							</div><!-- .site-info -->

						</div><!-- .col-md-9 -->
						<div class="col-md-3">
							<div class="pm-system-info">
								System Version
								<?php
								$my_theme = wp_get_theme('pentamint-wp-theme');
								if ($my_theme->exists())
									echo $my_theme->get('Version');
								?>
							</div>
						</div><!-- .col-md-3 -->
					</div><!-- .row -->
				</div><!-- .container -->
			</footer><!-- #colophon -->

		</div><!-- #content -->
	</div><!-- #pm-wrapper -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>