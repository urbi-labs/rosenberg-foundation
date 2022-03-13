<?php

add_theme_support( 'post-thumbnails' );

function user_image_size_setup(){

	// Add custom image sizes.
	add_image_size( 'hero', 1680, 99999, false );

}
add_action( 'after_setup_theme', 'user_image_size_setup' );


// Give human-readable names the image sizes.
function user_custom_size_names( $sizes ) {
	return array_merge( $sizes, array(
		//'header-background' => 'Header Background',
	) );
}
//add_filter( 'image_size_names_choose', 'user_custom_size_names' );

?>
