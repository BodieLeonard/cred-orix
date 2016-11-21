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
?>

<script src="/wp-content/themes/orix/js/iphone-inline-video.browser.js"></script>
<?php while ( have_posts() ) : the_post(); ?>

    <div class="video-container">
        <!--<video autoplay loop webkit-playsinline >
            <source src="<?php /*echo get_post_meta($post->ID, 'video_path', true); */?>" type="video/mp4">
            Your browser doesn't support HTML5 video.
        </video>-->
        <iframe id="video"  src="<?php echo get_post_meta($post->ID, 'video_path', true);?>" frameborder="0" allowfullscreen></iframe>
        <div id="controls"> <a onclick="videoMute()" id="btn-mute"><i class="fa fa-volume-down" aria-hidden="true"></i></a> </div>
    </div>

    <script>
        var video = document.querySelector('video'),
          videoBtn = document.getElementById('btn-mute');
        makeVideoPlayableInline(video);
        video.addEventListener('touchstart', function () {
            video.play();
        });
    </script>




<?php endwhile; // end of the loop.
//https://15-lvl3-pdl.vimeocdn.com/01/3576/2/67882670/171581939.mp4?expires=1477520375&token=081d0c039024454d1e971
// ?>

    </div>



    <div id="content" class="site-content">



    <div id="primary" class="content-area">
        <main id="main" class="site-main page-secondary" role="main ">


            <?php while ( have_posts() ) : the_post(); ?>

                <div class="col-xs-12 col-md-3 pull-right">
                    <?php get_template_part( 'content', 'sidebar-video-archive' ); ?>
                </div>

                <?php get_template_part( 'content', 'video' );
                #get_template_part( 'content', 'sidebar-news-archive' );
                ?>

            <?php endwhile; // end of the loop. ?>

        </main><!-- #main -->
    </div><!-- #primary -->


<?php get_footer(); ?>








