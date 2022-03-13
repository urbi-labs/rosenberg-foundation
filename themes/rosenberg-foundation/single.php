<?php get_header(); ?>

<main class="single__post">
    <div class="container">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php $do_not_duplicate[] = $post->ID; ?>
            <section class="single__post--container">
                <article class="post">
                    <?php if( has_post_thumbnail() ) : ?>
                    <div class="post__img-container">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <?php endif; ?>
                    <h1 class="section-title"><?php the_title(); ?></h1>
                    <div class="clearfix">
                        <div class="entry-content"><?php the_content(); ?></div>
                    </div>
                </article>
                <?php wp_reset_query(); ?>
            </section>
        <?php endwhile; endif; ?>
    </div>
</main>

<?php get_footer(); ?>
