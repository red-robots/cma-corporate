<?php
/**
 * Template Name: People
 */
get_header(); ?>
<div id="primary" class="content-area-full cf">
  <?php while ( have_posts() ) : the_post(); ?>

    <?php  
      $row1_title = get_field("row1_title");
      $row1_text = get_field("row1_text");
      $row1Images = get_field("row1_images");
      ?>
    <?php if ($row1_title || $row1_text || $row1Images) { ?>
    <section class="temp-row1 cf">
      <div class="wrapper">
        <?php if ($row1_title) { ?>
        <h1 class="cma-title-red fadeInUp wow" data-wow-delay="0.5s"><?php echo $row1_title ?></h1>
        <?php } ?>
        
        <?php if ($row1_text) { ?>
        <div class="row-text fadeInUp wow" data-wow-delay="0.7s"><?php echo $row1_text ?></div>
        <?php } ?>
        
        <?php if ($row1Images) { ?>
        <div class="row1Images">
          <?php foreach ($row1Images as $img) { 
            $imageId = $img['ID'];
            $beforeLink = '';
            $afterLink = '';
            $pageLink = get_field("attachmentPagelink",$imageId);
            if($pageLink) {
              $beforeLink = '<a href="'.$pageLink.'" target="_blank">';
              $afterLink = '</a>';
            }
          ?>
            <span class="rowImg">
            <?php echo $beforeLink ?><img src="<?php echo $img['url'] ?>" alt="<?php echo $img['title'] ?>"><?php echo $afterLink ?>
            </span>
          <?php } ?>
        </div>
        <?php } ?>

      </div>
    </section>
    <?php } ?>

  <?php endwhile; ?>
</div>
<?php
get_footer();