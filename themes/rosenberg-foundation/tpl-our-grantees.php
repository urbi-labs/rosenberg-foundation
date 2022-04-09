<<<<<<< HEAD
<?php global $post; ?>
<?php
/*
Template Name: Our grantees
*/
?>
<?php get_header();

/**
 * get from news for test
 */

$args_recenpost = array(
    'orderby' => 'date',
    'order' => 'desc',
    'posts_per_page' => 6,
    'paged' => $paged

);
$recent_posts = new WP_Query($args_recenpost);
$placeholder = get_template_directory_uri() . '/images/rosenberg-logo.svg';
?>
<main class="our-grantees">
    <h1 class="our-grantees__title"><?php the_title(); ?></h1>
    <div class="container">
        <div class="entry-content">
            <?php // this  content cant be the_content(), now is harcode
            ?>
            <div class=" our-grantees__subtitle">

                <p class="has-text-align-center page__our-grantees__subtitle">Gravida neque convallis a cras. Sit
                    amet venenatis urna cursus eget nunc scelerisque. Tincidunt lobortis feugiat vivamus at augue
                    eget arcu. Nibh mauris cursus mattis molestie a iaculis. Porta lorem mollis aliquam ut porttitor
                    leo.</p>

            </div>

        </div>
        <div class="our-grantees__forms-container">
            <?php get_search_form(array(
                "echo" => true,
                "aria_label" => 'Search news'
            )); ?>
            <?php echo get_template_part("template-parts/forms/form", "filters") ?>
        </div>
        <div class="news__list">
            <?php
            while ($recent_posts->have_posts()) :
                $recent_posts->the_post();
                $image =  wp_get_attachment_image_srcset(get_post_thumbnail_id($recent_posts->post->ID));

                $excerpt =  get_the_excerpt($recent_posts->post->ID) ? get_the_excerpt($recent_posts->post->ID) : substr(get_the_content(null, null, $recent_posts->post->ID), 0, 200);
                $excerpt  = wp_strip_all_tags($excerpt);
                $new_categories = wp_get_post_categories($recent_posts->post->ID);
                $author = get_the_author_meta("first_name") . " " .  get_the_author_meta("last_name");
                if ($author) {
                    $author =  get_the_author_meta("display_name");
                }


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
                        <a class="h5 new__title"
                            href="<?php echo get_the_permalink() ?>"><?php echo get_the_title() ?></a>
                    </div>

                    <div class="card__post-excerpt">
                        <?php echo $excerpt; ?>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</main>

=======
<?php get_header(); ?>
<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
<main class="page__our-grantees">
    <h1 class="accessible-text"><?php the_title(); ?></h1>
    <div class="container">
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
    </div>
</main>
<?php endwhile; ?>
>>>>>>> init our-grantees template
<?php get_footer(); ?>