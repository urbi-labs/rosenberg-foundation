<?php
global $post;
/*
Template Name: News
*/
get_header();
$s = get_query_var('s');
$post_slug = $post->post_name;
$args_hero_post = array('numberposts' => '1', 's' => $s);
$last_post = wp_get_recent_posts($args_hero_post, 1);


$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args_recenpost = array(
    'orderby' => 'date',
    'order' => 'desc',
    's' => $s,
    'paged' => $paged,

);


?>
<main class="page__news container">

    <div class="page__news__header">
        <h1>Search results for "<?php echo esc_html($s); ?>"</h1>
        <?php get_search_form(array(
            "echo" => true,
            "aria_label" => 'Search news'
        )); ?>
    </div>
    <?php
    //if there isn't post show 
    if (!$last_post) : ?>
    <div class="news__nopost">
        <h3>No results were found.</h3>
    </div>
    <?php else : ?>

    <?php
        /* choice last post as hero post */
        echo get_template_part('template-parts/posts/post', "hero", array('hero_post' => $last_post[0]));


        /** news post list with pagination */
        echo get_template_part('template-parts/posts/posts', "news-list", ['args' => $args_recenpost]);
        ?>



    <?php endif; ?>
</main>
<?php get_footer(); ?>