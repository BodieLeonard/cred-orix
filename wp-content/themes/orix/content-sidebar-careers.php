<?php
/**
 * The sidebar is used to display the management team
 *
 * @package Orix
 */
?>

<aside class="col-xs-12 col-md-12">
	<ul>
		<li>
			<p>Career Links</p>
		</li>
		
		<?php 
			$args = array( 'post_type' => 'career', 'post__not_in' => array( 151 ));
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();
			    echo '<li><a href="/'.$post->post_name.'">'.$post->post_title.'</a></li>';
			endwhile;
		?>		
	</ul>
</aside>