<?php

/** feature slider block has javascript file
 * 
 */
$slider = get_field('slider');
//var_dump($slider);

?>
<?php if ($slider && !empty($slider)) : ?>
<div class="feature-slider__container">
    <div class="feature-slider__image__container">
        <div class="feature-slider__image">
            <?php
                foreach ($slider as $slide) : ?>
            <div class="feature-slider__image__slide">
                <img src="<?php echo $slide['image']['url'] ?>" />
            </div>
            <?php endforeach;
                ?>

        </div>
        <button class="feature-slider__prev-arrow slick-prev" type="button">
            <img src="<?php echo get_template_directory_uri() ?>/images/icon-prev-fill.png" />
        </button>
        <button class="feature-slider__next-arrow slick-next" type="button">
            <img src="<?php echo get_template_directory_uri() ?>/images/icon-next-fill.png" />
        </button>
    </div>
    <div class="feature-slider__content__container">
        <?php
            foreach ($slider as $slide) : ?>
        <div class="feature-slider__content">
            <div class="title__orange-bg__container">
                <span class="h2 title__orange-bg "><?php echo $slide['title'] ?></span>
            </div>
            <div class="feature-slider_content__text">
                <?php echo $slide['text']; ?>
            </div>
        </div>
        <?php endforeach;
            ?>
    </div>


</div>
<?php endif; ?>