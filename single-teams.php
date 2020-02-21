<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bellaworks
 */

get_header(); ?>

	<div id="primary" class="content-area single-team cf">
		<main id="main" data-id="<?php the_ID(); ?>" class="site-main container" role="main">

		<?php while ( have_posts() ) : the_post(); 
			$placeholder = THEMEURI . 'images/photo-coming-soon.png';
			$photo = get_field("team_photo");
			$teamPhoto = $photo;
			$email = get_field("team_email");
			$photo = ($photo) ? $photo['url'] : $placeholder;
			$jobTitle = get_field("team_title");
			?>
			
			<div class="team-content twocol">
				
				<div class="textcol">
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<?php if ($jobTitle) { ?>
		                <div class="jobtitle"><?php echo $jobTitle ?></div> 
		                <?php } ?>
					</header>

					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				</div>
				
				<div class="imagecol text-center">
					<div class="photowrap">
						<?php if ($teamPhoto) { ?>
							<img src="<?php echo $teamPhoto['url'] ?>" alt="<?php echo $teamPhoto['title'] ?>" class="photo">
						<?php } else { ?>
							<img src="<?php echo $placeholder ?>" alt="" aria-hidden="true">
						<?php } ?>
					</div>
	                <?php if ($email) { ?>
					<div class="info email"><a href="mailto:<?php echo antispambot($email,1) ?>"><i class="fas fa-envelope"></i><?php echo antispambot($email) ?></a></div>	
					<?php } ?>
				</div>	

			</div>

		<?php endwhile; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
