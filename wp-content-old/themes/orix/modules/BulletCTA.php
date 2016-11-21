<?php

// class to hold all the main bullet points that need to be call to actions

class BulletCTA {

	public static function create($args) {
		$icomoon = $args['icomoon'];
		$headline = $args['headline'];
		$excerpt = $args['excerpt'];
		$link = $args['link'];
		$target = $args['target'];
		$count = $args['count'];
		$removeMoreButton = $args['removeMoreButton'];


		$colNumber = 4;
		if($count <=2){
			$colNumber = 6;
		}
		?>
		
		<article class="bullet col-md-<?php echo $colNumber;?>">
			<?php if($link) : ?>
				
				<?php if($removeMoreButton) {  
					$class = "hidden"; 
					$link = "#"; 
					$target = ""; ?>
					<style>
					.content-area .bullet a.hidden {
					    opacity: 0;
					}
					.content-area .bullet a{
						cursor: none;
					}
					</style>
				
					<div class="diamond"><div class="<?php echo $icomoon; ?>"></div></div>
				<?php } else { ?>
					<a href="<?php echo $link; ?>" target="<?php echo $target; ?>">
						<div class="diamond"><div class="<?php echo $icomoon; ?>"></div></div>
					</a>
				<?php }; ?>

				
				<a href="<?php echo $link; ?>" target="<?php echo $target; ?>">
					<h1><?php echo $headline; ?></h1>
				</a>
				<blockquote><?php echo $excerpt; ?></blockquote>
				
				<a class="button <?php echo $class; ?>" href="<?php echo $link; ?>" target="<?php echo $target; ?>">Read More</a>

			
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
