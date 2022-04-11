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


function news_pagination($max_num_pages, $paged, $total_found, $range = 2, $show_numbers = true)
{

    /**
     * if $show_numbers is false then hide numbers, first and last.
     * It's for mobile devices
     */
    ?>
<?php if ($max_num_pages) :
        $start      = (($paged - $range) > 0) ? $paged - $range : 1;
        $end        = (($paged + $range) < $max_num_pages) ? $paged + $range : $max_num_pages;

    ?>
<nav class="post-pagination" role="pagination">
    <ul class="post-pagination__list">
        <?php
                //current page isn't the first page
                if ($paged > 1) : ?>
        <?php
                    if ($show_numbers) : ?>
        <li class="post-pagination__item">
            <a href="<?php echo get_pagenum_link(1);  ?>" class="post-pagination__link especial ">
                <img src="<?php echo get_template_directory_uri() ?>/images/icon-arrow-right-small-fill-1.png"
                    class="arrow-left"> First
            </a>
        </li>
        <?php endif ?>
        <li class="post-pagination__item">
            <a class="post-pagination__link especial " href="<?php echo get_pagenum_link($paged - 1);  ?>">
                <img src="<?php echo get_template_directory_uri() ?>/images/icon-arrow-right-small-fill-1.png"
                    class="arrow-left">
                Previous
            </a>
        </li>

        <?php endif; ?>



        <?php
                if ($show_numbers) :
                    $i = $start;
                    while ($i <= $end) :
                ?>
        <li class="post-pagination__item">
            <?php
                            if ($paged == $i) :
                                echo '<span class="post-pagination__link current">' . $i . '</span>';
                            else :
                            ?>
            <a href="<?php echo get_pagenum_link($i);  ?>" class="post-pagination__link ">
                <?php echo $i; ?>
            </a>
            <?php endif; ?>
        </li>

        <?php $i++;
                    endwhile; ?>
        <?php endif; ?>
        <?php
                if ($paged < $max_num_pages) : ?>

        <li class="post-pagination__item">
            <a class="post-pagination__link especial" href="<?php echo get_pagenum_link($paged + 1);  ?>">Next <img
                    src="<?php echo get_template_directory_uri() ?>/images/icon-arrow-right-small-fill-1.png"></a>
        </li>

        <?php
                    if ($show_numbers) : ?>
        <li class="post-pagination__item">
            <a href="<?php echo get_pagenum_link($max_num_pages);  ?>" class="post-pagination__link especial">Last <img
                    src="<?php echo get_template_directory_uri() ?>/images/icon-arrow-right-small-fill-1.png"></a>
        </li>
        <?php endif ?>
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