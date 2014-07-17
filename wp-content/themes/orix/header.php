
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
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'orix' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle"><?php _e( 'Primary Menu', 'orix' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">


<?php
	
	$solutionCta = SolutionCTA::create([
		"thumbnail"=> get_template_directory_uri() . "/fpo/thumb.jpg",
		"headline"=>"municipal finance",
		"excerpt"=>"Nec dubitamus multa iter quae et nos invenerat. Non equidem invideo, miror magis posuere velit aliquet. At nos hinc posthac, sitientis piros Afros. Vivamus sagittis lacus vel augue sagittis lacus vel augue. Non equidem invideo, miror magis aliquet.",
		"link"=>"Read More"
	]);

	$articleCta = ArticleCTA::create([
		"thumbnail"=> get_template_directory_uri() . "/fpo/thumb-article.jpg",
		"headline"=>"ORIX Ventures announces growth capital commitment to SummitIG",
		"date"=>"March 3, 2014",
		"excerpt"=>"ORIX Ventures announces the closing of a large term loan with SummitIG, a custom network solutions and bandwidth infrastructure provider. The funding comes alongside additional growth...",
		"link"=>"Read More"
	]);

?>
