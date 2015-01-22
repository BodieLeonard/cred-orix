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

	<?php
	$secondThumb = MultiPostThumbnails::get_post_thumbnail_url( 'career', 'secondary-image', $post->ID	);
	
	$pageID = $post->ID;
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

				<article class="full col-xs-13 col-md-12 simple">
					<?php the_content()?>
				</article>
			
			<div class="col-xs-12 col-md-3">
			<?php #get_template_part( 'content', 'sidebar-careers' ); ?>
			</div>

			<?php #get_template_part( 'content', 'newsroom' ); ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
