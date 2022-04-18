<?php
global $post;

get_header();


?>
<main class="people-page container">
    <?php
    if (have_posts()) :
        the_post();

        get_template_part("template-parts/posts/post", "single-person")
    ?>


    <?php endif;
    ?>
</main>
<?php
get_footer();
?>