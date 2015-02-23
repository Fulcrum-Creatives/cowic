<?php
/*
Template Name: Job Seeker Services
*/
get_header(); 
?>
<main id="main" itemprop="mainContentOfPage" role="main">
    <?php 
        if (have_posts()) : 
        the_post();
        $intro = ( get_field( 'cowic_intro_text' ) ? get_field( 'cowic_intro_text' ) : '' );
        $enable_info = ( get_field( 'cowic_enable_info_boxes' ) ? get_field( 'cowic_enable_info_boxes' ) : '' );
        $enable_ql = ( get_field( 'cowic_enable_quick_links' ) ? get_field( 'cowic_enable_quick_links' ) : '' );
        $sub_title = ( get_field( 'cowic_page_sub_title' ) ? get_field( 'cowic_page_sub_title' ) : '' );
        $page_color = ( get_field( 'cowic_page_color' ) ? get_field( 'cowic_page_color' ) : 'red' );
    ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('entry page-entry' . ' ' . $page_color); ?>>
        <?php if( $enable_info == 1 ) : ?>
            <?php if( $enable_ql == 1 ) : ?>
                <header>
                    <div class="page-header left-column">
                        <h1 class="page__heading"><?php the_title(); ?></h1>
                        <?php if( $intro ) : ?>
                            <div class="heading__intro">
                                <?php echo $intro; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="right-column">
                        <?php get_template_part( 'template-parts/content/page', 'quicklinks' ); ?>
                    </div>
                </header>
            <?php endif; ?>
            <?php get_template_part( 'template-parts/content/page', 'infoboxes' ); ?>
            <section class="page-content" itemprop="articleBody">
                <div class="left-column page-content__l-col">
                    <?php if( $enable_ql == 0 ) : ?>
                        <header class="page-header">
                            <h1 class="page__heading"><?php the_title(); ?></h1>
                            <?php if( $intro ) : ?>
                                <div class="heading__intro">
                                    <?php echo $intro; ?>
                                </div>
                            <?php endif; ?>
                        </header>
                    <?php endif; ?>
                    <?php if( $sub_title ) : ?>
                        <h1 class="page__sub-title"><?php echo $sub_title; ?></h1>
                    <?php endif; ?>
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $show_posts = ( get_field( 'cowic_services_show_posts', 'option' ) ? get_field( 'cowic_services_show_posts', 'option' ) : '2' );
                    $prev_text = ( get_field( 'cowic_prev_page_label', 'option' ) ? get_field( 'cowic_prev_page_label', 'option' ) : 'Previous' );
                    $next_text = ( get_field( 'cowic_next_page_label', 'option' ) ? get_field( 'cowic_next_page_label', 'option' ) : 'Next' );
                    $wp_query = new WP_Query(array(
                                    'post_type'         =>'services',
                                    'posts_per_page'    => $show_posts,
                                    'paged'             => $paged,
                                    'meta_query' => array(
                                                        array(
                                                            'key'     => 'cowic_service_type',
                                                            'value'   => 'jobseeker'
                                                        ),
                                                    ),
                    ));
                    if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();
                        $button_text = ( get_field( 'cowic_read_more_link_text' ) ? get_field( 'cowic_read_more_link_text' ) : 'Read More' );
                        $button_color = ( get_field( 'cowic_read_more_link_color' ) ? get_field( 'cowic_read_more_link_color' ) : 'red' );
                        
                        $em_id = ( get_field( 'cowic_employer_parent_page_idText' ) ? get_field( 'cowic_employer_parent_page_idText' ) : '' );
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
        <?php elseif( $enable_info == 0 ) : ?>
            <section class="page-content" itemprop="articleBody">
                <div class="left-column page-content__l-col">
                    <?php if( $enable_ql == 1 ) : ?>
                        <div class="ql_no_info_mobile">
                            <?php get_template_part( 'template-parts/content/page', 'quicklinks' ); ?>
                        </div>
                    <?php endif; ?>
                    <header class="page-header">
                        <h1 class="page__heading"><?php the_title(); ?></h1>
                        <?php if( $intro ) : ?>
                            <div class="heading__intro">
                                <?php echo $intro; ?>
                            </div>
                        <?php endif; ?>
                    </header>
                    <?php if( $sub_title ) : ?>
                        <h1 class="page__sub-title"><?php echo $sub_title; ?></h1>
                    <?php endif; ?>
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $show_posts = ( get_field( 'cowic_services_show_posts', 'option' ) ? get_field( 'cowic_services_show_posts', 'option' ) : '2' );
                    $prev_text = ( get_field( 'cowic_prev_page_label', 'option' ) ? get_field( 'cowic_prev_page_label', 'option' ) : 'Previous' );
                    $next_text = ( get_field( 'cowic_next_page_label', 'option' ) ? get_field( 'cowic_next_page_label', 'option' ) : 'Next' );
                    $wp_query = new WP_Query(array(
                                    'post_type'         =>'services',
                                    'posts_per_page'    => $show_posts,
                                    'paged'             => $paged,
                                    'meta_query' => array(
                                                        array(
                                                            'key'     => 'cowic_service_type',
                                                            'value'   => 'jobseeker'
                                                        ),
                                                    ),
                    ));
                    if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();
                        $button_text = ( get_field( 'cowic_read_more_link_text' ) ? get_field( 'cowic_read_more_link_text' ) : 'Read More' );
                        $button_color = ( get_field( 'cowic_read_more_link_color' ) ? get_field( 'cowic_read_more_link_color' ) : 'red' );
                        
                        $em_id = ( get_field( 'cowic_employer_parent_page_idText' ) ? get_field( 'cowic_employer_parent_page_idText' ) : '' );
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
                    <?php if( $enable_ql == 1 ) : ?>
                        <div class="ql_no_info">
                            <?php get_template_part( 'template-parts/content/page', 'quicklinks' ); ?>
                        </div>
                    <?php endif; ?>
                    <?php get_sidebar(); ?>
                </div>
            </section>
        <?php endif; ?>
    </div>
    <?php 
    endif; 
    wp_reset_postdata(); 
    ?>
</main>
<?php 
get_footer();