<?php
/**
 * The General header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package maximus
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php maximus_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'maximus' ); ?></a>
	<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
	<?php get_template_part( 'template-parts/navigation/navigation', 'utils' ); ?>
	<?php get_template_part( 'template-parts/navigation/navigation', 'mega' ); ?>
	<?php get_template_part( 'template-parts/navigation/navigation', 'mobile' ); ?>
	<header id="masthead" class="site-header">
		<?php
		if ( is_archive() ) {
			// code...
			ob_start();
					
			?>
					<div class="c-header-jumbotron bg-image w-100">
						<img
							src="<?php echo esc_url( get_header_image() ); ?>"
							class="img-fluid w-100 h-auto"
							alt="Sample"
						/>
						<div class="mask" style="background-color: rgba(0, 0, 0, 0.6)">
							<div class="d-flex flex-column justify-content-center align-items-center h-100">
							<p class="mb-0">
								<h1 class="h1-responsive text-white mb-3"><?php echo __( get_the_archive_title(), 'maximus' ); ?></h1>
								<h4 class="text-white mb-3"><?php echo __( get_the_archive_description(), 'maximus' ); ?></h4>
							</p>
							</div>
						</div>
					</div>
				<?php

				echo ob_get_clean();
		}
		?>
	</header><!-- #masthead -->
	<?php
	if ( ( ! is_front_page() ) ) {
		// code...
		if ( function_exists( 'yoast_breadcrumb' ) ) {
			yoast_breadcrumb( 
				'<nav class="navbar navbar-expand-lg shadow-0" id="breadcrumb" aria-label="breadcrumb"><div class="container-fluid">',
				'</div></nav>' 
			);
		}
	}
	?>

	<main role="main">
