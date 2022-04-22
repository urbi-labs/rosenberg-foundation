<?php
$title = get_field('title_leadingedgefund', 'option');
$text = get_field('text_leadingedgefund', 'option');
$image = get_field('image_leadingedgefund', 'option');
$button = get_field('button_leadingedgefund', 'option');


?>

<div class="block-leadingedgefund" id="block-leadingedgefund">
    <div class="block-leadingedgefund__content">
        <?php
        if ($title) : ?>
        <div class="block-leadingedgefund__title">
            <h2><?php echo $title; ?></h2>
        </div>
        <?php endif;
        ?>
        <?php
        if ($text) : ?>
        <div class="block-leadingedgefund__text">
            <?php echo $text; ?>
        </div>
        <?php endif;
        ?>
        <?php
        if ($button) : ?>
        <div class="block-leadingedgefund__button">
            <div class="wp-block-button is-style-outline">
                <a class="wp-block-button__link" href="<?php echo $button['button_link_leadingedgefund'] ?>">
                    <?php echo $button['button_text_leadingedgefund'] ?>
                </a>

            </div>
        </div>
        <?php endif; ?>

    </div>
    <?php if ($image) : ?>
    <div class="block-leadingedgefund__image">
        <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>" />
    </div>
    <?php endif; ?>
    <button class="close_leadingedgefund">
        <img src="<?php echo get_template_directory_uri()  ?>/images/icons/icon-close-fill-black.svg" />
    </button>
</div>