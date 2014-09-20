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

	<div class="hero" style="background-image: url(<?php echo get_template_directory_uri() . '/fpo/hero-homepage.jpg' ?>) ">
		
		<article class="hero-article">
			<h1>404</h1>
			<p>Page not found.</p>
		</article>
	</div>

	<div id="content" class="site-content">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				
				<section class="boxed panel panel-default">
					<p>ORIX is an investment grade rated company with deep experience in the following capital solutions.</p>
				</section>

				<?php get_template_part( 'content', 'newsroom' ); ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
