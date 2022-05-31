<?php

$placeholder = get_template_directory_uri() . '/images/placeholder-80.jpg';


/** filter by slug category */
$slug = isset($_GET['category']) ? $_GET['category'] : "staff";

/** Get person custom post type */
$args = array(
    'post_type' => 'person',
    'tax_query' => array(
        array(
            'taxonomy' => 'person-category',
            'field'    => 'slug',
            'terms'    => $slug,
        ),
    ),
);

$people = new WP_Query($args);
$index = 0;
?>

<?php // echo get_template_part('template-parts/posts/posts', 'categories'); 
?>
<div>
    <?php echo get_template_part(
        'template-parts/posts/posts',
        'categories',
        array(
            'taxonomy' => 'person-category',
            'all' => false,

            'current_slug' => $slug
        )

    ); ?>
</div>
<?php

if ($people->have_posts()) : while ($people->have_posts()) : $people->the_post();
        $image_right = $index % 2 === 0;
        $img = wp_get_attachment_image_srcset(get_post_thumbnail_id(get_the_ID()));
        $img2 = "";
        if (!$img) {
            $img2 = get_the_post_thumbnail_url(get_the_ID());
        }

?>

<div class="overlapping-cards__container card-link <?php echo $image_right ? 'image-right' : '' ?> block-people-large">

    <div class="overlapping-cards__image card-link-image">
        <img <?php echo $img ? "srcset='" . $img . "'" : "" ?>
            <?php echo !$img  && $img2 ? "src='" . $img2 . "'" : "src='" . $placeholder . "'" ?>
            class="overlapping-cards__image__image">
    </div>
    <div class="overlapping-cards__text <?php echo $image_right ? 'image-right' : '' ?>">
        <h3 class="overlapping-cards__text-heading"><?php echo get_the_title() ?></h3>
        <p class="block-people-large__position"><?php echo get_field('role', get_the_ID()) ?></p>
        <?php if (!empty(get_the_excerpt())) : ?>
        <div class="block-people-large__excerpt">
            <?php echo get_the_excerpt() ?>
        </div>
        <?php endif; ?>
        <p class="overlapping-cards__read-more-link__container">
            <a href="<?php echo get_the_permalink() ?>" class="overlapping-cards__read-more-link">
                Read more
            </a>
        </p>
    </div>
</div>

<?php
        $index++;
    endwhile;
endif;
?>