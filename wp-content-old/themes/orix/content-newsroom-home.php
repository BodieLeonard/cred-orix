
<?php
/**
 * The template used for displaying news content in page.php
 *
 * @package Orix
 */
?>
<?php


global $pageSlug;
$onHomePage = true;

if (empty($pageSlug)) {

	$filter = "news-featured";
	$posts = query_posts(array( 'orderby' => 'title' , 'order' => 'ASC', 'post_type' => 'news', 'post_status'=>'publish', 'posts_per_page' => 1, "newsscategory"=>$filter));


} else {

	$onHomePage = false;
	$filter = "news-".$pageSlug;
	$posts = query_posts(array( 'orderby' => 'title' , 'order' => 'ASC', 'post_type' => 'news', 'post_status'=>'publish', 'posts_per_page' => 3, "newsscategory"=>$filter));

};



$postsCount = count($posts);

//if ($postsCount >=1) {
echo "<hr>";

echo "<section class='centered'><h1>ORIX NEWSROOM</h1></section>";

echo "<div class='holder-articles row'>";

//WordPress loop for custom post type
//$my_query = new WP_Query('post_type=news&posts_per_page=3');

//while ($my_query->have_posts()) : $my_query->the_post();
while (have_posts()) : the_post();
	$excerpt = get_the_excerpt();
	$headline = $post->post_title;
	$articleCta = ArticleCTA::create([
		"thumbnail"=> get_the_post_thumbnail(),
		"headline"=>string_limit_words($headline,8),
		"date"=>$post->post_date,
		"excerpt"=> string_limit_words($excerpt,25),
		"link"=>$post->guid."&filter=".$pageSlug
	]);

endwhile;  wp_reset_query();


if ($onHomePage) {

	$args = array(
		'post_type' => 'news',
		'post_status'=>'publish',
		'posts_per_page' => 3,
		'orderby'=> 'date',
		'order' => 'DEC',
		'tax_query' =>  array( 'taxonomy' => 'newsscategory', 'terms' => 'news-featured','operator' => 'NOT IN' )
	);
	query_posts($args);

	while (have_posts()) : the_post();

		$excerpt = get_the_excerpt();
		$title = $post->post_title;

		$articleCta = ArticleCTA::create([
			"thumbnail"=> get_the_post_thumbnail(),
			"headline"=>string_limit_words($title, 6),
			"date"=>$post->post_date,
			"excerpt"=> string_limit_words($excerpt,20),
			"link"=>$post->guid."&filter=".$pageSlug
		]);

	endwhile;  wp_reset_query();
}

echo "</div>";

//};

?>