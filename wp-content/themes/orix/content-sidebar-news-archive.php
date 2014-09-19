<?php
/**
 * The sidebar is used to display news archive
 *
 * @package Orix
 */
?>






<?php
/**
 * The template used for displaying news content in page.php
 *
 * @package Orix
 */
?>
<?php

$qstring = $_REQUEST['filter'];
$filter = "news-".$qstring;
$posts = query_posts(array( 'post_type' => 'news', 'post_status'=>'publish', 'posts_per_page' => 3, 'orderby'=> 'date', 'order' => 'DEC', "newsscategory"=>$filter)); 
	
?>



<aside class="col-xs-12 col-md-12">
	<ul>
		<li>
			<p>News Archive</p>
		</li>
		
		<?php 
			#$args = array( 'post_type' => 'news', 'title_li' => null);
			$args = array(
				'type'            => 'yearly',
				'limit'           => '20',
				'format'          => 'html', 
				'before'          => '',
				'after'           => '',
				'show_post_count' => false,
				'echo'            => 1,
				'order'           => 'DESC',
				'post_type'				=> 'news',
				
			);
				

			if(empty($qstring)) {
				wp_get_archives_cpt($args);
			}
			/*$args = array( 'post_type' => 'news', 'posts_per_page' => 10 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();
			  $post_date_year = mysql2date("Y", $post->post_date_gmt);
			  $post_date_month = mysql2date("m", $post->post_date_gmt);
			  echo '<li><a class="'.$post_date_year.' '.$post_date_month.'" href="/'.$post->post_name.'">'.$post->post_name.'</a></li>';
			endwhile;*/


			#wp_list_pages($args);
			/*
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();
			    echo '<li><a href="/'.$post->post_name.'">'.$post->post_name.'</a></li>';
			endwhile;*/

			while (have_posts()) : the_post(); 	

	  	echo '<li><a href="/'.$post->post_name.'?filter='.$qstring.'">'.$post->post_title.'</a></li>';

			endwhile;  wp_reset_query();

			echo '<li><a href="/'.date("Y").'/news/">All News</a></li>';

		?>		
	</ul>
</aside>