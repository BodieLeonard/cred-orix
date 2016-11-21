<?php


if(!is_user_logged_in()){
    wp_redirect('/');
}

?>

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
/*
Template name: Video
*/


get_header(); ?>

<?php

$taxonomy = 'video-'.$_REQUEST['filter'];
$filter = (isset($_REQUEST['filter'])) ? $_REQUEST['filter'] : "ORIX";
$title = str_replace("-", " ", $filter);

// check to see if year is in the url
$path = $_SERVER['REQUEST_URI'];
$folders = explode('/', $path);
$hasYear = ($folders[1] == 'video') ? false : true;

if(isset($_REQUEST['filter'])){

    if($hasYear){
        $posts = query_posts(array( 'year'=>get_the_time('Y'), 'post_type' => 'video', 'post_status'=>'publish', 'posts_per_page' => -1, 'orderby'=> 'date', 'order' => 'DEC', "videocategory"=>$taxonomy));
    } else {
        $posts = query_posts(array(  'post_type' => 'video', 'post_status'=>'publish', 'posts_per_page' => -1, 'orderby'=> 'date', 'order' => 'DEC', "videocategory"=>$taxonomy));
    };


} else {
    if($hasYear){
    }else {
        $posts = query_posts(array(  'post_type' => 'video', 'post_status'=>'publish', 'posts_per_page' => -1, 'orderby'=> 'date', 'order' => 'DEC'));
    }

};
?>
<?php get_template_part( 'content', 'video' ); ?>


<div id="content" class="site-content">

    <div id="primary" class="content-area">

        <section class='centered '>
            <h1><?php echo $title; ?> Video Archive</h1>
        </section>

        <main id="main" class="site-main col-xs-13 col-md-9 news" role="main">

            <?php while ( have_posts() ) : the_post(); ?>

                <article class="full simple">
                    <date><?php the_date(); ?></date>
                    <h1><a href="<?php the_permalink();?>"><?php  the_title(); ?></a> </h1>
                </article>

            <?php endwhile; // end of the loop. ?>

        </main><!-- #main -->
        <div class="col-xs-12 col-md-3 pull-right">
            <?php get_template_part( 'content', 'sidebar-video-archive' ); ?>
        </div>
    </div><!-- #primary -->

    <?php get_sidebar(); ?>
    <?php get_footer(); ?>
