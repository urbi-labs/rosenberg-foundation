<?php

/**
 * The template for displaying posts in the hero post format
 * must to be a  WP_Post  object
 */

if (!empty($args) && isset($args['hero_post'])) :
    $hero_post = $args['hero_post'];

    $placeholder = get_template_directory_uri() . '/images/rosenberg-logo.svg';
    $image = wp_get_attachment_image_srcset(get_post_thumbnail_id($hero_post->ID));


?>

<div class="internal-intro-section news__last-post ">
    <div class="internal-intro-section__img news__last-post__img">
        <img <?php echo $image ? "srcset='" . $image . "'" : "src='" . $placeholder . "'"   ?>
            alt="<?php echo esc_html($hero_post->post_title) ?>" />
    </div>
    <div class="internal-intro-section__content news__last-post__content">

        <div class="news__last-post__container-text">
            <h3 class="h3"><?php echo esc_html($hero_post->post_title); ?></h3>
            <p>
                <a href="<?php echo get_permalink($hero_post->ID); ?>">Read more <img
                        src="<?php echo get_template_directory_uri() ?>/images/icon-arrow-right-small-fill.png"></a>
            </p>
        </div>


    </div>
</div>
<?php endif; ?>