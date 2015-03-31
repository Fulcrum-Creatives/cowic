<!DOCTYPE html>
<!--[if lt IE 7 ]> <html itemscope itemtype="http://schema.org/WebPage <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7 ie6"> <![endif]-->
<!--[if IE 7 ]>    <html itemscope itemtype="http://schema.org/WebPage <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 ie7"> <![endif]-->
<!--[if IE 8 ]>    <html itemscope itemtype="http://schema.org/WebPage <?php language_attributes(); ?> class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9 ]>    <html itemscope itemtype="http://schema.org/WebPage <?php language_attributes(); ?> class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html itemscope itemtype="http://schema.org/WebPage" <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<?php
if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){
    header('X-UA-Compatible: IE=edge,chrome=1');
}
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<!-- <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE, chrome=1" /> -->
<title itemprop="name"><?php bloginfo('name'); wp_title( '|', true, 'left' ); ?></title>
<link href="<?php echo get_template_directory_uri(); ?>/favicon.ico" rel="icon" type="image/x-icon" />
<link href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png" rel="apple-touch-icon" />
<link href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" rel="stylesheet" media="screen" />
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php echo '<link rel="canonical" href="' . home_url() . '" />'; echo "\n" ?>
<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	
	<!--
Start of DoubleClick Floodlight Tag: Please do not remove
Activity name of this tag: Central Ohio Workforce Retargeting code
URL of the webpage where the tag is expected to be placed: http://orbitinteractive.com
This tag must be placed between the <body> and </body> tags, as close as possible to the opening tag.
Creation Date: 03/26/2015
-->
<script type="text/javascript">
var axel = Math.random() + "";
var a = axel * 10000000000000;
document.write('<iframe src="http://4348454.fls.doubleclick.net/activityi;src=4348454;type=invmedia;cat=v0xlh51r;ord=' + a + '?" width="1" height="1" frameborder="0" style="display:none"></iframe>');
</script>
<noscript>
<iframe src="http://4348454.fls.doubleclick.net/activityi;src=4348454;type=invmedia;cat=v0xlh51r;ord=1?" width="1" height="1" frameborder="0" style="display:none"></iframe>
</noscript>
<!-- End of DoubleClick Floodlight Tag: Please do not remove -->
	
	
	
<?php
$twitter = ( get_field( 'cowic_twitter_link', 'option' ) ? get_field( 'cowic_twitter_link', 'option' ) : '' );
$facebook = ( get_field( 'cowic_facebook_link', 'option' ) ? get_field( 'cowic_facebook_link', 'option' ) : '' );
$youtube = ( get_field( 'cowic_youtube_link', 'option' ) ? get_field( 'cowic_youtube_link', 'option' ) : '' );
?>
<a href="#main" class="skip-nav assistive-text"><?php _e('Skip to main Content', DOMAIN); ?></a>
<div class="body__header">
    <div class="body__content">
        <header class="header__logo" itemscope itemtype="http://schema.org/WPHeader" role="banner">
            <?php cowic_header_logo( array( 'type' => 'header-image' ) ); // location: ( cowic-functionality plugin ) public/lib/header-logo/wrapper.php?>
        </header>
        <div class="nav__mobile-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar first"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </div>
        <nav class="header__nav--main" itemscope itemtype="http://schema.org/SiteNavigationElement" role="navigation">
            <?php 
            wp_nav_menu( array( 
                    'theme_location'    => 'primary', 
                    'container'         => '', 
                    'menu_class'        => 'main-nav-list', 
                    'menu_id'           => 'main-nav-list', 
                    'link_before'       => '<span itemprop="name">', 
                    'link_after'        => '</span>'
                ) );
            ?>
        </nav>
        <div class="header__social-icons">
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
    </div>
    <hr/>
</div>
<?php 
if( is_home() || is_front_page() ) :
    get_template_part( 'template-parts/content/carousel' );
?>
<div class="carousel-links-full">
    <?php get_template_part( 'template-parts/content/carousel-links' ); ?>
</div>
<?php
endif;
?>

<div class="body__wrapper">
    <div class="body__content">