<?php

// class to hold all the solution buckets

class SolutionCTA {

	public static function create($args) {
		$thumbnail = $args['thumbnail'];
		$headline = $args['headline'];
		$excerpt = $args['excerpt'];
		$link = $link['link'];
		
		?>
		
		<article class="solution">
			<img src='<?php echo $thumbnail; ?>'>
			<h1><?php echo $headline; ?></h1>
			<blockquote><?php echo $excerpt; ?></blockquote>
			<a class='button' href="<?php echo $link; ?>">Read More</a>
		</article>

		<?php 

		//return $args;
	}
}
