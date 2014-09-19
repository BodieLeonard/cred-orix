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

	<div class="hero short" style="background-image: url(<?php echo get_template_directory_uri() . '/fpo/hero-careers.jpg' ?>) ">
		
	</div>

	<div id="content" class="site-content">

	<section class='centered '>
			<h1>ORIX NEWSROOM</h1>
		</section>

	<div id="primary" class="content-area">
		<main id="main" class="site-main page-secondary" role="main ">


			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'newsroom-full' ); ?>
				

				<div class="col-xs-12 col-md-3">
					<?php get_template_part( 'content', 'sidebar-news-archive' ); ?>
				</div>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>




