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

get_header(); 

$filter = (isset($_REQUEST['filter'])) ? $_REQUEST['filter'] : "ORIX";
$title = str_replace("-", " ", $filter);

$post_home = get_post(3754);
$secondThumb = MultiPostThumbnails::get_post_thumbnail_url( 'page', 'secondary-image', $post_home->ID	);
?>
	
	<?php get_template_part( 'content', 'video' ); ?>
		
	</div>

	<div id="content" class="site-content">

	<section class='centered '>
			<h1><?php echo $title; ?> NEWSROOM</h1>
            
		</section>

	<div id="primary" class="content-area">
		<main id="main" class="site-main page-secondary" role="main ">


			<?php while ( have_posts() ) : the_post(); ?>
				
                

				<div class="col-xs-12 col-md-3 pull-right">
					<?php get_template_part( 'content', 'sidebar-video-archive' ); ?>
				</div>

				<?php get_template_part( 'content', 'newsroom-full' ); 
					#get_template_part( 'content', 'sidebar-news-archive' );
				?>

                <?php $content = get_post_meta(5230, 'video_content', true); 
                    echo $content;
                ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>