<?php

// class to hold all the call to actions

class ArticleCTA {

	public static function create($args) {
		$thumbnail = $args['thumbnail'];
		$headline = $args['headline'];
		$date = date('M d Y', strtotime($args['date']));;
		$excerpt = $args['excerpt'];
		$link = $args['link'];
		
		?>
		
		<article class="article col-md-4">
			<div class="col-md-10">
			<div class="thumb"><?php echo $thumbnail; ?></div>
			<h1><?php echo $headline; ?></h1>
			<date><?php echo $date; ?></date>
			<blockquote><?php echo $excerpt; ?></blockquote>
			<a class='button' href="<?php echo $link; ?>">Read More</a>
			</div>
		</article>

		<?php 

		//return $args;
	}
}
