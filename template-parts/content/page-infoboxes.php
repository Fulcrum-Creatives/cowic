<?php $enable_info = ( get_field( 'cowic_enable_info_boxes' ) ? get_field( 'cowic_enable_info_boxes' ) : '' ); ?>
<?php if( $enable_info == 1 ) : ?>
<section class="page__info-boxes">
    <?php
    if( have_rows('cowic_information_boxes') ):
        while ( have_rows('cowic_information_boxes') ) : the_row();
        $info_heading = ( get_sub_field( 'cowic_page_info_boxes_heading' ) ? get_sub_field( 'cowic_page_info_boxes_heading' ) : '' );
        $info_text = ( get_sub_field( 'cowic_page_info_boxes_text' ) ? get_sub_field( 'cowic_page_info_boxes_text' ) : '' );
        $info_link_type = ( get_sub_field( 'cowic_page_info_boxes_link_type' ) ? get_sub_field( 'cowic_page_info_boxes_link_type' ) : '' );
        $info_page_link = ( get_sub_field( 'cowic_page_info_boxes_page_link' ) ? get_sub_field( 'cowic_page_info_boxes_page_link' ) : '' );
        $info_link_link = ( get_sub_field( 'cowic_page_info_boxes_link_link' ) ? get_sub_field( 'cowic_page_info_boxes_link_link' ) : '' );
        ?>
        <div class="page__info-box">
            <a href="<?php if($info_link_type  == 'page'){echo $info_page_link;}elseif($info_link_type  == 'link'){ echo $info_link_link;}; ?>">
                <h2 class="info-box__heading"><?php echo $info_heading; ?></h2>
                <div class="info-box__content">
                    <?php echo $info_text; ?>
                </div>
            </a>
        </div>
        <?php
        endwhile;
    endif;
    ?>
</section>
<?php endif; ?>