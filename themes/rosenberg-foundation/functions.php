<?php

// Errors
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);


include 'inc/globals.php';
include 'inc/wp-reset.php';
include 'inc/user_module.php';
include 'inc/post-types.php';
include 'inc/taxonomies.php';
include 'inc/walkers.php';
include 'inc/enqueue.php';
include 'inc/image-sizes.php';
include 'inc/shortcodes.php';
include 'inc/excerpt.php';
include 'inc/navigation.php';
include 'inc/options.php';
include 'inc/widgets.php';
include 'inc/pagination.php';


function getSvgFile($imgFile){
	$url = IMAGES_SERVER.'/'.$imgFile.'.svg';
	$svg_file = file_get_contents($url);

	$find_string   = '<svg';
	$position = strpos($svg_file, $find_string);

	return $svg_file_new = substr($svg_file, $position);
}


// Custom login logo
function custom_login_logo() {
    echo '<style type="text/css">
    .login h1 a {
        display: block;
        width: 240px;
        height: 180px;
        margin: 0 auto 10px;
        background-size: contain;
        background-image: url('.get_bloginfo('template_directory').'/images/logo.png) !important;
        background-position: center bottom;
        background-repeat: no-repeat;
    }
    </style>';
}
add_action('login_head', 'custom_login_logo');



add_filter('next_posts_link_attributes', 'posts_link_attributes_next');
add_filter('previous_posts_link_attributes', 'posts_link_attributes_prev');

function posts_link_attributes_prev() {
    return 'class="prev"';
}

function posts_link_attributes_next() {
    return 'class="next"';
}

// Wrap iframes to make them responsive
function wrap_embed_with_div($html, $url, $attr) {
    return '<div class="video-container">' . $html . '</div>';
}
add_filter('embed_oembed_html', 'wrap_embed_with_div', 10, 3);


function tekst_wrapper($content) {
  return preg_replace_callback('~<table.*?</table>~is', function($match) {
    return '<div class="table__container">' . $match[0] . '</div>';
  }, $content);
}

add_filter('the_content', 'tekst_wrapper');


function my_acf_init() {
    acf_update_setting('google_api_key', 'AIzaSyCRU0Vi0-U-crUnOkSApkuTDaw-0cgsbkw');
}

add_action('acf/init', 'my_acf_init');

add_theme_support( 'title-tag' );

add_filter( 'excerpt_length', function($length) {
    return 20;
} );

function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

?>
