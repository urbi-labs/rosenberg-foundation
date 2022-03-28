<?php

$twitter_url = get_field('twitter', 'option');
$facebook_url = get_field('facebook', 'option');
$youtube_url = get_field('youtube', 'option');
?>

<div class="container header-container">
    <a href="<?php echo get_site_url() ?>">
        <img src="<?php echo get_template_directory_uri()  ?>/images/rosenberg-logo.svg"
            alt="<?php echo get_bloginfo('name') ?>" class="header__logo" />
        <img src="<?php echo get_template_directory_uri() ?>/images/rosenberg-logo-mobile.svg"
            alt="<?php echo get_bloginfo('name') ?>" class="header__logo--mobile" />
    </a>
    <nav class="header__navigation">
        <?php echo get_template_part('template-parts/navigation/menu', 'header') ?>
        <?php echo get_template_part('template-parts/navigation/menu', 'social-icons') ?>
    </nav>
    <div class="header-navigation__mobile">
        <a href="#" class="mobile__burger-button" id="">
            <img src="<?php echo get_template_directory_uri()  ?>/images/icons/icon-hamburguer-fill.svg" />
        </a>
        <?php echo get_template_part('template-parts/navigation/menu', 'mobile') ?>
    </div>

</div>