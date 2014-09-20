
<?php

	//require get_template_directory() . '/modules/Article.php';
	// include all modules
	foreach (glob(get_template_directory() . '/modules/*.php') as $file) {
	  require_once $file;
	};
?>

<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Orix
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site page">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'orix' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<div class="site-branding">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</div>

			<button class="menu-toggle"><i class="fa fa-bars"></i></button>
			<?php wp_nav_menu( array( 'theme_location' => 'main-menu' , 'show_home'=>false ) ); ?>
		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->



