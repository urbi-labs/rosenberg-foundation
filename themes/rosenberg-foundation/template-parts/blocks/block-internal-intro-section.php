<?php
$image = get_field('image');
$title = get_field('title');
$content = get_field('content');
?>

<?php
if ($image) { ?>
<div class="internal-intro-section">
    <div class="internal-intro-section__img">
        <img src="<?php echo esc_url($image['url'])  ?>" alt="<?php echo $title; ?>" />
    </div>
    <div class="internal-intro-section__content">
        <?php
            if ($title) { ?>
        <div class="title__orange-bg">
            <h2><span><?php echo $title ?></span>
            </h2>
        </div>
        <?php    }
            ?>
        <?php
            if ($content) { ?>
        <div class="text__gray-bg">
            <?php echo $content; ?>
        </div>
        <?php    }
            ?>
    </div>
</div>
<?php    }
?>