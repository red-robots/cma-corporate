<?php
function calculate_distance($lat1, $lon1, $lat2, $lon2, $unit='N') 
{ 
  $theta = $lon1 - $lon2; 
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)); 
  $dist = acos($dist); 
  $dist = rad2deg($dist); 
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
    return ($miles * 1.609344); 
  } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
        return $miles;
      }
}


?>

<!DOCTYPE html>
<html>
<head>
<title>Test Page Only</title>
<style>
#primary {
	max-width: 800px;
	width: 95%;
	margin: 0 auto;
	padding: 30px 0;
}
code {
	color: red;
	margin: 0 0 30px;
}
</style>
<?php $mapAPI = gmap_api_key(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $mapAPI ?>"></script>
</head>
<body>
	<div id="primary" class="content-area default-template">
		<main id="main" class="site-main container" role="main">

			
			
			<?php
			while ( have_posts() ) : the_post();
				$gmap = get_field("google_map");
				$latitude = ( isset($gmap['lat']) && $gmap['lat'] ) ? $gmap['lat'] : '';
				$longitude = ( isset($gmap['lng']) && $gmap['lng'] ) ? $gmap['lng'] : '';
				?>
				
				<div style="margin:30px 0 20px;"><a href="<?php echo get_site_url(); ?>"><strong>Go to Main Site</strong></a></div>
				

				<h1>This is for testing only...<br>
					<small>Google Map API only works on this server.</small>
				</h1>
				<code>
					// ACF Google Map Field <br>
					<span style="color:#2925f5">$gmap = get_field("google_map");</span><br><br>

					//Return
					<?php 
					echo "<pre style='color:#2925f5;margin:0 0'>";
					print_r($gmap);
					echo "</pre>"; 
					?>
				</code>
				<br><br>

				<h3>Detect My Current Location:</h3>
				<p>
				 	<strong>My Location Latitude:</strong> <strong id="gmLat" style="color:red"></strong><br>
				 	<strong>My Location Longitude:</strong> <strong id="gmLong" style="color:red"></strong><br>
				 	<input type="hidden" name="user_lat" class="userLat" value="">
        			<input type="hidden" name="user_long" class="userLong" value="">
				</p>
				<div id="map" style="width:500px;height:400px"></div>
			    <script>
			      // Note: This example requires that you consent to location sharing when
			      // prompted by your browser. If you see the error "The Geolocation service
			      // failed.", it means you probably did not give permission for the browser to
			      // locate you.
			      var map, infoWindow;
			      //function initMap() {
			        map = new google.maps.Map(document.getElementById('map'), {
			          center: {lat: -34.397, lng: 150.644},
			          zoom: 6
			        });
			        infoWindow = new google.maps.InfoWindow;

			        // Try HTML5 geolocation.
			        if (navigator.geolocation) {
			          navigator.geolocation.getCurrentPosition(function(position) {
			            var pos = {
			              lat: position.coords.latitude,
			              lng: position.coords.longitude
			            };

			            infoWindow.setPosition(pos);
			            infoWindow.setContent('Location found.');
			            infoWindow.open(map);
			            map.setCenter(pos);

			            $("#gmLat").text(pos.lat);
			            $("#gmLong").text(pos.lng);

			            $("input.userLat").val(pos.lat);
			            $("input.userLong").val(pos.lng);

			          }, function() {
			            handleLocationError(true, infoWindow, map.getCenter());
			          });
			        } else {
			          // Browser doesn't support Geolocation
			          handleLocationError(false, infoWindow, map.getCenter());
			        }
			      //}

			      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
			        infoWindow.setPosition(pos);
			        infoWindow.setContent(browserHasGeolocation ?
			                              'Error: The Geolocation service failed.' :
			                              'Error: Your browser doesn\'t support geolocation.');
			        infoWindow.open(map);
			      }
			    </script>
			    
			    <!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=<?php //echo $mapAPI ?>&callback=initMap"></script> -->
			    

			    <p> 
			    	Geolocation: Displaying User or Device Position on Maps: 
			    	<a href="https://developers.google.com/maps/documentation/javascript/geolocation" target="_blank">CLICK HERE</a>
			    </p>

			    <br><br><br><br>

			    <?php
			    	$lat1 = $latitude;
			    	$long1 = $longitude;
			    	$lat2 = 43.6076544;
			    	$long2 = -116.38538239999998;
			    	$miles = calculate_distance($lat1, $long1, $lat2, $long2, ''); // outputs in Miles 
			    	

			    	// // $api = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=".$origin."&destinations=".$destination."&key=".$mapAPI);
        // //     		$data = json_decode($api);
			    	// $api = "https://maps.googleapis.com/maps/api/distancematrix/json?key=AIzaSyBW8ieE1YvFCvk792K2rPfErHL6ALcb9lU&origins=".$lat1.",".$long1."&destinations=".$lat2.",".$long2."&mode=driving&language=pl-PL";
			    	// //$api = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$lat1.",".$long1."&destinations=".$lat2.",".$long2."&mode=driving&language=pl-PL&key=".$mapAPI;
			    	// //$data = json_decode($api);
			    	// $test = "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=43.4754538,-116.4281281&destinations=43.6076544,-116.38538239999998&key=AIzaSyBW8ieE1YvFCvk792K2rPfErHL6ALcb9lU";
			    	// $data = json_decode($test);
             		echo "<pre>";
			    	// // print_r($res);
			    	// print_r($out);
			    	print_r($miles) . " miles";
			    	echo "</pre>";

			    ?>


				<?php //get_template_part( 'template-parts/content', 'page' ) ?>


			<?php endwhile; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</body>
</html>

