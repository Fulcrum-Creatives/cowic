<?php get_header(); ?>
<main id="main" itemprop="mainContentOfPage" role="main">
    <?php 
        $page_color = ( get_field( 'cowic_page_color' ) ? get_field( 'cowic_page_color' ) : 'red' );
    ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('entry page-entry' . ' ' . $page_color); ?>>
        
        <div class="left-column page-content__l-col">
        <header class="page-header">
            <h1 class="page__heading">
                <?php
                if ( is_day() ) :
                    printf( __( 'Daily Archives: %s', DOMAIN ), get_the_date() );
                elseif ( is_month() ) :
                    printf( __( 'Monthly Archives: %s', DOMAIN ), get_the_date( 'F Y' ) );
                elseif ( is_year() ) :
                    printf( __( 'Yearly Archives: %d', DOMAIN ), get_the_date( 'Y' ) );
                else :
                    _e( 'Archives', DOMAIN );
                endif;
            ?>
            </h1>
        </header>
        <?php get_template_part( 'template-parts/content/post', 'content' ); ?>
        </div>
        <div class="right-column">
            <?php get_sidebar(); ?>
        </div>
    </div>
</main>
<?php 
get_footer();