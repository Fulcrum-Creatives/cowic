<?php
$box_heading_1 = ( get_field( 'cowic_box_1_heading', 'option' ) ? get_field( 'cowic_box_1_heading', 'option' ) : '' );
$box_heading_2 = ( get_field( 'cowic_box_2_heading', 'option' ) ? get_field( 'cowic_box_2_heading', 'option' ) : '' );
$company_name = ( get_field( 'cowic_company_name', 'option' ) ? get_field( 'cowic_company_name', 'option' ) : '' );
$street_address = ( get_field( 'cowic_street_address', 'option' ) ? get_field( 'cowic_street_address', 'option' ) : '' );
$city = ( get_field( 'cowic_city_address', 'option' ) ? get_field( 'cowic_city_address', 'option' ) : '' );
$state = ( get_field( 'cowic_city_address', 'option' ) ? get_field( 'cowic_city_address', 'option' ) : '' );
$zip = ( get_field( 'cowic_postal_code_address', 'option' ) ? get_field( 'cowic_postal_code_address', 'option' ) : '' );
$box_heading_3 = ( get_field( 'cowic_box_3_heading', 'option' ) ? get_field( 'cowic_box_3_heading', 'option' ) : '' );
$questions_lable = ( get_field( 'cowic_questions_lable', 'option' ) ? get_field( 'cowic_questions_lable', 'option' ) : '' );
$phone = ( get_field( 'cowic_phone_number', 'option' ) ? get_field( 'cowic_phone_number', 'option' ) : '' );
$email = ( get_field( 'cowic_company_email', 'option' ) ? get_field( 'cowic_company_email', 'option' ) : '' );
?>
<div class="fp-boxes">
    <ul>
        <li>
            <h2 class="fp_boxes__heading"><?php echo $box_heading_1; ?></h2>
            <div class="fp_boxes__content">
                <ul class="content__list content__hours">
                <?php
                if( have_rows('cowic_company_hours', 'option') ):
                    while ( have_rows('cowic_company_hours', 'option') ) : 
                        the_row();
                        echo '<li>';
                        the_sub_field('cowic_hours_line');
                        echo '</li>';
                    endwhile;
                endif;
                ?>
                </ul>
            </div>
        </li>
        <li class="middle">
            <h2 class="fp_boxes__heading"><?php echo $box_heading_2; ?></h2>

            <div class="fp_boxes__content">
                <ul class="content__list">
                    <li><?php echo $company_name; ?></li>
                    <li><?php echo $street_address; ?></li>
                    <li><?php echo $city . ', ' . $state . ' ' . $zip; ?></li>
                </ul>
            </div>
        </li>
        <li>
            <h2 class="fp_boxes__heading"><?php echo $box_heading_3; ?></h2>
            <div class="fp_boxes__content">
                <ul class="content__list">
                    <li><?php echo $questions_lable; ?></li>
                    <li><?php echo $phone; ?></li>
                    <li>
                        <a href="mailto:<?php echo $email; ?>">
                            <?php echo $email; ?>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</div>