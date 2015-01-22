<?php

// class to hold all the main bullet points that need to be call to actions

class BulletCTA {

	public static function create($args) {
		$icomoon = $args['icomoon'];
		$headline = $args['headline'];
		$excerpt = $args['excerpt'];
		$link = $args['link'];
		$target = $args['target'];
		
		?>
		
		<article class="bullet col-md-4">
			<?php if($link) : ?>
				
				<a href="<?php echo $link; ?>" target="<?php echo $target; ?>">
					<div class="diamond"><div class="<?php echo $icomoon; ?>"></div></div>
				</a>
				<a href="<?php echo $link; ?>" target="<?php echo $target; ?>">
					<h1><?php echo $headline; ?></h1>
				</a>
				<blockquote><?php echo $excerpt; ?></blockquote>
				<a class="button" href="<?php echo $link; ?>" target="<?php echo $target; ?>">Read More</a>
			
			<?php else : ?>
				
				<div class="diamond" ><div class="<?php echo $icomoon; ?>"></div></div>
				<h1><?php echo $headline; ?></h1>
				<blockquote><?php echo $excerpt; ?></blockquote>
			
			<?php endif; ?>

		</article>

		<?php 

		//return $args;
	}
}
