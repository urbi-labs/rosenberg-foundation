<?php

global $post;
$post_slug = $post->post_name;
$page_template =  get_page_template_slug();
if ($page_template && strpos($page_template, "news") !== FALSE) { ?>
<div class="search-container news__search__container" data-class="search-container">
    <form role="search" method="get" id="searchform" class="news__search" action="<?php echo get_permalink(); ?>">
        <label class="accessible-text" for="s">Search news</label>
        <input class="news__search__input" data-class="search-input" name="s" id="s" type="search" placeholder="Search"
            autocomplete="off" />
        <button type="submit" class="news__search__button">
            <img src="<?php echo get_template_directory_uri() ?>/images/icon-search-fill.png">
        </button>
    </form>
</div>
<?php } else {


?>
<div class="search-container" data-class="search-container">
    <form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url(home_url('/')); ?>">
        <label class="accessible-text" for="s">Search</label>
        <div class="search-input-container">
            <input class="search-input" data-class="search-input" name="s" id="s" type="search" placeholder="Search" />
        </div>
        <div class="search-submit-container">
            <a class="search-submit" data-class="search-submit" href="#"></a>
        </div>
    </form>
    <a href="#" class="search-title" data-class="search-title">Search</a>
</div>
<?php } ?>