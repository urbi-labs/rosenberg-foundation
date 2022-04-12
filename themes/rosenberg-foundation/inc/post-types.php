<?php

function user_register_post_types()
{

    // Add all your post type info into this array.
    $user_magic_post_type_maker_array = array(
        /*array(
			'cpt_single' => 'Location',
			'cpt_plural' => 'Locations',
			'slug' => 'location',
			'cpt_icon' => 'dashicons-images-alt',
            'has_archive' => true,
			'exclude_from_search' => false,
		)*/
        array(
            'cpt_single' => 'Person',
            'cpt_plural' => 'People',
            'slug' => 'person',
            'cpt_icon' => 'dashicons-images-alt',
            'has_archive' => true,
            'exclude_from_search' => true,
        ),
        array(
            'cpt_single' => 'Grantee',
            'cpt_plural' => 'Grantees',
            'slug' => 'grantee',
            'cpt_icon' => 'dashicons-images-alt',
            'has_archive' => true,
            'taxonomies'  => array('category'),
            'exclude_from_search' => false,
        )
    );


    foreach ($user_magic_post_type_maker_array as $post_type) {
        $cpt_single = $post_type['cpt_single'];
        $cpt_plural = $post_type['cpt_plural'];
        $slug = $post_type['slug'];
        $cpt_icon = $post_type['cpt_icon'];
        $exclude_from_search = $post_type['exclude_from_search'];

        // Admin Labels
        $labels = user_generate_label_array($cpt_plural, $cpt_single);

        // Arguments
        $args = user_generate_post_type_args($labels, $cpt_plural, $cpt_icon, $exclude_from_search);

        // Just do it
        register_post_type($slug, $args);
    }
}

// Hook into the 'init' action
add_action('init', 'user_register_post_types', 0);




/*** */
function user_generate_label_array($cpt_plural, $cpt_single)
{
    $labels = array(
        'name'               => __($cpt_plural,                                'spark'),
        'singular_name'      => __($cpt_single,                                'spark'),
        'add_new'            => __('Add New ' . $cpt_single,                     'spark'),
        'add_new_item'       => __('Add New ' . $cpt_single,                     'spark'),
        'edit_item'          => __('Edit ' . $cpt_single,                        'spark'),
        'new_item'           => __('New ' . $cpt_single,                         'spark'),
        'all_items'          => __('All ' . $cpt_plural,                         'spark'),
        'view_item'          => __('View ' . $cpt_single . ' Page',                'spark'),
        'search_items'       => __('Search ' . $cpt_plural,                      'spark'),
        'not_found'          => __('No ' . $cpt_plural . ' found',                 'spark'),
        'not_found_in_trash' => __('No ' . $cpt_plural . ' found in the Trash',    'spark'),
        'parent_item_colon'  => '',
        'menu_name'          => $cpt_plural,
    );

    return $labels;
}

function user_generate_post_type_args($labels, $cpt_plural, $cpt_icon, $exclude_from_search)
{
    $args = array(
        'labels'              => $labels,
        'description'         => __('Manage ' . $cpt_plural, 'spark'),
        'public'              => true,
        'menu_position'       => 10,
        'hierarchical'          => true,
        'supports'            => array('title', 'editor', 'page-attributes', 'thumbnail', 'excerpt'),
        'has_archive'         => true,
        'menu_icon'              => $cpt_icon,
        'exclude_from_search' => $exclude_from_search,
        'taxonomies'  => array('grantee-category'),

    );

    return $args;
}

function add_tags_categories()
{
    register_taxonomy_for_object_type('category', 'auto-gallery');
}
add_action('init', 'add_tags_categories');

/***
 * add taxonomies to post types
 */

if (!function_exists('add_taxonomies_to_post_types')) {
    function add_taxonomies_to_post_types($taxonomy)
    {

        $taxonomies = array(
            array(
                'name' => 'grantee-category',
                'post_type' => 'grantee',
                'plural' => 'Grantee Categories',
                'singular' => 'Grantee Category',
                'slug' => 'grantee-category',
            )
        );
        foreach ($taxonomies as $taxonomy) :
            // Add new  taxonomy to Posts
            register_taxonomy($taxonomy['name'], $taxonomy['post_type'], array(
                // Hierarchical taxonomy (like categories)
                'hierarchical' => true,
                // This array of options controls the labels displayed in the WordPress Admin UI
                'labels' => array(
                    'name' => _x($taxonomy['plural'], 'taxonomy general name'),
                    'singular_name' => _x($taxonomy['singular'], 'taxonomy singular name'),
                    'search_items' =>  __('Search ' . $taxonomy['plural']),
                    'all_items' => __('All ' . $taxonomy['plural']),
                    'parent_item' => __('Parent ' . $taxonomy['singular']),
                    'parent_item_colon' => __('Parent ' . $taxonomy['singular'] . ':'),
                    'edit_item' => __('Edit ' . $taxonomy['singular']),
                    'update_item' => __('Update ' . $taxonomy['singular']),
                    'add_new_item' => __('Add New ' . $taxonomy['singular']),
                    'new_item_name' => __('New Location ' . $taxonomy['singular']),
                    'menu_name' => __($taxonomy['plural']),
                ),
                // Control the slugs used for this taxonomy
                'rewrite' => array(
                    'slug' => $taxonomy['slug'], // This controls the base slug that will display before each term
                    'with_front' => false, // Don't display the category base before "/locations/"
                    'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
                ),
            ));
        endforeach;
    }
}

add_action('init', 'add_taxonomies_to_post_types', 0);

function reorder_admin_menu($__return_true)
{
    return array(
        'index.php', // Dashboard
        'edit.php?post_type=page', // Pages
        'edit.php', // Posts
        'upload.php', // Media
        'themes.php', // Appearance
        'separator1', // --Space--
        'edit-comments.php', // Comments
        'users.php', // Users
        'separator2', // --Space--
        'plugins.php', // Plugins
        'tools.php', // Tools
        'options-general.php', // Settings
    );
}
add_filter('custom_menu_order', 'reorder_admin_menu', 10, 1);
add_filter('menu_order', 'reorder_admin_menu', 10, 1);