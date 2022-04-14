<div class=" search__container" data-class="search-container">
    <form role="search-form" method="get" id="searchform" class="search-form" action="<?php echo get_site_url() ?>">
        <label class="accessible-text" for="s">Search news</label>
        <?php
        if (isset($args['post_type'])) : ?>
        <input type="hidden" name="post_type" value="<?php echo $args['post_type']; ?>" />
        <?php endif;
        ?>
        <input class="search__input" data-class="search-input" name="s" id="s" type="search" placeholder="Search"
            autocomplete="off" />

        <button type="submit" class="search__button">
            <img src="<?php echo get_template_directory_uri() ?>/images/icon-search-fill.png">
        </button>
    </form>
</div>