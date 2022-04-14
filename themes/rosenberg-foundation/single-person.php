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

        get_template_part("template-parts/posts/post", "people.php")
    ?>


    <?php endif;
    ?>
</main>
<?php
get_footer();
?>