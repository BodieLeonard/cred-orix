<?php

/**
* Create custom post type via wordpress
*/

add_action( 'init', 'register_cpt_proven_success' );

global $post;

function register_cpt_proven_success() {

    $PLUGIN_NAME = "Orix Proven Success";
    $PLUGIN_NAME_SINGULAR = "Proven Success";
    $PLUGIN_NAME_SINGULAR_LOWER = "proven success";
    $PLUGIN_NAME_LOWER = "proven success";


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
        'description' => 'Orix Proven Success',
        'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes' ),
        'taxonomies' => array( $PLUGIN_NAME.' ID' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-awards',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => array(
             'slug' => 'proven-success', // This controls the base slug that will display before each term
             'with_front' => false // Don't display the category base before 
         ),
        'capability_type' => 'post'
    );

    register_post_type( $PLUGIN_NAME_SINGULAR_LOWER, $args );
    add_filter('manage_'.$PLUGIN_NAME_SINGULAR_LOWER.'_posts_columns', 'proven_success_columns');
    add_action('manage_'.$PLUGIN_NAME_SINGULAR_LOWER.'_posts_custom_column', 'print_proven_success_column', 10, 2);
    
};

function proven_success_taxonomy() {  
    register_taxonomy(  
        'provensuccesscategory',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
        'provensuccess',        //post type name
        array(  
            'hierarchical' => true,  
            'label' => 'Proven Success Categories',  //Display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'management', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before 
            )
        )  
    );  
}  
add_action( 'init', 'proven_success_taxonomy');

function proven_success_columns($columns) {
  $columns['proven_success_cat'] = "Proven Success Categories";
  return $columns;
};

function print_proven_success_column($column_name, $post_id) {

  global $post;
  global $post_id;

  if( $column_name == 'proven_success_cat' ) { 
    
    //$cat = get_post_meta( $post_id, "proven_success_cat", true ); 
    //if(empty($cat)) { $cat = "add manager to specific proven_success_cat"; };
    
    $output = '';
    $categories = get_the_terms($post->ID, 'provensuccesscategory' );;
    if($categories){
        foreach($categories as $category) {
            //print_r($category);
            //$output .= $category->name;
            $output .= $category->name . " | ";
        }
        echo trim($output, $separator);
    }

    //echo $cat . " " . $post_id;
  };

  

};













