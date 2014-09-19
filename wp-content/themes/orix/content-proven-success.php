<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Orix
 */
?>



<?php query_posts(array('showposts' => 20, 'post_type' => 'provensuccess')); while (have_posts()) { the_post(); ?>

	<?php
		$excerpt = get_the_excerpt();
		$dealCta = DealCTA::create([
			"thumbnail"=> get_the_post_thumbnail(),
			"headline"=>get_the_title(),
			"excerpt"=>get_the_content(),
		]);
	?>

<?php }; ?>



