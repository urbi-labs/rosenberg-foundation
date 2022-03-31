<?php

/** feature slider block has javascript file
 * 
 */
$slider = get_field('slider');
//var_dump($slider);

?>
<?php if ($slider && !empty($slider)) : ?>
<div class="feature-slider__container">
    <div class="feature-slider">

        <?php
            foreach ($slider as $slide) :
                $image = $slide['image'];

            ?>
        <div class="feature-slider__slide">
            <div class="features-slider__slide__image">
                <img src="<?php echo esc_url($image['url']) ?>" alt="<?php esc_html($slide['title']) ?>" />
            </div>
            <div class="feature-slider__slide__content">
                <div class="feature-slider__slide__title">
                    <div class="title__orange-bg__container">
                        <span class="h2 title__orange-bg"> <?php echo esc_html($slide['title']); ?></span>
                    </div>

                </div>
                <div class="feature-slider__slide__text">
                    <?php
                            echo $slide['text'];
                            ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

    </div>
    <button class="feature-slider__prev-arrow slick-prev" type="button">
        <img src="<?php echo get_template_directory_uri() ?>/images/icon-prev-fill.png">
    </button>
    <button class="feature-slider__next-arrow slick-next" type="button">
        <img src="<?php echo get_template_directory_uri() ?>/images/icon-next-fill.png">
    </button>
</div>
<?php endif; ?>