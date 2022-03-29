
<!-- <div class="main">

	<div class="card__container">

		<div class="card__post-featured-image" style="background-image: url(<?php echo get_stylesheet_directory_uri() . '/images/post-image.png' ?>)"></div>
		
		<div class="card__post-content">
			<p class="card__post-categories">Press Releases</p>
			
			<p class="card__post-title">$30 Million Public-Private Partnership Launched to Support Returning Citizens, as California Urgently Reduces Prison Populations to Curb Impact of COVID-19</p>

			<p class="card__post-data">
				<span class="card__post-author">Max Waters</span>・<span class="card__post-date-publish">December 7, 2020</span>
			</p>

			<div class="card__post-excerpt">
				Id interdum velit laoreet id donec ultrices tincidunt arcu. Sit amet cursus sit amet dictum. Sem et tortor consequat id porta nibh venenatis cras.
			</div>
		</div>
	</div>

</div> -->

<?php 
$posts = get_posts( array( 'posts_per_page' => 5 ) );

foreach ( $posts as $the_post ):?>

	<div class="card__container">

		<?php if (has_post_thumbnail($the_post->ID)) : ?>

			<div class="card__post-featured-image" style="background-image: url('<?php echo get_the_post_thumbnail_url($the_post->ID)?>')"></div>

		<?php endif; ?>
		
		<div class="card__post-content">

			<?php
			
				$allcategories = wp_get_post_categories( $the_post->ID );
				$categories = [];

				foreach ( $allcategories as $cat_id ) {
					array_push($categories, get_cat_name( $cat_id ));
				}

				$count_cat = count($categories);
			?>

			<?php if($count_cat > 1): ?>

				<div class="card__post-categories">
					<?php foreach ($categories as $category) :?>
						<?php echo $category ?> ・
					<?php endforeach; ?>
				</div>

			<?php elseif ($count_cat === 1) : ?>

				<div class="card__post-categories">
					<?php echo $categories[0]; ?>
				</div>

			<?php endif; ?>
			
			<p class="card__post-title"> <?php echo get_the_title($the_post->ID) ?> </p>

			<p class="card__post-data">
				<?php $author_id=$the_post->post_author;?>
				<span class="card__post-author"><?php echo get_the_author_meta( 'display_name', $author_id );?></span>・<span class="card__post-date-publish"><?php echo get_the_time( 'F j, Y', $the_post->ID );?></span>
			</p>

			<div class="card__post-excerpt">
				Id interdum velit laoreet id donec ultrices tincidunt arcu. Sit amet cursus sit amet dictum. Sem et tortor consequat id porta nibh venenatis cras.
			</div>

		</div>

	</div>

<?php endforeach;?>