<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bellaworks
 */

get_header(); 
$latitude = '';
$longitude = '';
$mapAPI = get_field("gmap_api","option");
?>

<div id="primary" class="content-area property-page">
	<main id="main" class="site-main container" role="main">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php 
		$title = get_the_title();
		// $title = strtolower( $title );
		// $title = ucwords($title);
		$coupon_code = get_field("coupon_code");
		$community_name = get_field("community_name");
		$address = get_field("address");
		$manager_name = get_field("manager_name");
		$manager_phone = get_field("manager_phone");
		$manager_email = get_field("manager_email");
		$m_email = ($manager_email) ? '<a href="mailto:'.antispambot($manager_email,1).'">'.antispambot($manager_email).'</a>':'';
		$coor = get_field("gmapLatLong");
		$latitude = ( isset($coor['latitude']) && $coor['latitude'] ) ? $coor['latitude']:'';
        $longitude = ( isset($coor['longitude']) && $coor['longitude'] ) ? $coor['longitude']:'';
		?>
		<header class="entry-header">
			<h1 class="cma-title-red"><?php echo $title; ?></h1>
		</header>
		<div class="entry-content">
			<?php the_content(); ?>

			<div class="property-info">
				<div class="pcol left">
					<div class="group">
						<div class="info"><strong>Coupon Code:</strong> <?php echo $coupon_code ?></div>
						<div class="info"><strong>Address:</strong> <?php echo $address ?></div>
					</div>

					<div class="group">
						<div class="info"><strong>Manager Name:</strong> <?php echo $manager_name ?></div>
						<div class="info"><strong>Manager Email:</strong> <?php echo $m_email ?></div>
						<div class="info"><strong>Manager Phone:</strong> <?php echo $manager_phone ?></div>
					</div>
				</div>
				<div class="pcol right">
					<?php if ( $mapAPI && ($latitude && $longitude && (is_numeric($latitude) && is_numeric($longitude)) ) ) { ?>
					<div id="map"></div> 
					<?php } ?>
				</div>
			</div>
		</div>
	<?php endwhile; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
?>

<?php if ( $mapAPI && ($latitude && $longitude && (is_numeric($latitude) && is_numeric($longitude)) ) ){ ?>
<script>
// Initialize and add the map
function initMap() {
  // The location of Uluru
  var uluru = {lat: <?php echo $latitude?>, lng: <?php echo $longitude?>};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 4, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBW8ieE1YvFCvk792K2rPfErHL6ALcb9lU&callback=initMap"></script>
<?php } ?>
