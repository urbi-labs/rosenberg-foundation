<?php
### jQuery, Condiitonizr, and Modernizr are loaded in the <head>.
### Everything else should load at the end of the page, use TRUE for the 5th parameter of wp_register_script().
function user_scripts(){
	if (!is_admin()) {
	### Core
		// Deregister WordPress jQuery and register Google's
		wp_deregister_script('jquery');
		wp_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js', array(), '2.1.0', false);

        wp_enqueue_script('scripts', USERIR.'/scripts.js', array('jquery'), time(), true);

        // Update version number; increment as you push changes
		wp_enqueue_style('my_theme_styles', STYLEDIR.'/style.css', false, time());
		
		// Live Reloading
		if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) {
			wp_register_script('livereload', 'http://localhost:35729/livereload.js?snipver=1', null, false, true);
			wp_enqueue_script('livereload');
		}

	}
}
add_action('wp_enqueue_scripts','user_scripts');

?>
