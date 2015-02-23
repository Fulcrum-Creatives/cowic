<?php get_header(); ?>
<main id="main" itemprop="mainContentOfPage" role="main">
    <?php
    if (have_posts()) : 
        while (have_posts()) : 
        the_post();
        $page_color = ( get_field( 'cowic_page_color' ) ? get_field( 'cowic_page_color' ) : 'red' );
        $featured_video = ( get_field( 'cowic_post_featured_video' ) ? get_field( 'cowic_post_featured_video' ) : '' );
        $the_video = cowic_show_video( $featured_video );
        $exclude = ( get_field( 'cowic_exclude_post_cats', 'option' ) ? get_field( 'cowic_exclude_post_cats', 'option' ) : '' );
        $excluded = implode(', ', $exclude);
        $post_type = get_post_type();
        $tax_obj = get_object_taxonomies( $post_type, 'names' );
        $tax_obj_name =  $tax_obj[0];
        $terms = get_terms( $tax_obj_name, array( 'exclude' => $excluded ) );
        
        
    ?>
        <article itemprop="articleBody" <?php post_class('entry single-entry' . ' ' . $page_color); ?>>
            <div class="left-column single__l-col">
                <div class="single__featured-media">
                    <?php
                    if ( has_post_thumbnail() ) : 
                        the_post_thumbnail();
                    elseif( $featured_video ) :
                        ?>
                    <div class="embed-container">
                        <iframe type="text/html" src="<?php echo $the_video[0]['url']; ?>" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <?php
                    endif;
                    ?>
                </div>
                <heading class="single__header">
                    <h1 class="single__heading"><?php the_title() ?></h1>
                    
                <? if (is_singular( 'services' )) {
	                
	                $service_type =  get_field( 'cowic_service_type' );
	                
                ?>
                <!-- services specific stuff  -->
                <ul class="single__meta service__meta">
	                <li>
				        <?php if($service_type == 'jobseeker') : ?> <a href="/job-seeker/services/" alt="View all Job Seeker Services">Job Seeker Service</a>
				        <?php elseif($service_type == 'employer') : ?> <a href="/employer/services/" alt="View all Employer Services">Employer Service</a>
				        <?php endif; ?>
	                </li>
                </ul>
 		        
		        
		        <?php } else { ?>
				
				<!-- other single posts -->
                    
                    <ul class="single__meta">
                        <li>
                            <div class="meta__date updated" itemprop="datePublished">
                                Posted: <time datetime="<?php echo get_the_time('c'); ?>"><strong><?php echo get_the_date('', $post->ID) ; ?></strong></time>
                            </div>
                        </li>
                        <li> 
                            <div class="meta__categories">
                                <?php echo cowic_custom_cats( array( 'id' => get_the_id(), 'taxonomy' => $tax_obj_name, 'before' => '&nbsp;| Categorized: ', 'sep' => ', ', 'exclude' => $exclude ) ); ?>
                            </div>
                        </li>
                        <li>
                            <div class="meta__tags">
                                <?php echo get_the_tag_list( '&nbsp| Tagged: ', ', ' ); ?>
                            </div>
                        </li>
                    </ul>
                    
                <?php }  //end services if ?>
                    
                    
                </heading>
                <section class="single__content">
                    <?php the_content(); ?>
                </section>
            </div>
            <div class="right-column">
                <div class="single-quicklinks">
                    <?php get_template_part( 'template-parts/content/page', 'quicklinks' ); ?>
                </div>
                <div class="aside__content">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </article>
    <?php
    endwhile;
    else :
        get_template_part( 'template-parts/content/content', 'none' );
    endif;
    wp_reset_postdata(); 
    ?>
</main>
<?php get_footer(); ?>