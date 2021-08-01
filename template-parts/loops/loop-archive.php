<?php 
/**
 * Loop Archive
 * 
 * @package maximus
 */

if ( have_posts() ) : 
	?>
		<div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 g-3 g-lg-5 w-100 mx-auto">

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				* Include the Post-Type-specific template for the content.
				* If you want to override this in a child theme, then include a file
				* called content-___.php (where ___ is the Post Type name) and that will be used instead.
				*/
				?>
					<div class="col">
						<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
					</div>
				<?php

			endwhile;
			?>
		</div>
		<div class="d-flex justify-content-center">
		<?php

			the_posts_pagination();

		?>
		</div>
		<?php
	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>
