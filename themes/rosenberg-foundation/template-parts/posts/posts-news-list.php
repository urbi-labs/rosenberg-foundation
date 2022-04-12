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


<div class="news__list">
    <?php
    while ($posts->have_posts()) :
        $posts->the_post();
        $image = get_the_post_thumbnail_url($posts->post->ID, 'medium');

        $excerpt =  get_the_excerpt($posts->post->ID) ? get_the_excerpt($posts->post->ID) : substr(get_the_content(null, null, $posts->post->ID), 0, 200);
        $excerpt  = wp_strip_all_tags($excerpt);
        $new_categories = wp_get_post_categories($posts->post->ID);
        $author = get_the_author_meta("first_name") . " " .  get_the_author_meta("last_name");
        if ($author) {
            $author =  get_the_author_meta("display_name");
        }




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
            <div class="card__post-categories new__item__categories">
                <?php
                    if ($new_categories) : ?>
                <ul>
                    <?php
                            foreach ($new_categories as $category_id) :
                                $category = get_category($category_id);
                            ?>

                    <li class=" ">
                        <a href="<?php echo get_category_link($category) ?>">
                            <?php echo $category->name; ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif;

                    ?>
            </div>

            <div class="card__post-title">
                <a class="h4 new__title" href="<?php echo get_the_permalink() ?>"><?php echo get_the_title() ?></a>
            </div>
            <div class="card__post-data">
                <?php echo $author ?>
                &#183;
                <?php echo get_the_date("F d, Y") ?>
            </div>
            <div class="card__post-excerpt">
                <?php echo $excerpt; ?>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
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

<?php wp_reset_postdata();  ?>

</div>