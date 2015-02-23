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
while ($wp_query->have_posts()) : $wp_query->the_post();
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
         <ul class="single__meta">
                        <li>
                            <div class="meta__date updated" itemprop="datePublished">
                                Posted: <time datetime="<?php echo get_the_time('c'); ?>"><strong><?php echo get_the_date('', $post->ID) ; ?></strong></time>
                            </div>
                        </li>
                        <li> 
                            <div class="meta__categories">
                                 &nbsp| Categorized: <?php the_category(', '); ?> 
                            </div>
                        </li>
                        <li>
                            <div class="meta__tags">
                                <?php echo get_the_tag_list( '&nbsp| Tagged: ', ', ' ); ?>
                            </div>
                        </li>
                    </ul>
                    
                    
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
wp_reset_query();
?>