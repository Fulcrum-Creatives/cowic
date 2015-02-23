<?php
/*
Template Name: Home
*/
get_header(); 
?>
<main id="main" itemprop="mainContentOfPage" role="main">

    <div class="carousel-links-mobile">
        <?php get_template_part( 'template-parts/content/carousel-links' ); ?>
    </div>
    
    <div class="fp_posts">
        <?php
        if ( get_query_var('paged') ) :
            $paged = get_query_var('paged'); 
        elseif ( get_query_var('page') ) :
            $paged = get_query_var('page'); 
        else :
            $paged = 1; 
        endif;
        $show_posts = ( get_field( 'cowic_fp_showposts', 'option' ) ? get_field( 'cowic_fp_showposts', 'option' ) : '2' );
        $include_cats = ( get_field( 'cowic_fp_include_cats', 'option' ) ? get_field( 'cowic_fp_include_cats', 'option' ) : '' );
        $enable_pagi = ( get_field( 'cowic_enable_fp_pagi', 'option' ) ? get_field( 'cowic_enable_fp_pagi', 'option' ) : 0 );
        $prev_text = ( get_field( 'cowic_prev_page_label', 'option' ) ? get_field( 'cowic_prev_page_label', 'option' ) : 'Previous' );
        $next_text = ( get_field( 'cowic_next_page_label', 'option' ) ? get_field( 'cowic_next_page_label', 'option' ) : 'Next' );
        $wp_query = new WP_Query(array(
                            'post_type'         =>'post',
                            'posts_per_page'    => $show_posts,
                            'category__in'      => $include_cats,
                            'paged'             => $paged
                            ));
        while ($wp_query->have_posts()) : $wp_query->the_post();
        $featured_video = ( get_field( 'cowic_post_featured_video' ) ? get_field( 'cowic_post_featured_video' ) : '' );
        $the_video = cowic_show_video( $featured_video );
        $button_text = ( get_field( 'cowic_read_more_link_text' ) ? get_field( 'cowic_read_more_link_text' ) : 'Read More' );
        $button_color = ( get_field( 'cowic_read_more_link_color' ) ? get_field( 'cowic_read_more_link_color' ) : 'red' );
        ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('entry fp_posts'); ?>>
                    <?php if ( has_post_thumbnail() ) : ?>
                    <div class="fp_posts__featured-media">
                        <?php the_post_thumbnail('post'); ?>
                    </div>
                    <?php elseif( $featured_video ) : ?>
                    <div class="fp_posts__featured-media">
                        <div class="embed-container">
                            <iframe src="<?php echo $the_video[0]['url']; ?>" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                    <?php
                    endif;
                    ?>
                <div class="fp_posts__content">
                    <heading class="content__heading">
                    <h1>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h1>
                    </heading>
                    <section class="content__body">
                        <?php the_excerpt(); ?>
                    </section>
                    <footer class="content__footer">
                        <div class="read-more-link">
                            <a href="<?php the_permalink(); ?>" class="<?php echo $button_color; ?>">
                                <?php echo $button_text; ?>
                            </a>
                        </div>
                    </footer>
                </div>
            </article>
        <?php endwhile; ?>
        <?php 
        if (  $wp_query->max_num_pages > 1 ) : 
            if( $enable_pagi == 1 ) :
            ?>
            <nav class="pagination">
                <div class="nav-prev">
                    <?php next_posts_link( __( $next_text ) ); ?>
                </div>
                <div class="nav-next">
                    <?php previous_posts_link( __( $prev_text ) ); ?>
                </div>
            </nav>
        <?php
            endif;
        endif; 
        wp_reset_postdata();
        ?>
    </div>
</main>
<?php 
get_footer();