<?php
$show_posts = ( get_field( 'cowic_news_showposts', 'option' ) ? get_field( 'cowic_news_showposts', 'option' ) : '2' );
$prev_text = ( get_field( 'cowic_prev_page_label', 'option' ) ? get_field( 'cowic_prev_page_label', 'option' ) : 'Previous' );
$next_text = ( get_field( 'cowic_next_page_label', 'option' ) ? get_field( 'cowic_next_page_label', 'option' ) : 'Next' );
if (have_posts()) : while (have_posts()) : the_post();
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