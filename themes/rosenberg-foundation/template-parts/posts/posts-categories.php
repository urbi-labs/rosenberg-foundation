<?php

$taxonomy = isset($args['taxonomy']) ? $args['taxonomy'] : 'category';
$categories = get_categories($taxonomy);
if ($categories) : ?>
<div class="news__list-categories">
    <ul class="news__list-categories__list">
        <li class="news__list-categories__list__item news__list-categories__list__item--active">
            <a href="<?php get_the_permalink($post->ID); ?>">All</a>
        </li>
        <?php
            foreach ($categories as $category) :

            ?>
        <li class="news__list-categories__list__item ">
            <a href="<?php echo get_category_link($category) ?>">
                <?php echo $category->name; ?>
            </a>
        </li>
        <?php endforeach ?>
    </ul>
</div>
<?php endif; ?>