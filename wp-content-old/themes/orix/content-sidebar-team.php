<?php
/**
 * The sidebar is used to display the management team
 *
 * @package Orix
 */

global $wpdb;

//$hasTeamName = ( get_post_meta($post->ID, 'team_name', true) ) > 0 ) ? true:false;

$isTeamsOn = ( get_post_meta($post->ID, 'teams_on', true)[0] == "On") ? true:false;
$isOnlyTeam = ( get_post_meta($post->ID, 'teams_on', true) == "teams_only") ? true:false;
$isTeamAndEmployee = ( get_post_meta($post->ID, 'teams_on', true) == "teams_and_employees") ? true:false;
$hideTeamName = ( get_post_meta($post->ID, 'hide_team_name', true)[0]== "On") ? true:false;
$isEmployeesOnly = ( get_post_meta($post->ID, 'teams_on', true)== "employees_only") ? true:false;
$teamsArr = array();

$teamNameSlug = "";

if($isOnlyTeam){

	$teamName = get_post_meta($post->ID, 'team_name', true);
	$teamNameSlug = str_replace("management-", "", $teamName);

} elseif($isTeamAndEmployee){

	$teamName = get_post_meta($post->ID, 'team_name', true);
	$teamManagementCategory = get_post_meta($post->ID, 'management_category', true);
	$teamNameSlug = str_replace("management-", "", $teamName);
	$termEmployee = $wpdb->get_row("SELECT term_id, name, slug FROM wp_terms WHERE slug = '$teamManagementCategory'");

	$termEmployee_id = $termEmployee->term_id;
	$termEmployee_taxonomy_id = $wpdb->get_row("SELECT term_taxonomy_id FROM wp_term_taxonomy WHERE term_id = '$termEmployee_id'")->term_taxonomy_id;

	// relationship
	$relationsEmployee = "SELECT * FROM wp_term_relationships WHERE term_taxonomy_id = '$termEmployee_taxonomy_id'";
	$termEmployee_object_ids = $wpdb->get_results($relationsEmployee);


} elseif($isEmployeesOnly) {

	$teamName = 'management-'. get_post_meta($post->ID, 'management_category', true);

} else {
	$teamName = 'management-'.$post->post_name;

}

$term = $wpdb->get_row("SELECT term_id, name, slug FROM wp_terms WHERE slug = '$teamName'");
$term_id = $term->term_id;

// wp_term_taxonomy
$term_taxonomy_id = $wpdb->get_row("SELECT term_taxonomy_id FROM wp_term_taxonomy WHERE term_id = '$term_id'")->term_taxonomy_id;

// relationship
$relations = "SELECT * FROM wp_term_relationships WHERE term_taxonomy_id = '$term_taxonomy_id'";
$term_object_ids = $wpdb->get_results($relations);

$managementCatSlug = $wpdb->get_row("SELECT slug FROM wp_terms WHERE slug = 'management-$post->post_name'")->slug;

$managementCatSlugArr = explode("-", $managementCatSlug);
array_shift($managementCatSlugArr);
$managementCatSlug = implode ( "-", $managementCatSlugArr );

//management-municipal-finance
$group_ids = get_term_children( $term_id, "managemenmcategory" );
get_tag($group_ids[0]);

$term_id = $term_id;
$taxonomy_name = 'managemenmcategory';
$termchildren = get_term_children( $term_id, $taxonomy_name );


$mainPage = $post->post_name;

// checkbox in capital solutions
// and Orix Managemnt must have the page slug in the cat name
$hasGroups = (get_post_meta($post->ID, 'teams_on', true)[0] == "On") ? true:false;
//print_r( $wpdb->get_row("SELECT term_id FROM wp_terms WHERE slug = 'management-$post->post_name-foobar'") );

if($isOnlyTeam){
	$hasGroups = true;
}

//$hasGroups = false; 
if(count($termchildren) > 0 && $mainPage == 'municipal-finance') {
	$hasGroups = true;
};

if (count($term_object_ids) > 0 && !$hasGroups) :
	
	$termMax = count($term_object_ids);
if($termMax <= 100) {

	$ids = array();

	foreach ($term_object_ids as $term_object_id) {
		$post_id_of_manager = $term_object_id->object_id;

		if ($post_id_of_manager > 0) {

			array_push($ids, $post_id_of_manager);
		};
	};

	if (!empty($ids)) {

		$args = array('post__in' => $ids, 'numberposts' => -1, 'orderby' => 'menu_order', 'order' => 'ASC', 'post_type' => 'management' );

		$management = get_posts($args);

		if (!empty($management)) { ?>

		<aside class="col-xs-12 col-md-12">
			<ul>
				<li>
					<p>Our Team</p>
				</li>
				<?php
				$nobio = false;

				if($isOnlyTeam){
					echo "<li class='id-".$post->ID."''>";
					echo '<a href="/management/?filter=' . $teamNameSlug . '"><strong>' . $term->name . '</strong></a>';
				} elseif($isTeamAndEmployee){
					echo "<li class='id-".$post->ID."''>";
					echo '<a href="/management/?filter=' . $teamNameSlug . '"><strong>' . $term->name . '</strong></a>';
				};

				foreach ($management as $post) {

					$terms = get_the_terms( $post->ID, 'managemenmcategory' );

					foreach ( $terms as $item ) {
						if($item->slug == 'management-team-no-bio'){
							$nobio = true;
						};
					};


					$name = $post->post_title . "<br>";
					$slug = $post->post_name;
					$title = get_post_meta($post->ID, 'title', true);
								//$phone = get_post_meta($post_id_of_manager, 'phone', true);
					$phone = get_post_meta($post->ID, 'phone', true);
					$email = get_post_meta($post_id_of_manager, 'email', true);

					if(!$nobio ) {
						if(!$isTeamAndEmployee){
							echo "<li class='team id-".$post->ID."''>";
							echo "<p><a href='/".$slug."?filter=".$managementCatSlug."'>";
							echo "<strong>".$name."</strong>";
							echo "<em>".$title."</em>";
							echo "<a class='phone' href='tel:+".$phone."'>".$phone."</a>";
							echo "</a></p>";
						}
					} else {
						echo "<li class='team id-".$post->ID."''>";
						echo "<p><a>";
						echo "<strong>".$name."</strong>";
						echo "<em>".$title."</em>";
						echo "<a class='phone' href='tel:+".$phone."'>".$phone."</a>";
						echo "</a></p>";	
					}
					echo "</li>";

				}
			};
		};

	} else {
		/*echo "<li class='id-".$post->ID."''>";
		echo "<a href='/management/?filter=".$post->post_name."'><p>";
		echo "View All";
		echo "</p></a>";
		echo "</li>";*/
	}

	?>
	<?php if(!$isTeamAndEmployee) : ?>
	</ul>
</aside>
<?php endif; ?>


<?php

elseif(count($term_object_ids) || $isOnlyTeam) :
	?>
<aside class="col-xs-12 col-md-12">
	<ul>
		<li>
			<p>Our Team</p>
		</li>

		<?php 
		// display team group name
		if(!$hideTeamName){
			echo '<li><a href="/management/?filter=' . $teamNameSlug. '"><strong>' . $term->name . '</strong></a></li>';
		};
		?>


		<?php if($managementCatSlug == 'municipal-finance') : ?>
			<li><a href="/management/?filter=municipal-finance"><strong>Municipal Finance Team</strong></a> </li>
		<?php endif; ?>
		

		<?php
		$i = 0;
		foreach ( $termchildren as $child ) {

			if ($i <= 3) {
				$term = get_term_by( 'id', $child, $taxonomy_name );
				$link = get_term_link( $child, $taxonomy_name );

				$link = explode("/", $link);
				$link = $link[4];
				$link = explode("-", $link);
				array_shift($link);
				$link = implode("-", $link);
				$term->order = get_field('order', $term->taxonomy."_".$term->term_id);
				$term->link = $link;
				array_push($teamsArr, $term);

			};
			$i++;
		};
		//$teamsArr = sort_array_by_property($teamsArr, 'order');
		foreach ( $teamsArr as $myterm ) {
			echo '<li><a href="/management/?filter=' . $myterm->link . '"><strong>' . $myterm->name . '</strong></a></li>';
		};


		?>
	</ul></aside><?php

	endif;

	?>





	<?php
// if employees and team is selected then find employee matches based on termEmployee_object_ids
	if (count($termEmployee_object_ids) > 0 ) :

		$termMax = count($termEmployee_object_ids);
	if($termMax <= 100) {

		$ids = array();

		foreach ($termEmployee_object_ids as $termEmployee_object_id) {

			$post_id_of_manager = $termEmployee_object_id->object_id;	

			if ($post_id_of_manager > 0) {

				array_push($ids, $post_id_of_manager);
			};
		};

		if (!empty($ids)) {

			$args = array(
				'post__in' => $ids,
				'numberposts' => -1,
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'post_type' => 'management'
				);

			$management = get_posts($args);

			foreach($management as $employee){
				$name = $employee->post_title . "<br>";
				$slug = $employee->post_name;
				$title = get_post_meta($employee->ID, 'title', true);
				$phone = get_post_meta($employee->ID, 'phone', true);
				echo "<li class='team id-".$post->ID."''>";

				echo "<p><a>";
				echo "<strong>".$name."</strong>";
				echo "<em>".$title."</em>";
				echo "<a class='phone' href='tel:+".$phone."'>".$phone."</a>";
				echo "</a></p>";
				echo "</li>";

			}
		};
	}
	?>
</ul>
</aside>

<?php

endif;

?>





