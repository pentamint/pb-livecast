<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pentamint_WP_Theme
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( '아무것도 찾지 못했습니다..', 'pentamint_wp_theme' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( '신규 내용을 등록하실 준비가 되셨으면 <a href="%1$s">이 링크를 클릭</a> 하셔서 등록해 주시기 바랍니다.', 'pentamint_wp_theme' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

			<p><?php esc_html_e( '죄송합니다. 해당 키워드로 검색된 결과가 없습니다. 다른 키워드로 다시 검색해 주시기 바랍니다.', 'pentamint_wp_theme' ); ?></p>
			<?php
			get_search_form();

		else :
			?>

			<p><?php esc_html_e( '찾으시는 내용을 검색하지 못했습니다. 아래 검색창으로 키워드 검색을 해보시는건 어떨까요?', 'pentamint_wp_theme' ); ?></p>
			<?php
			get_search_form();

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
