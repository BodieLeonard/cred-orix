<?php

/** Load WordPress Administration Bootstrap */
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );

/** Load WordPress Administration Bootstrap */
include_once('/wp-admin/includes/admin.php');
include_once('/wp-includes/ms-functions.php');

$response = "";
// cange THE FIRM in the menu to OUR FIRM
function updateMenu() {
	
	global $response;
	global $wpdb; 

	$sql = "UPDATE wp_posts SET post_title = 'Our Firm' WHERE post_title = 'THE FIRM' AND post_type='nav_menu_item'";
	$task = $wpdb->query($sql);

	if ($task === false) {
		$response .= "<br>Error updating the firm<br>";
	} else {
		$response .= "<br>Successfully updated the firm menu item<br>";
	};

	// update BUSINESS UNITS to CAPITAL SOLUTIONS
	$sql = "UPDATE wp_posts SET post_content = 'Capital Solutions' WHERE post_content = 'BUSINESS UNITS' AND post_type='nav_menu_item'";
	$task = $wpdb->query($sql);

	if ($task === false) {
		$response .= "<br>Error updating the Capital Solutions<br>";
	} else {
		$response .= "<br>Successfully updated the Capital Solutions menu item<br>";
	};

	// update OFFICES UNITS to CONTACT
	$sql = "UPDATE wp_posts SET post_title = 'contact', post_content = 'contact' WHERE post_title = 'OFFICES' AND post_type='nav_menu_item'";
	$task = $wpdb->query($sql);

	if ($task === false) {
		$response .= "<br>Error updating the OFFICES menu item<br>";
	} else {
		$response .= "<br>Successfully updated the Contact menu item<br>";
	};

	// update COMMUNITY to Proven Success
	$sql = "UPDATE wp_posts SET post_title = 'Proven Success' WHERE post_title = 'COMMUNITY' AND post_type='nav_menu_item'";
	$task = $wpdb->query($sql);

	if ($task === false) {
		$response .= "<br>Error updating the Community menu item<br>";
	} else {
		$response .= "<br>Successfully updated the Community menu item<br>";
	};

};
updateMenu();



?>

<html>
<link rel="stylesheet" href="/wp-content/themes/orix/style.css" type="text/css" media="all">
	<body class="" style="padding:100px">
		<section class="centered">
			<h1>Menu has successfully been cleaned</h1>
			<p>The menu items have been updated to match the new design.</p>
			<p>Menu Items have been targeted by the post type "nav_menu_item".</p>
			<hr>
			<h2>Tasks</h2>
			<p>
				<?php echo $response; ?>
			</p>
		</section>
	</body>
</html>
