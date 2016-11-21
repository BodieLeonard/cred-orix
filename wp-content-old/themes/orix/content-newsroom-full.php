<?php
/**
 * The template used for displaying news content in page.php
 *
 * @package Orix
 */
?>
<section class='centered full col-xs-13 col-md-9 simple'>
	<?php 
		
		$title = $post->post_title;
		$content = $post->post_content;

	?>
	<h1><?php echo $title; ?></h1>
</section>

<article class="full col-xs-13 col-md-9 simple">
	<?php the_content(); ?>
</article>

<!-- <section class='centered'>
	<h1><?php the_title(); ?></h1>
	<p><?php #echo get_post_meta($post->ID, 'headline', true); ?></p>
</section> -->

