<div class="col-xs-12 col-md-3">
	<aside class="col-xs-12 col-md-12">
		<ul>
			<li>
				<p>Business Units</p>
			</li>
			<?php 
			query_posts(array( 'post_type' => 'firm', 'post_status'=>'publish', 'posts_per_page' => -1, 'orderby'=> 'menu_order', 'order' => 'ASC')); 
			while (have_posts()) : the_post(); ?>
				<li><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></li>
			<?php endwhile; ?>
		</ul>
	</aside>
</div>