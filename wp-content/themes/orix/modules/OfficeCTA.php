<?php

// class to hold all the call to actions

class OfficeCTA {

	public static function create($args) {
		$name = $args['name'];
		$address = $args['address'];
		$city = $args['city'];
		$state = $args['state'];
		$zip = $args['zip'];
		$phone = $args['phone'];
		
		?>
		
		<article class="deal office col-md-3">
			<div class="">
				<h1><?php echo $name; ?></h1>
				<blockquote><?php echo $address; ?><br/><?php echo $city; ?>,<?php echo $state; ?><br/>
					<?php echo $zip; ?><br/>
					<?php if(!empty($phone)) : ?>
					<a href="tel:<?php echo $phone; ?>"><i class="fa fa-phone"></i><?php echo $phone; ?></a>
				<?php endif; ?>
				</blockquote>
			</div>
		</article>
		
		

		<?php

			/*$address = urlencode($city) . "+" .urlencode($state). "+" .$zip;
			$url = "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

			$response = curl_exec($ch);
			curl_close($ch);

			$response_a = json_decode($response);

			$lat = $response_a->results[0]->geometry->location->lat;
			$long = $response_a->results[0]->geometry->location->lng;*/

		?>

		<script>
			/*var mapOptions = {
          center: new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $long; ?>),
          zoom: 10,
          disableDefaultUI: true,
          panControl:false,
          zoomControl: true,
          zoomControlOptions: {
            style: google.maps.ZoomControlStyle.SMALL,
            position: google.maps.ControlPosition.TOP_RIGHT
          }
        };
			var map = new google.maps.Map(document.getElementById("map"), mapOptions);*/
		</script>

		<?php 

		//return $args;
	}
}
