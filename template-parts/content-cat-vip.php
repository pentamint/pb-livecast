<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pentamint_WP_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-6 col-sm-4'); ?>>
	<div class="post-wrapper">

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
			<!-- Bootstrap switch button -->
			<div class="btn-wrapper video-toggle-wrapper">
				<span>Play</span>
				<button type="button" class="btn btn-xs btn-toggle btn-video" data-toggle="button" aria-pressed="false"
					autocomplete="off">
					<div class="handle"></div>
				</button>
			</div>

			<script>
				// Create video buttons with dynamic ids
				var vidBtn = [];
				var vidBtn = document.getElementsByClassName('btn-video');
				for (i = 0; i < vidBtn.length; i++) {
					vidBtn[i].id = 'playBtn' + i;
				}

				// Add click event to buttons
				var vidBtns = document.getElementsByClassName('btn-video');
				var vidWrapper = document.getElementsByClassName('entry-content');
				var imgWrapper = document.getElementsByClassName('post-thumbnail');

				for (var i = 0; i < vidBtns.length; i++) {
					vidBtns[i].addEventListener("click", bindClick(i));
				}

				function bindClick(i) {
					return function() {
						if (!vidBtns[i].classList.contains('active')) {
							vidWrapper[i].style.display = "block";
							imgWrapper[i].style.display = "none";
						} else {
							vidWrapper[i].style.display = "none";
							imgWrapper[i].style.display = "block";							
						}
					};
				}
			</script>

			<style>
				.video-toggle-wrapper {
					position: absolute;
					right: 30px;
					top: 12px;
					display: flex;
					align-items: center;
					font-size: 11px;
				}

				.video-toggle-wrapper span {
					margin-right: 5px;
				}

				.btn-toggle {
					margin: 0 4rem;
					padding: 0;
					position: relative;
					border: none;
					height: 1.5rem;
					width: 3rem;
					border-radius: 1.5rem;
					color: #6b7381;
					background: #bdc1c8;
				}

				.btn-toggle.btn-xs:active {
					transition: background-color 0.25s;
				}

				.btn-toggle.btn-xs.active>.handle {
					left: 1.125rem;
					transition: left 0.25s;
				}

				.btn-toggle.btn-xs {
					margin: 0 0;
					padding: 0;
					position: relative;
					border: none;
					height: 1rem;
					width: 2rem;
					border-radius: 1rem;
				}

				.btn-toggle.btn-xs>.handle {
					position: absolute;
					top: 0.125rem;
					left: 0.125rem;
					width: 0.75rem;
					height: 0.75rem;
					border-radius: 0.75rem;
					background: #fff;
					transition: left 0.25s;
				}

				.btn-toggle.active {
					background-color: #0acf97;
				}
			</style>
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

		<?php pentamint_wp_theme_post_thumbnail(); ?>

		<footer class="entry-footer">
			<?php pentamint_wp_theme_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div><!-- .post-wrapper -->
</article><!-- #post-<?php the_ID(); ?> -->