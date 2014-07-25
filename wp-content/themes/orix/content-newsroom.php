<?php
/**
 * The template used for displaying news content in page.php
 *
 * @package Orix
 */
?>
<?php

echo "<hr>";

echo "<section class='centered'><h1>ORIX NEWSROOM</h1><p>Nec dubitamus multa iter quae et nos invenerat. Non equidem invideo, miror magis posuere velit aliquet. At nos hinc posthac, sitientis piros Afros. Vivamus sagittis lacus vel augue laoreet rutrum faucibus. Mercedem aut nummos unde unde extricat, amaras.</p> </section>";

echo "<div class='holder-articles row'>";

//WordPress loop for custom post type
$my_query = new WP_Query('post_type=news&posts_per_page=-1');
while ($my_query->have_posts()) : $my_query->the_post();
			
  $articleCta = ArticleCTA::create([
  	"thumbnail"=> wp_get_attachment_image_src( get_post_thumbnail_id(), 'large')[0],
  	"headline"=>$post->post_title,
  	"date"=>$post->post_date,
  	"excerpt"=>get_the_excerpt(),
  	"link"=>$post->guid
  ]);

endwhile;  wp_reset_query();
echo "</div>";

?>