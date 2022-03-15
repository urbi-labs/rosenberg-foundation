<?php get_header(); ?>
<main class="blog__page">
    <h1 class="accessible-text">Blog</h1>
    <div class="container">
        <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
        <?php $post_excerpt = get_field('post_excerpt'); ?>
        <article class="post">
            <?php if( has_post_thumbnail() ) : ?>
            <div class="post__img-container">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('post'); ?>
                </a>
            </div>
            <?php endif; ?>
            <h1 class="post__title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h1>
            <div class="entry-content"><?php the_excerpt(); ?></div>
            <a href="<?php the_permalink(); ?>" class="btn--link">Learn More</a>
        </article>
        <?php endwhile; ?>

        <?php $max_num_pages = $wp_query->max_num_pages;
        if ($max_num_pages > 1): ?>
        <?php user_pagination($max_num_pages, $wp_query->found_posts, $paged == 0 ? 1 : $paged); ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
    </div>
</main>
<?php get_footer(); ?>
