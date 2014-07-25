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

	<div class="hero" style="background-image: url(<?php echo get_template_directory_uri() . '/fpo/hero-capital-solutions.jpg' ?>) "></div>

	<div id="content" class="site-content">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<section class='centered'>
					<h1>asset management</h1>
						<p>ORIX Asset Management (OAM) is the holding company for ORIX’s various asset management businesses and investments.</p> 
				</section>

				<article class="full col-xs-13 col-md-9">
					<h1>Mariner Investment Group</h1>
					<p>Mariner Investment Group (Mariner) – a Harrison, New York based hedge fund manager founded in 1992 with approximately 166 employees and offices in New York, Boston, London and Tokyo. Mariner and its affiliates have approximately $11.7 billion of assets under management. ORIX owns a majority interest in Mariner with Mariner’s management owning a substantial minority interest.</p>
					<p>Mariner is an SEC registered investment advisor. Mariner and its affiliates operate several single and multi strategy hedge funds, funds of funds and other alternative investments.  At the sixth annual AR Awards, Mariner ranked #1 for the best return for a multi-strategy fund over the twelve months ended September 30, 2010.</p>
					
					<ul>
						<li>Commercial and inindustrial development</li>
						<li>Health care</li>
					</ul>
				</article>
			
			<?php get_template_part( 'content', 'sidebar-team' ); ?>
			<?php get_template_part( 'content', 'newsroom' ); ?>
			
			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
