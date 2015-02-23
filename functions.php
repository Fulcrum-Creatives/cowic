<?php
include( get_template_directory() .'/includes/constant-variables.php' );
/* Theme Support
===============================================================================*/
function theme_support() {
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'post', 420, 280, true );
    $post_formats_args = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
    // add_theme_support( 'post-formats', $post_formats_args );
    $html5_args = array( 'comment-list', 'search-form', 'comment-form');
    // add_theme_support( 'html5', $html5_args );
    $custom_background_args = array(
        'default-color'          => '',
        'default-image'          => '',
        'default-repeat'         => '',
        'default-position-x'     => '',
        'wp-head-callback'       => '_custom_background_cb',
        'admin-head-callback'    => '',
        'admin-preview-callback' => ''
    );
    add_theme_support( 'custom-background', $custom_background_args );
    $custom_header_args = array(
        'default-image'          => '',
        'random-default'         => false,
        'width'                  => 0,
        'height'                 => 0,
        'flex-height'            => false,
        'flex-width'             => false,
        'default-text-color'     => '',
        'header-text'            => true,
        'uploads'                => true,
        'wp-head-callback'       => '',
        'admin-head-callback'    => '',
        'admin-preview-callback' => '',
    );
    add_theme_support( 'custom-header', $custom_header_args );
}
add_action( 'after_setup_theme', 'theme_support' );
/* Editor Styles
===============================================================================*/
if( file_exists( 'editor-style.css' ) ) {
    add_editor_style( 'editor-style.css' );
}
/*  Load JavaScript
===============================================================================*/
function load_javascript() {
    // jQuery
    wp_enqueue_script('jquery');
    wp_register_script( 'main.min.js', THEME_URL . 'js/main.min.js', false, '1.0', true );
    wp_register_script( 'frontpage.min.js', THEME_URL . 'js/frontpage.min.js', false, '1.0', true );
    if( is_home() || is_front_page() ){
        wp_enqueue_script( 'frontpage.min.js' );
    } else {
        wp_enqueue_script( 'main.min.js' );
    }
}
add_action( 'wp_enqueue_scripts', 'load_javascript' );
/* IE Conditional JavaScript
===============================================================================*/
function load_ie() {
  ob_start();?>
<!--[if (lt IE 9) & (!IEMobile)]><script src="<?php echo get_template_directory_uri(); ?>/js/ie.min.js"></script><![endif]-->
  <?php
  echo ob_get_clean();
}
add_action( 'wp_head', 'load_ie',10 );

/* Custom Comments Layout
===============================================================================*/
/* Enqueue Comment Reply JavaScript
*************************************/
/*function enqueue_comments_reply() {
    if( is_singular() ) {
        if( get_option('thread_comments'))  {
            wp_enqueue_script('comment-reply');
        }
    }
}
add_action( 'wp_head', 'enqueue_comments_reply' );*/

/**
 * Custom Comments Template
 * @param  string $comment
 * @param  array $args
 * @param  int $depth
 * @global strins  $GLOBALS['comment']
 * @global int $user_ID
 */
/*function custom_comments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    global $user_ID; 
    ob_start(); ?>
    <li id="comment-<?php comment_ID() ?>" <?php comment_class( 'comment-wrapper' ) ?> itemscope itemtype="http://schema.org/Comment">
      <?php if( $user_ID ) : if( current_user_can('administrator') ) : ?>
            <div class="comment-edit">
              <?php edit_comment_link( __( 'Edit', DOMAIN ),'','' ) ?>
            </div>
            <div class="comment-approval">
              <p>
                <?php 
                  if ( $comment->comment_approved == '0' ) 
                  _e( 'Your comment is awaiting moderation.', '' ) 
                ?>
              </p>
          </div>
      <?php endif; endif; ?>
    <article class="comment-container">
        <header class="comment-header comment-meta">
          <?php echo '<span itemprop="image">' . get_avatar( $comment, $size='50' ) . '</span>'; ?>
          <?php get_template_part( 'template-parts/comments/comment-meta/meta', 'author'); ?>
          <?php get_template_part( 'template-parts/comments/comment-meta/meta', 'date' ); ?>
        </header>
        <section class="comment-body" itemprop="comment">
            <?php comment_text(); ?>
        </section>
        <footer class="comment-footer">
            <p class="comment-reply">
                <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            </p>
        </footer>
    </article>
<?php echo ob_get_clean();
}*/
/* Localization
===============================================================================*/
function localization(){
    load_theme_textdomain( DOMAIN, get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'localization' );
/* Theme Check Required
===============================================================================*/
if ( ! isset( $content_width ) ) {
    $content_width = 1170;
}


if( ! function_exists( register_sidebar() ) ) {
    
    
    register_sidebar( array(
        'name'          => __( 'Employer Sidebar', DOMAIN ),
        'id'            => 'sidebar-employer',
        'description'   => '',
        'class'         => '',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>'
    ));
    
    register_sidebar( array(
        'name'          => __( 'Job Seeker Sidebar', DOMAIN ),
        'id'            => 'sidebar-jobseeker',
        'description'   => '',
        'class'         => '',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>'
    ));
    
     register_sidebar( array(
        'name'          => __( 'Youth Sidebar', DOMAIN ),
        'id'            => 'sidebar-youth',
        'description'   => '',
        'class'         => '',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>'
    ));
    
      register_sidebar( array(
        'name'          => __( 'News & Events Sidebar', DOMAIN ),
        'id'            => 'sidebar-news',
        'description'   => '',
        'class'         => '',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>'
    ));
    
    register_sidebar( array(
        'name'          => __( 'Funding Sidebar', DOMAIN ),
        'id'            => 'sidebar-funding',
        'description'   => '',
        'class'         => '',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>'
    ));
    
    register_sidebar( array(
        'name'          => __( 'About Us Sidebar', DOMAIN ),
        'id'            => 'sidebar-aboutus',
        'description'   => '',
        'class'         => '',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>'
    ));
    
        register_sidebar( array(
        'name'          => __( 'Services - Job Seeker', DOMAIN ),
        'id'            => 'sidebar-services-jobseeker',
        'description'   => 'Appears on individual service entries',
        'class'         => '',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>'
    ));
    
    	register_sidebar( array(
        'name'          => __( 'Services- Employer', DOMAIN ),
        'id'            => 'sidebar-services-employer',
        'description'   => 'Appears on individual service entries',
        'class'         => '',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>'
    ));
    	
    	   register_sidebar( array(
        'name'          => __( 'Event Sidebar', DOMAIN ),
        'id'            => 'sidebar-events',
        'description'   => 'Appears on individual event entries',
        'class'         => '',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>'
    ));
    

		 register_sidebar( array(
        'name'          => __( 'Contact Sidebar', DOMAIN ),
        'id'            => 'sidebar-contact',
        'description'   => '',
        'class'         => '',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>'
    ));
    
    
    
    
    }
/* Register Menus
===============================================================================*/
register_nav_menus( array(
    'primary' => 'Primary',
    'footer' => 'Footer'
) );

/* Setting Menu
===============================================================================*/
if( function_exists('acf_set_options_page_menu') ) {
    acf_add_options_page( __('Theme Settings') );
    acf_add_options_page( __('Carousel Settings') );
}

/* Add Even Odd Classes to posts
===============================================================================*/
add_filter ( 'post_class' , 'cowic_even_odd_classes' );
global $current_class;
$current_class = 'odd';
function cowic_even_odd_classes ( $classes ) { 
   global $current_class;
   $classes[] = $current_class;

   $current_class = ($current_class == 'odd') ? 'even' : 'odd';

   return $classes;
}

/* Pagination Button color Class
===============================================================================*/
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');
function posts_link_attributes() {
    $pagi_button_color = ( get_field( 'cowic_pagination_button_color', 'option' ) ? get_field( 'cowic_pagination_button_color', 'option' ) : 'red' );
    return 'class="' . $pagi_button_color . '"';
}

/* add_filter('show_admin_bar', '__return_false'); */


/* Test if parent or any child, mostly for Widget Logic (http://css-tricks.com/snippets/wordpress/if-page-is-parent-or-child/)
===============================================================================*/
function is_tree($pid)
		{
		  global $post;
		
		  $ancestors = get_post_ancestors($post->$pid);
		  $root = count($ancestors) - 1;
		  if ( $root < 0) { return false; }
		  $parent = $ancestors[$root];
		
		  if(is_page() && (is_page($pid) || $post->post_parent == $pid || in_array($pid, $ancestors)))
		  {
		    return true;
		  }
		  else
		  {
		    return false;
		  }
		};
