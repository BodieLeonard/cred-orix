<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Orix
 */

/*
Template name: Management
*/

get_header(); ?>

	<div class="hero short" style="background-image: url(<?php echo get_template_directory_uri() . '/fpo/hero-careers.jpg' ?>) "></div>

	<div id="content" class="site-content">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
		<section class='centered'>
			<h1>Our Offices</h1>
			
		</section>

		<?php 
		$qstring = $_REQUEST['filter'];
		if(!empty($qstring)) {
			$appendFilter = "/?filter=" . $qstring;
			$filter = 'offices-'.$_REQUEST['filter'];
			query_posts(array( 'post_type' => 'offices', 'post_status'=>'publish', 'posts_per_page' => -1, 'orderby'=> 'menu_order', 'order' => 'ASC', "officescategory"=>$filter)); 
		} else {
			query_posts(array( 'post_type' => 'offices', 'post_status'=>'publish', 'posts_per_page' => -1, 'orderby'=> 'menu_order', 'order' => 'ASC')); 
		}
		while (have_posts()) : the_post(); ?>
		
		<?php
			$address = get_post_meta($post->ID, 'address', true);
			$city = get_post_meta($post->ID, 'city', true);
			$state = get_post_meta($post->ID, 'state', true);
			$zip = get_post_meta($post->ID, 'zip', true);
			$phone = get_post_meta($post->ID, 'phone', true);
			$name = get_the_title();

			$officeCta = OfficeCTA::create([
				"thumbnail"=> "",
				"name"=>$name,
				"address"=>$address,
				"city"=>$city,
				"state"=>$state,
				"zip"=>$zip,
				"phone"=>$phone
				
			]);
		?>

		<?php endwhile; ?>
			



		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
