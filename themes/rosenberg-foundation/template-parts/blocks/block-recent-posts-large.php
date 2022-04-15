<?php

/** Get person custom post type */
$args = array(
    'post_type' => 'post'
);

$people = new WP_Query($args);
$index = 0;
?>

<?php if ($people->have_posts()) : while ($people->have_posts()) : $people->the_post() ?>

        <?php

        $image_right = $index % 2 === 0;

        ?>

        <div class="overlapping-cards__container card-link <?php echo $image_right ? 'image-right' : '' ?> block-recent-posts-large">

            <div class="overlapping-cards__image card-link-image">
                <img srcset="<?php echo wp_get_attachment_image_srcset(get_post_thumbnail_id(get_the_ID())) ?>" class="overlapping-cards__image__image">
            </div>

            <div class="overlapping-cards__text <?php echo $image_right ? 'image-right' : '' ?>">

                <h3 class="overlapping-cards__text-heading">
                    <a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title() ?></a>
                </h3>

                <p class="block-recent-posts-large__position">
                    <?php echo get_field('role', get_the_ID()) ?>
                </p>

                <p class="overlapping-cards__read-more-link__container">
                    <a href="<?php echo get_the_permalink() ?>" class="overlapping-cards__read-more-link">
                        Read more
                    </a>
                </p>

            </div>
        </div>

<?php
        $index++;
    endwhile;
endif;
?>