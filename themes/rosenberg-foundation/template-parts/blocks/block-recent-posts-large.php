<?php

$placeholder = get_template_directory_uri() . '/images/placeholder-80.jpg';

$args = array(
    'post_type' => 'post',
    'order' => 'DESC'
);

if(isset($max_posts)) {
    $args['posts_per_page'] = $max_posts;
} else {
    $args['posts_per_page'] = 4;
}

$people = new WP_Query($args);
$index = 0;
?>

<?php if ($people->have_posts()) : while ($people->have_posts()) : $people->the_post() ?>

        <?php

        $image_right = $index % 2 === 0;
        $thumbnail = wp_get_attachment_image_srcset(get_post_thumbnail_id(get_the_ID()));

        ?>

        <div class="overlapping-cards__container card-link <?php echo $image_right ? 'image-right' : '' ?> block-recent-posts-large">

            <div class="overlapping-cards__image card-link-image">
                <img srcset="<?php echo !empty($thumbnail) ? $thumbnail : $placeholder ?>" class="overlapping-cards__image__image">
            </div>

            <div class="overlapping-cards__text <?php echo $image_right ? 'image-right' : '' ?>">

                <h3 class="overlapping-cards__text-heading">
                    <a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title() ?></a>
                </h3>

                <p class="block-recent-posts-large__position">
                    <?php echo get_field('role', get_the_ID()) ?>
                </p>

                <p class="overlapping-cards__read-more-link__container">
                    <a href="<?php echo get_the_permalink() ?>" class="styled-link styled-link__black">
                        Read more
                    </a>
                </p>

            </div>
        </div>

<?php
        $index++;
    endwhile;
endif;
wp_reset_query();
?>