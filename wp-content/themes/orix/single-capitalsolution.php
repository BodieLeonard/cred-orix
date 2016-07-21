<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Orix
 */

global $onCapitalSolutions;
$onCapitalSolutions = true;
get_header(); ?>

<?php
//$secondThumb = MultiPostThumbnails::get_the_post_thumbnail(get_post_type(), 'secondary-image');
$secondThumb = MultiPostThumbnails::get_post_thumbnail_url( get_post_type(), 'secondary-image', $post_id	);
$isMainPage = true;
$isSubPage = false;
$isCapitalSolutionsMainPage = false;
$pageID = $post->ID;
$showTransactions = get_post_meta($pageID, 'show_transactions', true);

?>

<?php getHero($secondThumb); ?>

	<div id="content" class="site-content">



	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>


				<?php

				$pageSlug = $post->post_name;
				//$teamLink = get_post_meta($post->ID, 'management-team-link', true);
				// ceck if shortcode exists
				$teamLink = has_shortcode( $post->post_content, 'management' );

				if ($pageSlug == 'corporate-capital' ) {
					$isCapitalSolutionsMainPage = true;
				};

				?>

				<section class='centered'>
					<h1><?php the_title(); ?></h1>
					<p><?php echo get_post_meta($post->ID, 'headline', true); ?></p>
				</section>


				<?php
				$sidebar_pid = $post->ID;
				$children = wp_list_pages('title_li=&child_of='.$sidebar_pid.'&post_type=capitalsolution&echo=0');
				$numChildren = get_pages('title_li=&child_of='.$post->ID.'&post_type=capitalsolution&echo=0');

				if ($post->post_parent > 1) {
					$pageSlugParent = get_post($post->post_parent)->post_name;
					$isSubPage = true;
					$isMainPage = false;
					$sidebar_pid = $post->post_parent;

				} elseif (count($numChildren) > 0) {

					?>
					<article class="full simple">
						<p><?php echo get_the_content(); ?></p>
					</article>
					<?php
				};

				$children = wp_list_pages('title_li=&child_of='.$sidebar_pid.'&post_type=capitalsolution&echo=0&depth=1');
				$numChildren = get_pages('title_li=&child_of='.$post->ID.'&post_type=capitalsolution&echo=0');
				$hideBusiness = get_post_meta($pageID, 'business_units_on', true);
				$showTransactions = get_post_meta($pageID, 'show_transactions', true);

				?>

				<?php
				if($isSubPage && (!$hideBusiness || $showTransactions)) {
					echo "<div class='col-xs-12 col-md-3'>";

					if($showTransactions){
						get_template_part( 'content', 'sidebar-proven-success-link' );
					}

					get_template_part( 'content', 'sidebar-capital-solutions' );
					
					echo "</div>";
				} else if($showTransactions){
					echo "<div class='col-xs-12 col-md-3'>";

					if($showTransactions){
						get_template_part( 'content', 'sidebar-proven-success-link' );
					}

					echo "</div>";
				}
				?>


				<?php if (count($numChildren) > 1) : ?>
					<?php
					$colWidth = 9;

					if ($sidebar_pid == 157) {
						$colWidth = 12;
					}
					if($showTransactions){
						$colWidth = 6;
					}

					?>


					<article class="full col-xs-12 col-md-<?php echo $colWidth; ?>">
						<div class='holder-bullets row'>
							<?php
							query_posts(array('showposts' => 20, 'post_parent' => get_the_ID(), 'post_type' => 'capitalsolution', 'orderby'=>'menu_order','order'=>'asc'));
							while (have_posts()) : the_post(); ?>

								<?php
								//$excerpt = get_the_excerpt();
								$excerpt = get_post_meta($post->ID, 'headline', true);
								$bulletCta = BulletCTA::create([
									"icomoon"=> "icon-".get_post_meta($post->ID, 'icon', true),
									"headline"=>get_the_title(),
									"excerpt"=> string_limit_words($excerpt,24),
									"link"=> $post->post_name
								]);
								?>
							<?php endwhile; ?>
						</div>
					</article>

				<?php else : ?>
					<?php

					$term_id = $wpdb->get_row("SELECT term_id FROM wp_terms WHERE slug = 'management-$post->post_name'")->term_id;
					$term_taxonomy_id = $wpdb->get_row("SELECT term_taxonomy_id FROM wp_term_taxonomy WHERE term_id = '$term_id'")->term_taxonomy_id;
					$relations = "SELECT * FROM wp_term_relationships WHERE term_taxonomy_id = '$term_taxonomy_id'";
					$term_object_ids = $wpdb->get_results($relations);

					if (count($term_object_ids) > 0 && $isSubPage) {
						$colCenterWidth = 6;
					} else {
						$colCenterWidth = 9;
					}
					if($showTransactions){
						$colCenterWidth = 6;
					}


					?>
					<article class="full col-xs-12 simple col-md-<?php echo $colCenterWidth; ?>">
						<?php  the_content() ?>
					</article>

				<?php endif; ?>


				<?php

				wp_reset_query();
			endwhile; // end of the loop.

			?>
			<div class="col-xs-12 col-md-3">
				<?php

				if(empty($teamLink)) {

					$children = wp_list_pages('title_li=&child_of='.$sidebar_pid.'&post_type=capitalsolution&echo=0');
					if(!$isCapitalSolutionsMainPage) {
						get_template_part( 'content', 'sidebar-team' );
					};

				} else {
					?>
					<aside class="col-xs-12 col-md-12">
						<ul>
							<li>
								<?php echo "<a href='/management/".$teamLink."'>Team Link</a>";?>
							</li>
							<?php
							?>
						</ul>
					</aside>
					<?php

				};

				if($isSubPage) {

					#get_template_part( 'content', 'sidebar-capital-solutions' );
				};

				?>

			</div>

			<?php get_template_part( 'content', 'newsroom' ); ?>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php #get_sidebar(); ?>
<?php get_footer(); ?>