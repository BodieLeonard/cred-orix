<?php

/**
 * Create custom post type via wordpress
 */

add_action( 'init', 'register_cpt_video' );

global $post;

function register_cpt_video() {

    $PLUGIN_NAME = "Video";
    $PLUGIN_NAME_SINGULAR = "Video";
    $PLUGIN_NAME_SINGULAR_LOWER = "video";
    $PLUGIN_NAME_LOWER = "videos";

    $labels = array(
      'name' => _x( $PLUGIN_NAME, $PLUGIN_NAME_SINGULAR_LOWER ),
      'singular_name' => _x( $PLUGIN_NAME_SINGULAR, $PLUGIN_NAME_SINGULAR_LOWER ),
      'add_new' => _x( 'Add New', $PLUGIN_NAME_SINGULAR_LOWER ),
      'add_new_item' => _x( 'Add New '.$PLUGIN_NAME, $PLUGIN_NAME_SINGULAR_LOWER ),
      'edit_item' => _x( 'Edit '.$PLUGIN_NAME, $PLUGIN_NAME_SINGULAR_LOWER ),
      'new_item' => _x( 'New '.$PLUGIN_NAME, $PLUGIN_NAME_SINGULAR_LOWER ),
      'view_item' => _x( 'View '.$PLUGIN_NAME, $PLUGIN_NAME_SINGULAR_LOWER ),
      'search_items' => _x( 'Search '.$PLUGIN_NAME, $PLUGIN_NAME_SINGULAR_LOWER ),
      'not_found' => _x( 'No '.$PLUGIN_NAME_LOWER.' found', $PLUGIN_NAME_SINGULAR_LOWER ),
      'not_found_in_trash' => _x( 'No '.$PLUGIN_NAME_LOWER.' found in Trash', $PLUGIN_NAME_SINGULAR_LOWER ),
      'parent_item_colon' => _x( 'Parent '.$PLUGIN_NAME.':', $PLUGIN_NAME_SINGULAR_LOWER ),
      'menu_name' => _x( $PLUGIN_NAME, $PLUGIN_NAME_SINGULAR_LOWER )
    );

    $args = array(
      'labels' => $labels,
      'hierarchical' => true,
      'description' => 'Orix Video Articles.',
      'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes' ),
      'taxonomies' => array( $PLUGIN_NAME.' ID', 'foo' ),
      'public' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'menu_position' => 5,
      'menu_icon' => 'dashicons-universal-access',
      'show_in_nav_menus' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'has_archive' => true,
      'query_var' => true,
      'can_export' => true,
      'rewrite' => array(
        'slug' => 'video', // This controls the base slug that will display before each term
        'with_front' => false // Don't display the category base before
      ),
      'capability_type' => 'post'
    );

    register_post_type( $PLUGIN_NAME_SINGULAR_LOWER, $args );
    #add_filter('manage_'.$PLUGIN_NAME_SINGULAR_LOWER.'_posts_columns', 'manage_video_columns');
    #add_action('manage_'.$PLUGIN_NAME_SINGULAR_LOWER.'_posts_custom_column', 'print_video_column', 10, 2);

};


function video_taxonomy() {
    register_taxonomy(
      'videocategory',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
      'video',        //post type name
      array(
        'hierarchical' => false,
        'label' => 'Video Categories',  //Display name
        'query_var' => true,
        'rewrite' => array(
          'slug' => 'video', // This controls the base slug that will display before each term
          'with_front' => false // Don't display the category base before
        )
      )
    );
}
add_action( 'init', 'video_taxonomy');

/*function manage_video_columns($columns) {
    $columns['team'] = "Team";
    $columns['order'] = "Order";
    return $columns;
};*/

/*function print_video_column($column_name, $post_id) {

    global $post;
    global $post_id;

    if( $column_name == 'team' ) {

        //$cat = get_post_meta( $post_id, "team", true );
        //if(empty($cat)) { $cat = "add manager to specific team"; };

        $output = '';
        $categories = get_the_terms($post->ID, 'videocategory' );;
        if($categories){
            foreach($categories as $category) {
                //print_r($category);
                //$output .= $category->name;
                $output .= $category->name . " | ";
            }
            echo trim($output, $separator);
        }
    };
    if( $column_name == 'order' ) {

        $output = '';
        $order = $post->menu_order;
        echo $order;
    };



};*/