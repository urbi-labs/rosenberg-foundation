<?php

/** feature slider block has javascript file
 * 
 */


?>
<div class="feature-slider__container">
    <div class="feature-slider">

        <?php
        $i = 0;
        while ($i < 5) :
        ?>
        <div class="feature-slider__slide">
            <div class="features-slider__slide__image">
                <img src="<?php echo get_template_directory_uri() ?>/images/community-meeting-space-1.jpg">
            </div>
            <div class="feature-slider__slide__content">
                <div class="feature-slider__slide__title">
                    <div class="title__orange-bg__container">
                        <span class="h2 title__orange-bg"> Community Meeting
                            Space</span>
                    </div>

                </div>
                <div class="feature-slider__slide__text">
                    Donec massa sapien faucibus et molestie ac feugiat sed lectus. Egestas tellus rutrum tellus
                    pellentesque
                    eu tincidunt tortor. Tempor orci dapibus ultrices in iaculis nunc sed.
                    Vitae nunc sed velit dignissim sodales ut eu sem. Augue lacus viverra vitae congue eu consequat
                    Jonathan@Rosenfound.org tellus mauris a diam maecenas sed enim ut:
                    Venenatis tellus in metus
                    Egestas tellus rutrum tellus pellentesque
                    Tempor orci dapibus
                </div>
            </div>
        </div>
        <?php $i++;
        endwhile; ?>

    </div>
    <button class="feature-slider__prev-arrow slick-prev" type="button">
        <img src="<?php echo get_template_directory_uri() ?>/images/icon-prev-fill.png">
    </button>
    <button class="feature-slider__next-arrow slick-next" type="button">
        <img src="<?php echo get_template_directory_uri() ?>/images/icon-next-fill.png">
    </button>
</div>