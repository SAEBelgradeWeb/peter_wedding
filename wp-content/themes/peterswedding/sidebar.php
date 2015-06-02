<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package peterswedding
 */

if ( ! is_active_sidebar( 'sidebar' ) ) {
	return;
}
?>

<aside class="three columns">
	<div class="sidebar">
	<ul>

	<?php dynamic_sidebar( 'sidebar' ); ?>
	</ul>
	</div>
</aside>
