	</div><!-- #content -->

  <?php  
    $company_name       = get_field('company_name', 'option');
    $company_email      = get_field('email_address', 'option');
    $company_phone      = get_field('phone', 'option');
    $company_bldg_name  = get_field('building_name', 'option');
    $company_address    = get_field('building_address', 'option');
    $request_info       = get_field('request_information_text', 'option');
    $request_info_url   = get_field('request_information_url', 'option');
  ?>

  
	
    <footer class="cma-footer" id="colophon" role="contentinfo">
    <div class="container text-left">
      <div class="row">
        <div class="col-md-7 fadeInLeft wow" data-wow-delay="0.5s">
          <h4 class="cma-title-red text-bold">
            <?php echo ($company_name) ? $company_name : ''; ?>
          </h4>
          <div>
            P: <?php echo ($company_phone) ? $company_phone : ''; ?> | E: <a href="mailto:<?php echo ($company_email) ? antispambot($company_email, 1) : ''; ?>"><?php echo ($company_email) ? antispambot($company_email) : ''; ?></a>
          </div>
          <div class="mb-5 officeAddress">
            <div><?php echo ($company_bldg_name) ? $company_bldg_name : ''; ?></div>
            <div class="company_address"><?php echo ($company_address) ? $company_address : ''; ?></div>
          </div>
        </div>

      

      <div class="col-md-5  fadeInRight wow" data-wow-delay="0.5s">
        <div class="mb-3 request-info">
          <a href="<?php echo ($request_info_url) ?  $request_info_url : ''; ?>" class="cma-solid-bottom"><?php echo ($request_info) ? $request_info : '';  ?></a>
        </div>
        <div class="row">

          <?php 

            $menu_items = wp_get_nav_menu_items('Footer Menu');
            
            $menu   = array();
            $ar_list   = array();
            foreach($menu_items as $key => $value){ 
              $menu['url']    = $value->url;
              $menu['title']  = $value->title;
              $ar_list[] = $menu;               
            }
            $rows = ceil(count($ar_list) / 2);
            $lists  = array_chunk($ar_list, $rows);

            foreach ( $lists as $column) {
                echo '<div class="col-md-4 col-6"><ul class="list-group">';
                foreach ($column as $item) {
                    echo '<li class="list-group-item"><a href="'. $item['url'] .'">' . $item['title'] . '</a></li>';
                }
                echo '</ul></div>';
            }

          ?>

       

          <div class="col-sm-4 col-6">       

            <div class="footer_locations">
              <div class="mb-2 text-dark">
                  LOCATIONS
              </div>
              <ul class="list-group">
              <?php
                    $wp_query = null;
                    $post_type = 'location';
                    $args = array(
                        'posts_per_page'   => -1,
                        'orderby'          => 'date',
                        'order'            => 'DESC',
                        'post_type'        => $post_type,
                        'post_status'      => 'publish',
                        //'paged'            => $paged
                    );

                    $wp_query = null;
                    
                    $wp_query = new WP_Query($args);

                    if ( $wp_query->have_posts() ) {

                          while ( $wp_query->have_posts() ) : $wp_query->the_post(); 

                  ?>
                      <li class="list-group-item"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php     endwhile; wp_reset_postdata();
                      }
                 ?>
                </ul>
            </div>
          </div>

        </div>
      </div>


      </div> <!-- row -->

      <?php  
      $socialOptions = social_icons();
      $socialMedia = get_field('social_media', 'option');
      ?>
      
      <div class="colophon cf fadeIn wow" data-wow-delay="0.6s">

        <?php if ($socialMedia) { ?>
        <div class="social-media-links">
          <ul class="smLinks">
            <?php
            foreach( $socialMedia as $s ) { 
              $socialLink = $s['link'];
              $socialIcon = '';
              $socialName = '';
              if($socialLink) {
                $parts = parse_url($socialLink);
                $host = $parts['host'];
                foreach($socialOptions as $k=>$iconClass) {
                  if (strpos($host, $k) !== false) {
                    $socialIcon = $iconClass;
                    $socialName = $k;
                    break;
                  }
                }
              } ?>

              <?php if ($socialLink && $socialIcon) { ?>
              <li class="social-<?php echo $socialName;?>">
                <a href="<?php echo $link; ?>" target="_blank"><i class="social-icon <?php echo $socialIcon ?>" aria-hidden="true"></i><span style="display:none;"><?php echo $socialName ?></span></a>
              </li>
              <?php } ?>
            <?php } ?>
          </ul>
        </div>
        <?php } ?>

        <div class="copyright">
          Copyright <?php echo date('Y'); ?> <?php echo bloginfo('name'); ?>. All Rights Reserved.
        </div>
      </div>

    </div>
  </footer>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
