<?php
$image = wp_get_attachment_image_srcset(get_post_thumbnail_id(get_the_ID()));
$placeholder = get_template_directory_uri() . '/images/placeholder-80.jpg';
$role = get_field('role', get_the_ID());

?>
<div class="person-profile">
    <div class="person-profile__header">
        <div class="person-profile__featured-image">
            <img <?php echo $image ? "srcset='" . $image . "'" : "src='" . $placeholder . "'"   ?>
                alt="<?php echo esc_html(get_the_title()); ?>" class="">
        </div>
        <div class="person-profile__title">

            <div class="title__container">

                <span class="h2 title__blue-bg"><?php the_title(); ?>

                </span><br />
                <?php
                if ($role) : ?>
                <span class="h4 title__blue-bg"><?php echo $role; ?> </span>
                <?php endif;
                ?>
            </div>

        </div>
    </div>
    <div class="person-profile__content">

        <?php the_content() ?>

    </div>
</div>