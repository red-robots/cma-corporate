<?php 
$staticBannerImg = get_field("staticBanner");
$staticBannerText = get_field("staticBannerText");
$banner_image = get_field("temp_banner_image");
$banner_text = get_field("temp_banner_text");
if($banner_image && !$staticBanner) { ?>
<div class="hero-wrapper">
	<div class="hero-image" style="background-image:url('<?php echo $banner_image['url']; ?>');"></div>
	<?php if ($banner_text) { ?>
	<div class="hero-caption animated fadeIn">
		<div class="caption"><?php echo $banner_text ?></div>
	</div>
	<?php } ?>
</div>
<?php } else { ?>
	
	<?php if ($staticBannerImg) { ?>
	<div class="hero-wrapper">
		<div class="hero-image" style="background-image:url('<?php echo $staticBannerImg['url']; ?>');"></div>
		<?php if ($staticBannerText) { ?>
		<div class="hero-caption animated fadeIn">
			<div class="caption"><?php echo $staticBannerText ?></div>
		</div>
		<?php } ?>
	</div>
	<?php } ?>


<?php } ?>