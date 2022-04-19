<?php

$taxonomy = isset($args['taxonomy']) ? $args['taxonomy'] : 'category';
$all = isset($args['all']) ? $args['all'] : true;

$categories = get_categories([
    'taxonomy' => $taxonomy,
    'orderby'    => 'term_id',
    'order'      => 'ASC',
]);

$all_link =  get_the_permalink();
if ($categories) : ?>
<div class="news__list-categories">
    <ul class="news__list-categories__list">
        <?php

            if ($all) { ?>
        <li
            class="news__list-categories__list__item <?php echo !isset($args['current_slug']) ||  $args['current_slug'] == "" ? " news__list-categories__list__item--active" : " " ?>">
            <a href="<?php echo $all_link; ?>">All</a>
        </li>
        <?php    }
            ?>
        <?php
            foreach ($categories as $category) :

            ?>
        <li
            class="news__list-categories__list__item 
            <?php echo isset($args['current_slug']) && $args['current_slug'] == $category->slug ? " news__list-categories__list__item--active" : " " ?> ">
            <a href="<?php echo get_the_permalink() ?>?category=<?php echo $category->slug; ?>">
                <?php echo $category->name; ?>
            </a>
        </li>
        <?php endforeach ?>
    </ul>
</div>
<?php endif; ?>