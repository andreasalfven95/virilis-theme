<?php

/**
 * Theme setup.
 */
function virilis_theme_setup() {
	add_theme_support( 'title-tag' );

	register_nav_menus(
		array(
			'virilis-header-menu' => esc_html__( 'Header Menu', 'virilis_theme' ),
			'virilis-footer-menu' => esc_html__( 'Footer Menu', 'virilis_theme' ),
		)
	);

	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );

    add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );
	/* add_image_size( "featured-thumbnail" ); */

	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'editor-styles' );
	add_editor_style( 'css/editor-style.css' );

	add_theme_support( "custom-background", [
		"default-color" => "#fff",
		'default-image' => '',
	] );
	
	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'customize-selective-refresh-widgets' );
		
	add_theme_support( 'wp-block-styles' );

	/* global $content_width;
	if(!isset($content_width)){
		$content_width = 1240;
	} */

	/* add_theme_support( 'editor-styles' ); */
}

add_action( 'after_setup_theme', 'virilis_theme_setup' );

/**
 * Enqueue theme assets.
 */
function virilis_theme_enqueue_scripts() {
	$theme = wp_get_theme();

	wp_enqueue_style( 'virilis_theme', virilis_theme_asset( 'css/app.css' ), array(), $theme->get( 'Version' ) );
	wp_enqueue_script( 'virilis_theme', virilis_theme_asset( 'js/app.js' ), array(), $theme->get( 'Version' ) );
}

add_action( 'wp_enqueue_scripts', 'virilis_theme_enqueue_scripts' );

/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function virilis_theme_asset( $path ) {
	if ( wp_get_environment_type() === 'production' ) {
		return get_stylesheet_directory_uri() . '/' . $path;
	}

	return add_query_arg( 'time', time(),  get_stylesheet_directory_uri() . '/' . $path );
}

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function virilis_theme_nav_menu_add_li_class( $classes, $item, $args, $depth ) {
	if ( isset( $args->li_class ) ) {
		$classes[] = $args->li_class;
	}

	if ( isset( $args->{"li_class_$depth"} ) ) {
		$classes[] = $args->{"li_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'virilis_theme_nav_menu_add_li_class', 10, 4 );

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function virilis_theme_nav_menu_add_submenu_class( $classes, $args, $depth ) {
	if ( isset( $args->submenu_class ) ) {
		$classes[] = $args->submenu_class;
	}

	if ( isset( $args->{"submenu_class_$depth"} ) ) {
		$classes[] = $args->{"submenu_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_submenu_css_class', 'virilis_theme_nav_menu_add_submenu_class', 10, 3 );

/* CUSTOM FUNCTIONS */
function get_the_post_custom_thumbnail($post_id, $additional_attributes = []){
	$custom_thumbnail = "";
	if(null === $post_id){
		$post_id = get_the_ID(  );
	}
	if(has_post_thumbnail( $post_id )){
		$default_attributes = [
			"loading" => "lazy"
		];

		$attributes = array_merge($additional_attributes, $default_attributes);

		$custom_thumbnail = wp_get_attachment_image( get_post_thumbnail_id( $post_id ), false, $additional_attributes );
	}
	return $custom_thumbnail;
}

function the_post_custom_thumbnail($post_id, $additional_attributes = []){
	echo get_the_post_thumbnail($post_id, $additional_attributes);
}