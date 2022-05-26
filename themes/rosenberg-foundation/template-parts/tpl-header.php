<?php

// Social Profiles
$social_profiles = array(
    'twitter' => get_field('twitter', 'option'),
    'facebook' => get_field('facebook', 'option'),
    'youtube' => get_field('youtube', 'option')
);
?>

<div class="container header-container">
    <a href="<?php echo get_site_url() ?>" class="header__logo-container">
        <img src="<?php echo get_template_directory_uri()  ?>/images/rosenberg-logo.svg"
            alt="<?php echo get_bloginfo('name') ?>" class="header__logo" />
        <img src="<?php echo get_template_directory_uri() ?>/images/rosenberg-logo-mobile.svg"
            alt="<?php echo get_bloginfo('name') ?>" class="header__logo--mobile" />
    </a>
    <nav class="header__navigation">
        <?php echo get_template_part('template-parts/navigation/menu', 'header') ?>
        <?php if (array_filter($social_profiles)) : ?>
        <?php echo get_template_part('template-parts/navigation/menu', 'social-icons', array('social_profiles' => $social_profiles)) ?>
        <?php endif; ?>
    </nav>
    <div class="header-navigation__mobile">
        <a href="#" class="mobile__burger-button" id="">
            <img src="<?php echo get_template_directory_uri()  ?>/images/icons/icon-hamburguer-fill.svg" />
        </a>
        <?php echo get_template_part('template-parts/navigation/menu', 'mobile', array('social_profiles' => $social_profiles)) ?>
    </div>
    <?php echo get_template_part('template-parts/blocks/block', 'leading-edge-fund'); ?>
</div>