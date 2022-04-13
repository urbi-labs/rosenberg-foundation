<?php

$image = wp_get_attachment_image_srcset(get_field('image'));
$image_placement = get_field('image_placement');
$vertical_alignment = get_field('vertical_alignment');
$title = get_field('title');
$body = get_field('body');
$link_text = get_field('link_text');
$link_url = get_field('link_url');
$link_url = $link_url['url'];

?>

<div class="divider-image-text__container <?php echo $vertical_alignment ?>">

	<div class="divider-image-text__container__inner container">

		<?php if($image_placement === 'left') : ?>
			<img class="divider-image-text__image <?php echo $vertical_alignment ?>" src="<?php echo get_stylesheet_directory_uri() . '/images/our-history-1.png' ?>"/>
		<?php endif; ?>
		
		<div class="divider-image-text__text">

			<h2 class="divider-image-text__title"><?php echo $title ?></h2>
			<div class="divider-image-text__content"><?php echo $body ?></div>
			<a class="styled-link" href="<?php echo $link_url ?>"><?php echo $link_text ?></a>
			
		</div>

		<?php if($image_placement === 'right') : ?>
			<img class="divider-image-text__image <?php echo $vertical_alignment ?>" src="<?php echo get_stylesheet_directory_uri() . '/images/our-history-1.png' ?>"/>
		<?php endif; ?>

	</div>

</div>