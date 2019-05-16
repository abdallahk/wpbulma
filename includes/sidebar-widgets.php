<?php

// Sidebar widgets
add_action( 'widgets_init', 'theme_sidebar' );
function theme_sidebar() {
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'wpbulma' ),
        'id' => 'sidebar-1',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'wpbulma' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widgettitle">',
    'after_title'   => '</h3>',
    ) );
}