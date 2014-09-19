<?php

// class to hold all the main bullet points that need to be call to actions

class BulletCTA {

	public static function create($args) {
		$icomoon = $args['icomoon'];
		$headline = $args['headline'];
		$excerpt = $args['excerpt'];
		$link = $args['link'];
		
		?>
		
		<article class="bullet col-md-4">
			<?php if($link) : ?>
				
				<a href="<?php echo $link; ?>">
					<span class="diamond <?php echo $icomoon; ?>" ></span>
				</a>
				<a href="<?php echo $link; ?>">
					<h1><?php echo $headline; ?></h1>
				</a>
				<blockquote><?php echo $excerpt; ?></blockquote>
				<a class="button" href="<?php echo $link; ?>">Read More</a>
			
			<?php else : ?>
				
				<span class="diamond <?php echo $icomoon; ?>" ></span>
				<h1><?php echo $headline; ?></h1>
				<blockquote><?php echo $excerpt; ?></blockquote>
			
			<?php endif; ?>

		</article>

		<?php 

		//return $args;
	}
}
