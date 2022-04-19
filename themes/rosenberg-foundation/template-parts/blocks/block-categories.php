<?php

$taxonomy = get_field('taxonomy') ? get_field('taxonomy') : '';

if (taxonomy_exists($taxonomy)) :


    $categories = get_categories([
        'taxonomy' => $taxonomy,  'orderby'    => 'term_id',
        'order'      => 'ASC',
    ]);


    if ($categories) : ?>
<div class="list-categories">
    <ul class="list-categories__list">

        <?php
                foreach ($categories as $category) :

                ?>
        <li
            class="list-categories__list__item <?php echo isset($current_category) && $current_category->term_id == $category->term_id ? " list-categories__list__item--active" : " " ?> ">
            <a href="<?php echo get_category_link($category) ?>">
                <?php echo $category->name; ?>
            </a>
        </li>
        <?php endforeach ?>
    </ul>
</div>
<?php endif  ?>
<?php endif; ?>