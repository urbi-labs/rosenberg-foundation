<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;

//Init block types
add_action('acf/init', 'urbi_acf_init_block_types');

function urbi_acf_init_block_types()
{
    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        // List with icons
        acf_register_block_type(
            array(
                'name'              => 'overlapping-cards',
                'title'             => __('Rosenberg: Overlapping Cards'),
                'description'       => __('Cards with an overlap effect on their text.'),
                'render_template'   => 'template-parts/blocks/block-overlapping-cards.php',
                'category'          => 'formatting',
                'icon'              => 'text',
                'mode'              => 'preview',
                'keywords'          => array('text', 'card'),
            )
        );

    }
}

//Loads ACF json from folder
add_filter('acf/settings/save_json', 'my_acf_json_save_point');

function my_acf_json_save_point($path)
{
    // update path
    $path = get_stylesheet_directory() . '/inc/acf-json';

    // return
    return $path;
}

add_filter('acf/settings/load_json', 'my_acf_json_load_point');

function my_acf_json_load_point($paths)
{
    // remove original path (optional)
    unset($paths[0]);

    // append path
    $paths[] = get_stylesheet_directory() . '/inc/acf-json';

    // return
    return $paths;
}

// function my_acf_init() {
	
// 	acf_update_setting('google_api_key', GMAPS_API_KEY);
// }

// add_action('acf/init', 'my_acf_init');