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



get_header(); ?>

	<?php
	
	$secondThumb = MultiPostThumbnails::get_post_thumbnail_url( 'firm', 'secondary-image', $post->ID	);
	
	?>
	<?php getHero($secondThumb); ?>

	<div id="content" class="site-content">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<section class='centered'>
					<h1><?php the_title(); ?></h1>
					<p><?php echo get_post_meta($post->ID, 'headline', true); ?></p>
				</section>
			
				<?php

				$colNum = 12;
				


				$term_id = $wpdb->get_row("SELECT term_id FROM wp_terms WHERE slug = 'management-$post->post_name'")->term_id;
				$term_taxonomy_id = $wpdb->get_row("SELECT term_taxonomy_id FROM wp_term_taxonomy WHERE term_id = '$term_id'")->term_taxonomy_id;
				$relations = "SELECT * FROM wp_term_relationships WHERE term_taxonomy_id = '$term_taxonomy_id'";
				$term_object_ids = $wpdb->get_results($relations);
				
				if (count($term_object_ids) > 0 ) {
					$colNum = 9;
				}
				?>
				<article class="full col-xs-12 col-md-<?php echo $colNum; ?> simple">
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
