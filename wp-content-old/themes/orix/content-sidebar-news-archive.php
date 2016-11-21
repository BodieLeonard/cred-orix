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
$posts = query_posts(array( 'post_type' => 'news', 'post_status'=>'publish', 'posts_per_page' => -1, 'orderby'=> 'date', 'order' => 'DEC', "newsscategory"=>$filter)); 
	
$filter = (isset($_REQUEST['filter'])) ? $_REQUEST['filter'] : "";
$title = str_replace("-", " ", $filter);
?>



<aside class="col-xs-12 col-md-12 ">
	<ul>
		<li>
			<p>News Archive</p>
		</li>
		
		<?php 

			//echo '<li><a href="/'.date("Y").'/news/">All ORIX News</a></li>';
			echo '<li><a href="/news/">All ORIX News</a></li>';
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
			} else {
				//echo '<li><p style="color: #73767A; font-size: 13px;">All '.$title.' News</p></li>';
				echo '<li><a href="/news/?filter='.$qstring.'">All '.$title.' News</a></li>';
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
			$yearArray = array();
			while (have_posts()) : the_post(); 	

			$year =  date('Y', strtotime($post->post_date));
	  		#echo '<li><a href="/'.$post->post_name.'?filter='.$qstring.'">'.$post->post_title.'</a></li>';
	  		
	  		if (in_array($year, $yearArray)) {	
	  			#echo '<li><a href="/'.$year.'/news/?filter='.$qstring.'">'.$year.'</a></li>';
	  		} else {
	  			echo '<li><a style="padding-left:40px;" href="/'.$year.'/news/?filter='.$qstring.'">'.$year.'</a></li>';
	  		};
	  		array_push($yearArray, $year);
			endwhile;  wp_reset_query();

			

		?>		
	</ul>
</aside>