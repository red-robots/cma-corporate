<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bellaworks
 */
$is_email = ( isset($_GET['contact']) && $_GET['contact']='yes' ) ? $_GET['contact'] : '';
$post_id = get_the_ID();
$captchaChars = permitted_characters();
shuffle($captchaChars);
$captcaVal = $captchaChars[0];

get_header(); ?>

	<div id="primary" class="content-area single-team cf">
		<main id="main" data-id="<?php the_ID(); ?>" class="site-main container" role="main">

			<?php while ( have_posts() ) : the_post(); 
				$placeholder = THEMEURI . 'images/photo-coming-soon.png';
				$rectangle = THEMEURI . 'images/rectangle.png';
				$photo = get_field("team_photo");
				$teamPhoto = $photo;
				$email = get_field("team_email");
				$photo = ($photo) ? $photo['url'] : $placeholder;
				$jobTitle = get_field("team_title");
				$pagelink = get_permalink();
				$formpageLink = $pagelink . '?contact=yes';
				?>
				
				<div class="team-content twocol">
					
					<div class="textcol">
						<header class="entry-header">
							<?php if ($is_email) { ?>
								<h1 class="entry-title">Contact <?php the_title(); ?></h1>
							<?php } else { ?>
								<h1 class="entry-title"><?php the_title(); ?></h1>
							<?php } ?>
							<?php if ($jobTitle) { ?>
			                <div class="jobtitle"><?php echo $jobTitle ?></div> 
			                <?php } ?>
						</header>

						<?php if ($is_email) { ?>
							
							<?php /* CONTACT FORM */ ?>
							<div class="team-contact-form cf">
								<div id="waiting"><div id="wait"><div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div></div>
								<div id="response"></div>
								<div class="teamform cf">
									<form action="" method="post" id="emailteamform">
										<input type="hidden" name="sentvia" value="<?php echo $formpageLink ?>">
										<input type="hidden" name="action" value="send_email_to_team">
										<input type="hidden" name="post_id" value="<?php echo $post_id ?>">
										<div class="form-group">
											<label>Your Name:</label>
											<input type="text" name="fullname" id="fullname" class="form-control required" value="">
										</div>
										<div class="form-group">
											<label>Your Email Address:</label>
											<input type="email" name="email" id="email" class="form-control required" value="">
										</div>
										<div class="form-group">
											<label>Subject:</label>
											<input type="text" name="subject" id="subject" class="form-control required" value="">
										</div>
										<div class="form-group">
											<label>Message:</label>
											<textarea name="message" id="message" rows="6" class="form-control required"></textarea>
										</div>
										<div class="form-group captcha-field">
											<div class="inptwrap"><label>Captcha:</label><span id="captchagen"><img src="<?php echo $rectangle ?>" alt=""><span><i id="chars"><?php echo $captcaVal ?></i></span></span></div>
											<div class="inptwrap"><input type="text" name="strcaptcha" id="strcaptcha" class="form-control input-medium required" autocomplete="off" value=""></div>
										</div>
									
										<div class="formbtn form-group-submit">
											<input type="submit" value="Submit" class="btnstyle submitbtn">
											<a href="<?php echo get_permalink(); ?>" class="btnstyle grey">Cancel</a>
										</div>
									</form>
								</div>	
							</div>
							
						<?php } else { ?>

							<div class="entry-content">
								<?php the_content(); ?>
							</div>

						<?php } ?>
					</div>
					
					<div class="imagecol text-center">
						<div class="photowrap">
							<?php if ($teamPhoto) { ?>
								<img src="<?php echo $teamPhoto['url'] ?>" alt="<?php echo $teamPhoto['title'] ?>" class="photo">
							<?php } else { ?>
								<img src="<?php echo $placeholder ?>" alt="" aria-hidden="true">
							<?php } ?>
						</div>

						<?php if (empty($is_email)) { ?>
			                <?php if ($email) { ?>
							<div class="team-contact-info">
								<a href="<?php echo $formpageLink  ?>" class="redLink">Contact <?php echo get_the_title(); ?></a>
							</div>
							<?php } ?>
						<?php } ?>
					</div>	

				</div>

				<?php  
				if (empty($is_email)) {
					/* Go to People Page */
					$peopleId = 78;
					$pageLink = get_permalink($peopleId);
					$pageTitle = get_the_title($peopleId);
					if($pageTitle) { ?>
					<div class="fwleft">
						<div class="wrapper button-bottom">
							<a href="<?php echo $pageLink; ?>#leadership" class="redLink"><i class="fas fa-chevron-left"></i> <?php echo $pageTitle; ?></a>
						</div>
					</div>
					<?php } 
				} ?>

			<?php endwhile; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
