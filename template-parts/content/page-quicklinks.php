<?php $ql_text = ( get_field( 'cowic_quick_links_label', 'option' ) ? get_field( 'cowic_quick_links_label', 'option' ) : 'QuickLinks' ); 
	  $events_cat_text = ( get_field( 'cowic_events_category_label', 'option' ) ? get_field( 'cowic_events_category_label', 'option' ) : 'Events Categories' );
	  $events_cat_all = ( get_field( 'cowic_view_all_events_label', 'option' ) ? get_field( 'cowic_view_all_events_label', 'option' ) : 'View All Events' );
	  $news_cat_text = ( get_field( 'cowic_news_category_label', 'option' ) ? get_field( 'cowic_news_category_label', 'option' ) : 'News Categories' );
	  $news_cat_all = ( get_field( 'cowic_view_all_news_label', 'option' ) ? get_field( 'cowic_view_all_news_label', 'option' ) : 'View All News' );
	
	
	
?>
<div class="quick-links<?php if(is_page()){ echo ' ql_fix'; }?>">
	

	
    <div class="ql_mobile-menu">
        <div class="qu-mobile-menu-button closed">
            <?php echo $ql_text . ' '; ?><span class="rsaquo">></span><span class="laquo"><</span>
        </div>
    </div>
    
    <ul class="quick-link-list">
	    
	    <?php // Category Labels for Events & News Posts
	         if (is_singular( 'ai1ec_event' )) { ?>
	         <h2><?php echo $events_cat_text . ' '; ?></h2>
	    <? } else if (is_singular( 'post' ) || is_page(53) ) { ?>
	    	 <h2><?php echo $news_cat_text . ' '; ?></h2>
	    <?php } ?>
	    
    <?php
    if( is_page() ) :
        if( have_rows('cowic_quick_links') ):
            while ( have_rows('cowic_quick_links') ) : the_row();
            $q_link_type = ( get_sub_field( 'cowic_quick_links_type' ) ? get_sub_field( 'cowic_quick_links_type' ) : '' );
            $q_link_text = ( get_sub_field( 'cowic_quick_links_label' ) ? get_sub_field( 'cowic_quick_links_label' ) : '' );
            $q_link_page_link = ( get_sub_field( 'cowic_quick_links_page_link' ) ? get_sub_field( 'cowic_quick_links_page_link' ) : '' );
            $q_link_link_link = ( get_sub_field( 'cowic_quick_links_link_link' ) ? get_sub_field( 'cowic_quick_links_link_link' ) : '' );
            $q_link_cat_link = ( get_sub_field( 'cowic_quick_links_page_cat_category' ) ? get_sub_field( 'cowic_quick_links_page_cat_category' ) : '' );
            $q_link_cat_link_url = get_category_link($q_link_cat_link);
            ?>
            <li>
                <a href="<?php if($q_link_type  == 'page'){echo $q_link_page_link;}if($q_link_type  == 'link'){echo $q_link_link_link;}if($q_link_type  == 'category'){echo $q_link_cat_link_url;} ?>">
                    <?php echo $q_link_text; ?>
                </a>
            </li>
            <?php
            endwhile;
        endif;
    elseif( is_single() ) :
        $exclude = ( get_field( 'cowic_exclude_post_cats', 'option' ) ? get_field( 'cowic_exclude_post_cats', 'option' ) : '' );
        $excluded = implode(', ', $exclude);
        $post_type = get_post_type();
        $tax_obj = get_object_taxonomies( $post_type, 'names' );
        $tax_obj_name =  $tax_obj[0];
        $terms = get_terms($tax_obj_name, array( 'exclude' => $excluded ) );
        //echo '<pre>'; print_r($terms); echo '</pre>';
        foreach( $terms as $term ){
            $url = get_term_link( $term );
            ?>
            <li>
                <a href="<?php echo  $url; ?>">
                    <?php echo $term->name; ?>
                </a>
            </li>
            <?php
        }
    endif;
    ?>
    
     <?php // "View All..." for ease of use...
	         if (is_singular( 'ai1ec_event' )) { ?>
	         <li><a href="/news-events/events/"><?php echo $events_cat_all ?></a></li>
	    <? } else if (is_singular( 'post' ) ) { ?>
	    	 <li><a href="/news-events/news/"><?php echo $news_cat_all ?></a></li>
	    <?php } ?>
    
    
    </ul>
</div>