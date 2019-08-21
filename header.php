<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Pentamint_WP_Theme
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script src="https://kit.fontawesome.com/ec23c08cf8.js"></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="page" class="site">

		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'pentamint_wp_theme'); ?></a>

		<div id="pm-wrapper" class="wrapper">
			<div id="vertical-sidebar-placeholder">
				<!-- ========== Left Side Header Start ========== -->
				<header id="masthead" class="site-header pm-side-header collapse navbar-collapse show">
					<div class="masthead-container">
						<!-- LOGO -->
						<div class="site-branding">
							<?php
							the_custom_logo();
							if (is_front_page() && is_home()) :
								?>
							<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
							<?php
							else :
								?>
							<p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
							<?php
							endif;
							$pentamint_wp_theme_description = get_bloginfo('description', 'display');
							if ($pentamint_wp_theme_description || is_customize_preview()) :
								?>
							<p class="site-description"><?php echo $pentamint_wp_theme_description; /* WPCS: xss ok. */ ?></p>
							<?php endif; ?>
						</div><!-- LOGO -->
						<!-- Site Navigation -->
						<nav class="navbar navbar-default navbar-primary" role="navigation">
							<div class="nav-wrapper">
								<!-- Brand and toggle get grouped for better mobile display -->
								<button type="button" class="navbar-toggle hamburger hamburger--spring" data-toggle="collapse" data-target="#masthead">
									<span class="sr-only">Toggle navigation</span>
									<span class="hamburger-box">
										<span class="hamburger-inner"></span>
									</span>
								</button>
								<?php
								wp_nav_menu(
									array(
										'theme_location'    => 'primary',
										'container_class'   => 'menu-wrapper',
										'container_id'      => 'main-menu-wrapper',
										'menu_class'        => 'nav navbar-nav',
										'menu_id'			=> 'main-menu',
										'depth'             => 2,
										'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
										'walker'            => new wp_bootstrap_navwalker()
									)
								);
								?>
								<div class="menu-overlay"></div>
							</div><!-- .nav-wrapper -->
						</nav><!-- Site Navigation -->
					</div><!-- .masthead-container -->
				</header><!-- #masthead -->

			</div><!-- #vertical-sidebar-placeholder -->

			<div id="content" class="site-content">