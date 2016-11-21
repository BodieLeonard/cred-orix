<?php

/** Load WordPress Administration Bootstrap */
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );

/** Load WordPress Administration Bootstrap */
include_once('/wp-admin/includes/admin.php');
include_once('/wp-includes/ms-functions.php');

$sql = "SELECT object_id FROM wp_term_relationships WHERE term_taxonomy_id = 4";
$result = $wpdb->get_results($sql);


foreach ($result as $post) {
	$postID = $post->object_id;
	$sql = "UPDATE wp_posts SET post_type = 'news' WHERE ID = '$postID'";
  $wpdb->query($sql);
};

$sql = "UPDATE wp_posts SET post_type = 'news' WHERE ID = 153";
$task = $wpdb->query($sql);

?>

<html>
<link rel="stylesheet" href="/wp-content/themes/orix/style.css" type="text/css" media="all">
	<body class="" style="padding:100px">
		<section class="centered">
			<h1>Content Update</h1>
			<p>News posts have been migrated into the custom post type of "news".</p>
			<p>Operation successfully complete.</p>
		</section>
	</body>
</html>
