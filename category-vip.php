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

<body <?php body_class('archive'); ?>>
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

    <?php wp_footer(); ?>
</body>

<style>
    #main>.container-fluid>.row {
        padding-top: 20px;
        /* add top padding */
    }

    body.archive article.post .post-wrapper {
        background-color: transparent;
        -webkit-box-shadow: 0px -1px 35px 0px rgba(154, 161, 171, 0.15);
        box-shadow: 0px -1px 35px 0px rgba(154, 161, 171, 0.15);
    }

    h2.entry-title {
        margin-bottom: 0;
    }

    body.archive article.post .post-wrapper header.entry-header .entry-title a {
        color: #727cf5;
    }

    .video-js,
    .video-js .vjs-tech {
        /* height: auto !important; */
    }

    .video-js {
        width: 100% !important;
        max-width: 1024px;
        margin-left: auto;
        margin-right: auto;
    }

    .vjs-control-bar {
        display: none !important;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-hls/5.15.0/videojs-contrib-hls.min.js"></script>
<script src="https://vjs.zencdn.net/7.2.3/video.js"></script>

<script>
    (function ($) {
        $(window).on('load resize', function () {
            var vidwidth = jQuery('img.attachment-post-thumbnail').width();
            var vidheight = vidwidth * .8;
            jQuery('.video-js').css('height', vidheight);
        });
    })(jQuery);
</script>

</html>