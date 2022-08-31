<?php

/** Get person custom post type */
$people = get_posts(array(
    'numberposts' => 4,
    'post_type' => 'person',
    'order' => 'ASC',
    'orderby' => 'ID'
));
?>

<?php if ($people) : ?>
<div class="people-block">

    <div class="people-block__list">

        <?php foreach ($people as $person) : ?>

        <?php
                $image = wp_get_attachment_image_srcset(get_post_thumbnail_id($person->ID));
                $position = get_field('role', $person->ID);
                ?>

        <div class="people-block__item">
            <a href="<?php echo get_the_permalink($person->ID) ?>"><img srcset="<?php echo $image ?>"
                    alt="<?php echo esc_html($person->post_title); ?>" class="people-block__item__image" /></a>
            <a href="<?php echo get_the_permalink($person->ID) ?>" class="h5 people-block__item__name">
                <?php echo esc_html($person->post_title); ?></a>
            <p class="people-block__item__position"><?php echo $position; ?></p>
        </div>
        <?php endforeach; ?>


    </div>

</div>
<?php endif; ?>