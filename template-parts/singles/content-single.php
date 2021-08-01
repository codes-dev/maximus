<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maximus
 */

$maximus_hide_author = get_post_meta( $post->ID, '_maximus_hide_post_author', true );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			the_title( '<h1 class="entry-title text-center">', '</h1>' );
		?>
	</header><!-- .entry-header -->

	<?php
		$maximus_featured_image = '';
	if ( has_post_thumbnail() ) {
		// code...
		$maximus_featured_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
	} else {
		// code...
		$maximus_featured_image = get_template_directory_uri() . '/dist/assets/images/post_thumbnail_default.png';
	}
		
	?>
	<img src="<?php echo esc_url( $maximus_featured_image ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" class="img-fluid w-100" />

	<?php
	if ( 'post' === get_post_type() ) :
		?>
			<div class="entry-meta mt-3">
				<div class="container d-flex <?php echo ( ! $maximus_hide_author ) ? 'justify-content-between' : 'justify-content-end'; ?>">
											<a href="<?php echo esc_url( get_day_link( get_post_time( 'Y' ), get_post_time( 'm' ), get_post_time( 'j' ) ) ); ?>">
							<?php maximus_posted_on(); ?>
							</a>
						<?php
						if ( ! $maximus_hide_author ) {
							// code...
							?>
								<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
									<?php maximus_posted_by(); ?>
								</a>
							<?php
						}
						?>
				</div>
			</div><!-- .entry-meta -->
		<?php 
		endif;
	?>

	<div class="container entry-content clearfix">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'maximus' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'maximus' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="container entry-footer mb-3">
		<?php maximus_entry_footer(); ?>
	</footer><!-- .entry-footer -->


	<?php maximus_post_pagination(); ?>
</article><!-- #post-<?php the_ID(); ?> -->
