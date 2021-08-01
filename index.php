<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maximus
 */

get_header(maximus_get_site_theme());
?>
	<div class="row w-100 mx-auto pt-4 pb-5">
		<div class="col col-12 col-md-8 col-lg-9">
			<?php 
			if ( is_home() && ! is_front_page() ) {
				// code...
				get_template_part( 'template-parts/loops/loop', 'archive' );
			} else {
				// code...
				get_template_part( 'template-parts/loops/loop', 'index' );
			}
			?>
		</div>
		<div class="col col-12 col-md-4 col-lg-3">
			<?php get_sidebar(); ?>
		</div>
	</div>
<?php
get_footer();
