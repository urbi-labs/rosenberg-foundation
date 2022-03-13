<?php get_header(); ?>
<div class="search-page">
    <div class="search-page-container">
        <?php
        global $query_string;
        $query_args = explode("&", $query_string);
        $search_query = array(
            's' => $_REQUEST[ 's' ]
        );
        foreach($query_args as $key => $string) {
        $query_split = explode("=", $string);
        $search_query[$query_split[0]] = urldecode($query_split[1]);
        }
        $search = new WP_Query($search_query);
        global $wp_query;
        $total_results = $wp_query->found_posts;
        ?>
        <div class="search-page-header">
            <h1 class="section-title">"<?php echo esc_html( get_search_query( false ) ); ?>"</h1>
            <p class="search-results"><span class="search-results-number"><?php echo $total_results; ?></span> Result<?php if ( $total_results > 1 ) : ?>s<?php endif; ?></p>
        </div>
        <section class="search-section">
            <?php if ( $search->have_posts() ) : while ( $search->have_posts() ) : $search->the_post(); ?>
                <?php $featuredImageUrl = get_the_post_thumbnail_url( $post->ID, 'post-thumbnail' ); ?>
                <article class="search-result-container">
                    <h1 class="search-result-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                </article>
            <?php endwhile; else : ?>
            <p class="no-results"><?php _e( 'Sorry, no results matched your search.' ); ?></p>
            <?php endif; ?>
        </section>
    </div>
</div>
<?php get_footer(); ?>