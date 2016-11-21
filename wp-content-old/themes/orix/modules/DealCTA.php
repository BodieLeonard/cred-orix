<?php

// class to hold all the call to actions

class DealCTA {

	public static function create($args) {
		$thumbnail = $args['thumbnail'];
		$headline = $args['headline'];
		$excerpt = $args['excerpt'];
		
		?>
		
		<article class="deal col-md-6">
			<div class="col-md-5">
				<?php echo $thumbnail; ?>
			</div>
			<div class="col-md-7">
				<h1><?php echo $headline; ?></h1>
				<blockquote><?php echo $excerpt; ?></blockquote>
			</div>
		</article>

		<?php 

		//return $args;
	}
}
