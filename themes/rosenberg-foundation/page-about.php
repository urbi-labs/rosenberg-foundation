<?php
/*
Template Name: About
*/
get_header();
?>
<main class="page__about">
    <h1 class="accessible-text"><?php the_title(); ?></h1>
    <div class="container">
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>
