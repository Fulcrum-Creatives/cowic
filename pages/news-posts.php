<?php
/*
Template Name: News Posts
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
                    <?php get_template_part( 'template-parts/content/news', 'listing' ); ?>
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
                    <?php get_template_part( 'template-parts/content/news', 'listing' ); ?>
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