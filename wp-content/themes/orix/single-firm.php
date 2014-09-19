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
Template Name: Careers 
*/

get_header(); ?>

	<div class="hero short" style="background-image: url(<?php echo get_template_directory_uri() . '/fpo/hero-careers.jpg' ?>) "></div>

	<div id="content" class="site-content">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<section class='centered'>
					<h1><?php the_title(); ?></h1>
					<p><?php echo get_post_meta($post->ID, 'headline', true); ?></p>
				</section>

				<article class="full col-xs-12 col-md-9 simple">
					<?php the_content()?>
				</article>

			<?php #get_template_part( 'content', 'newsroom' ); ?>

			<?php endwhile; // end of the loop. ?>

			<div class="">
			<?php 
			#query_posts(array( 'post_type' => 'firm', 'post_status'=>'publish', 'posts_per_page' => -1, 'orderby'=> 'menu_order', 'order' => 'ASC')); 
			#get_template_part( 'content', 'sidebar-firm' ); ?>
			</div>

			<div class="col-xs-12 col-md-3">	
			 <?php

			 if(empty($teamLink)) {
			 	
			 	$children = wp_list_pages('title_li=&child_of='.$sidebar_pid.'&post_type=capitalsolution&echo=0');
			 	if(!$isCapitalSolutionsMainPage) {
			 		get_template_part( 'content', 'sidebar-team' );
			 	};
			 
			 } else {
			 	?>
					<aside class="col-xs-12 col-md-12">
						<ul>
							<li>
								<?php echo "<a href='/management/".$teamLink."'>Team Link</a>";?>
							</li>
							<?php 
						?>
						</ul>
					</aside>
			 	<?php
			 
			 };

			 if($isSubPage) {

			  	#get_template_part( 'content', 'sidebar-capital-solutions' ); 
			 };

			 ?>

			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
