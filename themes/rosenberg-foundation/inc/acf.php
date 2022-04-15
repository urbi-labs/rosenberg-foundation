<?php

// Exit if accessed directly.
defined('ABSPATH') || exit;

//Init block types
add_action('acf/init', 'urbi_acf_init_block_types');

function urbi_acf_init_block_types()
{
    // Check function exists.
    if (function_exists('acf_register_block_type')) {
        acf_register_block_type(
            array(
                'name'              => 'people-block',
                'title'             => __('Rosenberg: People Block'),
                'description'       => __('People block'),
                'render_template'   => 'template-parts/blocks/block-people.php',
                'category'          => 'formatting',
                'icon'              => 'text',
                'mode'              => 'preview',
                'keywords'          => array('people', 'team', 'members'),
            )
        );

        acf_register_block_type(
            array(
                'name'              => 'people-large-block',
                'title'             => __('Rosenberg: People Large'),
                'description'       => __('People block'),
                'render_template'   => 'template-parts/blocks/block-people-large.php',
                'category'          => 'formatting',
                'icon'              => 'text',
                'mode'              => 'preview',
                'keywords'          => array('people', 'team', 'members'),
            )
        );

        acf_register_block_type(
            array(
                'name'              => 'internal-intro-section',
                'title'             => __('Rosenberg: Intro Section'),
                'description'       => __('Inner Page intro section.'),
                'render_template'   => 'template-parts/blocks/block-internal-intro-section.php',
                'category'          => 'formatting',
                'icon'              => 'text',
                'mode'              => 'edit',
                'keywords'          => array('text', 'intro', 'featured'),
            )
        );


        acf_register_block_type(
            array(
                'name'              => 'feature-slider',
                'title'             => __('Rosenberg: Featured slider'),
                'description'       => __('Add sliders with images and text.'),
                'render_template'   => 'template-parts/blocks/block-feature-slider.php',
                'category'          => 'formatting',
                'icon'              => 'text',
                'mode'              => 'edit',
                'keywords'          => array('slider', 'featured', 'carousel'),
            )
        );

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

        acf_register_block_type(
            array(
                'name'              => 'hero-internal',
                'title'             => __('Rosenberg: Inner Page Hero'),
                'description'       => __('Inner page hero section.'),


                'render_template'   => 'template-parts/blocks/block-hero-internal.php',
                'category'          => 'formatting',
                'icon'              => 'text',
                'mode'              => 'edit',
                'keywords'          => array('text', 'card'),
            )
        );

        acf_register_block_type(
            array(
                'name'              => 'divider-image-text',
                'title'             => __('Rosenberg: Divider Image/Text'),
                'description'       => __('A content divider with support for image and text.'),

                'render_template'   => 'template-parts/blocks/block-hero-internal.php',

                'render_template'   => 'template-parts/blocks/block-divider-image-text.php',

                'category'          => 'formatting',
                'icon'              => 'text',
                'mode'              => 'edit',
                'keywords'          => array('text', 'card'),
            )
        );

        acf_register_block_type(
            array(
                'name'              => 'rosenberg-contact-form',
                'title'             => __('Rosenberg: Contact Form'),
                'description'       => __('A contact form with a map section.'),
                'render_template'   => 'template-parts/blocks/block-contact-page.php',
                'category'          => 'formatting',
                'icon'              => 'text',
                'mode'              => 'edit',
                'keywords'          => array('text', 'card'),
            )
        );

        acf_register_block_type(
            array(
                'name'              => 'rosenberg-recent-posts',
                'title'             => __('Rosenberg: Recent Posts'),
                'description'       => __('Display the last 3 posts of any post type.'),
                'render_template'   => 'template-parts/blocks/block-recent-posts.php',
                'category'          => 'formatting',
                'icon'              => 'text',
                'mode'              => 'edit',
                'keywords'          => array('text', 'card'),
            )
        );

        acf_register_block_type(
            array(
                'name'              => 'rosenberg-recent-posts-large',
                'title'             => __('Rosenberg: Recent Posts Large'),
                'description'       => __('Display the last 4 posts of any post type in overlapping cards.'),
                'render_template'   => 'template-parts/blocks/block-recent-posts-large.php',
                'category'          => 'formatting',
                'icon'              => 'text',
                'mode'              => 'edit',
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

// Fix Media Library issue: Uncaught TypeError: Cannot read properties of undefined (reading ‘removeAllPlayers’) at n.render (media-views.min.js?ver=5.9.1:2:91463)

add_filter('block_editor_rest_api_preload_paths', 'acf_filter_rest_api_preload_paths', 10, 1);

function acf_filter_rest_api_preload_paths($preload_paths)
{
    global $post;
    $rest_path    = rest_get_route_for_post($post);
    $remove_paths = array(
        add_query_arg('context', 'edit', $rest_path),
        sprintf('%s/autosaves?context=edit', $rest_path),
    );

    return array_filter(
        $preload_paths,
        function ($url) use ($remove_paths) {
            return !in_array($url, $remove_paths, true);
        }
    );
}

// function my_acf_init() {
	
// 	acf_update_setting('google_api_key', GMAPS_API_KEY);
// }

// add_action('acf/init', 'my_acf_init');

add_filter('acf/load_field/name=select_post_type', 'yourprefix_acf_load_post_types');
/*
 *  Load Select Field `select_post_type` populated with the value and labels of the singular 
 *  name of all public post types
 */
function yourprefix_acf_load_post_types( $field ) {

    $choices = get_post_types( array( 'show_in_nav_menus' => true ), 'objects' );

    foreach ( $choices as $post_type ) {
        $field['choices'][$post_type->name] = $post_type->labels->singular_name;
    }
    
    return $field;
}