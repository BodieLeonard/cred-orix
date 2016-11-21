<?php

/** Load WordPress Administration Bootstrap */
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );

/** Load WordPress Administration Bootstrap */
include_once('/wp-admin/includes/admin.php');
include_once('/wp-includes/ms-functions.php');

$$response = "";
// cange THE FIRM in the menu to OUR FIRM
function updateMenu() {
	
	global $response;
	global $wpdb; 

	$sql = "UPDATE wp_posts SET post_type = 'career', post_parent = 0 WHERE post_parent = 151 OR ID=151";
	$task = $wpdb->query($sql);

	if ($task === false) {
		$response .= "<br>Error updating the firm<br>";
	} else {
		$response .= "<br>Successfully updated the career pages.<br>";
	};


};
updateMenu();

?>

<html>
<link rel="stylesheet" href="/wp-content/themes/orix/style.css" type="text/css" media="all">
	<body class="" style="padding:100px">
		<section class="centered">
			<h1>Careers has successfully been cleaned</h1>
			<p></p>
			<hr>
			<h2>Tasks</h2>
			<p>
				<?php echo $response; ?>
			</p>
		</section>
	</body>
</html>
