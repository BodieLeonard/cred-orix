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
	if(!empty(wp_get_attachment_image_src( get_post_thumbnail_id(), 'full')[0])) :

	?><div class="hero short" style="background-image: url(<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'full')[0] ?>) ">
	
	<?php else : ?>
	
		<?php
		$post_home = get_post(3652);
		$secondThumb = MultiPostThumbnails::get_post_thumbnail_url( 'page', 'secondary-image', $post_home->ID	);
		$isMainPage = true;
		$isSubPage = false;
		$isCapitalSolutionsMainPage = false;
		$pageID = $post->ID;
		?>
		<div class="hero short" style="background-image: url(<?php echo $secondThumb; ?>) "></div>

	<?php endif; ?>
	
		
	</div>

	<div id="content" class="site-content">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<section class='centered'>
					<h1><?php the_title(); ?></h1>
					<p><?php echo get_post_meta($post->ID, 'headline', true); ?></p>
				</section>

				<article class="full  simple">
				<?php get_template_part( 'content', 'page' ); ?>
				</article>
				<?php #get_template_part( 'content', 'newsroom' ); ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
