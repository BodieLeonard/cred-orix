<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Orix
 */
?>

	</div><!-- #content -->
	</div><!-- #page -->


	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<div class="col-md-3 list">
				
				<div class="logo"></div>

				<div class="address" style="margin-top:100px;">
					<h1>ORIX Americas</h1>
					<p>1717 Main St. - Ste 1100</p>
					<p>Dallas, TX 75201</p>
					<p>214.237.2000</p>
				</div>

				<div class="social">
					<a target='_blank' href="https://twitter.com/orixventures"><i class="fa fa-twitter"></i></a>
					<a target='_blank' href="https://www.linkedin.com/company/orix"><i class="fa fa-linkedin"></i></a>
					<a class="print"><i class="fa fa-print"></i></a>
				</div>
		
			</div>

			<div class="col-md-3 list">
				<h1>Company</h1>
				<?php wp_nav_menu( array( 'theme_location' => 'main-menu' , 'show_home'=>false, 'depth'=>1 ,'orderby' => 'menu_order', 'order' => 'asc') ); ?>
			</div>

			<div class="col-md-3 list">
				<h1>CAPITAL SOLUTIONS</h1>
				
				<?php 

					$args = array( 'post_type' => 'capitalsolution', 'post_parent' => 0, 'orderby' => 'title', 'order' => 'asc' );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
					    echo '<a href="/'.$post->post_name.'">'.$post->post_title.'</a>';
					endwhile;
				?>

			</div>

			<div class="col-md-3 list">
				<form>
					<?php echo do_shortcode('[contact-form-7 id="3135" title="Contact Us"]'); ?>
				</form>
			</div>

			<div class="copy">
				<div class='col-md-9'>
					<p>Copyright 2014 ORIX USA</p>
				</div>
				<div class='col-md-3'>
					<p><a href="/privacy-policy">Privacy Policy</a> | <a href="/legal">Legal Information</a></p>
				</div>
				
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
<?php echo "Option ".get_option( 'contact_form_email' ); ?> 	
<?php wp_footer(); ?>


<script>
(function($) {
$('.management-cta, .management').bind('contextmenu', function(e) {
    return false;
});
$("#wpcf7-f4318-o1 input, #wpcf7-f4318-o1 textarea").css({"color":"#cdcdcd"})
})(jQuery);
</script>



</body>
</html>
