<div class="contact-page__container">

	<div class="contact-page__map">
		<?php echo get_field('map_embed_code') ?>
		<p>
			<a href="mailto:<?php echo get_field('contact_email', 'option') ?>" class="styled-link styled-link__black email-button-copy">
				<?php echo get_field('contact_email', 'option') ?>
			</a>
		</p>
	</div>
	<div class="contact-page__form">

		<div class="contact-page__form-title">
			<div class="contact-page__form-title-text">
				<?php echo get_field('form_title') ?>
			</div>
		</div>
		<div class="contact-page__contact-form">
			<?php echo do_shortcode( get_field('cf7_shortcode') ); ?>
		</div>

	</div>

</div>