<?php
$popup_title = get_field("popup_title","option");
$popup_text = get_field("popup_text","option");
$popupContent = ($popup_text) ? strip_tags($popup_text) : '';
$popupContent = preg_replace('/\s+/','',$popupContent);
$popupContent = str_replace("&nbsp;",'',$popupContent);
if($popupContent) {
	$popup_text = email_obfuscator($popup_text);
}
$popup_image = get_field("popup_image","option");
$placeholder = get_bloginfo("template_url") . "/images/portrait.png";
$display_popup = has_homepage_popup();
if( $display_popup ) { ?>
<div class="homepopup animated">
	<div class="popupOuter">
		<div id="popclose2"><div></div></div>
		<div class="popupcontent animated fadeIn">
			<a href="#" class="popclose"><span>x</span></a>
			<div class="inner <?php echo ($popup_image ) ? 'hasimage':'noimage';?>">
				<?php if ($popup_image) { ?>
				<div class="imagecol" style="background-image:url('<?php echo $popup_image['url']?>')">
					<img src="<?php echo $placeholder ?>" alt="" aria-hidden="true" />
				</div>	
				<?php } ?>
				<div class="textcol">
					<div class="inside">
						<?php if ($popup_title) { ?>
						<h1 class="poptitle"><?php echo $popup_title ?></h1>	
						<?php } ?>
						<?php if ($popup_text) { ?>
						<div class="poptext"><?php echo $popup_text ?></div>	
						<?php } ?>
					</div>
				</div>	
			</div>
		</div>
	</div>
</div>
<?php } ?>