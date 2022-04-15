<?php
global $post;
global $wp_query;

get_header();

$category = get_term_by("slug", get_query_var('term'), 'grantee-category');


$args_last_post = array('numberposts' => '1',     'tax_query' => array(
    array(
        'taxonomy' => 'grantee-category',
        'field'    => 'slug',
        'terms'    => get_query_var('term'),
    ),
), 'post_type' => 'grantee');

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
    <h1 class="our-grantees__title"><?php the_title() ?></h1>
    <div class="container">
        <div class="entry-content">
            <?php the_content() ?>
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