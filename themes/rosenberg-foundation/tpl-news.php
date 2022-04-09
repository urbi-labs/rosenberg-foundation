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

            <div class="news__last-post__container-text">
                <h3 class="h3"><?php echo esc_html($last_post[0]["post_title"]); ?></h3>
                <p>
                    <a href="<?php echo get_permalink($last_post[0]['ID']); ?>">Read more <img
                            src="<?php echo get_template_directory_uri() ?>/images/icons/icon-arrow-right-small-fill.svg"></a>
                </p>
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

            <div class="news_pagination">
                <?php // news_pagination($max_num_pages, $recent_posts->found_posts, $paged == 0 ? 1 : $paged);; 
                ?>
            </div>
            <div class="news__pagination">


                <?php endif; ?>
</main>
<?php get_footer(); ?>