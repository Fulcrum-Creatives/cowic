    </div> <!-- /.body__wrapper -->
</div> <!-- /.body__content -->
<?php
$copyright = ( get_field( 'cowic_copyright_text', 'option' ) ? get_field( 'cowic_copyright_text', 'option' ) : '' );
$privacy_link = ( get_field( 'cowic_privacy_link', 'option' ) ? get_field( 'cowic_privacy_link', 'option' ) : '' );
$privacy_text = ( get_field( 'cowic_privacy_link_text', 'option' ) ? get_field( 'cowic_privacy_link_text', 'option' ) : '' );
$terms_link = ( get_field( 'cowic_terms_link', 'option' ) ? get_field( 'cowic_terms_link', 'option' ) : '' );
$terms_text = ( get_field( 'cowic_terms_link_text', 'option' ) ? get_field( 'cowic_terms_link_text', 'option' ) : '' );
$sitemap_link = ( get_field( 'cowic_sitemap_link', 'option' ) ? get_field( 'cowic_sitemap_link', 'option' ) : '' );
$sitemap_text = ( get_field( 'cowic_sitemap_link_text', 'option' ) ? get_field( 'cowic_sitemap_link_text', 'option' ) : '' );
$street_address = ( get_field( 'cowic_street_address', 'option' ) ? get_field( 'cowic_street_address', 'option' ) : '' );
$phone = ( get_field( 'cowic_phone_number', 'option' ) ? get_field( 'cowic_phone_number', 'option' ) : '' );
$city = ( get_field( 'cowic_city_address', 'option' ) ? get_field( 'cowic_city_address', 'option' ) : '' );
$state = ( get_field( 'cowic_city_address', 'option' ) ? get_field( 'cowic_city_address', 'option' ) : '' );
$zip = ( get_field( 'cowic_postal_code_address', 'option' ) ? get_field( 'cowic_postal_code_address', 'option' ) : '' );
$email = ( get_field( 'cowic_company_email', 'option' ) ? get_field( 'cowic_company_email', 'option' ) : '' );
$footer_logo = ( get_field( 'cowic_footer_logo', 'option' ) ? get_field( 'cowic_footer_logo', 'option' ) : '' );
$youtube = ( get_field( 'cowic_youtube_link', 'option' ) ? get_field( 'cowic_youtube_link', 'option' ) : '' );
?>
<footer itemscope itemtype="http://schema.org/WPFooter" class="body__footer" role="contentinfo">
    <div class="body__content">
        <?php get_template_part( 'template-parts/content/fpinfoboxes' ); echo "\n" ?>
        <div class="footer__social-icons">
            <ul class="social-icons">
                <li class="social-icons__icon">
                    <a href="<?php echo $twitter; ?>"><i class="fa fa-twitter"></i></a>
                </li>
                <li class="social-icons__icon">
                    <a href="<?php echo $facebook; ?>"><i class="fa fa-facebook-square"></i></a>
                </li>
                <li class="social-icons__icon">
                    <a href="<?php echo $youtube; ?>"><i class="fa fa-youtube"></i></i></a>
                </li>
            </ul>
        </div>
        <div class="footer__company-info">
            <ul class="comapny-info__1">
                <li itemprop="copyrightHolder"><?php echo $copyright; ?></li>
                <li>
                    <a href="<?php echo $privacy_link; ?>">
                        <?php echo $privacy_text; ?>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $terms_link; ?>">
                        <?php echo $terms_text; ?>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $sitemap_link; ?>">
                        <?php echo $sitemap_text; ?>
                    </a>
                </li>

            </ul>
        </div>
        <div class="footer__logo">
            <?php if( !empty( $footer_logo ) ) : ?>
                <img src="<?php echo $footer_logo['url']; ?>" alt="<?php echo $footer_logo['alt']; ?>" />
            <?php endif; ?>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>