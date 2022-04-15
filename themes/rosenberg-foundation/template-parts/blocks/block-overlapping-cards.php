<?php

$image = get_field('image');
$image_right = get_field('image_alignment') === 'right';
$is_expandable = get_field('is_expandable');
$title = get_field('title');
$body = get_field('body');
$link = get_field('link');

?>

<div class="overlapping-cards__container card-link <?php echo $image_right ? 'image-right' : '' ?> <?php echo $is_expandable ? 'is-expandable' : '' ?>">
    <div class="overlapping-cards__image card-link-image">
        <img srcset="<?php echo wp_get_attachment_image_srcset($image) ?>" class="overlapping-cards__image__image">
    </div>
    <div class="overlapping-cards__text <?php echo $image_right ? 'image-right' : '' ?>">
        <h3 class="overlapping-cards__text-heading"><?php echo $title ?></h3>
        <?php if(!empty($body)) : ?>
        <div class="overlapping-cards__text-excerpt">
            <?php echo $body ?>
        </div>
        <?php endif; ?>
        <?php if(!empty($link)) : ?>
        <p class="overlapping-cards__read-more-link__container">
            <a href="<?php echo get_the_permalink($link) ?>" class="overlapping-cards__read-more-link <?php echo $is_expandable ? 'read-more__expand' : '' ?>">
                <?php if( $is_expandable ) : ?>
                Learn more
                <?php else : ?>
                Read more
                <?php endif; ?>
            </a>
        </p>
        <?php endif; ?>
    </div>
</div>
