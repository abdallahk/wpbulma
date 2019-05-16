<?php

// footer widgets
add_action( 'widgets_init', 'theme_footer_1' );
function theme_footer_1() {
    register_sidebar( array(
        'name' => __( 'Footer 1', 'wpbulma' ),
        'id' => 'footer-1',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'wpbulma' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widgettitle">',
    'after_title'   => '</h3>',
    ) );
}

add_action( 'widgets_init', 'theme_footer_2' );
function theme_footer_2() {
    register_sidebar( array(
        'name' => __( 'Footer 2', 'wpbulma' ),
        'id' => 'footer-2',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'wpbulma' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widgettitle">',
    'after_title'   => '</h3>',
    ) );
}

add_action( 'widgets_init', 'theme_footer_3' );
function theme_footer_3() {
    register_sidebar( array(
        'name' => __( 'Footer 3', 'wpbulma' ),
        'id' => 'footer-3',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'wpbulma' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widgettitle">',
    'after_title'   => '</h3>',
    ) );
}

add_action( 'widgets_init', 'theme_footer_4' );
function theme_footer_4() {
    register_sidebar( array(
        'name' => __( 'Footer 4', 'wpbulma' ),
        'id' => 'footer-4',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'wpbulma' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widgettitle">',
    'after_title'   => '</h3>',
    ) );
}