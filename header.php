<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if( is_singular() && pings_open( get_queried_object() )): ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif;  ?>	

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/all.min.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site cf">
		<a class="skip-link sr" href="#content"><?php esc_html_e( 'Skip to content', 'bellaworks' ); ?></a>


		<header id="masthead" class="site-header" role="banner">
		 	<div id="right-full-screen-menu-container" class="custom-top-wrap">
		 		<div class="custom-top">
		 			<div class="wrapper main_menu_top">

		 				<?php if(is_home()) { ?>
		 					<h1 class="logo">
		 						<a href="<?php bloginfo('url'); ?>">
		 							<img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>">
		 						</a>
		 					</h1>
		 				<?php } else { ?>
		 					<div class="logo">
		 						<a href="<?php bloginfo('url'); ?>">
		 							<img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>">
		 						</a>
		 					</div>
		 				<?php } ?>
	
						<div>
							
						</div>
		 				<div class="burger">
		 					<div class="burger_label">Menu</div>
		 					<span></span>
		 				</div>

		 				



		 			</div><!-- wrapper -->
	 				<div class="mobilemenu">		 					
	 					<?php 
	 					wp_nav_menu( array( 
	 						'menu'		=> 'Top Menu',
	 						'container' => 'ul',		 						
	 						'menu_class'     => 'mobilemain',
	 					)); ?>
	 				</div>
		 		</div>

		 		

		 	</div>
		</header><!-- #masthead -->

		<div id="content" class="site-content ">
