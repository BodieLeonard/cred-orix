<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Template Name: Video
 */
get_header(); ?>
<?php
if(!empty(wp_get_attachment_image_src( get_post_thumbnail_id(), 'full')[0])) :

?><div class="" style="background-image: url(<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'full')[0] ?>) ">

    <script src="/wp-content/themes/orix/js/iphone-inline-video.browser.js"></script>

    <div class="video-container">
        <video autoplay muted loop webkit-playsinline>
            <source src="/wp-content/uploads/video/orix_video_full.mp4" type="video/mp4">
            <source src="/wp-content/uploads/video/orix_video_full.ogv" type="video/ogg">
            <source src="/wp-content/uploads/video/orix_video_full.webm" type="video/webm">
            Your browser doesn't support HTML5 video.
        </video>
        <div id="controls"> <a onclick="videoMute()" id="btn-mute"><i class="fa fa-volume-down" aria-hidden="true"></i></a> </div>
    </div>

    <script>
        var video = document.querySelector('video'),
          videoBtn = document.getElementById('btn-mute');
        makeVideoPlayableInline(video);
        video.addEventListener('touchstart', function () {
            video.play();
        });

        function videoMute(){
            if(video.muted){
                video.muted = false;
                videoBtn.innerHTML='<i class="fa fa-volume-up" aria-hidden="true"></i>';
            } else {
                video.muted = true;
                videoBtn.innerHTML='<i class="fa fa-volume-down" aria-hidden="true"></i>';

            }
        }
    </script>

    <style>
        .IIV::-webkit-media-controls-play-button,
        .IIV::-webkit-media-controls-start-playback-button {
            opacity: 0;
            pointer-events: none;
            width: 5px;
        }
        .video-container, video{
            position: relative;
            display: block;
            background: white;
            width: 100%;
            margin: auto;
            margin-bottom:30px;
            padding-top:30px;
        }

        #controls{
            position: absolute;
            bottom:40px;
            right:40px;
            text-align: left;
            cursor: pointer;
        }
        #controls i{
            font-size:30px;
            color:white;
            width:40px;
        }
        figure {
            width: 100%;
        }
        @media screen and (max-width: 1320px) {
            .video-container, video{
                margin-bottom:30px;
                padding-top:0px;
            }
        }
        @media screen and (max-width: 500px) {
            #controls{
                display:none;
            }
        }
    </style>

    <?php else : ?>

        <?php
        $post_home = get_post(3652);
        $secondThumb = MultiPostThumbnails::get_post_thumbnail_url( 'page', 'secondary-image', $post_home->ID	);
        $isMainPage = true;
        $isSubPage = false;
        $isCapitalSolutionsMainPage = false;
        $pageID = $post->ID;
        ?>
        <?php #getHero($secondThumb); ?>

    <?php endif; ?>

</div>

<div id="content" class="site-content">

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php while ( have_posts() ) : the_post(); ?>

                <section class='centered'>
                    <h1><?php the_title(); ?></h1>
                    <p><?php echo get_post_meta($post->ID, 'headline', true); ?></p>
                </section>

                <article class="full  simple">
                    <?php get_template_part( 'content', 'page' ); ?>
                </article>
                <?php #get_template_part( 'content', 'newsroom' ); ?>

            <?php endwhile; // end of the loop. ?>

        </main><!-- #main -->
    </div><!-- #primary -->

    <?php get_sidebar(); ?>
    <?php get_footer(); ?>
