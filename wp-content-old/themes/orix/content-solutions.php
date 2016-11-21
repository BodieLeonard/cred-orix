<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Orix
 */
?>

<?php

echo "<div class='holder-solutions row'>";
	
	// get post id of business units
 	$my_query = new WP_Query('post_type=capitalsolution&post_parent=0&post_status=publish&post_excerpt!=null&orderby=menu_order&order=asc');
	while ($my_query->have_posts()) : $my_query->the_post();
		
		$excerpt = get_post_meta($post->ID, 'headline', true);

	  $solutionCta = SolutionCTA::create([
			"thumbnail"=> get_the_post_thumbnail(),
			"headline"=>$post->post_title,
			"excerpt"=>string_limit_words($excerpt,15),
			"link"=>$post->post_name
		]);

	endwhile;  wp_reset_query();



	
	
	
echo "</div>";

?>