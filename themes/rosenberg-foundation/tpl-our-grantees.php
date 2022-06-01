<?php global $post; ?>
<?php
/*
Template Name: Our Grantees
*/
?>
<?php

/**
 * get from news for test
 */


$post_slug = $post->post_name;
$args_hero_post = array('numberposts' => '1', 'post_type' => 'grantee');
$last_post = wp_get_recent_posts($args_hero_post, 1);

$slug = isset($_GET['category']) ? $_GET['category'] : "";

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$s = get_query_var('s');
$args_recenpost = array(
    'orderby' => 'date',
    'order' => 'desc',
    'post_type' => 'grantee',
    'paged' => $paged,
    'posts_per_page' => 9

);
if ($s != "") {
    $args_recenpost['s'] = $s;
}

if ($slug != "") {
    $args_recenpost['tax_query'] = array(
        array(
            'taxonomy' => 'grantee-category',
            'field'    => 'slug',
            'terms'    => $slug,
            'posts_per_page' => 9
        ),
    );
}


$grantee_post = new WP_Query(['post_type' => 'page',  'name' => 'our-grantees']);;
if ($grantee_post->have_posts()) :
    get_header();
    $grantee_post->the_post();

?>
<main class="our-grantees">
    <h1 class="our-grantees__title"><?php echo the_title(); ?></h1>
    <div class="container">
        <div class="entry-content">
            <?php echo  the_content(); ?>
        </div>
        <div class="our-grantees__forms-container">
            <?php get_search_form(array(
                    "echo" => true,
                    "aria_label" => 'Search news',
                    "post_type" => 'grantee'
                )); ?>
            <?php echo get_template_part(
                    "template-parts/forms/form",
                    "filters",
                    array('all' => true, 'current_slug' => $slug, 'taxonomy' => 'grantee-category', 'post_type' => 'grantee')
                ); ?>

        </div>
        <?php echo get_template_part('template-parts/posts/posts', "grantees-list", ['args' => $args_recenpost]); ?>

    </div>
</main>

<?php get_footer(); ?>
<?php endif; ?>