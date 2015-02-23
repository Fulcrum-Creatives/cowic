<?php
$button_1_text = ( get_field( 'cowic_carousel_button_1_text', 'option' ) ? get_field( 'cowic_carousel_button_1_text', 'option' ) : '' );
$button_1_hover = ( get_field( 'cowic_carousel_button_1_hover', 'option' ) ? get_field( 'cowic_carousel_button_1_hover', 'option' ) : '' );
$button_1_type = ( get_field( 'cowic_button_1_link_type', 'option' ) ? get_field( 'cowic_button_1_link_type', 'option' ) : 'page' );
$button_1_page_link = ( get_field( 'cowic_button_1_page_link', 'option' ) ? get_field( 'cowic_button_1_page_link', 'option' ) : '' );
$button_1_link_link = ( get_field( 'cowic_button_1_link_link', 'option' ) ? get_field( 'cowic_button_1_link_link', 'option' ) : '' );
$the_button_1_link = ( $button_1_type == 'page' ? $the_button_1_link = $button_1_page_link : $the_button_1_link = $button_1_link_link );
$button_2_text = ( get_field( 'cowic_carousel_button_2_text', 'option' ) ? get_field( 'cowic_carousel_button_2_text', 'option' ) : '' );
$button_2_hover = ( get_field( 'cowic_carousel_button_2_hover', 'option' ) ? get_field( 'cowic_carousel_button_2_hover', 'option' ) : '' );
$button_2_type = ( get_field( 'cowic_button_2_link_type', 'option' ) ? get_field( 'cowic_button_2_link_type', 'option' ) : 'page' );
$button_2_page_link = ( get_field( 'cowic_button_2_page_link', 'option' ) ? get_field( 'cowic_button_2_page_link', 'option' ) : '' );
$button_2_link_link = ( get_field( 'cowic_button_2_link_link', 'option' ) ? get_field( 'cowic_button_2_link_link', 'option' ) : '' );
$the_button_2_link = ( $button_2_type == 'page' ? $the_button_2_link = $button_2_page_link : $the_button_2_link = $button_2_link_link );
$button_3_text = ( get_field( 'cowic_carousel_button_3_text', 'option' ) ? get_field( 'cowic_carousel_button_3_text', 'option' ) : '' );
$button_3_hover = ( get_field( 'cowic_carousel_button_3_hover', 'option' ) ? get_field( 'cowic_carousel_button_3_hover', 'option' ) : '' );
$button_3_type = ( get_field( 'cowic_button_3_link_type', 'option' ) ? get_field( 'cowic_button_3_link_type', 'option' ) : 'page' );
$button_3_page_link = ( get_field( 'cowic_button_3_page_link', 'option' ) ? get_field( 'cowic_button_3_page_link', 'option' ) : '' );
$button_3_link_link = ( get_field( 'cowic_button_3_link_link', 'option' ) ? get_field( 'cowic_button_3_link_link', 'option' ) : '' );
$the_button_3_link = ( $button_3_type == 'page' ? $the_button_3_link = $button_3_page_link : $the_button_3_link = $button_3_link_link );
?>


<div class="carousel__links">
        <ul>
            <li>
                <div class="links__button blue gradient">
                    <div class="hover-off-state">
                        <a href="<?php echo $the_button_1_link; ?>">
                            <?php echo $button_1_text; ?>
                        </a>
                    </div>
                    <div class="hover-on-state">
                        <a href="<?php echo $the_button_1_link; ?>">
                            <?php echo $button_1_hover; ?>
                        </a>
                    </div>
                </div>
            </li>
            <li>
                <div class="links__button green gradient">
                    <div class="hover-off-state">
                        <a href="<?php echo $the_button_2_link; ?>">
                            <?php echo $button_2_text; ?>
                        </a>
                    </div>
                    <div class="hover-on-state">
                        <a href="<?php echo $the_button_2_link; ?>">
                            <?php echo $button_2_hover; ?>
                        </a>
                    </div>
                </div>
            </li>
            <li>
                <div class="links__button blue-2 gradient">
                    <div class="hover-off-state">
                        <a href="<?php echo $the_button_3_link; ?>">
                            <?php echo $button_3_text; ?>
                        </a>
                    </div>
                    <div class="hover-on-state">
                        <a href="<?php echo $the_button_3_link; ?>">
                            <?php echo $button_3_hover; ?>
                        </a>
                    </div>
                </div>
                </a>
            </li>
        </ul>
    </div>
