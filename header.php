<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class( 'bg-white text-gray-900 antialiased' ); ?>>
<?php if(function_exists("wp_body_open")){
	wp_body_open();
} ?>

<?php do_action( 'virilis_theme_site_before' ); ?>

<div id="page" class="min-h-screen flex flex-col">

	<?php do_action( 'virilis_theme_header' ); ?>

	<header id="masthead" class="site-header" role="banner">
		<?php get_template_part( "template-parts/header/nav" ) ?>
	</header>

	<div id="content" class="site-content flex-grow">

		<?php if ( is_front_page() ) { ?>
			<!-- Start introduction -->
			
			<!-- End introduction -->
		<?php } ?>

		<?php do_action( 'virilis_theme_content_start' ); ?>

		<main>
