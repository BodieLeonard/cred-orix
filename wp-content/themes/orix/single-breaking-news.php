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
Template Name: Breaking News
*/

$post_breaking_news = query_posts('post_type=breaking-news');
$post_id = $post_breaking_news[0]->ID;
$headline = $post_breaking_news[0]->post_title;
$subHeadline = get_post_meta($post_id, 'page_subhead')[0];
$main_intro_paragraph = get_post_meta($post_id, 'main_intro_paragraph')[0];
$leader_qa_headline = get_post_meta($post_id, 'leader_qa_headline')[0];
$leader_qa_paragraph = get_post_meta($post_id, 'leader_qa_paragraph')[0];
$center_image_headline = get_post_meta($post_id, 'center_image_headline')[0];
$center_image_headline = get_post_meta($post_id, 'center_image_headline')[0];


#$center_image = get_post_meta($post_id, 'center_image')[0];

$center_image = get_post_meta($post_id, 'center_image', true);

$closing_content = get_post_meta($post_id, 'closing_content')[0];
$links = get_post_meta($post_id, 'links')[0];
$bios = get_post_meta($post_id, 'bios')[0];

$link = get_permalink($post_id);

$hasBreakingNews = get_post_meta($post_id, 'show_as_breaking_news_item');
$hero = get_post_meta($post_id, 'hero', true);


get_header();

?>

<style>

  .breaking-news .content-area article img.full {
    position: relative;
    left: 0;
    margin:0 auto;
    margin-bottom: 40px;
    max-width:100%;
    display: block;
  }
  .breaking-news .content-area h1, .breaking-news .content-area h3 {
    font-size: 25px;
    text-transform: uppercase;
    font-family: "BrandonReg";
    margin-bottom: 0px;
    letter-spacing: 6px;
    text-align: left;
    font-weight:700;
  }
  .breaking-news .centered, .breaking-news .centered h1{
    text-align: center;
  }
  .breaking-news .content-area article.simple h3 {
    font-weight:500;
    margin-top:10px;
  }
  .breaking-news .content-area p.content-holder {
    margin:30px 0;
    padding:0;
  }
  .breaking-news p, .breaking-news h3, .breaking-news ul li a{
    color:#737679;
  }
  .breaking-news ul li a {
    font-family: "MerriweatherReg";
    font-size:16px;
  }
  body #content.breaking-news hr{
    margin-bottom: 40px;
  }

  .content-area article.management-cta {
    margin-right: 30px;
  }
.content-area article.management-cta.col-md-4 {
    margin-right: 0px;
  }
  .content-area article.management-cta .thumb {
    width:100%;
    height:auto;
    background:transparent;
    max-height:198px;
    min-height: 200px;
  }
  .content-area article img{
    max-width: 170px;
    margin-bottom:0;
  }

  .content-area article .button {
    padding:10px 40px;
    white-space: nowrap;
  }
  .content-area article.management-cta h1 {
    height:40px;
  }
  .content-area article .download {

  }
  .content-area article .download img {
    max-width:auto;
    margin:0 auto;
    left:0;
    display: block;
  }
  .content-area article.management-cta em {
    min-height: 70px;
  }
article.simple > ul > li {
      margin-bottom:30px;
  }
.breaking-news h3.centered {
      text-align:center;
  }




</style>


<?php getHero(wp_get_attachment_url( $hero )); ?>

<div id="content" class="site-content breaking-news">

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
      <section class="centered">
      <div class="col-md-12">
          <h1><?php echo $headline; ?></h1>
          <article class="simple headline">
            <h3 class="centered"><?php echo $subHeadline; ?></h3>
          </article>
      </div>
      </section>
      <article class="col-md-12 simple">

        <p class="content-holder"><?php echo $main_intro_paragraph; ?></p>
        <hr>

        <p class="content-holder"><?php echo $leader_qa_paragraph; ?></p>

        <?php 
        $cimg = get_post_meta($post_id, 'center_image', true);
        $chead = get_post_meta($post_id, 'center_image_headline')[0];
        if( isset($chead) && !empty($cimg) ) { ?>
          <hr>
          <section class="centered"><h1><?php echo $center_image_headline; ?></h1></section>
          <img class="full" src="<?php echo wp_get_attachment_url( $center_image );?>"/>
        <?php }; ?>
        
        <?php 
        $close = get_post_meta($post_id, 'closing_content', true);
        if( !empty($close) ) { ?>
          <hr>
          <p class="content-holder"><?php echo $closing_content; ?></p>
        <?php }; ?>



        <hr>

        <section class="centered"><h1>Get To Know Our Leaders</h1></section>
        <?php 
        $bios = explode(",",$bios);
        foreach ($bios as $key => $value) {
          
          $result = query_posts(array( 'post_type' => 'management', 'post_status'=>'publish', 'posts_per_page' => -1, 'name'=>$value));
          
          if(!empty($result)){
            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($result[0]->ID), 'post')[0];
            $thumb = '<img width="1500" height="1750" src="'.$thumb.'" class="attachment-post-thumbnail wp-post-image" alt="">';
            $title =  get_post_meta($result[0]->ID, 'title', true); 
            $name = $result[0]->post_title;
          } else {
            $thumb = '<span style="font-size: 290px;color: #bcbcbc;position: relative;left: -15px;bottom:-2px;" class="icon-profiledefault"></span>';  
            $title = 'Unknown';
            $name = $value;
          }
        ?>
          <article class="management-cta col-md-4">
            <div class="thumb"><?php echo $thumb; ?> </div>
            <h1><?php echo $name; ?></h1>
            <em style="height:45px"><?php echo $title; ?></em>
            <a class="button" href="/<?php echo $value; ?>">Read More</a>
          </article>

        <?php }; ?> 

        
        <hr>
        <section class="centered"><h1>Learn More</h1></section>
        <span><?php echo $links; ?></span>
      </article>

    </main><!-- #main -->
  </div><!-- #primary -->

<!--
Start of DoubleClick Floodlight Tag: Please do not remove
Activity name of this tag: Boston Financial LP
URL of the webpage where the tag is expected to be placed: http://www.orix.com
This tag must be placed between the <body> and </body> tags, as close as possible to the opening tag.
Creation Date: 06/17/2016
-->
<script type="text/javascript">
  var axel = Math.random() + "";
  var a = axel * 10000000000000;
  document.write('<iframe src="https://5765050.fls.doubleclick.net/activityi;src=5765050;type=gener0;cat=bosto0;dc_lat=;dc_rdid=3575657;tag_for_child_directed_treatment=;ord=' + a + '?" width="1" height="1" frameborder="0" style="display:none"></iframe>');
</script>
<noscript>
  <iframe src="https://5765050.fls.doubleclick.net/activityi;src=5765050;type=gener0;cat=bosto0;dc_lat=;dc_rdid=3575657;tag_for_child_directed_treatment=;ord=1?" width="1" height="1" frameborder="0" style="display:none"></iframe>
</noscript>
<!-- End of DoubleClick Floodlight Tag: Please do not remove -->

  <?php get_footer(); ?>
