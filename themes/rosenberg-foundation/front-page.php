<?php
/*
Template Name: Home
*/
get_header(); ?>
<main class="page__home ">
    <?php // get_template_part('template-parts/blocks/block', 'internal-intro-section'); ?>
    <?php get_template_part('template-parts/blocks/block', 'hero-home'); ?>
    <div class="container">
        <?php the_content() ?>
    </div>
</main>
<?php get_footer(); ?>