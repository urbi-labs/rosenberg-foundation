<?php get_header();
global $paged; ?>
<main class="blog__page">
    <div class="container">
        <?php if(have_posts()) : ?>
        <div class="posts">
            <?php while(have_posts()) : the_post(); ?>
            <?php $post_excerpt = get_field('post_excerpt'); ?>
            <article class="post">
                <?php if( has_post_thumbnail() ) : ?>
                <div class="post__img-container">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail(); ?>
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
        </div>
        <?php endif; ?>

        <?php $max_num_pages = $wp_query->max_num_pages;
        if ($max_num_pages > 1): ?>
        <?php user_pagination($max_num_pages, $wp_query->found_posts, $paged == 0 ? 1 : $paged); ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
    </div>
</main>
<?php get_footer(); ?>
