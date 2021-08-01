<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package maximus
 */

get_header(maximus_get_site_theme());
?>

	<div class="row w-100 mx-auto pt-4 pb-5">

		<div class="col col-12 col-md-8 col-lg-9">

				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<h1 class="page-title">
							<?php
							/* translators: %s: search query. */
							printf( esc_html__( 'Search Results for: %s', 'maximus' ), '<span>' . get_search_query() . '</span>' );
							?>
						</h1>
					</header><!-- .page-header -->

					<div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 g-3 g-lg-5 w-100 mx-auto">

						<?php
							/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
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

		</div>

		<div class="col col-12 col-md-4 col-lg-3">
			<?php get_sidebar(); ?>
		</div>

	</div>

<?php

get_footer();
