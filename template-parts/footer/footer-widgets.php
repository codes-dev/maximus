<?php
/**
 * Footer Widgets Area
 * 
 * @package maximus
 */

$maximus_columns = intval( get_theme_mod( 'maximus_footer_columns', '4' ) );

$maximus_active_columns = array();

$maximus_active_columns_length = 0;

for ( $maximus_i = 0; $maximus_i < $maximus_columns; $maximus_i++ ) { 
	// code...
	if ( is_active_sidebar( 'footer-widgets-' . ( $maximus_i + 1 ) ) ) {
		// code...
		array_push( $maximus_active_columns, $maximus_i );
		$maximus_active_columns_length++;
	}
}

if ( $maximus_active_columns_length > 0 ) {
	// code...
	?>
			<!-- Grid container -->
			<div class="c-footer-widgets-area container-fluid p-4">
				<!--Grid row-->
				<div class="row">
				<?php
					$maximus_lg_size = 12 / $maximus_active_columns_length;
					$maximus_md_size = 0;
				switch ( $maximus_active_columns_length ) {
					case $maximus_active_columns_length >= 2:
						// code...
						$maximus_md_size = 6;
						break;

					case $maximus_active_columns_length <= 2:
						// code...
						$maximus_md_size = 12;
						break;
							
					default:
						// code...
						break;
				}
					$maximus_default_size = 12;
				for ( $maximus_i = 0; $maximus_i < $maximus_active_columns_length; $maximus_i++ ) { 
					// code...
					?>
								<!--Grid column-->
								<div class="col-<?php echo esc_attr( $maximus_default_size ); ?> col-lg-<?php echo esc_attr( $maximus_lg_size ); ?> col-md-<?php echo esc_attr( ( 3 === $maximus_columns && 0 === $maximus_i ) ? 12 : $maximus_md_size ); ?> mb-4 mb-md-0">
							<?php 
							$maximus_id = $maximus_active_columns[ $maximus_i ];
							dynamic_sidebar( 'footer-widgets-' . ( $maximus_id + 1 ) ); 
							?>
								</div>
								<!--Grid column-->
						<?php
				}
				
				?>

				</div>
				<!--Grid row-->
			</div>
			<!-- Grid container -->
		<?php
}
?>
