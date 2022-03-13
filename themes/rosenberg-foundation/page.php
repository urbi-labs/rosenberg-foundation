<?php get_header(); ?>
<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
<main class="page__default">
    <h1 class="accessible-text"><?php the_title(); ?></h1>
    <div class="container">
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
    </div>
</main>
<?php endwhile; ?>
<?php get_footer(); ?>
