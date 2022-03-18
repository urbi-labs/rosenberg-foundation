<?php

$twitter_url = get_field('twitter', 'option');
$facebook_url = get_field('facebook', 'option');
$youtube_url = get_field('youtube', 'option');
?>
<ul class="menu-social-icons">

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