<?php
/**
 * The template used for displaying news content in page.php
 *
 * @package Orix
 */
?>
<section class='centered'>
	<?php 
		
		$title = $post->post_title;
		$content = $post->post_content;

	?>
	<h1><?php echo $title; ?></h1>
</section>

<article class="full col-xs-13 col-md-9">
	<?php the_content(); ?>
</article>