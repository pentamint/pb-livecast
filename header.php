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
				<header id="masthead" class="site-header pm-side-header collapse navbar-collapse">
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
						<div class="site-title">점포 스트릿뷰</div>
						<div class="nav-title">매장위치</div>
						<nav class="navbar navbar-default navbar-primary" role="navigation">
							<div class="nav-wrapper">
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
						<div class="nav-title">시스템 메뉴</div>
						<ul id="main-menu-2" class="nav navbar-nav">
							<li class="menu-item"><a href="/pb-livecast/dashboard/" class="nav-link">Dashboard</a></li>
						</ul>

					</div><!-- .masthead-container -->
				</header><!-- #masthead -->

			</div><!-- #vertical-sidebar-placeholder -->

			<!-- Brand and toggle get grouped for better mobile display -->
			<div id="secondary-header" class="collapse navbar-collapse">
				<div class="secondary-header-wrapper">
					<button type="button" class="navbar-toggle hamburger hamburger--spring" data-toggle="collapse" data-target="#masthead, #content, #secondary-header, footer#colophon">
						<span class="sr-only">Toggle navigation</span>
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>

					<!-- Secondary header search form -->
					<?php get_search_form(); ?>

					<!-- Secondary header widget area -->
					<div class="secondary-header-widget-wrapper">
						<!-- Secondary header search button -->
						<button type="button" class="search-toggle" data-target="#search_form">
							<i class="fas fa-search"></i>
						</button>

						<?php if (is_user_logged_in()) { ?>
						<div class="account-setting">
							<a href="/pb-livecast/account/" class="account-setting"><i class="fas fa-cog"></i></a>
						</div>
						<div class="log-out">
							<a href="/pb-livecast/logout/" class="log-out"><i class="fas fa-sign-out-alt"></i></a>
						</div>
						<?php } ?>

						<div class="welcome-block">
							<span class="welcome-msg">
								<?php global $current_user;
								wp_get_current_user(); ?>
								<?php if (is_user_logged_in()) {
									echo $current_user->display_name . '님,<br>' . '반갑습니다!';
								} else { ?>
								<a href="/pb-livecast/login/" class="log-in">로그인</a>
								<?php } ?>
							</span>
						</div>
					</div><!-- .secondary-header-widget-wrapper -->
				</div><!-- .secondary-header-wrapper -->
			</div><!-- #secondary-header -->

			<div id="content" class="site-content collapse navbar-collapse">