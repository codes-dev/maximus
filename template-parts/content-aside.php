<?php
/**
 * Template part for displaying posts with the aside format (CARDS)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maximus
 */

?>
<div <?php post_class( 'c-post-card bg-image ripple' ); ?> data-mdb-ripple-color="#F58019">
  <img src="https://mdbootstrap.com/img/new/standard/city/053.jpg" class="img-fluid"/>
  <a class="c-post-card" href="<?php echo esc_url( get_permalink() ); ?>">
	<div class="mask" style="background-color: rgba(0, 0, 0, 0.5)">
	  <div class="d-flex flex-column justify-content-center align-items-center h-100 pt-5">
		<div class="mb-2">
			<h4 class="card-title">
				<?php maximus_posted_on(); ?>
			</h4>
			<?php 
				
				maximus_posted_by();

			?>
		</div>
		<p class="card-text d-md-none">
			<?php the_excerpt(); ?>
		</p>
	  </div>
	</div>
	<div class="hover-overlay">
	  <div class="mask" style="background-color: rgba(15, 82, 186, 0.2)"></div>
	</div>
  </a>
</div>
