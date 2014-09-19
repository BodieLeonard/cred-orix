	<?php 
		global $pageSlugParent;
		global $pageSlug;

		$hasPageSlugParent = !empty($pageSlugParent);
		$pageSlug = "provensuccess-".$pageSlug;
?>
	<aside class="col-xs-12 col-md-12">
		<ul>
			<li>
				<p>Transactions</p>
			</li>
			<?php 
			$tax_terms = get_terms('provensuccesscategory');
			foreach ($tax_terms as $tax_term) {
				if($tax_term->parent > 0) {
					
					$parent_term_slug = get_term( $tax_term->parent, 'provensuccesscategory' )->slug;		
					$parent_term_slug = explode("-", $parent_term_slug);
					array_shift($parent_term_slug);
					$parent_term_slug = implode("-", $parent_term_slug);

					$parent_term_slug = explode("-", $parent_term_slug);
					array_shift($parent_term_slug);
					$parent_term_slug = implode("-", $parent_term_slug);

					if($pageSlug == $tax_term->slug) {
						echo '<li>' . '<a href="/proven-success/?filter=' .$tax_term->slug. '">' . $tax_term->name.'</a></li>';
					}
				};
			}
			?>
		</ul>
	</aside>

