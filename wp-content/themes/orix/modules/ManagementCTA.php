<?php

// class to hold all the call to actions

class ManagementCTA {

	public static function create($args) {
		$thumbnail = $args['thumbnail'];
		$headline = $args['headline'];
		$title = (!empty($args['title'])) ? $args['title'] : "Title";
		$link = $args['link'];
		
		?>
		
		<article class="management-cta col-md-3">
				<div class="thumb"><?php echo $thumbnail; ?></div>
				<h1><?php echo $headline; ?></h1>
				<em><?php echo $title; ?></em>
				<a class="button" href="<?php echo $link; ?>">Read More</a>
			
		</article>

		<?php 

		//return $args;
	}
}
