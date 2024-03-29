<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pentamint_WP_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-wrapper">

		<?php pentamint_wp_theme_post_thumbnail(); ?>

		<header class="entry-header">
			<?php
			if (is_singular()) :
				the_title('<h1 class="entry-title">', '</h1>');
			else :
				the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
			endif;

			if ('post' === get_post_type()) :
				?>
			<div class="entry-meta">
				<?php
					pentamint_wp_theme_posted_on();
					pentamint_wp_theme_posted_by();
					?>
			</div><!-- .entry-meta -->
			<div class="tags-wrapper">
				<?php
					$tags_objects = wp_get_object_terms($post->ID, 'post_tag');
					if (!empty($tags_objects)) {
						if (!is_wp_error($tags_objects)) {
							echo '<ul>';
							foreach ($tags_objects as $term) {
								echo '<li class="tags_class '. $term->name .'"><a href="' . get_term_link($term->slug, 'post_tag') . '">' . esc_html($term->name) . '</a></li>';
							}
							echo '</ul>';
						}
					}
					?>
			</div>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
			the_content(sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'pentamint_wp_theme'),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			));

			wp_link_pages(array(
				'before' => '<div class="page-links">' . esc_html__('Pages:', 'pentamint_wp_theme'),
				'after'  => '</div>',
			));
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php pentamint_wp_theme_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div><!-- .post-wrapper -->
</article><!-- #post-<?php the_ID(); ?> -->