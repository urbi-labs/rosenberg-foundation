<?php
global $post;
/*
Template Name: News
*/
get_header();
$s = get_query_var('s');
$post_type = get_query_var("post_type") ? get_query_var("post_type") : "news";

$args_hero_post = array('numberposts' => '1', 's' => $s, 'post_type' => $post_type);
$last_post = wp_get_recent_posts($args_hero_post, 1);

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args_recenpost = array(
    'orderby' => 'date',
    'order' => 'desc',
    's' => $s,
    'paged' => $paged,
    'post_type' => $post_type
);

?>
<main class="page__news container">

    <div class="page__news__header">
        <h1>Search results for "<?php echo esc_html($s); ?>"</h1>
        <?php get_search_form(array(
            "echo" => true,
            "aria_label" => 'Search news',
            "post_type" => $post_type
        )); ?>
    </div>
    <?php
    //if there isn't post show 
    if (!$last_post) : ?>
    <div class="news__nopost">
        <h3>No results were found.</h3>
    </div>
    <?php else : ?>

    <?php

        /** news post list with pagination */
        echo get_template_part('template-parts/posts/posts', "news-list", ['args' => $args_recenpost]);
        ?>

    <?php endif; ?>
</main>
<?php get_footer(); ?>