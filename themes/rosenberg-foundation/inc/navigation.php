<?php

function user_register_menus() {

	// Navigation Menus
	register_nav_menus(
		array(
            'main_nav'    => 'Primary Navigation',
            'secondary_nav' => 'Secondary Navigation',
            'footer_nav' => 'Footer Navigation'
		)
	);

}
add_action( 'init', 'user_register_menus' );

?>
