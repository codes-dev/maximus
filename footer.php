<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package maximus
 */

?>

		</main>
		<?php get_template_part( 'template-parts/globals/global', 'toolbar' ); ?>
		<!-- Footer -->
		<footer class="c-footer text-center text-lg-left w-100">
			<?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>		
			<!-- Copyright -->
			<div class="c-site-credit text-center p-3">
				<?php 
					ob_start();
				?>
					© 2020 Copyright:
					<a href="<?php echo esc_url( site_url() ); ?>">
						<?php
						/* translators: %s: CMS name, i.e. WordPress. */
						printf( esc_html__( 'Proudly powered by %s', 'maximus' ), 'WordPress' );
						?>
					</a>
					<span class="sep"> | </span>
					<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( 'Theme: %1$s by %2$s.', 'maximus' ), 'maximus', '<a href="https://www.codesport.com">codes</a>' );
					?>
					<?php
					$maximus_default = ob_get_clean();

					$maximus_allowed = array(
						'a' => array(
							'href'  => array(),
							'title' => array(),
						),
					);
					echo wp_kses( get_theme_mod( 'maximus_footer_credit', $maximus_default ), $maximus_allowed );
					?>
			</div>
			<!-- Copyright -->
		</footer>
		<!-- Footer -->
	</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
