<?php
$categories = isset($args['categories']) ? $args['categories'] : array();
$term = get_query_var('term');
$current_category = get_term_by("slug", $term, 'grantee-category');

$all_link = is_page() ? get_the_permalink() : ($current_category ? get_category_link($current_category) . "?term=all" : "");
?>

<div class="filters__container" data-class="search-container">
    <div class="label__dropdown">
        Filters
    </div>
    <div class="dropdown">
        <input type="checkbox" class="dropdown__switch" id="filter-switch" hidden />
        <label for="filter-switch" class="dropdown__options-filter">
            <ul class="dropdown__filter" role="listbox" tabindex="-1">
                <li class="dropdown__filter-selected" aria-selected="true">
                    <?php echo $current_category ? $current_category->name : "All" ?>
                </li>
                <?php
                if (!empty($categories)) : ?>
                <li>
                    <ul class="dropdown__select">
                        <li class="dropdown__select-option" role="option" data-link="<?php echo $all_link ?>"
                            data-current="<?php echo !$current_category ? "1" : "0" ?>">
                            All
                        </li>
                        <?php
                            foreach ($categories as $category) : ?>
                        <li class="dropdown__select-option" role="option"
                            data-current="<?php echo $current_category && $current_category->term_id == $category->term_id ? "1" : "0" ?>"
                            data-link="<?php echo  get_category_link($category) ?>">
                            <?php echo $category->name; ?>
                        </li>

                        <?php endforeach;
                            ?>

                    </ul>
                </li>
                <?php
                endif;
                ?>
            </ul>
        </label>
    </div>
</div>