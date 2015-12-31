<?php

/**
* Create custom post type via wordpress
*/

add_action( 'init', 'register_cpt_community' );

global $post;

function register_cpt_community() {

    $PLUGIN_NAME = "Orix Community";
    $PLUGIN_NAME_SINGULAR = "Community";
    $PLUGIN_NAME_SINGULAR_LOWER = "community";
    $PLUGIN_NAME_LOWER = "community";

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
        'description' => 'Orix Community Articles.',
        'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes' ),
        'taxonomies' => array( $PLUGIN_NAME.' ID', 'foo' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-media-document',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => array(
             'slug' => 'community', // This controls the base slug that will display before each term
             'with_front' => false // Don't display the category base before 
         ),
        'capability_type' => 'post'
    );

    register_post_type( $PLUGIN_NAME_SINGULAR_LOWER, $args );
    
};
/*function community_taxonomy() {  
    register_taxonomy(  
        'capitalsolutionscategory',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
        'capitalsolution',        //post type name
        array(  
            'hierarchical' => true,  
            'label' => 'Solutions Categories',  //Display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'capitalsolution', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before 
            )
        )  
    );  
}  
add_action( 'init', 'community_taxonomy');*/






