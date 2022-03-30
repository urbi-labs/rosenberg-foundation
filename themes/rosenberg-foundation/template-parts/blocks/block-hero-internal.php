<?php 

$bg_image = get_field('background_image');
$title = get_field('title');

?>

<div class="hero-internal__container" style="background-image:url('<?php echo wp_get_attachment_url($bg_image) ?>')">
    <h1 class="hero-internal__text">
        <?php echo $title ? $title : get_the_title() ?>
    </h1>
</div>