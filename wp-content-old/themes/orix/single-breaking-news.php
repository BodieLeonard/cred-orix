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
  .content-area article.management-cta .thumb {
    width:100%;
    height:auto;
    background:transparent;
    max-height:198px;
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


</style>


<?php getHero(wp_get_attachment_url( $hero )); ?>

<div id="content" class="site-content breaking-news">

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
      <section class="centered">
      <div class="col-md-12">
          <h1><?php echo $headline; ?></h1>
          <article class="simple headline">
            <h3><?php echo $subHeadline; ?></h3>
          </article>
      </div>
      </section>
      <article class="col-md-12 simple">

        <p class="content-holder"><?php echo $main_intro_paragraph; ?></p>
        <hr>

        <p class="content-holder"><?php echo $leader_qa_paragraph; ?></p>

        <hr>

        <section class="centered"><h1><?php echo $center_image_headline; ?></h1></section>

        <img class="full" src="<?php echo wp_get_attachment_url( $center_image );?>"/>
        <hr>


        <p class="content-holder"><?php echo $closing_content; ?></p>


        <hr>


        <section class="centered"><h1>Get To Know Our Leaders</h1></section>
        <span><?php #echo $bios; ?></span>



        <article class="management-cta col-md-2">
          <div class="thumb">
            <img width="1500" height="1750" src="/wp-content/uploads/2014/10/Hideto-Nishitani-Web.jpg"
                 class="attachment-post-thumbnail wp-post-image" alt="Hideto-Nishitani-Web"></div>
          <h1>Hideto Nishitani</h1>
          <em style="height:45px">
            Chairman, President and Chief Executive Officer </em>

          <a class="button" href="hideto-nishitani/?filter=executives">Read More</a>

        </article>


        <article class="management-cta col-md-2">
          <div class="thumb">
            <img width="1500" height="1750" src="/wp-content/uploads/2014/10/Andrew-Garvey-Web.jpg" class="attachment-post-thumbnail wp-post-image" alt="Andrew-Garvey-Web">								</div>
          <h1>Andrew Garvey</h1>
          <em style="height:45px">
            Senior Managing Director and Head of ORIX Municipal & Infrastructure Finance </em>

          <a class="button" href="andrew-garvey/?filter=business-unit-leadership">Read More</a>

        </article>

        <article class="management-cta col-md-2">
          <div class="thumb">
            <img width="1500" height="1750" src="/wp-content/uploads/2016/07/Ken-larger-1.jpg" class="attachment-post-thumbnail wp-post-image" alt="KEN CUTILLO">								</div>
          <h1>Kenneth Cutillo</h1>
          <em style="height:45px">
            CEO<br>Boston Financial Investment Management</em>

          <a class="button" href="/management/kenneth-j-cutillo/?filter=business-unit-leadership">Read More</a>

        </article>

        <article class="management-cta col-md-2">
          <div class="thumb">
            <img width="1500" height="1750" src="/wp-content/uploads/2014/10/Jonathan-Kern-Web.jpg" class="attachment-post-thumbnail wp-post-image" alt="Jonathan-Kern-Web">								</div>
          <h1>Jonathan S. Kern</h1>
          <em style="height:45px">
            Senior Managing Director and Chief Investment Officer Direct Investment Operations									</em>

          <a class="button" href="jonathan-s-kern/?filter=executives">Read More</a>

        </article>

        <article class="management-cta col-md-2">
          <div class="thumb">
            <img width="1500" height="1750" src="/wp-content/uploads/2016/07/T_Meylor.jpg" class="attachment-post-thumbnail wp-post-image" alt="Ted Meylor">								</div>
          <h1>EDWARD MEYLOR</h1>
          <em style="height:45px">Chairman & CEO <br/>RED Capital Group, LLC</em>

          <a class="button" href="/management/edward-meylor/?filter=business-unit-leadership">Read More</a>

        </article>











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
