<?php
/**
 * Template Name: HOAs
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>

	<div class="mb-5 ">
      <?php if(has_post_thumbnail()): 
        $featured_image     = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
        $header_image_text  = get_field('row_1_image_header_text');
        ?>
      <div class="n2-section-smartslider text-center " >      
            <div class="header_image_section fadeIn wow" data-wow-delay="0.5s">
              <div class="featured_image " style="background-image: url('<?php echo $featured_image;  ?>');" >       
              </div>     
              <div class="header_image_text fadeIn wow" data-wow-delay="1s">
                  <h1 class="align-middle " >
                    <?php echo ($header_image_text) ? $header_image_text : '';  ?>                
                  </h1>
              </div>
            </div>  
      </div>
      <?php endif; ?>
  </div>

    <!-- 1st row -->
    <?php
        $row1_title     = get_field('row_1_title');
        $row1_text      = get_field('row_1_text');        
    ?>
    <div class=" mb-5 justify-content-center">
      <div class="col-md-7 text-center" style="margin: 0 auto;">
      	<div class="fadeInUp wow" data-wow-delay="0.5s">
      		<h1 class="cma-title-red"><?php echo ($row1_title) ? $row1_title : ''; ?></h1>
      	</div>
        
        <div class="fadeInUp wow" data-wow-delay="0.7s">
            <?php echo ($row1_text) ? $row1_text : ''; ?>
        </div>
        
        
      </div>      
    </div>


  <!-- 2nd row -->
  <?php
        $row_2_title     = get_field('row_2_title');
        $row_2_text      = get_field('row_2_text');        
    ?>
  <div class="">
    <div class=" cma-main-body pb-5">
      <div class="justify-content-center">
        <div class="mb-2 mt-4 col-md-7" style="margin: 0 auto;" >
        	<div class="fadeInUp wow" data-wow-delay="1.2s">
	          <h1  class="text-center">
	            <?php echo ($row_2_title) ? $row_2_title : '';  ?> 
	          </h1>
      		</div>
        </div>
      </div>
      
      <div class="container">
        <div class="row">
          <div class="col-md-7 cma-center text-center">
              <div class="fadeInUp wow" data-wow-delay="1.5s">
                  <?php echo ($row_2_text) ? $row_2_text : '';  ?>
              </div>
              
          </div>

        </div> <!-- row -->
      </div> <!-- container -->

    </div>
  </div>

  <!-- 3rd row -->
  <?php  
  	$row_3_image_text = get_field('row_3_image_header_text');
    $row_3_image     = get_field('row_3_image');
  	$row_3_text      = get_field('row_3_text');
  	$row_3_offers    = get_field('row_3_offers');
  ?>

  <div class="text-center header_image_section fadeIn wow" data-wow-delay="0.5s">        
            <div class="featured_image " style="background-image: url('<?php echo $row_3_image['url'];  ?>');" >       
            </div>     
            <div class="header_image_text fadeIn wow" data-wow-delay="0.7s">
              <h1 class=" align-middle">
                <?php echo ($row_3_image_text) ? $row_3_image_text : '';  ?>
              </h1> 
            </div>      
  </div>


  <div class=" mb-5">
    <div class="container text-center">
      <div class="justify-content-center">
        
        <div class="col-md-8 cma-center pt-5">          
          <div class="cma-paragraph-normal fadeInUp wow" data-wow-delay="0.5s">
            <?php echo ($row_3_text) ? $row_3_text : '';  ?> 
          </div>
          <div class="row pt-4 ">
			<?php if($row_3_offers): $x = 0; ?>
				<?php foreach($row_3_offers as $offers): ?>
					<?php
						$x++;
						$offer_icon 	= $offers['offer_image'];
						$offer_title 	= $offers['offer_title'];
						$offer_text 	= $offers['offer_text'];
					?>
			          <div class="col-sm-4 fadeInUp wow" data-wow-delay="<?php echo ($x / 5) . 's'; ?>">
			            <div class="cma-icon-holder">
			            	<?php if($offer_icon): ?>
			              		<img src="<?php echo $offer_icon['url']; ?>" alt="">
			          		<?php endif; ?>
			            </div>
			            <div class="cma-sub-title ">
			              <?php echo ($offer_title) ? $offer_title : ''; ?>
			            </div>
			            <p class="cma-paragraph-normal">
			              <?php echo ($offer_text) ? $offer_text : ''; ?>
			            </p>
			          </div>
	          	<?php endforeach; ?>
	      	<?php endif; ?>

			

        </div>

          

        </div>



      </div>
      
    </div>
  </div>

  <!-- 4th row -->
  <?php
  	$row_4_title 		= get_field('row_4_title');
  	$row_4_text 		= get_field('row_4_text');
  	$row_4_services 	= get_field('row_4_services');
  ?>
  <div class="cma-bg-red mb-5">
    <div class=" cma-bg-red ">
      <div class="justify-content-center">
        <div class="col-md-8 mb-4 mt-4" style="margin: 0 auto">
        	<div class="fadeInUp wow" data-wow-delay="0.7s">
        		<h1  class="text-center">
	            	<?php echo ($row_4_title) ? $row_4_title : ''; ?>
	          	</h1>
        	</div>
        </div>
      </div>
      
      <div class="container">
        <div class="">

          <div class="col-md-10 cma-center text-center ">
              <div class="fadeInUp wow" data-wow-delay="1s">
                  <?php echo ($row_4_text) ? $row_4_text : '';  ?>
              </div>
              
          </div>

          <div class="row_images  mt-4 col-md-10 " style="margin: 0 auto;">

            <div class=" row " >
				<?php if($row_4_services): $x = 0; ?>	
					<?php foreach($row_4_services as $service): ?>
						<?php
							$x++;
							$service_icon 	= $service['service_image'];
							$service_title 	= $service['service_title'];
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
		           	<?php endforeach; ?>
           		<?php endif; ?>
              
            </div>
          </div> <!-- row -->
        </div> 
      </div> <!-- container -->
      


    </div>
  </div>

  <!-- 5th row -->
  <?php
  	$row_5_title 		= get_field('row_5_title');
  	$row_5_text 		= get_field('row_5_text');
  	$row_5_monitoring 	= get_field('row_5_monitoring');
  ?>
  <div class=" pb-4" id="why_cma">
    <div class="container text-center">
      <div class="col-md-8 cma-center">
      	<div class="fadeInUp wow" data-wow-delay="0.7s">
      		<h1 class="cma-title-red">
          		<?php echo ($row_5_title) ? $row_5_title : ''; ?>
        	</h1>
      	</div>
        <div class="mt-4 mb-4 fadeInUp wow" data-wow-delay="0.9s">
          <p class="cma-paragraph-why">
            <?php echo ($row_5_text) ? $row_5_text : ''; ?>
          </p>
        </div>
        
      </div>

		<?php if($row_5_monitoring):  $x = 0; ?>
			<?php foreach($row_5_monitoring as $monitor): ?>
				<?php
					$x++;
					$monitor_icon = $monitor['monitoring_image'];
					$monitor_title = $monitor['monitoring_title'];
					//var_dump($monitor_icon);
				?>
		      <div class="cma-center cma-why-container fadeInUp wow" data-wow-delay="<?php echo ($x / 5) . 's'; ?>">
		        <div class="cma-icon-black">
		        	<?php if($monitor_icon): ?>
		          		<img src="<?php echo $monitor_icon['url'];  ?>" alt="">
		          	<?php endif; ?>
		        </div>
		        <div class="cma-title-dark">
		          <?php echo ($monitor_title) ? $monitor_title : '';  ?>
		        </div>        
		      </div>
	  		<?php endforeach; ?>
      	<?php endif; ?>

    </div>
  </div>

  <!-- 6th row -->
  <?php
  		$row_6_title 		= get_field('row_6_title');
  		$row_6_text 		= get_field('row_6_text');
  		$row_6_certificates = get_field('row_6_certificates');
  		$row_6_button_title = get_field('row_6_button_title');
  		$row_6_button_link 	= get_field('row_6_button_link');
  ?>
  <div class=" cma-bg-mixed">
    <div class="container text-center pb-5 ">
      <div class="col-md-8 cma-center  pt-5">
      	<div class="fadeInUp wow" data-wow-delay="0.7s">
      		<h1 class="cma-title-white pb-4">
          		<?php echo ($row_6_title) ? $row_6_title : ''; ?>
        	</h1>
      	</div>
        <div class="fadeInUp wow" data-wow-delay="1s">
          <p class="cma-paragraph-white text-white">
            <?php echo ($row_6_text) ? $row_6_text : ''; ?>
          </p>
        </div>

        <div class="text-center text-white cert_lists mt-3 fadeInUp wow" data-wow-delay="1.2s">
        	<?php if($row_6_certificates): $x = 0; ?>
	          <ul class="list-group">
	          	<?php foreach($row_6_certificates as $certificate):  $x++; ?>
	            <li class="list-group-item"><?php echo ($certificate['certificate_title']) ? $certificate['certificate_title'] : ''; ?></li>
	            <?php endforeach; ?>	            
	          </ul>
          	<?php endif; ?>
        </div>

        <div class="mt-4 fadeInUp wow" data-wow-delay="1s">
          <a href="<?php echo ($row_6_button_link)  ? $row_6_button_link : '#'; ?>" class="btn-gray"><?php echo ($row_6_button_title) ? $row_6_button_title : 'Read More'; ?></a>
        </div>

      </div>

    </div>
  </div>

  
  <!-- 7th row -->
  <?php
  	$row_7_title 		= get_field('row_7_title');
  	$row_7_text 		= get_field('row_7_text');
  	$row_7_button_text 	= get_field('row_7_button_text');
  	$row_7_button_link 	= get_field('row_7_button_link');
  ?>
  <div class="pt-3 pb-5" id="request_information">
    <div class="container text-center">
      <div class="col-md-8 cma-center">  
      	<div class="fadeInUp wow" data-wow-delay="0.9s">     
	        <h1 class="cma-title-normal">
	          <?php echo ($row_7_title) ? $row_7_title : ''; ?>
	        </h1>
    	</div>
        <div class="cma-paragraph-normal fadeInUp wow" data-wow-delay="1s">
          <?php echo ($row_7_text) ? $row_7_text : ''; ?>
        </div>

        <div class="fadeInUp wow" data-wow-delay="1.2s">
          <a href="<?php echo ($row_7_button_link) ? $row_7_button_link : '#'; ?>" class="cma-solid-bottom">
            <?php echo ($row_7_button_text) ? $row_7_button_text : 'Read More'; ?>
          </a>
        </div>

        
      </div>
    </div>
  </div>

<?php
get_footer();