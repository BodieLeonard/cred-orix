<?php
/**
 * The sidebar is used to display the management team
 *
 * @package Orix
 */

global $wpdb;
//print_r($post->post_name);

$term_id = $wpdb->get_row("SELECT term_id FROM wp_terms WHERE slug = 'management-$post->post_name'")->term_id;

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

$hasGroups = false;
if(count($termchildren) > 0 && $mainPage == 'municipal-finance') {
	$hasGroups = true;
};

if (count($term_object_ids) > 0 && !$hasGroups) :
	?>


	<?php


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

			$args = array(
				'post__in' => $ids,
				'numberposts' => -1,
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'post_type' => 'management'
			);

			$management = get_posts($args);

			if (!empty($management)) {

				?>
				<aside class="col-xs-12 col-md-12">
				<ul>
				<li>
					<p>Our Team</p>
				</li>
				<?php
				$nobio = false;
				foreach ($management as $post) {

					$terms = get_the_terms( $post->ID, 'managemenmcategory' );
					foreach ( $terms as $term ) {

						if($term->slug == 'management-team-no-bio'){
							$nobio = true;
						};
					};

					$name = $post->post_title . "<br>";
					$slug = $post->post_name;
					$title = get_post_meta($post->ID, 'title', true);
					//$phone = get_post_meta($post_id_of_manager, 'phone', true);
					$phone = get_post_meta($post->ID, 'phone', true);
					$email = get_post_meta($post_id_of_manager, 'email', true);

					echo "<li class='team id-".$post->ID."''>";

					if(!$nobio) {
						echo "<p><a href='/".$slug."?filter=".$managementCatSlug."'>";
						echo "<strong>".$name."</strong>";
						echo "<em>".$title."</em>";
						echo "<a class='phone' href='tel:+".$phone."'>".$phone."</a>";
						#echo "<a class='email' href='mailto:".$email."'>".$email."</a>";
						echo "</a></p>";
					} else {
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
		echo "<li class='id-".$post->ID."''>";
		echo "<a href='/management/?filter=".$post->post_name."'><p>";
		echo "View All";
		echo "</p></a>";
		echo "</li>";
	}

	?>
	</ul>
	</aside>

	<?php

elseif(count($term_object_ids)) :
	?>
	<aside class="col-xs-12 col-md-12">
	<ul>
		<li>
			<p>Our Team</p>
		</li>
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

				echo '<li><a href="/management/?filter=' . $link . '"><strong>' . $term->name . '</strong></a></li>';
			};
			$i++;
		};
		?>
	</ul></aside><?php

endif;

?>



