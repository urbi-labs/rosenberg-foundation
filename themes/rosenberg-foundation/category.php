<?php
global $post;

get_header();
$category = get_category(get_query_var('cat'));
$all = isset($_GET['term']) && $_GET['term'] == "all" ? true : false;


$post_slug = $post->post_name;
$args_last_post = array('numberposts' => '1', 'category' =>  $category->cat_ID);
$last_post = wp_get_recent_posts($args_last_post, 1);
$categories = get_categories();

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args_recenpost = array(
    'orderby' => 'date',
    'order' => 'desc',
    'paged' => $paged,


);
if (!$all) {
    $args_recenpost['cat'] = $category->cat_ID;
}



?>
<main class="page__news container">

    <div class="page__news__header">
        <h1><?php echo $category->name ? $category->name : "News" ?></h1>
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

        echo get_template_part('template-parts/posts/posts', 'categories');

        /** news post list with pagination */
        echo get_template_part('template-parts/posts/posts', "news-list", ['args' => $args_recenpost]);
        ?>



    <?php endif; ?>
</main>
<?php get_footer(); ?>