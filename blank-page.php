<?php /* Template Name: Blank Page Template */ ?>

<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script src="https://kit.fontawesome.com/ec23c08cf8.js"></script>

	<?php wp_head(); ?>
</head>

<body>
    <?php
    the_post();
    the_content();
    ?>
</body>
</html>
