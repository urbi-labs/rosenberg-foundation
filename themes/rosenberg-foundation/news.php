<?php
global $post;
/*
Template Name: News
*/
get_header();

$post_slug = $post->post_name;
$args_last_post = array('numberposts' => '1');
$last_post = wp_get_recent_posts($args_last_post);
$categories = get_categories();

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
echo $paged;
$args_recenpost = array(
    'orderby' => 'date',
    'order' => 'desc',
    'posts_per_page' => 3,
    'paged' => $paged

);
$recent_posts = new WP_Query($args_recenpost);;



?>
<main class="page__news">

    <div class="container">
        <div class="page__news__header">
            <h1><?php the_title(); ?></h1>
            <?php get_search_form(array(
                "echo" => true,
                "aria_label" => 'Search news'
            )); ?>
        </div>
        <?php
        //if there isn't post show 
        if (!$recent_posts->have_posts()) : ?>
        <div class="news__nopost">
            <h3>No results were found.</h3>
        </div>
        <?php else : /* show last 12 post and last post like internal intro section */
            $image = wp_get_attachment_image_srcset(get_post_thumbnail_id($last_post[0]["ID"]));
        ?>
        <div class="internal-intro-section news__last-post ">
            <div class="internal-intro-section__img news__last-post__img">
                <img srcset="<?php echo $image  ?>" alt="<?php echo esc_html($last_post[0]["post_title"]) ?>" />
            </div>
            <div class="internal-intro-section__content news__last-post__content">

                <div class="news__last-post__container-text">
                    <h3 class="h3"><?php echo esc_html($last_post[0]["post_title"]); ?></h3>
                    <p>
                        <a href="<?php echo get_permalink($last_post[0]['ID']); ?>">Read more <img
                                src="<?php echo get_template_directory_uri() ?>/images/icons/icon-arrow-right-small-fill.svg"></a>
                    </p>
                </div>


            </div>
        </div>
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
                    $image = get_the_post_thumbnail_url($recent_posts->post->ID, 'medium');

                    $excerpt =  get_the_excerpt($recent_posts->post->ID) ? get_the_excerpt($recent_posts->post->ID) : substr($recent_posts->post->get_the_content(), 0, 200);
                    $excerpt  = wp_strip_all_tags($excerpt);
                    $new_categories = wp_get_post_categories($recent_posts->post->ID);
                    $author = get_the_author_meta("first_name") . " " .  get_the_author_meta("last_name");
                    if ($author) {
                        $author =  get_the_author_meta("display_name");
                    }

                ?>
            <div class="card new__list__item">
                <div class="card__post-featured-image" style="background-image:url('<?php echo $image; ?>')">

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
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <?php $max_num_pages = $recent_posts->max_num_pages;
            if ($max_num_pages > 1) : ?>
        <?php user_pagination($max_num_pages, $recent_posts->found_posts, $paged == 0 ? 1 : $paged); ?>

        <?php endif; ?>

        <?php wp_reset_postdata();  ?>
        <?php endif; ?>
    </div>
</main>
<?php get_footer(); ?>