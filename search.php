<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Pentamint_WP_Theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<?php
    // Get number of results -> store in variable
    $results_count = $wp_query->found_posts;
    ?>

    <!-- Search Terms & Number of Results -->
    <div class="jumbotron">
        <div class="container">
            <h1>키워드 <span class="keyword">&ldquo;<?php the_search_query(); ?>&rdquo;</span> 검색결과</h1>
            <?php if ($results_count == '' || $results_count == 0) { // No Results ?>
                <p><span class="label label-danger"><?php _e('앗! 입력하신 키워드로 검색된 결과가 없습니다..','pentamint_wp_theme'); ?></span>&nbsp;<br><?php _e('철자와 띄어쓰기를 확인해 보거나 다른 검색어를 입력해 보시는건 어떨까요?','pentamint_wp_theme'); ?></p>
            <?php } else { // Results Found ?>
                <p><span class="label label-success"><?php echo $results_count . __(' 개의 검색결과','pentamint_wp_theme'); ?></span></p>
            <?php } // end results check ?>
            <div class="row">
                <div class="col-md-4">
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div> <!-- .container -->
    </div> <!-- .jumbotron -->

        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <?php if (have_posts()) : // Results Found ?>

                    <h2><?php _e('Search Results','pentamint_wp_theme'); ?></h2>

                <?php while (have_posts()) : the_post(); ?>

                    <article <?php post_class(); ?>>
                        <h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                        <div class="entry">
                            <p><?php echo wp_trim_words( get_the_excerpt(), 30, '...' ); ?></p>
                        </div>
                    </article>

                    <hr />

                <?php endwhile; ?>

                    <ul class="pager">
                        <li><?php next_posts_link('<i class="icon-chevron-left"></i>&nbsp; Older Results') ?></li>
                        <li><?php previous_posts_link('Newer Results &nbsp;<i class="icon-chevron-right"></i>') ?></li>
                    </ul>

                <?php else : // No Results ?>

                    <p><?php _e('죄송합니다. 고객님께서 입력하신 키워드로 검색된 결과가 없습니다..<br>아래 최신글 목록과 사이트맵을 통해 찾으시는 컨텐츠를 간편하게 찾아보세요.','pentamint_wp_theme'); ?></p>
                    <div class="row">
                        <div class="col-md-6 posts">
                            <h3><?php _e('최신글 목록','pentamint_wp_theme'); ?></h3>
                            <ul>
                                <?php
                                    $args = array(
                                        'numberposts' => '10',
                                        'post_status' => 'publish'
                                    );
                                    $recent_posts = wp_get_recent_posts( $args );
                                    foreach( $recent_posts as $recent ) {
                                        echo '<li><a href="' . get_permalink($recent["ID"]) . '">' . $recent["post_title"] . '</a></li>';
                                    }
                                ?>
                            </ul>
                        </div> <!-- .posts -->
                        <div class="col-md-6 pages">
                            <h3><?php _e('사이트맵','pentamint_wp_theme'); ?></h3>
                            <ul>
                                <?php wp_list_pages('title_li=&sort_column=menu_order'); ?>
                            </ul>
                        </div> <!-- .pages -->
                    </div> <!-- .row -->

                <?php endif; ?>

            </main> <!-- #main -->

            <?php get_sidebar(); ?>

        </div> <!-- #primary -->

<?php
get_footer();
