<?php

// class to hold all the main bullet points that need to be call to actions

class BulletCTA {

	public static function create($args) {
		$icomoon = $args['icomoon'];
		$headline = $args['headline'];
		$excerpt = $args['excerpt'];
		
		?>
		
		<article class="bullet col-md-4">
			<span class="diamond <?php echo $icomoon; ?>" ></span>
			<h1><?php echo $headline; ?></h1>
			<blockquote><?php echo $excerpt; ?></blockquote>
		</article>

		<?php 

		//return $args;
	}
}
