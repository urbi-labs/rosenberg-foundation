<?php

function sidebar() {
    register_sidebar(
    	array(
	    	'name' => 'Primary',
	    	'id' => 'primary',
	    	'description' => "Normal full width sidebar",
	    	'before_widget' => '<div id="%1$s" class="widget form_widget %2$s">',
	    	'after_widget' => '</div>',
	    	'before_title' => '<h3>',
	    	'after_title' => '</h3>'
    	)
    );
}

add_action( 'widgets_init', 'sidebar' );

?>