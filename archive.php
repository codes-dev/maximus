<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maximus
 */

get_header(maximus_get_site_theme());
?>
	<div class="row w-100 mx-auto pt-4 pb-5">
		<div class="col col-12 col-md-8 col-lg-9">
			<?php get_template_part( 'template-parts/loops/loop', 'archive' ); ?>
		</div>
		<div class="col col-12 col-md-4 col-lg-3">
			<?php get_sidebar(); ?>
		</div>
	</div>
<?php
get_footer();
