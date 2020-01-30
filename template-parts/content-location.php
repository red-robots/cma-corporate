<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bellaworks
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
        <?php
            $header_image       = get_field('row_1_header_image');
            $header_image_text  = get_field('row_1_header_title');
        ?>
        <?php  if($header_image): ?>
        <div class="n2-section-smartslider text-center mb-5" >      
            <div class="header_image_section fadeIn wow" data-wow-delay="0.5s">
              <div class="featured_image " style="background-image: url('<?php echo $header_image;  ?>');" >       
              </div>     
              <div class="header_image_text fadeIn wow" data-wow-delay="1s">
                  <h1 class="align-middle " >
                    <?php echo ($header_image_text) ? $header_image_text : '';  ?>                
                  </h1>
              </div>
            </div>  
        </div>
        <?php endif; ?>

        <!-- 2nd row -->
        <?php
            $row_2_title    = get_field('row_2_title');
            $row_2_text     = get_field('row_2_text');
        ?>
        <?php if($row_2_title || $row_2_text): ?>
        <div class=" mb-5 justify-content-center">
          <div class="col-md-10 text-center" style="margin: 0 auto;">
            <div class="fadeInUp wow" data-wow-delay="0.5s">
                <h1 class="cma-title-red"><?php echo ($row_2_title) ? $row_2_title : ''; ?></h1>
            </div>            
            <div class="text-center fadeInUp wow" data-wow-delay="0.7s">
              <p class="cma-paragraph-normal">
                <?php echo ($row_2_text) ? $row_2_text : ''; ?>
              </p>
            </div>
          </div>      
        </div>
        <?php endif; ?>

        <!-- 3rd row -->
        <?php
            $row_3_background_image = get_field('row_3_background_image');
            $row_3_title            = get_field('row_3_title');
        ?>
      <?php if($row_3_background_image || $row_3_title): ?>  
      <div class="">
        <div class=" text-center">
          <div class="header_image_section fadeIn wow" data-wow-delay="0.6s">
              <div class="featured_image " style="background-image: url('<?php echo $row_3_background_image;  ?>');" >       
              </div>     
              <div class="header_image_text fadeIn wow" data-wow-delay="0.9s">
                  <h1 class="align-middle " >
                    <?php echo ($row_3_title) ? $row_3_title : '';  ?>                
                  </h1>
              </div>
            </div>
        </div>
      </div>
      <?php endif; ?>

       <!-- 4th row -->
       <?php
            $row_4_teams = get_field('row_4_teams');
            if($row_4_teams):
       ?>
        <div class="cma-main-body " id="team_cma">
            <div class="container text-center pt-5 pb-5">
              <div class="col-md-8 cma-center">
                <div class="row  mb-4 fadeInUp wow" data-wow-delay="0.5s">
                    <?php if($row_4_teams): ?>
                        <?php foreach($row_4_teams as $team): ?>
                        <div class="col-md-6 mt-5">
                            <div class="text-center mb-3">
                              <img src="<?php echo ($team['team_image']) ? $team['team_image'] : ''; ?>" alt="" class="img-circle">
                            </div>
                            <div class="text-bold">
                              <?php echo ($team['team_name']) ?  $team['team_name'] : ''; ?>
                            </div>
                            <div class="mb-3">
                                <a href="mailto:<?php echo ($team['team_email']) ? antispambot($team['team_email']) : ''; ?>">
                                    <?php echo ($team['team_email']) ? antispambot($team['team_email']) : ''; ?>         
                                </a>
                            </div>
                            <div>
                              <a href="<?php echo ($team['team_link_url']) ? $team['team_link_url'] : '';  ?>" class="team_cma_link"><?php echo ($team['team_link_text']) ? $team['team_link_text'] : ''; ?></a>
                            </div>
                        </div>
                        <?php endforeach; ?>    
                    <?php endif; ?>
                </div>
              </div>
            </div>
        </div>
        <?php endif; ?>


        <!-- 5th row -->
        <?php
            $row_5_title        = get_field('row_5_title');
            $row_5_locations    = get_field('row_5_locations');
            if($row_5_title || $row_5_locations):
        ?>
        <div class="pt-5 mb-5 justify-content-center">
          <div class="col-md-6 text-center" style="margin: 0 auto;">
            <div class="fadeInUp wow" data-wow-delay="0.5s">
                <h1 class="cma-title-red"><?php echo ($row_5_title) ? $row_5_title : ''; ?></h1>
            </div>            
            <div class="row mt-5">
                <?php if($row_5_locations): ?>
                    <?php foreach($row_5_locations as $location): ?>
                        <div class="col fadeInUp wow" data-wow-delay="0.7s">
                          <div class="text-bold">
                            <?php echo ($location['location_name']) ?  $location['location_name'] : ''; ?>
                          </div>
                          <div>
                            P: <?php echo ($location['location_phone']) ?  $location['location_phone'] : ''; ?>
                          </div>
                          <div>
                            F: <?php echo ($location['location_fax']) ?  $location['location_fax'] : ''; ?>
                          </div>
                          <div>
                            <?php echo ($location['location_address']) ?  $location['location_address'] : ''; ?>
                          </div>
                        </div>
                    <?php endforeach; ?>
            <?php endif; ?>
            </div>
          </div>      
        </div>
        <?php endif; ?>


        <!-- 6th row -->
        <?php
            $row_6_title        = get_field('row_6_title');
            $row_6_text         = get_field('row_6_text');
            $row_6_link_text    = get_field('row_6_link_text');
            $row_6_link_url     = get_field('row_6_link_url');
        ?>
      <div class="cma-bg-red">
        <div class=" cma-bg-red ">
          <div class="justify-content-center">
            <div class="col-md-8 mt-4" style="margin: 0 auto">
                <div class="fadeInUp wow" data-wow-delay="0.8s">
                    <h1  class="text-center">
                        <?php echo ($row_6_title) ? $row_6_title : ''; ?>
                    </h1>
                </div>
            </div>
          </div>
          
          <div class="container">
            <div class="mb-4">
              <div class="col-md-9 cma-center text-center ">
                  <div class="fadeInUp wow" data-wow-delay="0.9s">
                    <div class="cma-paragraph-normal text-white">
                      <?php echo ($row_6_text) ? $row_6_text : ''; ?>  
                    </div>
                  </div>

                  <div class="fadeInUp wow" data-wow-delay="1s">
                    <a href="<?php echo ($row_6_link_url) ? $row_6_link_url : ''; ?>" class="cma-solid-bottom-white">
                      <?php echo ($row_6_link_text) ? $row_6_link_text : ''; ?>
                    </a>
                  </div>
                  
              </div>
        </div> 
      </div> <!-- container -->
    </div>
  </div>


		
	</div><!-- .entry-content -->
	
</article><!-- #post-## -->
