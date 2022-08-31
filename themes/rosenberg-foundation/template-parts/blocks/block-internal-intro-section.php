<?php
$image = get_field('image');
$title = get_field('title');
$content = get_field('content');
?>

<?php if ($image || $title || $content) : ?>
<div class="internal-intro-section">

    <?php if($image) : ?>
    <div class="internal-intro-section__img">
        <img src="<?php echo esc_url($image['url'])  ?>" alt="<?php echo $title; ?>" />
    </div>
    <?php endif; ?>

    <div class="internal-intro-section__content <?php echo $image ? 'internal-intro-section__content__has-image' : '' ?>">

        <?php if ($title) : ?>
        <div class="title__orange-bg__container">
            <span class="h2 title__orange-bg"><?php echo $title ?></span>
        </div>
        <?php endif; ?>

        <?php if ($content) : ?>
        <div class="text__gray-bg p-mid">
            <?php echo $content; ?>
        </div>
        <?php endif; ?>

    </div>

</div>
<?php endif; ?>