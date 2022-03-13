<?php
add_shortcode( 'donation', 'shortcode_for_donations_for_the_farm' );
function shortcode_for_donations_for_the_farm() {
	ob_start();
	include_once( ABS_CHILD_THEME .'/page-parts/donations-embed-farm.php' );

	return ob_get_clean();
}

add_shortcode( 'donation-horses', 'shortcode_for_donation_for_the_ranch' );
function shortcode_for_donation_for_the_ranch() {
	ob_start();
	include_once( ABS_CHILD_THEME . '/page-parts/donations-embed-ranch.php' );

	return ob_get_clean();
}
