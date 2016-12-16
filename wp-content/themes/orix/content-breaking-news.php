<?php
/**
 * The template used for displaying breaking news on the landing page
 *
 * @package Orix
 */

$post_breaking_news = query_posts('post_type=breaking-news');
$post_id = $post_breaking_news[0]->ID;
$headline = $post_breaking_news[0]->post_title;
$subHeadline = get_post_meta($post_id, 'page_subhead');
$link = get_permalink($post_id);
$hasBreakingNews = get_post_meta($post_id, 'show_as_breaking_news_item');
wp_reset_query();
?>

<?php if($hasBreakingNews[0] == 'yes' && is_front_page() ): ?>
<div class="article news-breaking">
  <div class="news-breaking-headline">
    <h1>Breaking News: <?php echo $headline; ?></h1>
    <a class='button' href="<?php echo $link; ?>">Read More</a>
    <a class='button close' href="#">X</a>
  </div>
</div>


<style>
  .main-navigation {
    margin-top: 73px;
  }
  .sticky-header, header {
    padding-left:0;
    padding-right:0;
  }
  .news-breaking {
    position: absolute;
    z-index: 9999;
    width:100%;
    height:75px;
    padding:20px 10px 10px 20px;
    background-color: #86152F;
    color:#ffffff;
    text-transform: uppercase;
    font-family:BrandonLight;
    letter-spacing: 5px;
  }
  .news-breaking-headline{
    margin: 0 auto;
    font-weight:100;
    text-align: center;
  }

  .news-breaking .news-breaking-headline h1{
    display:inline-block;
    top: 2px;
    position: relative;
    padding: 10px 0;
  }
  .news-breaking .news-breaking-headline .button{
    display: inline-block;
    text-decoration: none;
    padding:5px 50px;
    border:1px solid white;
    margin-left:30px;
    color:white;
    font-size:12px;
    letter-spacing: 2px;
  }
  .news-breaking .news-breaking-headline .button:hover {
    color:#86152F;
    background:white;
  }
  .news-breaking .news-breaking-headline .button.close, .news-breaking .news-breaking-headline .button.close:hover {
    float: none;
    padding: 0 20px;
    font-size: 20px;
    font-weight: 700;
    color: white;
    opacity: 1;
    background: #86152F;
    border: none;
  }
  @media screen and (max-width: 1300px) {
    .news-breaking {
      height:100px;
    }
    .main-navigation {
      margin-top: 95px;
    }
  }
  @media screen and (max-width: 1000px) {
    .news-breaking {
      height:150px;
    }
    .main-navigation {
      margin-top: 145px;
    }
  }

</style>

<?php endif; ?>

