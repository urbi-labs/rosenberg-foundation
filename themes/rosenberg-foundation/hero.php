<?php
/*
Template Name: Hero
*/
get_header();
?>

<main class="page__default">
    <h1 class="accessible-text"><?php the_title(); ?></h1>
    <div class="container">
        <div class="entry-content">
            <?php echo get_template_part('template-parts/blocks/block-rosenberg-hero-home') ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
