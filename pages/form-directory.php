<?php
/*
Template Name: Document Directory
*/
get_header();
$do_not_duplicate = array();
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
        $do_not_duplicate[] = get_the_ID();
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
                    $query = new WP_Query(array(
                        'post_type'         => array('post', 'page', 'services'),
                        'posts_per_page'    => -1,
                        'post__not_in'  => $do_not_duplicate,
                    ));
                    while ($query->have_posts()) : $query->the_post();
                    $att_args = array(
                        'post_type'         => 'attachment',
                        'post_mime_type'    => array('application/msword','application/pdf', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'),
                        'post_status'       => null,
                        'numberposts'       => -1,
                        'post_parent'       => get_the_ID(),
                        'orderby' => 'title',
                        'order' => 'ASC',
                    );
                    $attatchments = get_children( $att_args );
                    if( $attatchments ) :
                        foreach( $attatchments as $file ) :
                            $url = wp_get_attachment_url( $file->ID );
                            $title = get_the_title( $file->ID );
                            /*if( in_category( $cat_id ) ) :*/
                            ?>
                                <div id="post-<?php the_ID(); ?>" <?php post_class('pdf-posts'); ?>>
                                    <a href="<?php echo $url; ?>">
                                        <?php echo $title; ?> 
                                    </a>
                                </div>
                            <?php
                           /* endif;*/
                        endforeach;
                    endif;
                    endwhile; wp_reset_postdata();
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
                    <?php the_content() ?>
                    <ul>
                    <?php
                    $query = new WP_Query(array(
                        'post_type'         => array('post', 'page', 'services'),
                        'posts_per_page'    => -1,
                        'post__not_in'  => $do_not_duplicate,
                    ));
                    while ($query->have_posts()) : $query->the_post();
                    $att_args = array(
                        'post_type'         => 'attachment',
                        'post_mime_type'    => array('application/msword','application/pdf', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'),
                        'post_status'       => null,
                        'numberposts'       => -1,
                        'post_parent'       => get_the_ID(),
                        'orderby' => 'title',
                        'order' => 'ASC',
                    );
                    $attatchments = get_children( $att_args );
                    if( $attatchments ) :
                        foreach( $attatchments as $file ) :
                            $url = wp_get_attachment_url( $file->ID );
                            $title = get_the_title( $file->ID );
                            
                            $filesize = filesize( get_attached_file( $file->ID ) );
							$filesize = size_format($filesize, 2);
							
							$filetype = wp_check_filetype($url);
							
							
                            
                            /*if( in_category( $cat_id ) ) :*/
                            ?>
                            <li>
                                <div id="post-<?php the_ID(); ?>" <?php post_class('pdf-posts'); ?>>
                                    <a href="<?php echo $url; ?>">
                                        <?php echo $title; ?>  (<?php echo $filesize; ?>, <?php echo $filetype['ext']; ?>)</a>
										| <i> Posted to: <a href="<?php echo get_permalink(); ?>"> <?php echo get_the_title($ID); ?> </a></i>
                                    
                                </div>
                            </li>
                            <?php
                           /* endif;*/
                        endforeach;
                    endif;
                    endwhile; wp_reset_postdata();
                    ?>
                    </ul>
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