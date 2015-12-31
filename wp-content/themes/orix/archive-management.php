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
Template name: Management
*/

get_header(); ?>

	<?php
	$post_home = get_post(3652);
	$secondThumb = MultiPostThumbnails::get_post_thumbnail_url( 'page', 'secondary-image', $post_home->ID	);
	?>
	<?php getHero($secondThumb); ?>

	<div id="content" class="site-content">

	<div id="primary" class="content-area">
		<main id="main" class="site-main top-padding" role="main">
		
		<?php
		
		?>

		<?php 
		$qstring = $_REQUEST['filter'];
		if(!empty($qstring)) {
			$appendFilter = "/?filter=" . $qstring;
			$filter = 'management-'.$_REQUEST['filter'];
			$posts = query_posts(array( 'post_type' => 'management', 'post_status'=>'publish', 'posts_per_page' => -1, 'orderby'=> 'post_name', 'order' => 'ASC', "managemenmcategory"=>$filter)); 

			$term = get_term_by('slug', $filter, 'managemenmcategory'); 
			$title = $term->name; 
			
		} else {
			$title="Our Team";
			query_posts(array( 'post_type' => 'management', 'post_status'=>'publish', 'posts_per_page' => -1, 'orderby'=> 'menu_order', 'order' => 'ASC')); 
		}

		?>
		<section class='centered'>
			<h1><?php echo $title; ?></h1>
		</section>


		<?php //while ($postshave_posts()) : the_post(); ?>
		<?php foreach( $posts as $post ) :  ?>
		
		<?php
			$excerpt = get_the_excerpt();
			$ManagementCta = ManagementCTA::create([
				"thumbnail"=>get_the_post_thumbnail(),
				"headline"=>get_the_title(),
				#"excerpt"=> string_limit_words($excerpt,25),
				"title"=> get_post_meta($post->ID, 'title', true),
				"link"=> $post->post_name. $appendFilter,
				"department"=>get_post_meta($post->ID, 'department', true)
			]);
		?>
		<?php //endwhile; ?>
		<?php endforeach; ?>
			



		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
