<?php

/**
 * post list
 * it receives an array with args to search posts
 */
$placeholder = get_template_directory_uri() . '/images/placeholder-80.jpg';

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$default_args = array(
    'orderby' => 'date',
    'order' => 'desc',
    'paged' => $paged,
    'post_type' => 'post'

);
$posts_args = isset($args['args']) && is_array($args['args']) ? array_merge($default_args, $args['args']) : $default_args;

$posts = new WP_Query($posts_args);
?>

<?php if ($posts->have_posts()) : ?>
<div class="news__list">
    <?php

        while ($posts->have_posts()) :
            $posts->the_post();
            $image = wp_get_attachment_image_srcset(get_post_thumbnail_id($posts->post->ID));

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
                <?php echo intval($average_grant) !== 0 ? '$' : '' ?>
                <?php echo intval($average_grant) !== 0 ? number_format(intval($average_grant)) : $average_grant; ?>
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
    <?php else : ?>
    <div class="news__nopost">
        <h3>No results were found.</h3>
    </div>
</div><?php endif; ?>

<?php wp_reset_postdata(); ?>

</div>

<?php $max_num_pages = $posts->max_num_pages;


if ($max_num_pages > 1) :

?>
<div class="news-pagination-dk">
    <?php news_pagination($max_num_pages, $paged == 0 ? 1 : $paged, $posts->found_posts);;
        ?>
</div>
<div class="news-pagination-mb">
    <?php news_pagination($max_num_pages, $paged == 0 ? 1 : $paged, $posts->found_posts, 2, false);;
        ?>
</div>

<?php endif; ?>