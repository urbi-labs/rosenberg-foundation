<?php
$title = get_field('title');
$button_text = get_field('button_text');
$button_link  = get_field('button_link');

/** get person custom post type */
$people = get_posts(array(
    'numberposts' => -1,
    'post_type' => 'person',
    'order' => 'ASC',
    'orderby' => 'ID'
));

?>
<?php
if ($people) { ?>
<div class="people-block">
    <?php
        if ($title) { ?>
    <h2 class="h2 people-block__title"><?php echo $title; ?></h2>
    <?php    }
        ?>
    <div class="people-block__list">
        <?php
            foreach ($people as $person) {
                $image = get_field('image', $person->ID);
                $position = get_field('position', $person->ID);

            ?>
        <div class="people-block__item">
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_html($person->post_title); ?>"
                class="people-block__item__image" />
            <h5 class="h5 people-block__item__name">
                <?php echo esc_html($person->post_title); ?></h5>
            <p class="people-block__item__position"><?php echo $position; ?></p>
        </div>
        <?php    }
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
<?php    }
?>