<?php

$taxonomy = get_field('taxonomy') ? get_field('taxonomy') : '';

$categories = get_categories($taxonomy);

if ($categories) : ?>
<div class="news__list-categories">
    <ul class="news__list-categories__list">
        <li
            class="news__list-categories__list__item <?php echo !isset($current_category) ? " news__list-categories__list__item--active" : " " ?>">
            <a href="<?php echo $all_link; ?>">All</a>
        </li>
        <?php
            foreach ($categories as $category) :

            ?>
        <li
            class="news__list-categories__list__item <?php echo isset($current_category) && $current_category->term_id == $category->term_id ? " news__list-categories__list__item--active" : " " ?> ">
            <a href="<?php echo get_category_link($category) ?>">
                <?php echo $category->name; ?>
            </a>
        </li>
        <?php endforeach ?>
    </ul>
</div>
<?php else : ?>
no categorias
<?php endif; ?>