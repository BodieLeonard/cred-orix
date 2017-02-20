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
					<h1>ORIX USA</h1>
					<p>1717 Main St. - Ste 1100</p>
					<p>Dallas, TX 75201</p>
					<p>214.237.2000</p>
				</div>

				<div class="social">
					<!--<a target='_blank' href="https://twitter.com/orixventures"><i class="fa fa-twitter"></i></a>-->
					<a target='_blank' href="https://www.linkedin.com/company/orix"><i class="fa fa-linkedin"></i></a>
					<a class="print"><i class="fa fa-print"></i></a>
				</div>
		
			</div>

			<div class="col-md-3 list">
				<h1>Company</h1>
				<?php wp_nav_menu( array( 'theme_location' => 'main-menu' , 'show_home'=>false, 'depth'=>1 ,'orderby' => 'menu_order', 'order' => 'asc') ); ?>
				<div class="menu-main-menu-container">
					<ul class="menu"><li class="menu-item"><a href="/video">Our Video</a></li></ul>
				</div>
			</div>

			<div class="col-md-3 list">
				<h1>CAPITAL SOLUTIONS</h1>
				
				<?php

					$args = array( 'post_type' => 'capitalsolution', 'post_parent' => 0, 'orderby' => 'title', 'order' => 'asc' );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
							if($post->post_title !== "Corporate Capital")
							{
								echo '<a href="/' . $post->post_name . '">' . $post->post_title . '</a>';
							}
					endwhile;
				?>

			</div>

			<div class="col-md-3 list">

<form class="contact-us" name="contactUs" action="" method="post">
	<h1>Contact Us</h1>
	<span class="address"><p class="error"></p></span>
	<input type="text" name="checker" value="" class="checker">
	<input type="text" name="your-name" value="" size="40" class="" placeholder="Your name">
	<input type="email" name="your-email" value="" size="40" class="" placeholder="Email address" >
	<textarea name="your-message" cols="40" rows="10" class="" placeholder="Message"></textarea>
	<input type="submit" value="Send" class="">
</form>
			
<?php 
if(isset($_POST['your-email'])){
	$name = "First name: ".$_POST['your-name'];
	$email = "Email: ".$_POST['your-email'];
	$note = "Message: ".$_POST['your-message'];
	$msg = $name."\n".$email."\n".$note;
	$msg = wordwrap($msg,70);
	wp_mail(get_option( 'contact_form_email' ),"ORIX contact form",$msg);
};
?>

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

<?php wp_footer(); ?>




<script>
(function($) {
$('.management-cta, .management').bind('contextmenu', function(e) {
    return false;
});
$(".contact-us input, .contact-us textarea").css({"color":"#cdcdcd"})

$( "form.contact-us" ).submit(function( e ) {
  

  var info = {
	firstname: ($(e.target).find('[name=your-name]').val() !== "") ? $(e.target).find('[name=your-name]').val() : null
	,email: ($(e.target).find('[name=your-email]').val() !== "") ? $(e.target).find('[name=your-email]').val() : null
	,msg: ($(e.target).find('[name=your-message]').val() !== "") ? $(e.target).find('[name=your-message]').val() : null
	,checker: $(e.target).find('.checker').val()
	}
  if( info.firstname == null || info.email == null ) {
	e.preventDefault();
	$(e.target).find('.error').text("Your name and email are required");
  }
  if(info.checker !== ""){
  	e.preventDefault();
  }
});

})(jQuery);
</script>



<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
 
  ga('create', 'UA-64449527-1', 'auto');
  ga('send', 'pageview');
 
</script>

<!-- load floodlight onclick -->
<!-- add this click event to a link in order for floodlight to track
	onclick="callFloodlight_new("123456", "foo246", "bar468");" -->


<!--
Activity ID: 3573250
Activity Name: Boston Financial Download PDF Click
Activity Group Name: Boston Financial
https://5765050.fls.doubleclick.net/activityi;src=5765050;type=gener0;cat=bosto000;dc_lat=;dc_rdid=3573250;tag_for_child_directed_treatment=;ord=
-->
<!--
Activity ID: 3573249
Activity Name: Boston Financial Adtl Info Click
Activity Group Name: Boston Financial
https://5765050.fls.doubleclick.net/activityi;src=5765050;type=gener0;cat=bosto00;dc_lat=;dc_rdid=3573249;tag_for_child_directed_treatment=;ord=
-->
<!--
Activity ID: 3575657
Activity Name: Boston Financial LP
Activity Group Name: Boston Financial
cat=bosto0
https://5765050.fls.doubleclick.net/activityi;src=5765050;type=gener0;cat=bosto0;dc_lat=;dc_rdid=3575657;tag_for_child_directed_treatment=;ord=
-->
<script type="text/javascript">
	function callFloodlight_new(source, type, cat) {
				var tag_url="http://fls.doubleclick.net/activityi;src=" + source + ";type=" + type + ";cat=" + cat + ";ord=1;num="+Math.floor(Math.random()*999999)+"?";
				if(document.getElementById("DCLK_FLDiv")){var flDiv=document.getElementById("DCLK_FLDiv");}
				else{var flDiv=document.body.appendChild(document.createElement("div"));flDiv.id="DCLK_FLDiv";flDiv.style.display="none";}
				var DCLK_FLIframe=document.createElement("iframe");
				DCLK_FLIframe.id="DCLK_FLIframe_"+Math.floor(Math.random()*999999);
				DCLK_FLIframe.src=tag_url;
				flDiv.appendChild(DCLK_FLIframe);
			}

</script>
<script type="text/javascript">
function callFloodlight(source, type, cat) {
				var tag_url="http://fls.doubleclick.net/activityi;src=" + source + ";type=" + type + ";cat=" + cat + ";ord=1;num="+Math.floor(Math.random()*999999)+"?";
				if(document.getElementById("DCLK_FLDiv")){var flDiv=document.getElementById("DCLK_FLDiv");}
				else{var flDiv=document.body.appendChild(document.createElement("div"));flDiv.id="DCLK_FLDiv";flDiv.style.display="none";}
				var DCLK_FLIframe=document.createElement("iframe");
				DCLK_FLIframe.id="DCLK_FLIframe_"+Math.floor(Math.random()*999999);
				DCLK_FLIframe.src=tag_url;
				flDiv.appendChild(DCLK_FLIframe);
			}


</script>



</body>
</html>