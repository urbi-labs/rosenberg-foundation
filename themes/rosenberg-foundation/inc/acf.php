<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;

//Init block types
add_action('acf/init', 'urbi_acf_init_block_types');

function urbi_acf_init_block_types()
{
    // Check function exists.
    if (function_exists('acf_register_block_type')) {
        /**
         * People bloc
         * A title
         * A button
         * People list is as loop of post custom type person
         */
        acf_register_block_type(
            array(
                'name'              => 'people-block',
                'title'             => __('Rosenberg Fundation: People block'),
                'description'       => __('People block'),
                'render_template'   => 'template-parts/blocks/block-people.php',
                'category'          => 'formatting',
                'icon'              => 'text',
                'mode'              => 'edit',
                'keywords'          => array('text', 'list'),
            )
        );

        //Internal intro section
        /*
        As an administrator 
        I would like to be able to add an intro section with a summary of the content of the page
        */
        // An image, a title and a body text
        acf_register_block_type(
            array(
                'name'              => 'internal-intro-section',
                'title'             => __('Rosenberg Fundation: Internal intro section'),
                'description'       => __('Internal intro section.'),
                'render_template'   => 'template-parts/blocks/block-internal-intro-section.php',
                'category'          => 'formatting',
                'icon'              => 'text',
                'mode'              => 'edit',
                'keywords'          => array('text', 'list'),
            )
        );
        // Featured slider
        //As an administrator 
        //I would like to be able to add a a slider with images and text
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