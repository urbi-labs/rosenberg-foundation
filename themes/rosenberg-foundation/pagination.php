<div class="pagination">
    <?php
    if( get_query_var('paged') ) {
            $pageNo = intval(get_query_var('paged'));
         } else {
            $pageNo = 1;
         }
     ?>
    <p class="pagination-status">Page <?php echo $pageNo; ?> of <?php echo intval($wp_query->max_num_pages); ?></p>
    <div class="pagination-controls">
        <?php posts_nav_link(' ','<span>Latest Posts</span>','<span>Previous Posts</span>'); ?>
    </div>
</div>