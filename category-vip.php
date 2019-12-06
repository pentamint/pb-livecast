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

<body <?php body_class('archive');?>>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-hls/5.15.0/videojs-contrib-hls.min.js"></script>
<script src="https://vjs.zencdn.net/7.2.3/video.js"></script>

<script>
    (function ($) {
        // Set default play store
        $(window).on('load', function () {
            if (!vidBtns[0].classList.contains('active')) {
                vidBtns[0].className += " active";
                vidPlayer[0].style.display = "block";
                thumbImg[0].style.opacity = "0";
            }
        });

        // Init vidheight variable
        var vidwidth = jQuery('.post-wrapper').width();
        var vidheight = vidwidth * .8;

        // Set vid height on window load or resize
        $(window).on('load resize', function () {
            jQuery('.video-js').css('height', vidheight);
            jQuery('.post-thumbnail').css('height', vidheight);
        });

        // Init mouseover play effect
        $(document).ready(function () {
            $(thumbImg).each(function (i, value) {
                if (!$(vidBtns[i]).hasClass('active')) {
                    $(thumbImg[i]).hover(bindHover(i), unbindHover(i))
                }
            });

            function bindHover(i) {
                return function () {
                    // vidPlayer[i].setAttribute('style', `display: block !important; height: ${vidheight + 'px'};`);
                    vidPlayer[i].setAttribute('style', "display: block !important; height: ".concat(vidheight + 'px', ";"));
                    $(vidPlayer[i]).addClass('dshow');
                    $(thumbImg[i]).addClass('ohide');
                }
            }

            function unbindHover(i) {
                return function () {
                    $(vidPlayer[i]).removeClass('dshow');
                    $(thumbImg[i]).removeClass('ohide');
                }
            }
        });
    })(jQuery);
</script>

</html>