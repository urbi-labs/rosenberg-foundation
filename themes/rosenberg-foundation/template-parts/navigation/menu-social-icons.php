<?php

$social_profiles = $args['social_profiles'];
$twitter_url = get_field('twitter', 'option');
$facebook_url = get_field('facebook', 'option');
$youtube_url = get_field('youtube', 'option');
$color = isset($args['color']) ? "white" : "black";
?>

<?php if(array_filter($social_profiles)) : ?>
<ul class="menu-social-icons">
    <?php
    if ($facebook_url) { ?>
    <li>
        <a href="<?php echo esc_url($facebook_url); ?>" target="_blank">
            <img
            class="menu-social-icons__icon"
            src="<?php echo get_template_directory_uri()  ?>/images/social-icons/facebook-container<?php echo $color == "white" ? "-white" : "" ?>.svg"
            />
        </a>
    </li>

    <?php    }
    ?>
    <?php
    if ($twitter_url) { ?>

    <li>
        <a href="<?php echo esc_url($twitter_url); ?>" target="_blank">
            <img
            class="menu-social-icons__icon"
            src="<?php echo get_template_directory_uri()  ?>/images/social-icons/twitter-container<?php echo  $color == "white" ? "-white" : "" ?>.svg"
            />
        </a>
    </li>
    <?php    }
    ?>
    <?php
    if ($youtube_url) { ?>

    <li>
        <a href="<?php echo esc_url($youtube_url) ?>" target="_blank">
            <img
            class="menu-social-icons__icon"
            src="<?php echo get_template_directory_uri()  ?>/images/social-icons/youtube-container<?php echo $color == "white" ? "-white" : "" ?>.svg"
            />
        </a>
    </li>
    <?php    }
    ?>

</ul>
<?php endif; ?>