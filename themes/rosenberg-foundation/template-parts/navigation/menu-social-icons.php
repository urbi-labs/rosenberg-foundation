<?php

$social_profiles = $args['social_profiles'];
$color = isset($args['color']) ? "white" : "black";
?>

<?php if(array_filter($social_profiles)) : ?>
<ul class="menu-social-icons">
    <?php
    if ($social_profiles['facebook']) { ?>
    <li>
        <a href="<?php echo esc_url($social_profiles['facebook']); ?>" target="_blank">
            <img
            class="menu-social-icons__icon"
            src="<?php echo get_template_directory_uri()  ?>/images/social-icons/facebook-container<?php echo $color == "white" ? "-white" : "" ?>.svg"
            />
        </a>
    </li>

    <?php    }
    ?>
    <?php
    if ($social_profiles['twitter']) { ?>

    <li>
        <a href="<?php echo esc_url($social_profiles['twitter']); ?>" target="_blank">
            <img
            class="menu-social-icons__icon"
            src="<?php echo get_template_directory_uri()  ?>/images/social-icons/twitter-container<?php echo  $color == "white" ? "-white" : "" ?>.svg"
            />
        </a>
    </li>
    <?php    }
    ?>
    <?php
    if ($social_profiles['youtube']) { ?>

    <li>
        <a href="<?php echo esc_url($social_profiles['youtube']) ?>" target="_blank">
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