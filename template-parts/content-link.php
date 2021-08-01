<?php
/**
 * Template part for displaying posts (CARDS) Type: Link
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maximus
 */

?>

	<div>		
		<div class="d-flex justify-content-end">
			<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
				<?php
				if ( current_user_can( 'edit_post', get_the_ID() ) ) {
					// code...
					?>
							<a href="<?php echo esc_url( get_edit_post_link() ); ?>" class="btn btn-primary">
								<i class="fas fa-edit"></i>&nbsp;&nbsp;Edit
							</a>
						<?php
				}
				?>
			</div>
		</div>

		<div <?php post_class( 'c-post-card bg-image' ); ?>>
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
		<img src="<?php echo esc_url( $maximus_featured_image ); ?>" alt="<?php esc_attr( get_the_title() ); ?>" class="img-fluid w-100" />
			<div class="mask" style="background-color: rgba(0, 0, 0, 0.5)">
			<div class="d-flex flex-column justify-content-center align-items-center h-100 pt-5">
				<div class="mb-2 text-white">
                    <div class="p-1">
                        <p class="text-center">
                            <i class="fas fa-link"></i>
                        </p>
                        <h4 class="card-title text-center"><?php the_content(  ); ?></h4>
                    </div>
                    <?php
                    maximus_posted_on();
                    maximus_posted_by();
                    ?>
				</div>
			</div>
			</div>
		</div>

	</div>
