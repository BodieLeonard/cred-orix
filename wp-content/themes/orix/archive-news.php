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
Template name: News
*/


get_header(); ?>

	<?php
	$post_home = get_post(3754);
	$secondThumb = MultiPostThumbnails::get_post_thumbnail_url( 'page', 'secondary-image', $post_home->ID	);
	$pageID = $post->ID;
	?>
	<div class="hero short" style="background-image: url(<?php echo $secondThumb; ?>) "></div>

	<div id="content" class="site-content">

	<div id="primary" class="content-area">

		<section class='centered '>
			<h1>ORIX NEWSROOM</h1>
		</section>

		<main id="main" class="site-main col-xs-13 col-md-9 news" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
			
				

				<article class="full simple">
					<date><?php the_date(); ?></date>
					<h1><a href="<?php the_permalink();?>"><?php  the_title(); ?></a> </h1>
				</article>

			<?php endwhile; // end of the loop. ?>
			
		</main><!-- #main -->
		<div class="col-xs-12 col-md-3">
				<?php get_template_part( 'content', 'sidebar-news-archive' ); ?>
			</div>
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
