<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pentamint_WP_Theme
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>

<div class="container-fluid">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php if (have_posts()) : ?>

			<header class="page-header">
				<h1 class='page-title'><span>매장 목록: 전체보기</span></h1>
				<?php
					the_archive_description('<div class="archive-description">', '</div>');
					?>
			</header><!-- .page-header -->

			<?php
				/* Start the Loop */
				while (have_posts()) :
					the_post();

					/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
					get_template_part('template-parts/content', get_post_type());

				endwhile;

				the_posts_navigation();

			else :

				get_template_part('template-parts/content', 'none');

			endif;
			?>

		</main><!-- #main -->

		<?php get_sidebar(); ?>

	</div><!-- #primary -->
</div><!-- .container-fluid -->

<?php
get_footer();
