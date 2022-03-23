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
                'name'              => 'sage-list',
                'title'             => __('Sage Street: List'),
                'description'       => __('A simple list with icons.'),
                'render_template'   => 'template-parts/blocks/block-sage-list.php',
                'category'          => 'formatting',
                'icon'              => 'text',
                'mode'              => 'edit',
                'keywords'          => array('text', 'list'),
            )
        );

        // Large list with icons
        acf_register_block_type(
            array(
                'name'              => 'sage-list-large',
                'title'             => __('Sage Street: List (Large)'),
                'description'       => __('A large list block.'),
                'render_template'   => 'template-parts/blocks/block-sage-list-large.php',
                'category'          => 'formatting',
                'icon'              => 'text',
                'mode'              => 'edit',
                'keywords'          => array('text', 'list'),
            )
        );

        // Table Slider
        acf_register_block_type(
            array(
                'name'              => 'sage-table-slider',
                'title'             => __('Sage Street: Table Slider'),
                'description'       => __('A slider for table data.'),
                'render_template'   => 'template-parts/blocks/block-sage-table-slider.php',
                'category'          => 'formatting',
                'icon'              => 'text',
                'mode'              => 'edit',
                'keywords'          => array('text', 'table', 'slider'),
            )
        );

        // Closing Rules
        acf_register_block_type(
            array(
                'name'              => 'sage-closing-rules',
                'title'             => __('Sage Street: Closing Rules'),
                'description'       => __('A block to display a list of closing rules.'),
                'render_template'   => 'template-parts/blocks/block-sage-closing-rules.php',
                'category'          => 'formatting',
                'icon'              => 'text',
                'mode'              => 'edit',
                'keywords'          => array('text', 'closing rules'),
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