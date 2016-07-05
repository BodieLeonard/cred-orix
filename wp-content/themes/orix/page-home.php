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





<?php $image_url = get_the_post_thumbnail_src(get_the_post_thumbnail()); ?>
	<div class="hero" style="background-image: url(<?php echo $image_url; ?>) ">
		
		<article class="hero-article">

			<?php 
			#print_r($post);
			echo $post->post_content; 
			?>
		</article>
	</div>

	<div id="content" class="site-content">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				
				<section class="boxed panel panel-default">
					<p><?php echo get_post_meta($post->ID, 'headline', true); ?></p>
				</section>

				<?php get_template_part( 'content', 'solutions' ); ?>

				<div class='bridge-outline' style='background-image:url(<?php echo get_template_directory_uri(); ?>/images/bridge-outline.jpg);'></div>

				<section class='centered'>				
					<?php
		  			query_posts( array( 'post_type' => 'homepagecta', 'homepagectacategory' => 'homepage-cta-headline', 'orderby'=>'menu_order','order'=>'asc' ) );
			  		if ( have_posts() ) : while ( have_posts() ) : the_post();

			  		echo "<h1>".get_the_title()."</h1>";
			  		echo get_the_content();

			  		endwhile; endif; wp_reset_query();
					?>
				</section>


					
				<div class='no-link holder-bullets row'>	
				<?php
	  			query_posts( array( 'post_type' => 'homepagecta', 'homepagectacategory' => 'homepage-cta-item', 'orderby'=>'menu_order','order'=>'asc' ) );
		  		if ( have_posts() ) : while ( have_posts() ) : the_post();

		  		$bulletCta = BulletCTA::create([
						"icomoon"=> "icon-".get_post_meta($post->ID, 'diamond_icon', true),
						"headline"=>get_the_title(),
						"excerpt"=> get_the_excerpt()
					]);

		  		endwhile; endif; wp_reset_query();
				?>

				<?php get_template_part( 'content', 'newsroom-home' ); ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
