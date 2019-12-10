<?php
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
	<script type="text/javascript">
		var templateUrl = '<?= get_bloginfo("url"); ?>';
	</script>
	<link href="https://vjs.zencdn.net/7.2.3/video-js.css" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class('single'); ?>>
	<div class="container-fluid">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				<div class="container-fluid">
					<?php
				while (have_posts()) :
					the_post();

					get_template_part('template-parts/content', get_post_type());

					// Custom post nav array
					the_post_navigation(array(
						'prev_text'     => 	__('<span class="title">
													<i class="fas fa-chevron-left"></i>
												</span>
												<span class="post-title">%title</span>', 'pentamint_wp_theme'),
						'next_text'     =>  __('<span class="title">
													<i class="fas fa-chevron-right"></i>
												</span>
												<span class="post-title">%title</span>', 'pentamint_wp_theme'),
						'in_same_term'          => true,
						'taxonomy'              => __('category', 'pentamint_wp_theme'),
						'screen_reader_text'	=> __('계속 보기', 'pentamint_wp_theme'),
					));
					// Custom post nav array end
					?>
					<div class="back-btn-wrapper">
						<a href="<?= get_bloginfo("url"); ?>/category/vip/cn/">매장 전체보기</a>
					</div>
					<?php

					// If comments are open or we have at least one comment, load up the comment template.
					if (comments_open() || get_comments_number()) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
				</div>
			</main><!-- #main -->

			<?php get_sidebar(); ?>

		</div><!-- #primary -->
	</div><!-- .container-fluid -->

	<?php wp_footer(); ?>
</body>

<script src="https://vjs.zencdn.net/7.2.3/video.js"></script>

</html>