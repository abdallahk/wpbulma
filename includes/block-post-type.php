<?php

/**
 * Registers the block post type.
 */
function wpbulma_block_post_type() {
    $labels = array(
        'name'               => __( 'Blocks' ),
        'singular_name'      => __( 'Block' ),
        'add_new'            => __( 'Add New Block' ),
        'add_new_item'       => __( 'Add New Block' ),
        'edit_item'          => __( 'Edit Block' ),
        'new_item'           => __( 'Add New Block' ),
        'view_item'          => __( 'View Block' ),
        'search_items'       => __( 'Search Block' ),
        'not_found'          => __( 'No blocks found' ),
        'not_found_in_trash' => __( 'No blocks found in trash' )
    );
    $supports = array(
        'title',
        'editor',
        'revisions',
    );
    $args = array(
        'labels'               => $labels,
        'supports'             => $supports,
        'public'               => true,
        'capability_type'      => 'post',
        'rewrite'              => array( 'slug' => 'block' ),
        'has_archive'          => false,
        'menu_position'        => 30,
        'menu_icon'            => 'dashicons-editor-table'
    );
    register_post_type( 'block', $args );
}
add_action( 'init', 'wpbulma_block_post_type' );




/**
 * Metabox for block shortcode
 */
function block_shortcode_meta_box() {

    add_meta_box(
        'wpbulma-block-shorcode',
        __( 'Block Shortcode', 'wpbulma' ),
        'block_shortcode_meta_box_callback',
        'block',
        'side',
        'default'
    );
}

function block_shortcode_meta_box_callback( $post ) {

    echo "<code>[wp_bulma_block id='$post->ID']</code>";

}

add_action( 'add_meta_boxes', 'block_shortcode_meta_box' );



/**
 * Return Block Data on call
 */
function get_block_data($atts){
    $a = shortcode_atts( array(
      'id' => $atts['id']
   ), $atts );

    $block_data = get_post($a['id']);

    if(current_user_can('edit_pages')){
        $data = apply_filters('the_content', $block_data->post_content);
        return "<div class='bordered-block'>" . $data ."<span class='block-edit-label'><a class='button is-small is-link is-outlined' href='/wp-admin/post.php?post=". $atts['id'] ."&action=edit'>Edit this block</a></span></div>";
    }
    else{

        return apply_filters('the_content', $block_data->post_content);
    }
}
add_shortcode( 'wp_bulma_block', 'get_block_data' );




// add shortcode in blocks list page
add_filter('manage_block_posts_columns', 'ST4_columns_block_head');
add_action('manage_block_posts_custom_column', 'ST4_columns_block_content', 10, 2);

// add two new columns
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