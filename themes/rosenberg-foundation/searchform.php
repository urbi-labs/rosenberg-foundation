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