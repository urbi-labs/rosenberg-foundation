<?php
function user_pagination($max_num_pages, $found_posts, $paged)
{

    if ($found_posts > 1) :
?>
<nav class="pagination" role="navigation">
    <?php
            $big = 999999999; // need an unlikely integer
            echo paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, $paged),
                'total' => $max_num_pages,
                'end_size' => 0,
                'mid_size' => 0,
                'prev_text' => 'PREVIOUS',
                'next_text' => 'NEXT',
                'add_args' => false,
                'type' => 'list'
            ));
            ?>
</nav>
<?php
    endif;
}


function news_pagination($max_num_pages,  $found_posts, $paged)
{ ?>
<?php if ($max_num_pages) :

    ?>
<nav class="pagination" role="pagination">
    <ul>
        <?php
                //current page isn't the first page
                if ($paged > 1) : ?>
        <li>
            <a href="<?php echo get_pagenum_link(1);  ?>">First</a>
        </li>
        <li>
            <a href="<?php echo get_pagenum_link($paged - 1);  ?>">Previous</a>
        </li>

        <?php endif; ?>

        <?php
                if ($paged < $max_num_pages) : ?>

        <li>
            <a href="<?php echo get_pagenum_link($paged + 1);  ?>">Next</a>
        </li>
        <li>
            <a href="<?php echo get_pagenum_link($max_num_pages);  ?>">Last</a>
        </li>

        <?php endif;
                ?>
    </ul>
</nav>
<?php endif; ?>
<?php }


add_action('pre_get_posts', 'wpse222471_query_post_type_portofolio', 1, 1);
function wpse222471_query_post_type_portofolio($query)
{
    if (!is_admin() && $query->is_main_query()) {
        $query->set('posts_per_page', 9); //set query arg ( key, value )

        return;
    }
}

?>