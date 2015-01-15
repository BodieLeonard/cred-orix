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

	$sql = "UPDATE wp_posts SET post_type = 'capitalsolution', post_parent = 0 WHERE post_parent = 147 OR ID=147";
	$task = $wpdb->query($sql);

	if ($task === false) {
		$response .= "<br>Error updating capital solutions.<br>";
	} else {
		$response .= "<br>Successfully updated the capital solutions pages.<br>";
	};

	$sql = "UPDATE wp_posts SET post_type = 'capitalsolution' WHERE post_parent = 169 AND post_type='page'";
	$task = $wpdb->query($sql);

	if ($task === false) {
		$response .= "<br>Error updating capital solutions : real estate.<br>";
	} else {
		$response .= "<br>Successfully updated the capital solutions : real estate pages.<br>";
	};

	$sql = "UPDATE wp_posts SET post_type = 'capitalsolution' WHERE post_parent = 181 AND post_type='page'";
	$task = $wpdb->query($sql);

	if ($task === false) {
		$response .= "<br>Error updating capital solutions : municipal finance.<br>";
	} else {
		$response .= "<br>Successfully updated the capital solutions : municipal finance pages.<br>";
	};

	$sql = "UPDATE wp_posts SET post_type = 'capitalsolution' WHERE post_parent = 217 AND post_type='page'";
	$task = $wpdb->query($sql);

	if ($task === false) {
		$response .= "<br>Error updating capital solutions : Asset Management.<br>";
	} else {
		$response .= "<br>Successfully updated the capital solutions : Asset Management pages.<br>";
	};

	$sql = "UPDATE wp_posts SET post_type = 'capitalsolution' WHERE post_parent = 205 AND post_type='page'";
	$task = $wpdb->query($sql);

	if ($task === false) {
		$response .= "<br>Error updating capital solutions : Healthcare.<br>";
	} else {
		$response .= "<br>Successfully updated the capital solutions : Healthcare pages.<br>";
	};


};
updateMenu();

?>

<html>
<link rel="stylesheet" href="/wp-content/themes/orix/style.css" type="text/css" media="all">
	<body class="" style="padding:100px">
		<section class="centered">
			<h1>Solutions have successfully been cleaned</h1>
			<p></p>
			<hr>
			<h2>Tasks</h2>
			<p>
				<?php echo $response; ?>
			</p>
		</section>
	</body>
</html>
