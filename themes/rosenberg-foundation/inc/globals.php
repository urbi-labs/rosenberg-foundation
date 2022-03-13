<?php

//Define directory constants.
define( 'STYLEDIR', get_bloginfo('stylesheet_directory'));
define( 'IMAGES', STYLEDIR. "/images");
define( 'IMAGES_SERVER', user_get_stylesheet_path(). "/images");
define( 'USERIR', STYLEDIR."/js");
define( 'CSSDIR', STYLEDIR."/css");
define( 'FONTS', STYLEDIR."/fonts");
define( 'MODDIR', STYLEDIR."/modules");
define( 'MODDIR_SERVER', user_get_stylesheet_path(). "/modules");


function user_get_home_path() {
	$home    = set_url_scheme( get_option( 'home' ), 'http' );
	$siteurl = set_url_scheme( get_option( 'siteurl' ), 'http' );
	if ( ! empty( $home ) && 0 !== strcasecmp( $home, $siteurl ) ) {
		$wp_path_rel_to_home = str_ireplace( $home, '', $siteurl ); /* $siteurl - $home */
		$pos = strripos( str_replace( '\\', '/', $_SERVER['SCRIPT_FILENAME'] ), trailingslashit( $wp_path_rel_to_home ) );
		$home_path = substr( $_SERVER['SCRIPT_FILENAME'], 0, $pos );
		$home_path = trailingslashit( $home_path );
	} else {
		$home_path = ABSPATH;
	}

	return str_replace( '\\', '/', $home_path );
}

// This uses the above function and adds onto the string to get the full path to the stylesheet directory
function user_get_stylesheet_path() {
    $return = false;
    $home_path = user_get_home_path();
    $style_dir = get_bloginfo('stylesheet_directory');

    $wp_content_strpos = strpos( $style_dir, 'wp-content' );

    if( $wp_content_strpos !== false ) {
        $full_path = $home_path.substr( $style_dir, $wp_content_strpos );
        $return = $full_path;
    }

    return $return;
}
?>
