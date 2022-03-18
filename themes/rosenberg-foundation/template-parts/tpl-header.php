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
        <ul class="header__social-icons">

            <?php
            if ($facebook_url) { ?>
            <li>
                <a href="<?php echo esc_url($facebook_url); ?>">
                    <img src="<?php echo get_template_directory_uri()  ?>/images/social-icons/facebook-container.svg" />
                </a>
            </li>

            <?php    }
            ?>
            <?php
            if ($twitter_url) { ?>

            <li>
                <a href="<?php echo esc_url($twitter_url); ?>">
                    <img src="<?php echo get_template_directory_uri()  ?>/images/social-icons/twitter-container.svg" />
                </a>
            </li>
            <?php    }
            ?>
            <?php
            if ($youtube_url) { ?>

            <li>
                <a href="<?php echo esc_url($youtube_url) ?>">
                    <img src="<?php echo get_template_directory_uri()  ?>/images/social-icons/youtube-container.svg" />
                </a>
            </li>
            <?php    }
            ?>

        </ul>
    </nav>
    <div class="header-navigation__mobile">
        <a href="" class="burguer-button">
            <img src="<?php echo get_template_directory_uri()  ?>/images/icons/icon-hamburguer-fill.svg" />
        </a>
    </div>
</div>