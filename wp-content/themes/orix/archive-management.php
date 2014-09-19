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
			<h1>Our Team</h1>
			
		</section>

		<?php 
		$qstring = $_REQUEST['filter'];
		if(!empty($qstring)) {
			$appendFilter = "/?filter=" . $qstring;
			$filter = 'management-'.$_REQUEST['filter'];
			query_posts(array( 'post_type' => 'management', 'post_status'=>'publish', 'posts_per_page' => -1, 'orderby'=> 'menu_order', 'order' => 'ASC', "managemenmcategory"=>$filter)); 
		} else {
			query_posts(array( 'post_type' => 'management', 'post_status'=>'publish', 'posts_per_page' => -1, 'orderby'=> 'menu_order', 'order' => 'ASC')); 
		}
		while (have_posts()) : the_post(); ?>
		
		<?php


			$excerpt = get_the_excerpt();
			$ManagementCta = ManagementCTA::create([
				"thumbnail"=>get_the_post_thumbnail(),
				"headline"=>get_the_title(),
				#"excerpt"=> string_limit_words($excerpt,25),
				"title"=> get_post_meta($post->ID, 'title', true),
				"link"=> $post->post_name. $appendFilter
			]);
		?>
		<?php endwhile; ?>
			



		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
