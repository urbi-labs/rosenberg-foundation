<?php
global $post;
/*
Template Name: News
*/
get_header();

$post_slug = $post->post_name;
$args_hero_post = array('numberposts' => '1');
$last_post = wp_get_recent_posts($args_hero_post, 1);


$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args_recenpost = array(
    'orderby' => 'date',
    'order' => 'desc',
    'paged' => $paged

);


?>
<main class="page__news container">

    <div class="page__news__header">
        <h1><?php the_title(); ?></h1>
        <?php get_search_form(array(
            "echo" => true,
            "aria_label" => 'Search news'
        )); ?>
    </div>
    <?php
    //if there isn't post show 
    if (!$last_post) : ?>
    <div class="news__nopost">
        <h3>No results were found.</h3>
    </div>
    <?php else : ?>

    <?php

        if ($categories) : ?>
    <div class="news__list-categories">
        <ul class="news__list-categories__list">
            <li class="news__list-categories__list__item news__list-categories__list__item--active">
                <a href="<?php get_the_permalink($post->ID); ?>">All</a>
            </li>
            <?php
                    foreach ($categories as $category) :

                        ?>
            <li class="news__list-categories__list__item ">
                <a href="<?php echo get_category_link($category) ?>">
                    <?php echo $category->name; ?>
                </a>
            </li>
            <?php endforeach ?>
        </ul>
    </div>
    <?php
                ?>
    <?php endif
            ?>

    <div class="news__list">
        <?php
            while ($recent_posts->have_posts()) :
                $recent_posts->the_post();
                $image =  wp_get_attachment_image_srcset(get_post_thumbnail_id($recent_posts->post->ID));
            ?>
        <div class="news__list">
            <?php
                    while ($recent_posts->have_posts()) :
                        $recent_posts->the_post();
                        $image = get_the_post_thumbnail_url($recent_posts->post->ID, 'medium');

                        $excerpt =  get_the_excerpt($recent_posts->post->ID) ? get_the_excerpt($recent_posts->post->ID) : substr(get_the_content(null, null, $recent_posts->post->ID), 0, 200);
                        $excerpt  = wp_strip_all_tags($excerpt);
                        $new_categories = wp_get_post_categories($recent_posts->post->ID);
                        $author = get_the_author_meta("first_name") . " " .  get_the_author_meta("last_name");
                        if ($author) {
                            $author =  get_the_author_meta("display_name");
                        }

    <?php
        /* choice last post as hero post */
        echo get_template_part('template-parts/posts/post', "hero", array('hero_post' => $last_post[0]));

        /* category list from posts*/
        echo get_template_part('template-parts/posts/posts', 'categories');

        /** news post list with pagination */
        echo get_template_part('template-parts/posts/posts', "news-list", ['args' => $args_recenpost]);


                    ?>
            <div class="card new__list__item">
                <div class="card__post-featured-image news__featured-image">
                    <a href="<?php the_permalink(); ?>">
                        <img <?php echo $image ? "srcset='" . $image . "'" : "src='" . $placeholder . "'"   ?>
                            alt="<?php echo get_the_title($recent_posts->post->ID); ?>"
                            class="<?php echo !$image ? "news__placeholder" : "" ?>">
                    </a>
                </div>
                <div class="news__item__content">
                    <div class="card__post-categories new__item__categories">
                        <?php
                                    if ($new_categories) : ?>
                        <ul>
                            <?ph

            <div class="card new__list__item">
                <div class="card__post-featured-image news__featured-image">
                    <a href="<?php the_permalink(); ?>">
                            <img <?php echo $image ? "srcset='" . $image . "'" : "src='" . $placeholder . "'"   ?>
                                alt="<?php echo get_the_title($recent_posts->post->ID); ?>"
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
                                <<<<<<< HEAD=======foreach ($new_categories as $category_id) :
                                    $category=get_category($category_id); ?>
                                    >>>>>>> add template part hero, last post is an object.

                                    <li class=" ">
                                        <a href="<?php echo get_category_link($category) ?>">
                                            <?php echo $category->name; ?>
                                        </a>
                                    </li>
                                    <?php endforeach; ?>
                            </ul>
                            <?php endif;

<<<<<<< HEAD
                            ?>
                        </div>
                        <div class="card__post-title">
                            <a class="h4 new__title"
                                href="<?php echo get_the_permalink() ?>"><?php echo get_the_title() ?></a>
                        </div>
                        <div class="card__post-data">
                            <?php echo $author ?>
                            &#183;
                            <?php echo get_the_date("F d, Y") ?>
                        </div>
                        <div class="card__post-excerpt">
                            <?php echo $excerpt; ?>
                        </div>
                        =======
                        ?>
                    </div>
                    <div class="card__post-data">
                        <?php echo $author ?>
                        &#183;
                        <?php echo get_the_date("F d, Y") ?>
                    </div>
                    <div class="card__post-title">
                        <a class="h4 new__title"
                            href="<?php echo get_the_permalink() ?>"><?php echo get_the_title() ?></a>
                    </div>

                    <div class="card__post-excerpt">
                        <?php echo $excerpt; ?>
                        >>>>>>> add template part hero, last post is an object.
                    </div>
                </div>

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
            <div class="card__post-data">
                <?php echo $author ?>
                &#183;
                <?php echo get_the_date("F d, Y") ?>
            </div>
            <div class="card__post-title">
                <a class="h4 new__title" href="<?php echo get_the_permalink() ?>"><?php echo get_the_title() ?></a>
            </div>

            <div class="card__post-excerpt">
                <?php echo $excerpt; ?>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
    <?php $max_num_pages = $recent_posts->max_num_pages;


        if ($max_num_pages > 1) :

            $big = 999999999; // need an unlikely integer
            $pages =  paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, $paged),
                'total' => $max_num_pages,
                'end_size' => 2,
                'start_size' => 1,
                'prev_text' => '',
                'next_text' => '',
                'add_args' => false,
                'type' => 'array'
            ));
>>>>>>> add template part hero, last post is an object.
        ?>

    <div class="news_pagination">
        <?php // news_pagination($max_num_pages, $recent_posts->found_posts, $paged == 0 ? 1 : $paged);; 
                ?>
        <<<<<<< HEAD </div>
            <div class="news__pagination">
                =======
            </div>
            <div class="news__pagination">

                <<<<<<< HEAD
                    <?php user_pagination($max_num_pages, $recent_posts->found_posts, $paged == 0 ? 1 : $paged); ?>
                    </div>



                    <?php endif; ?>

                    <?php wp_reset_postdata();  ?>
                    <?php endif; ?>
            </div>
            >>>>>>> add template part hero, last post is an object.


            <<<<<<< HEAD <?php endif; ?>==============<?php endif; ?> <?php wp_reset_postdata();  ?> <?php endif; ?>
                </div>
                >>>>>>> add template part hero, last post is an object.
                >>>>>>> add template part hero, last post is an object.
                =======

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

        /* choice last post as hero post */
        echo get_template_part('template-parts/posts/post', "hero", array('hero_post' => $last_post[0]));

        /* category list from posts*/
        echo get_template_part('template-parts/posts/posts', 'categories');

        /** news post list with pagination */
        echo get_template_part('template-parts/posts/posts', "news-list", ['args' => $args_recenpost]);
        ?>

                <div class="news_pagination">
                    <?php // news_pagination($max_num_pages, $recent_posts->found_posts, $paged == 0 ? 1 : $paged);; 
                ?>
                </div>
                <div class="news__pagination">


                    <?php user_pagination($max_num_pages, $recent_posts->found_posts, $paged == 0 ? 1 : $paged); ?>
                </div>



                <?php endif; ?>

                <?php wp_reset_postdata();  ?>
                <?php endif; ?>
    </div>

    <?php endif; ?>
    </div>


    <?php endif; ?>
    >>>>>>> use get template parts for modules
</main>
<?php get_footer(); ?>