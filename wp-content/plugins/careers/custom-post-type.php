<?php

/**
* Create custom post type via wordpress
*/

add_action( 'init', 'register_cpt_career' );

global $post;

function register_cpt_career() {

    $PLUGIN_NAME = "Orix Careers";
    $PLUGIN_NAME_SINGULAR = "Career";
    $PLUGIN_NAME_SINGULAR_LOWER = "career";
    $PLUGIN_NAME_LOWER = "careers";


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
        'description' => 'Orix Careers',
        'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes' ),
        'taxonomies' => array( $PLUGIN_NAME.' ID' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-businessman',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( $PLUGIN_NAME_SINGULAR_LOWER, $args );
    
};

function capital_career_taxonomy() {  
    register_taxonomy(  
        'careercategory',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
        'career',        //post type name
        array(  
            'hierarchical' => true,  
            'label' => 'Career Categories',  //Display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'career', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before 
            )
        )  
    );  
}  
add_action( 'init', 'capital_career_taxonomy');











