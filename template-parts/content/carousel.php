<?php
$carousel_speed = ( get_field( 'cowic_carousel_speed', 'option' ) ? get_field( 'cowic_carousel_speed', 'option' ) : 5000 );
?>
<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="<?php echo $carousel_speed; ?>">
    <div class="carousel-inner">
        <?php
        $carousel_counter = 0;
        if( get_field( 'cowic_carousel_content', 'option' ) ) :
            while( has_sub_field( 'cowic_carousel_content', 'option' ) ) :
                $carousel_counter++;
                $heading = get_sub_field( 'cowic_carousel_heading' );
                $text = get_sub_field( 'cowic_carousel_text' );
                $image = get_sub_field( 'cowic_carousel_image' );
                $url = get_sub_field( 'cowic_carousel_link' );
                ?>
                <div class="item<?php if( $carousel_counter == 1 ) { echo ' active"'; } ?>">
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                    <div class="container">
                        <div class="carousel-caption">

                        <h1><?php if( $url ) : echo '<a href="'. $url . '">'; endif; ?><?php echo $heading; ?><?php if( $url ) : echo '</a>'; endif; ?></h1>
                        <?php echo $text; ?>
                        </div>
                    </div>
                </div>
        <?php 
            endwhile; 
        endif; 
        ?>
    </div>
    <!-- Indicators -->
    
    <ol class="carousel-indicators">
        <?php
        for( $i = 1; $i <= $carousel_counter; $i++ ) {
            ?>
            <li data-target="#myCarousel" data-slide-to="1" <?php if( $i == 1 ) { echo 'class="active"'; } ?>></li>
            <?php
        }
        ?>
    </ol>
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div>
<!-- /.carousel -->
 