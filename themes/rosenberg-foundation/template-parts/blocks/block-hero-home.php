<?php

$slides = get_field('hero_slides');

?>

<pre>
	<?php var_dump($slides) ?>
</pre>

<div class="hero-home__container">

	<div class="hero-home-slick">

		<?php foreach($slides as $slide) : ?>

		<div class="hero-home__slide" style="background-image: url(<?php echo $slide['background_image'] ?>)">

			<div class="container">
				<div class="hero-home__carousel-caption">

					<div class="hero-home__title">
						<span class="hero-home__title__content">
							<?php echo $slide['title'] ?>
						</span>
					</div>

					<div class="hero-home__call-to-action">
						<p class="hero-home__call-to-action-content">
							<?php echo $slide['description'] ?>
						</p>
						
						<a class="btn" href="<?php echo $slide['button_link'] ?>">
							<?php echo $slide['button_text'] ?>
						</a>
					</div>
					
				</div>
			</div>

		</div>

		<?php endforeach; ?>

	</div>

	<button class="hero-home__prev-arrow slick-prev" type="button">
		<span class="hero-home__carousel-control-prev-icon"></span>
	</button>
	<button class="hero-home__next-arrow slick-next" type="button">
		<span class="hero-home__carousel-control-next-icon"></span>
	</button>

</div>