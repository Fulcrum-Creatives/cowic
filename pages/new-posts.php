<?php
/*
Template Name: News Posts
*/
get_header(); 
?>
<main id="main" itemprop="mainContentOfPage" role="main">
    <?php 
        while (have_posts()) : 
        the_post();
        $intro = ( get_field( 'cowic_intro_text' ) ? get_field( 'cowic_intro_text' ) : '' );
        $enable_ql = ( get_field( 'cowic_enable_quick_links' ) ? get_field( 'cowic_enable_quick_links' ) : '' );
        $sub_title = ( get_field( 'cowic_page_sub_title' ) ? get_field( 'cowic_page_sub_title' ) : '' );
        $page_color = ( get_field( 'cowic_page_color' ) ? get_field( 'cowic_page_color' ) : 'red' );
    ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('entry page-entry' . ' ' . $page_color); ?>>
        <?php if( $enable_ql == 1 ) : ?>
            <header>
                <div class="page-header left-column">
                    <h1 class="page__heading"><?php the_title(); ?></h1>
                    <div class="heading__intro">
                        <?php echo $intro; ?>
                    </div>
                </div>
                <div class="right-column">
                    <?php get_template_part( 'template-parts/content/page', 'quicklinks' ); ?>
                </div>
            </header>
        <?php endif; ?>
        <section class="page-content" itemprop="articleBody">
            <div class="left-column page-content__l-col">
                <?php if( $enable_ql == 0 ) : ?>
                    <header class="page-header">
                        <h1 class="page__heading"><?php the_title(); ?></h1>
                    </header>
                <?php endif; ?>
                <?php if( $sub_title ) : ?>
                    <h1 class="page__sub-title"><?php echo $sub_title; ?></h1>
                <?php endif; ?>
            <?php 
            endwhile; 
            wp_reset_postdata(); 
            ?>
            <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $show_posts = ( get_field( 'cowic_news_showposts', 'option' ) ? get_field( 'cowic_news_showposts', 'option' ) : '2' );
                $include_cats = ( get_field( 'cowic_include_cats', 'option' ) ? get_field( 'cowic_include_cats', 'option' ) : '' );
                $prev_text = ( get_field( 'cowic_prev_page_label', 'option' ) ? get_field( 'cowic_prev_page_label', 'option' ) : 'Previous' );
                $next_text = ( get_field( 'cowic_next_page_label', 'option' ) ? get_field( 'cowic_next_page_label', 'option' ) : 'Next' );
                $wp_query = new WP_Query(array(
                                'post_type'         => 'post',
                                'posts_per_page'    => $show_posts,
                                'category__in'      => $include_cats,
                                'paged'             => $paged
                ));
                if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();
                    $button_text = ( get_field( 'cowic_read_more_link_text' ) ? get_field( 'cowic_read_more_link_text' ) : 'Read More' );
                    $button_color = ( get_field( 'cowic_read_more_link_color' ) ? get_field( 'cowic_read_more_link_color' ) : 'red' );
                ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('entry fp_posts'); ?>>
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
                    </article>
                <?php endwhile; ?>
                    <?php if (  $wp_query->max_num_pages > 1 ) : ?>
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
                else :
                    get_template_part( 'template-parts/content/content', 'none' );
                endif;
                wp_reset_postdata();
                ?>
            </div>
            <div class="right-column">
                <?php get_sidebar(); ?>
            </div>
        </section>
    </div>
</main>
<?php 
get_footer();