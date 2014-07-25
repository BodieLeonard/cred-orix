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
			<h1>Innovative Capital Solutions</h1>
			<p>ORIX USA continues to adapt its existing businesses to ever-changing market demands. As its businesses evolve, the common thread remains the provisioning of capital to address market opportunities.</p>
		</article>
	</div>

	<div id="content" class="site-content">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				
				<section class="boxed panel panel-default">
					<p>Orix is an investment grade rated company with deep experience in the following capital solutions.</p>
				</section>

				<?php get_template_part( 'content', 'solutions' ); ?>

				<div class='bridge-outline' style='background-image:url(<?php echo get_template_directory_uri(); ?>/images/bridge-outline.jpg);'></div>

				<section class='centered'><h1>oRIX is built on a strong foundation</h1><p>Nec dubitamus multa iter quae et nos invenerat. Non equidem invideo, miror magis posuere velit aliquet.</p><p> At nos hinc posthac, sitientis piros Afros. Vivamus sagittis lacus vel augue laoreet rutrum faucibus. Mercedem aut nummos unde unde extricat, amaras.</p> </section>

				<div class='holder-bullets row'>
				<?php

					$bulletCta = BulletCTA::create([
						"icomoon"=> "icon-lock",
						"headline"=>"invenstment grade",
						"excerpt"=>"ORIX USA operates across a spectrum ranging from investment banking, hedge fund management, and advisory services to a range of credit and equity products for corporate and public entities.",
					]);
					$bulletCta = BulletCTA::create([
						"icomoon"=> "icon-graph",
						"headline"=>"publically traded",
						"excerpt"=>"ORIX USA Corporation is the U.S. subsidiary of ORIX Corporation, a publicly owned Tokyo-based international financial services company established in 1964. ORIX Corporation is listed on the Tokyo (8591) and New York (NYSE:IX) stock exchanges. ",
					]);
					$bulletCta = BulletCTA::create([
						"icomoon"=> "icon-uniE629",
						"headline"=>"backed by principle",
						"excerpt"=>"ORIX Corporation is a diversified financial conglomerate with approximately $100 billion in assets and $320 billion of assets under management.",
					]);
				?>
				</div>

				<?php get_template_part( 'content', 'newsroom' ); ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
