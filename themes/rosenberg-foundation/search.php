<?php
global $post;
/*
Template Name: News
*/
get_header();

$post_slug = $post->post_name;
$args_hero_post = array('numberposts' => '1');
$last_post = wp_get_recent_posts($args_hero_post, 1);


$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args_recenpost = array(
    'orderby' => 'date',
    'order' => 'desc',

    'paged' => $paged

);


?>
<main class="page__news container">

</main>
<?php get_footer(); ?>