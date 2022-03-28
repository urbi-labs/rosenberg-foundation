<?php
$title = get_field('title');
$button_text = get_field('button_text');
$button_link  = get_field('button_link');
?>
<div class="people-block">
    <?php
    if ($title) { ?>
    <h2 class="h2 people-block__title"><?php echo $title; ?></h2>
    <?php    }
    ?>
    <div class="people-block__list">
        <?php
        $i = 0;
        while ($i < 4) { ?>
        <div class="people-block__item">
            <img src="<?php echo get_template_directory_uri() . "/images/timothy1.jpg" ?>" alt=""
                class="people-block__item__image" />
            <h5 class="h5 people-block__item__name">
                Timothy P. Silard</h5>
            <p class="people-block__item__position">President</p>
        </div>
        <?php $i++;
        }
        ?>
    </div>
    <?php
    if ($button_text && $button_link) { ?>
    <div class="people-block__button__container">
        <a href="<?php echo $button_link ?>" class="btn btn--blue btn--secondary  people-block__button">
            <?php echo $button_text ?><img
                src="<?php echo get_template_directory_uri() . "/images/icons/icon-arrow-right-small-fill-blue.svg" ?>" />
        </a>
    </div>
    <?php    }
    ?>

</div>