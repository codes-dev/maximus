<?php
/**
 * Search Form
 * 
 * @package maximus
 */

?>
<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form d-flex input-group w-auto">
	<input
	id="s"
	name="s"
	type="search"
	class="form-control ripple"
	placeholder="Search...."
	aria-label="Search"
	value="<?php echo get_search_query(); ?>"
	/>
	<button
	class="btn"
	type="submit"
	data-mdb-ripple-color="dark"
	>
		<i class="fas fa-search"></i>
	</button>
</form>
