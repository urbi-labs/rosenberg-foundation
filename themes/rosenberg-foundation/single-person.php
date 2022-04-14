<?php
global $post;
/*
Template Name: News
*/
get_header();


?>
<main class="people-page container">
    <?php
    if (have_posts()) :
        the_post();

        $image = wp_get_attachment_image_srcset(get_post_thumbnail_id(get_the_ID()));
        var_dump($image);
    ?>


    <?php endif;
    ?>
</main>
<?php
get_footer();
?>