<?php

$taxonomy = isset($args['taxonomy']) ? $args['taxonomy'] : 'category';
$categories = get_categories($taxonomy);
$cat = get_query_var('cat');
if ($cat) {
    $current_category = get_category(get_query_var('cat'));
}
$all_link = is_page() ? get_the_permalink() : ($current_category ? get_category_link($current_category) . "?term=all" : "");
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
<?php endif; ?>