<?php

$placeholder = get_template_directory_uri() . '/images/placeholder-80.jpg';

$args_recenpost = array(
    'orderby' => 'date',
    'order' => 'desc',
    'posts_per_page' => 3,
    'post_type' => get_field('select_post_type')
);

$posts = new WP_Query($args_recenpost);

?>

<div class="news__list">
    <?php
    while ($posts->have_posts()) :
        $posts->the_post();
        $image = get_the_post_thumbnail_url($posts->post->ID, 'medium');

        $excerpt =  get_the_excerpt($posts->post->ID) ? get_the_excerpt($posts->post->ID) : substr(get_the_content(null, null, $posts->post->ID), 0, 200);
        $excerpt  = wp_strip_all_tags($excerpt);
        $average_grant = get_field('average_grant', $posts->post->ID);




    ?>
    <div class="card new__list__item">
        <div class="card__post-featured-image news__featured-image">
            <a href="<?php the_permalink(); ?>">
                <img <?php echo $image ? "srcset='" . $image . "'" : "src='" . $placeholder . "'"   ?>
                    alt="<?php echo get_the_title($posts->post->ID); ?>"
                    class="<?php echo !$image ? "news__placeholder" : "" ?>">
            </a>
        </div>
        <div class="news__item__content">
            <?php
                if ($average_grant) : ?>
            <div class="card__post-categories grantees__item__average">
                $<?php echo number_format(intval($average_grant)); ?>
            </div>
            <?php endif;
                ?>

            <div class="card__post-title grantees__item__title">
                <a class="h5 new__title" href="<?php echo get_the_permalink() ?>"><?php echo get_the_title() ?></a>
            </div>

            <div class="card__post-excerpt">
                <?php echo $excerpt; ?>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
</div>