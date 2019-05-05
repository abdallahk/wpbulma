<?php

add_theme_support( 'title-tag' );
add_theme_support( 'custom-logo', array(
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' ),
));



// Titlebar & breadcrumb
function bt_get_titlebar($title, $breadcrumb_array=[])
{
	include 'templates/titlebar.php';
}

// Enque theme styles
function my_theme_enqueue_styles() {
 
    $parent_style = 'theme13';
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/core.js', array ( 'jquery' ), 1.1, true);
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('1.0.0')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

//Register Topbar Menu
add_action( 'after_setup_theme', 'register_custom_nav_menus' );
function register_custom_nav_menus() {
	register_nav_menus( array(
		'topbar_menu' => 'Topbar Navigation Menu',
		'top_button_links' => 'Top Right Button Links',
        'footer_menu' => 'Footer Navigation Menu',
	) );
}



  
function create_topbar_menu( $theme_location ) {
    if ( ($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location]) ) {
         
        $menu_list  = '<nav class="navbar-menu">' ."\n";
        $menu_list .= '<div class="navbar-start">' ."\n";   
         
        $menu = get_term( $locations[$theme_location], 'nav_menu' );
        $menu_items = wp_get_nav_menu_items($menu->term_id);
          
        foreach( $menu_items as $menu_item ) {
            if( $menu_item->menu_item_parent == 0 ) {
                 
                $parent = $menu_item->ID;
                 
                $menu_array = array();
                foreach( $menu_items as $submenu ) {
                    if( $submenu->menu_item_parent == $parent ) {
                        $bool = true;
                        $menu_array[] = '<a class="navbar-item" href="' . $submenu->url . '">' . $submenu->title . '</a>' ."\n";
                    }
                }
                if( $bool == true && count( $menu_array ) > 0 ) {
                     
                    $menu_list .= '<div class="navbar-item has-dropdown is-hoverable">' ."\n";
                    $menu_list .= '<a href="' . $menu_item->url . '" class="navbar-link">' . $menu_item->title . '</a>' ."\n";
                     
                    $menu_list .= '<div class="navbar-dropdown">' ."\n";
                    $menu_list .= implode( "\n", $menu_array );
                    $menu_list .= '</div></div>' ."\n";
                     
                } else {
                     
                    $menu_list .= '<a class="navbar-item" href="' . $menu_item->url . '">' . $menu_item->title . '</a>' ."\n";
                }
                 
            }
             
        }
          
        $menu_list .= '</div>' ."\n";
        $menu_list .= '</nav>' ."\n";
  
    } else {
        $menu_list = '<!-- no menu defined in location "'.$theme_location.'" -->';
    }
     
    echo $menu_list;
}






// include customizer

include 'includes/customizer.php';
include 'includes/breadcrumb.php';



function get_breadcrumb() {
    echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
    if (is_category() || is_single()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        the_category(' &bull; ');
            if (is_single()) {
                echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
                the_title();
            }
    } elseif (is_page()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        echo the_title();
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}



function codex_custom_init() {
    $args = array(
      'public' => true,
      'menu_icon' => 'dashicons-editor-table',
      'label'  => 'Page Blocks'
    );
    register_post_type( 'block', $args );
}
add_action( 'init', 'codex_custom_init' );


add_filter('manage_block_posts_columns', 'ST4_columns_block_head');
add_action('manage_block_posts_custom_column', 'ST4_columns_block_content', 10, 2);

// ADD TWO NEW COLUMNS
function ST4_columns_block_head($defaults) {
    $defaults['first_column']  = 'Shortcode';
    return $defaults;
}
 
function ST4_columns_block_content($column_name, $post_ID) {
    if ($column_name == 'first_column') {
        echo '<code>[wp_bulma_block id="';
        echo $post_ID;
        echo '"]</code>';
    }

}



function get_block_data($atts){
	$a = shortcode_atts( array(
      'id' => $atts['id']
   ), $atts );

	$block_data = get_post($a['id']);

    if(current_user_can('edit_pages')){
        return apply_filters('the_content', $block_data->post_content)."<small><a href='/wp-admin/post.php?post=". $atts['id'] ."&action=edit'>[Edit this block]</a></small>";
    }
	else{

        return apply_filters('the_content', $block_data->post_content);
    }
}
add_shortcode( 'wp_bulma_block', 'get_block_data' );



// Sidebar widgets
add_action( 'widgets_init', 'theme_sidebar' );
function theme_sidebar() {
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'wpbulma' ),
        'id' => 'sidebar-1',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'wpbulma' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget'  => '</li>',
    'before_title'  => '<h3 class="widgettitle">',
    'after_title'   => '</h3>',
    ) );
}


// footer widgets
add_action( 'widgets_init', 'theme_footer_1' );
function theme_footer_1() {
    register_sidebar( array(
        'name' => __( 'Footer 1', 'wpbulma' ),
        'id' => 'footer-1',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'wpbulma' ),
        'before_widget' => '<div id="%1$s" class="column widget %2$s">',
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
        'before_widget' => '<div id="%1$s" class="column widget %2$s">',
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
        'before_widget' => '<div id="%1$s" class="column widget %2$s">',
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
        'before_widget' => '<div id="%1$s" class="column widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widgettitle">',
    'after_title'   => '</h3>',
    ) );
}




function adding_custom_meta_boxes_block( $post_type, $post ) {
    add_meta_box( 
        'my-meta-box',
        __( 'My Meta Box' ),
        'render_my_meta_box',
        'post',
        'normal',
        'default'
    );
}
add_action( 'add_meta_boxes', 'adding_custom_meta_boxes_block', 10, 2 );