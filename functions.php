<?php

// theme supports
add_image_size( 'thumbnail_300', 300, 300, true );
add_theme_support( 'title-tag' );
add_theme_support( 'custom-logo', array(
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' ),
));



// titlebar & breadcrumb
function bt_get_titlebar($title, $breadcrumb_array=[])
{
	include 'templates/titlebar.php';
}


// enqueue theme styles
function my_theme_enqueue_styles() {

    wp_enqueue_style( 'bulma', get_template_directory_uri() . '/assets/styles/main.css' ); 
    wp_enqueue_style( 'wpbulma', get_template_directory_uri() . '/style.css' );
    wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/scripts/main.js', array ( 'jquery' ), 1.1, true);

}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );


// register topbar menu
add_action( 'after_setup_theme', 'register_custom_nav_menus' );
function register_custom_nav_menus() {
	register_nav_menus( array(
		'topbar_menu' => 'Topbar Navigation Menu',
		'top_button_links' => 'Top Right Button Links',
        'footer_menu' => 'Footer Navigation Menu',
	) );
}





// includes
include 'includes/customizer.php';
include 'includes/create-topbar-menu.php';
include 'includes/breadcrumb.php';
include 'includes/comment-walker.php';
include 'includes/block-post-type.php';
include 'includes/footer-widgets.php';
include 'includes/sidebar-widgets.php';
include 'includes/wpbulma-pagination.php';






