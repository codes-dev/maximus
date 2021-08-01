<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package maximus
 */ 

get_header(maximus_get_site_theme());

$maximus_hide_sidebar = get_post_meta( get_the_ID(), '_maximus_hide_post_sidebar', true );
?>
	<div <?php maximus_post_layout_classes( $maximus_hide_sidebar, 'container' ); ?>>
		<div <?php maximus_post_layout_classes( $maximus_hide_sidebar, 'content' ); ?>>
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/singles/content-single', get_post_format() );
				

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		</div>
		<div <?php maximus_post_layout_classes( $maximus_hide_sidebar, 'sidebar' ); ?>>
			<?php get_sidebar(); ?>
		</div>
	</div>

<?php
get_footer();
