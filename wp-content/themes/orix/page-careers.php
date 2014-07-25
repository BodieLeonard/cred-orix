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

	<div class="hero short" style="background-image: url(<?php echo get_template_directory_uri() . '/fpo/hero-careers.jpg' ?>) "></div>

	<div id="content" class="site-content">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<section class='centered'>
					<h1>Working at Orix</h1>
						<p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p> 
				</section>

				<article class="full col-xs-13 col-md-9">
					<h1>ORIX usa careers</h1>
					<p>Great opportunity awaits you. ORIX USA selects talented professionals for a variety of exciting career opportunities located throughout the country. We offer a dynamic and challenging environment that rewards creativity, dedication, and talent.</p>
					<a href="#" class="basic button">CURRENT OPENINGS</a>
				</article>
			
			<?php get_template_part( 'content', 'sidebar-careers' ); ?>
			<?php get_template_part( 'content', 'newsroom' ); ?>
			
			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
