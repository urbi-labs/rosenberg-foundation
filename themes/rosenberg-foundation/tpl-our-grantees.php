<<<<<<< HEAD
<?php global $post; ?>
<?php
/*
Template Name: Our grantees
*/
?>
<?php get_header();

/**
 * get from news for test
 */


$post_slug = $post->post_name;
$args_hero_post = array('numberposts' => '1', 'post_type' => 'grantee');
$last_post = wp_get_recent_posts($args_hero_post, 1);


$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args_recenpost = array(
    'orderby' => 'date',
    'order' => 'desc',
    'post_type' => 'grantee',
    'paged' => $paged

);

$categories = get_categories(array('taxonomy' => 'grantee-category', 'hide_empty' => false));


?>
<main class="our-grantees">
    <h1 class="our-grantees__title"><?php the_title(); ?></h1>
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

=======
<?php get_header(); ?>
<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
<main class="page__our-grantees">
    <h1 class="accessible-text"><?php the_title(); ?></h1>
    <div class="container">
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
    </div>
</main>
<?php endwhile; ?>
>>>>>>> init our-grantees template
<?php get_footer(); ?>