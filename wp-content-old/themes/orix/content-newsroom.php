<?php
/**
 * The template used for displaying news content in page.php
 *
 * @package Orix
 */
?>
<?php


global $pageSlug; 
global $onCapitalSolutions;
$onHomePage = true;

$newSlug = $pageSlug;
$newSlug = explode("-", $pageSlug);
$parentTerm = array_shift($newSlug);
$newSlug = implode('-', $newSlug);



if (empty($pageSlug)) {

	$filter = "news-featured";
	$posts = query_posts(array( 'post_type' => 'news', 'post_status'=>'publish', 'posts_per_page' => 1, 'orderby'=> 'date', 'order' => 'DEC', "newsscategory"=>$filter)); 

} else {
	
	$onHomePage = false;
	$filter = "news-".$pageSlug;
	$posts = query_posts(array( 'post_type' => 'news', 'post_status'=>'publish', 'posts_per_page' => 3, 'orderby'=> 'date', 'order' => 'DEC', "newsscategory"=>$filter)); 
	
};

if($onCapitalSolutions && $parentTerm == 'provensuccess') {

	$pageSlug = $newSlug;
	$filter = 'news-'.$newSlug;
	$posts = query_posts(array( 'post_type' => 'news', 'post_status'=>'publish', 'posts_per_page' => 3, 'orderby'=> 'date', 'order' => 'DEC', "newsscategory"=>$filter)); 
}; 


$postsCount = count($posts);

if ($postsCount >=1) {
	echo "<hr>";

	$title = str_replace("-", " ", $pageSlug);
	echo "<section class='centered'><h1>".$title." NEWSROOM</h1></section>";

	echo "<div class='holder-articles row'>";

	while (have_posts()) : the_post(); 	
		$excerpt = get_the_excerpt();
		$headline = $post->post_title; 
	  $articleCta = ArticleCTA::create([
	  	"thumbnail"=> get_the_post_thumbnail(),
	  	"headline"=>string_limit_words($headline,8),
	  	"date"=>$post->post_date,
	  	"excerpt"=> string_limit_words($excerpt,23),
	  	"link"=>$post->guid."&filter=".$pageSlug
	  ]);

	endwhile;  wp_reset_query();


	if ($onHomePage) {

		$args = array(
	    'post_type' => 'news',
	    'post_status'=>'publish',
	    'posts_per_page' => 2,
	    'orderby'=> 'date', 
	    'order' => 'DEC',
	    'tax_query' =>  array( 'taxonomy' => 'newsscategory', 'terms' => 'news-featured','operator' => 'NOT IN' )
    );
		query_posts($args); 

		while (have_posts()) : the_post();

			$excerpt = get_the_excerpt();

		  $articleCta = ArticleCTA::create([
		  	"thumbnail"=> get_the_post_thumbnail(),
		  	"headline"=>string_limit_words($post->post_title,8),
		  	"date"=>$post->post_date,
		  	"excerpt"=> string_limit_words($excerpt,23),
		  	"link"=>$post->guid."&filter=".$pageSlug
		  ]);

		endwhile;  wp_reset_query();
	}

	echo "</div>";

};

?>