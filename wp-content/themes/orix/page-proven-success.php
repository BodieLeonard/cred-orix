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

	<div class="hero short" style="background-image: url(<?php echo get_template_directory_uri() . '/fpo/hero-proven-success.jpg' ?>) ">
		
	</div>

	<div id="content" class="site-content">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				
				<section class='centered'>
					<h1>proven success</h1>
						<p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Etiam porta sem malesuada magna mollis euismod.</p> 
				</section>
			
				
			<?php
			$dealCta = DealCTA::create([
						"thumbnail"=> get_template_directory_uri() . "/fpo/deal-renegade.jpg",
						"headline"=>"Granbury, TX",
						"excerpt"=>"Renegade is a leading provider of recurring maintenance, repair, and overhaul (“MRO”) production and infrastructure services, operations and maintenance employee services, and automation services for oil and gas producers primarily in the Permian, Eagle Ford, Barnett and Utica shale plays. OMPE made a subordinated debt and equity investment to support the acquisition of the company by Corinthian Capital Group.",
					]);

			$dealCta = DealCTA::create([
						"thumbnail"=> get_template_directory_uri() . "/fpo/deal-renegade.jpg",
						"headline"=>"Granbury, TX",
						"excerpt"=>"Renegade is a leading provider of recurring maintenance, repair, and overhaul (“MRO”) production and infrastructure services, operations and maintenance employee services, and automation services for oil and gas producers primarily in the Permian, Eagle Ford, Barnett and Utica shale plays. OMPE made a subordinated debt and equity investment to support the acquisition of the company by Corinthian Capital Group.",
					]);

			$dealCta = DealCTA::create([
						"thumbnail"=> get_template_directory_uri() . "/fpo/deal-renegade.jpg",
						"headline"=>"Granbury, TX",
						"excerpt"=>"Renegade is a leading provider of recurring maintenance, repair, and overhaul (“MRO”) production and infrastructure services, operations and maintenance employee services, and automation services for oil and gas producers primarily in the Permian, Eagle Ford, Barnett and Utica shale plays. OMPE made a subordinated debt and equity investment to support the acquisition of the company by Corinthian Capital Group.",
					]);

			$dealCta = DealCTA::create([
						"thumbnail"=> get_template_directory_uri() . "/fpo/deal-renegade.jpg",
						"headline"=>"Granbury, TX",
						"excerpt"=>"Renegade is a leading provider of recurring maintenance, repair, and overhaul (“MRO”) production and infrastructure services, operations and maintenance employee services, and automation services for oil and gas producers primarily in the Permian, Eagle Ford, Barnett and Utica shale plays. OMPE made a subordinated debt and equity investment to support the acquisition of the company by Corinthian Capital Group.",
					]);
			?>
				


				<?php get_template_part( 'content', 'newsroom' ); ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
