<?php
global $post;
global $wp_query;
/*
Template Name: News
*/
get_header();

$category = get_term_by("slug", get_query_var('term'), 'grantee-category');


$args_last_post = array('numberposts' => '1',     'tax_query' => array(
    array(
        'taxonomy' => 'grantee-category',
        'field'    => 'slug',
        'terms'    => get_query_var('term'),
    ),
), 'post_type' => 'grantee');

// $categories = get_categories();

// $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args_recenpost = array(
    'orderby' => 'date',
    'order' => 'desc',
    'paged' => $paged,
    'tax_query' => array(
        array(
            'taxonomy' => 'grantee-category',
            'field'    => 'slug',
            'terms'    => get_query_var('term'),
        ),
    ),
    'post_type' => 'grantee'

);
$categories = get_categories(array('taxonomy' => 'grantee-category', 'hide_empty' => false));
?>
<main class="our-grantees">
    <h1 class="our-grantees__title">Our Grantees</h1>
    <div class="container">
        <div class="entry-content">
            <?php // this  content cant be the_content(), now is harcode
            ?>
            <div class=" our-grantees__subtitle">

                <p class="has-text-align-center page__our-grantees__subtitle">Gravida neque convallis a cras. Sit
                    amet venenatis urna cursus eget nunc scelerisque. Tincidunt lobortis feugiat vivamus at augue
                    eget arcu. Nibh mauris cursus mattis molestie a iaculis. Porta lorem mollis aliquam ut porttitor
                    leo.</p>

            </div>

        </div>
        <div class="our-grantees__forms-container">
            <?php get_search_form(array(
                "echo" => true,
                "aria_label" => 'Search news',
                "post_type" => 'grantee'
            )); ?>
            <?php echo get_template_part("template-parts/forms/form", "filters", array('categories' => $categories)) ?>
        </div>
        <?php echo get_template_part('template-parts/posts/posts', "grantees-list", ['args' => $args_recenpost]); ?>

    </div>
</main>
<?php get_footer(); ?>