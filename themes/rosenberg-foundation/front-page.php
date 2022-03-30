<?php
/*
Template Name: Home
*/
get_header(); ?>
<main class="page__home ">
    <?php get_template_part('template-parts/blocks/block', 'hero-home'); ?>
    <div class="container">
        <?php get_template_part('template-parts/blocks/block', 'latest-posts'); ?>
        <?php the_content() ?>
        <?php get_template_part('template-parts/blocks/block', 'feature-slider'); ?>
    </div>


</main>
<?php get_footer(); ?>