<?php
/**
 * Orix functions and definitions
 *
 * @package Orix
 */


/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'orix_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function orix_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Orix, use a find and replace
	 * to change 'orix' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'orix', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'orix' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'orix_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // orix_setup
add_action( 'after_setup_theme', 'orix_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function orix_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'orix' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'orix_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function orix_scripts() {
	wp_enqueue_style( 'orix-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jQuery', get_template_directory_uri() . '/js/jquery-1.11.1.min.js', array(), '20120206', true );
	wp_enqueue_script( 'twitterBootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js', array(), '20120206', true );
	wp_enqueue_script( 'orix-navigation', get_template_directory_uri() . '/js/navigation.js', array('jQuery'), '20120206', true );
	wp_enqueue_script( 'parallax', get_template_directory_uri() . '/js/jquery.parallax-1.1.3.js', array('jQuery'), '20140721', true );
	
	wp_enqueue_script( 'orix-app', get_template_directory_uri() . '/js/orix.js', array('jQuery'), '20140715', true );

	wp_enqueue_script( 'orix-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array('jQuery'), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'orix_scripts' );



/**
*	Limit the character count on excerpts
*/
function string_limit_words($string, $word_limit, $elips = true) {

  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
	if($elips) {
		$showElips = "...";
	}
  return implode(' ', $words) . $showElips;
}

/**
*	Style login screen
*/
function custom_login_css() {
	echo '<link rel="stylesheet" media="screen" type="text/css" href="'.get_stylesheet_directory_uri().'/style.css" >';
}
add_action('login_head', 'custom_login_css');

/**
* Remove menu items in admin
*/
function remove_menus(){
  
  remove_menu_page( 'edit-comments.php' );                  //Dashboard
  
}
add_action( 'admin_menu', 'remove_menus' );

/** 
*	Multiple featured images for post
*/
if (class_exists('MultiPostThumbnails')) {
	new MultiPostThumbnails(array(
		'label' => 'Secondary Image',
		'id' => 'secondary-image',
		'post_type' => 'capitalsolution'
 	));

 	new MultiPostThumbnails(array(
		'label' => 'Secondary Image',
		'id' => 'secondary-image',
		'post_type' => 'page'
 	));

 	new MultiPostThumbnails(array(
		'label' => 'Secondary Image',
		'id' => 'secondary-image',
		'post_type' => 'career'
 	));

 	new MultiPostThumbnails(array(
		'label' => 'Secondary Image',
		'id' => 'secondary-image',
		'post_type' => 'firm'
 	));
 }

 /**
 * Get only the url of the thumbnail
 */
 function get_the_post_thumbnail_src($img) {
	  return (preg_match('~\bsrc="([^"]++)"~', $img, $matches)) ? $matches[1] : '';
	}

	/**
	* Add css to admin panel
	*/
	function custom_colors() {
		 echo '<style type="text/css">
			   #wpcontent{ margin-left:220px; };
				 #adminmenuwrap, #adminmenu{ width:200px; }
			 </style>';
  };
  add_action('wp_head', 'custom_colors');

  /**
  * Managemnts link shortcode
  */
  function management_func( $atts ) {
     $link= $atts['link'];
     $name = $atts['name'];

     return array("name"=>$name, "link"=>$link);
	}
	add_shortcode( 'management', 'management_func' );


function my_custom_post_type_archive_where($where,$args){  
    $post_type  = isset($args['post_type'])  ? $args['post_type']  : 'post';  
    $where = "WHERE post_type = '$post_type' AND post_status = 'publish'";
    return $where;  
}
add_filter( 'getarchives_where','my_custom_post_type_archive_where',10,2);


/**
* Allow vcard upload
**/
add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ) {
	// add your extension to the array
	$existing_mimes['vcf'] = 'text/x-vcard';
	return $existing_mimes;
}
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
