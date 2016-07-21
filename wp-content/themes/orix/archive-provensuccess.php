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
Template Name: Proven Success 
*/

get_header(); ?>

	<?php
	$post_home = get_post(3643);
	$secondThumb = MultiPostThumbnails::get_post_thumbnail_url( 'page', 'secondary-image', $post_home->ID	);
	$isMainPage = true;
	$isSubPage = false;
	$isCapitalSolutionsMainPage = false;
	$pageID = $post->ID;
	?>
	<?php getHero($secondThumb); ?>
		
	</div>

	<div id="content" class="site-content">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
			
					
		<section class='centered'>
				<?php

					$post_id = get_post("3213");
					$title = $post_id->post_title;
					$content = $post_id->post_content;

				?>
				<h1><?php echo $title; ?></h1>
				<p><?php echo $content; ?></p> 
			</section>

		<?php 
		$qstring = $_REQUEST['filter'];
		if(!empty($qstring)) {
			$appendFilter = "/?filter=" . $qstring;
			#$filter = 'provensuccess-'.$_REQUEST['filter'];
			/// filter was menu_order
			$filter = $_REQUEST['filter'];
			query_posts(array( 'post_type' => 'provensuccess', 'post_status'=>'publish', 'posts_per_page' => -1, 'orderby'=> 'post_content', 'order' => 'ASC',  "provensuccesscategory"=>$filter)); 
		} else {
			query_posts(array( 'post_type' => 'provensuccess', 'post_status'=>'publish', 'posts_per_page' => -1, 'orderby'=> 'post_content', 'order' => 'ASC' )); 
		}
		while (have_posts()) : the_post();

		$terms = get_the_terms($post_id, 'provensuccesscategory');
		$term = $terms;
		foreach ( $terms as $term ) {
			$term = $term->name;
			break;
		};

		$excerpt = get_the_excerpt();
		$dealCta = DealCTA::create([
			"thumbnail"=> get_the_post_thumbnail(),
			"headline"=>$term,//get_the_title(),
			"excerpt"=>get_the_content(),
		]);

		endwhile; ?>
		

	<?php #get_template_part( 'content', 'proven-success' );  ?>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
