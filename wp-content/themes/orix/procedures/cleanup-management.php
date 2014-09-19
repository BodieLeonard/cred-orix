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

	$sql = "UPDATE wp_posts SET post_type = 'management', post_parent = 0 WHERE post_parent = 338 OR ID=338 OR post_type = 'executive'";
	$task = $wpdb->query($sql);

	if ($task === false) {
		$response .= "<br>Error updating Managements.<br>";
	} else {
		$response .= "<br>Successfully updated the Management pages.<br>";
	};

	// update managemnt individual posts
	$wpdb->query("UPDATE wp_posts SET post_type = 'management', post_parent = 0 WHERE ID = '1421'");

	$wpdb->query("UPDATE wp_posts SET post_type = 'management', post_parent = 0 WHERE post_title = 'Jeff Sangalis'");
	$wpdb->query("INSERT INTO wp_term_relationships (object_id, term_taxonomy_id ) VALUES (1421, 71)");
	$wpdb->query("INSERT INTO wp_term_relationships (object_id, term_taxonomy_id ) VALUES (1421, 75)");

	$parentCat = 71; // Corporate Capital
	$leverageFinanceCat = 78; // leverage finance
	$mezzanieCat = 74;// mezzanine-and-private-equity-co-investments
	$alternateInvestmentCat = 75;
	$propertyInvestmentCat = 76;
	$venturesCat = 77;

	$name = "Josh Mayfield";
	$pid = getID($name);
	updateTitle($pid, "Director");
	updateCat($pid, $parentCat);
	updateCat($pid, $alternateInvestmentCat);
	
	$name = "John Lenocker";
	$pid = getID($name);
	updateTitle($pid, "Co-Head");
	updateCat($pid, $parentCat);
	updateCat($pid, $leverageFinanceCat);
	
	$name = "Ted Thorp";
	$pid = getID($name);
	updateTitle($pid, "Co-Head");
	updateCat($pid, $parentCat);
	updateCat($pid, $leverageFinanceCat);
	
	$name = "Jeff Sangalis";
	$pid = getID($name);
	updateTitle($pid, "Director");
	updateCat($pid, $parentCat);
	updateCat($pid, $mezzanieCat);

	$name = "Jeff Browning";
	$pid = getID($name);
	updateTitle($pid, "Director");
	updateCat($pid, $parentCat);
	updateCat($pid, $mezzanieCat);

	$name = "David Fang";
	$pid = getID($name);
	updateTitle($pid, "Director");
	updateCat($pid, $parentCat);
	updateCat($pid, $mezzanieCat);

	$name = "John Haley";
	$pid = getID($name);
	updateTitle($pid, "Associate Director");
	updateCat($pid, $parentCat);
	updateCat($pid, $mezzanieCat);

	$name = "Drew Bagot";
	$pid = getID($name);
	updateTitle($pid, "Associate Director");
	updateCat($pid, $parentCat);
	updateCat($pid, $mezzanieCat);

	$name = "Bill Floyd";
	$pid = getID($name);
	updateTitle($pid, "Associate Director");
	updateCat($pid, $parentCat);
	updateCat($pid, $mezzanieCat);

	$name = "Brandon Boyd";
	$pid = getID($name);
	updateTitle($pid, "Associate");
	updateCat($pid, $parentCat);
	updateCat($pid, $mezzanieCat);

	$name = "Sean Roossien";
	$pid = getID($name);
	updateTitle($pid, "Analyst");
	updateCat($pid, $parentCat);
	updateCat($pid, $mezzanieCat);

	$name = "Erik Gunnerson";
	$pid = getID($name);
	updateTitle($pid, "Managing Director / Co-head");
	updateCat($pid, $parentCat);
	updateCat($pid, $propertyInvestmentCat);

	$name = "David Martin";
	$pid = getID($name);
	updateTitle($pid, "Managing Director / Co-head");
	updateCat($pid, $parentCat);
	updateCat($pid, $propertyInvestmentCat);

	$name = "William Bishop";
	$pid = getID($name);
	updateTitle($pid, "Co-Head & Managing Director");
	updateCat($pid, $parentCat);
	updateCat($pid, $venturesCat);


	
};
updateMenu();

function getID($name) {
	global $wpdb;
	global $response;
	
	$wpdb->query("UPDATE wp_posts SET post_type = 'management', post_parent = 0 WHERE post_title = '$name' AND post_status = 'publish'");
	$postid = $wpdb->get_row("SELECT ID FROM wp_posts WHERE post_title = '$name' AND post_status = 'publish'")->ID;
	
	$response .= "<br>Get ID ".$postid." for ".$name."<br>";
	
	return $postid;
};

function updateTitle($pid, $title) {
	add_post_meta( $pid, 'title', $title, true ) || update_post_meta( $pid, 'title', $title, true ) ;
}

function updateCat($pid, $cat) {
	global $wpdb;
	global $response;
	$response .= "Update Category (post : ".$pid.") : (category ".$cat.") <br>";
	$wpdb->query("INSERT INTO wp_term_relationships (object_id, term_taxonomy_id ) VALUES ('$pid', '$cat')");
};

?>

<html>
<link rel="stylesheet" href="/wp-content/themes/orix/style.css" type="text/css" media="all">
	<body class="" style="padding:100px">
		<section class="centered">
			<h1>Management have successfully been cleaned</h1>
			<p></p>
			<hr>
			<h2>Tasks</h2>
			<p>
				<?php echo $response; ?>
			</p>
		</section>
	</body>
</html>
