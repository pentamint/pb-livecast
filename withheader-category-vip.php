<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>

<div class="container-fluid">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="container-fluid">
                <div class="row">
                    <?php 
                        if (have_posts()) :

                            /* Start the Loop */
                            while (have_posts()) :
                                the_post();

                                /*
                                * Include the Post-Type-specific template for the content.
                                * If you want to override this in a child theme, then include a file
                                * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                                */
                                get_template_part('template-parts/content-cat-vip', get_post_type());

                            endwhile;

                        the_posts_navigation();

                        else :

                            get_template_part('template-parts/content', 'none');

                        endif;
                    ?>
                </div>
            </div><!-- container-fluid -->
        </main>

        <?php get_sidebar(); ?>

    </div><!-- #primary -->
</div><!-- .container-fluid -->

<?php
get_footer();