<?php

// class to hold all the call to actions

class ManagementCTA {

	public static function create($args) {
		$thumbnail = $args['thumbnail'];
		$headline = $args['headline'];
		$title = (!empty($args['title'])) ? $args['title'] : "Title";
		$link = $args['link'];
		$department = $args['department'];
		
		?>
		
		<article class="management-cta col-md-3">
				<div class="thumb">
				<?php if (!empty($thumbnail)) : ?>
					<?php echo $thumbnail; ?>
				<?php else : ?>
					<span style="font-size: 290px; color: #bcbcbc; position: relative; left: -15px; bottom:-2px;" class="icon-profiledefault"></span>
				<?php endif; ?>
				</div>
				<h1><?php echo $headline; ?></h1>
				<em style="height:45px">
					<?php echo $title; ?>
					<?php if (!empty($department)) : ?>
						<?php echo '<br/>'.$department; ?>
					<?php endif; ?>
				</em>
				
				<a class="button" href="<?php echo $link; ?>">Read More</a>
			
		</article>

		<?php 

		//return $args;
	}
}
