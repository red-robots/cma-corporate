<?php
/**
 * Template Name: Vendors
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>
<div class="vendor-page-content cf">

    <!-- Main Text -->
    <?php
    $row1_title     = get_field('vendors_main_title');
    $row1_text      = get_field('vendors_main_text');  
    $expandables    = get_field('expandable');  
    if($row1_title || $row1_text || $expandables) { ?>
    <div class="row-1 mb-5 justify-content-center">
      <div class="col-md-7 text-center fadeIn wow" style="margin: 0 auto;" data-wow-delay="0.8s">

        <?php if ($row1_title) { ?>
      	<div class="cmatitlediv">
      		<h1 class="cma-title-red"><?php echo $row1_title; ?></h1>
      	</div>
        <?php } ?>

        <?php if ($row1_text) { ?>
          <div class="cmatextdiv">
            <?php echo $row1_text; ?>
          </div>
        <?php } ?>

        <?php if ($expandables) { ?>
        <div id="expandable" class="expandablesWrap fadeIn wow" data-wow-delay="0.85s">
           <?php foreach ($expandables as $e) { 
            $xtitle = ($e['title']) ? $e['title'] : 'Untitled';
            $xtext = $e['description'];
            ?>
            <div class="panels expand-info">
              <h3 class="xtitle"><?php echo $xtitle ?> <span class="arrow"><i class="fas fa-chevron-right"></i></span></h3>
              <div class="xtext">
                <?php 
                  echo ($xtext) ? email_obfuscator($xtext) : '';
                ?>
              </div>
            </div>
           <?php } ?>
        </div>
        <?php } ?>
        
      </div>      
    </div>
    <?php } ?>

  <!-- Partner Vendor -->
  <?php
    $row_4_title    = get_field('row_4_title');
    $row_4_text     = get_field('row_4_text');
    $row_4_services   = get_field('row_4_services');
  ?>

  <?php if ($row_4_title || $row_4_text || $row_4_services) { ?>
  <div class="cma-bg-red">
    <div class=" cma-bg-red ">

      <?php if ($row_4_title) { ?>
      <div class="justify-content-center fadeIn wow" data-wow-delay="0.6s">
        <div class="col-md-8 mb-4 mt-4" style="margin: 0 auto">
          <h1 class="text-center"><?php echo $row_4_title ?></h1>
        </div>
      </div>
      <?php } ?>
      
      <div class="container">
        <div class="contentInner cf">
        
          <?php if ($row_4_text) { ?>
          <div class="col-md-10 cma-center text-center fadeIn wow" data-wow-delay=".8s">
              <?php echo $row_4_text ?>
          </div>
          <?php } ?>
        
          <?php if($row_4_services) { ?> 
          <div class="row_images  mt-4 col-md-10 " style="margin: 0 auto;">
            <div class="row">
             <?php $x = 0; foreach($row_4_services as $service) { ?>
              <?php
                $x++;
                $service_icon   = $service['service_image'];
                $service_title  = $service['service_title'];
              ?>
              <div class="col-md-3 mb-5 col-6 fadeInUp wow" data-wow-delay="<?php echo ($x / 5) . 's'; ?>">
                <div class="text-center">
                  <?php if($service_icon): ?>
                      <img src="<?php echo $service_icon['url']; ?>" alt="" class="img-circle">
                    <?php endif; ?>
                  <div class="mt-2">
                    <span class="font-weight-bold service-title"><?php echo ($service_title) ? $service_title : ''; ?></span>
                  </div>
                </div>
              </div> <!-- col-md-3 -->
              <?php } ?>
            </div>
          </div> <!-- row -->
          <?php } ?>

        </div> 
      </div> <!-- container -->
      
      <?php /* Partner Vendors posts */ ?>
      <?php get_template_part("template-parts/vendors-partner"); ?>

    </div>
  </div>
  <?php } ?>


  <!-- Preferred Vendor -->
  <?php
    $row_2_title     = get_field('row_2_title');
    $row_2_text      = get_field('row_2_text');        
  ?>
  <?php if ($row_2_title || $row_2_text) { ?>
  <div class="row-two-section row-2 cf">
    <div class=" cma-main-body">

      <?php if ($row_2_title) { ?>
      <div class="justify-content-center">
        <div class="mb-2 mt-4 col-md-7" style="margin: 0 auto;" >
          <div class="fadeIn wow" data-wow-delay=".8s">
            <h1  class="text-center"><?php echo $row_2_title; ?></h1>
          </div>
        </div>
      </div>
      <?php } ?>
      
      <?php if ($row_2_text) { ?>
      <div class="container">
        <div class="row">
          <div class="col-md-7 cma-center text-center">
              <div class="fadeIn wow" data-wow-delay=".9s"><?php echo $row_2_text ?></div>
          </div>
        </div> <!-- row -->
      </div> <!-- container -->
      <?php } ?>

      <?php /* Preferred Vendors posts */ ?>
      <?php get_template_part("template-parts/vendors-preferred"); ?>

    </div>
  </div>
  <?php } ?>

  
  <!-- Request Vendor -->
  <?php
  	$row_7_title 		= get_field('row_7_title');
  	$row_7_text 		= get_field('row_7_text');
  	$row_7_button_text 	= get_field('row_7_button_title');
  	$row_7_button_link 	= get_field('row_7_button_link');
  ?>

  <?php if ($row_7_title || $row_7_text) { ?>
  <div class="pt-3 pb-5 multicolored" id="request_information">
    <div class="container text-center">
      <div class="col-md-8 cma-center fadeIn wow" data-wow-delay="0.8s">  

        <?php if ($row_7_title) { ?>
        <h1 class="cma-title-normal"><?php echo $row_7_title; ?></h1>
        <?php } ?>
      	
        <?php if ($row_7_text) { ?>
        <div class="cma-paragraph-normal"><?php echo $row_7_text; ?></div>
        <?php } ?>
        
        <?php if ($row_7_button_text && $row_7_button_link) { ?>
        <div class="btndiv">
          <a href="<?php echo $row_7_button_link; ?>" class="link-white"><?php echo $row_7_button_text; ?></a>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <?php } ?>

</div>
<?php
get_footer();