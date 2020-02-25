<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bellaworks
 */

// ini_set('display_errors','Off');
// ini_set('error_reporting', E_ALL );
// define('WP_DEBUG', false);
// define('WP_DEBUG_DISPLAY', false);
// $obj = get_queried_object();
// print_r($obj);
?>

<div class="row">
	
	<?php 
		$customTitle = get_field("custom_page_title"); 
		$pagetitle = ($customTitle) ? $customTitle : get_the_title();
	?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<h1 class="entry-title cma-title-red"><?php echo $pagetitle ?></h1>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
				the_content();
			?>
		</div><!-- .entry-content -->
		
	</article><!-- #post-## -->

</div>
