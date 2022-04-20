<?php get_header();
$placeholder = get_template_directory_uri() . '/images/placeholder-80.jpg';

?>


<main class="single__post new-post">
    <div class="container">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php
                $image = wp_get_attachment_image_srcset(get_post_thumbnail_id(get_the_ID()));

                ?>
        <?php $do_not_duplicate[] = $post->ID; ?>
        <?php if (has_post_thumbnail()) : ?>
        <div class="new-post__img-container">
            <img <?php echo $image ? "srcset='" . $image . "'" : "src='" . $placeholder . "'"   ?>
                alt="<?php echo get_the_title(); ?>" class="<?php echo !$image ? "news__placeholder" : "" ?>">
        </div>
        <section class="new-post--container">
            <article class="post">

                <div class="new-post__categories new__item__categories">
                    <ul>
                        <?php
                                    $categories = get_the_category();
                                    foreach ($categories as $category) :
                                    ?>
                        <li>
                            <a href="<?php echo get_category_link($category->term_id); ?>">
                                <?php echo $category->name; ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
                <h1 class="h2 new-post__title"><?php the_title(); ?></h1>
                <hr />
                <div class="new-post__subtitle">
                    <div class="new-post__date">
                        <?php echo get_the_author_meta('nickname') ?>
                        &#183;
                        <?php echo get_the_date("F d, Y") ?>
                    </div>
                    <div class="new-post__share">
                        Share:
                        <a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink() ?>"
                            target="_blank"> <img
                                src="<?php echo get_template_directory_uri() ?>/images/social-icons/facebook-container.svg" /></a>
                        <a href="http://twitter.com/intent/tweet?status=<?php echo rawurlencode(get_the_title()) ?>+<?php echo get_the_permalink() ?>"
                            target="_blank"> <img
                                src="<?php echo get_template_directory_uri() ?>/images/social-icons/twitter-container.svg" /></a>
                    </div>
                </div>
                <div class="clearfix">
                    <div class="entry-content"><?php the_content(); ?></div>
                </div>
                <hr />
            </article>
            <?php wp_reset_query(); ?>
        </section>
        <?php endwhile;
        endif; ?>
    </div>
</main>

<?php get_footer(); ?>