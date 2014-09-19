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
			<?php
			$qstring = $_REQUEST['filter'];
			$backLink = "/management/";
			if(!empty($qstring)) {
				$appendFilter = "?filter=" . $qstring;
				$backLink .= $appendFilter;
				$managementCatName = str_replace("-", " ", ucfirst($qstring));
			};
			

			?>
			<?php while ( have_posts() ) : the_post(); ?>

				<section class='management col-md-3'>
					<div class="thumb"><?php echo get_the_post_thumbnail(); ?></div>
					<h1><?php the_title(); ?></h1>
					<em><?php echo get_post_meta($post->ID, 'title', true); ?></em><br>
					<em><?php echo get_post_meta($post->ID, 'department', true); ?></em>
					<em><a href="#"><?php echo get_post_meta($post->ID, 'phone', true); ?></a></em>
					<!-- <em><a href="#"><?php #echo get_post_meta($post->ID, 'email', true); ?></a></em> -->
					<?php 
						$vcard = get_field('vcard');
						if (!empty($vcard)) : ?>
						<?php 
						
						$url =$vcard['url']; 
						?>
						<em><a href="<?php echo $url; ?>">Download Vcard</a></em>
					<?php endif; ?>
				</section>

				<article class="full col-md-8 simple">
					
					<?php the_content()?>
					<!--<a href="<?php #echo $backLink; ?>" class="button basic">Back To Leadership</a>-->
					<?php #if (!empty($qstring)) : ?>
						<!-- <a href="/<?php #echo $qstring ; ?>" class="button basic">Back To <?php #echo $managementCatName; ?></a> -->
					<?php #endif; ?>
				</article>
			

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_sidebar(); ?>
<?php get_footer(); ?>


