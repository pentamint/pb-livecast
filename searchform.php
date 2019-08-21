<?php
/**
 * The template for displaying search forms
 *
 * @link https://wpsmackdown.com/creating-bootstrap-wordpress-theme-search/
 * 
 * @package Pentamint_WP_Theme
 */

 // Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<!-- Store search terms in variable for result page use -->
<?php $search_terms = htmlspecialchars( isset($_GET["s"]) ); ?>

<form role="form" action="<?php bloginfo('url'); ?>/" id="searchform" method="get">
    <label for="s" class="sr-only">검색하기</label>
    <div class="input-group">
        <input type="text" class="form-control" id="s" name="s" placeholder="검색어를 입력하세요"<?php if ( $search_terms !== '' ) { echo ' value="' . $search_terms . '"'; } ?> />
        <span class="input-group-btn">
            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
        </span>
    </div> <!-- .input-group -->
</form>