<?php

/*
===================================================================
          Require all functions from /inc folder
===================================================================
*/

/*
 * Theme Customizer                                    -   ON
 */
require_once('customize/functions-customize.php');

/*
 * Walker Comments                                    -   ON
 */
require_once ('inc/functions-walker.php');

/*
 * Login redirect if not administrator                  -   ON
 * Remove Sub-menu page                                 -   Off
 * Hide other users' posts in admin panel               -   ON
 * Limit/Restrict media library for users               -   ON
 * Password strength                                    -   ON
 * Delete original size of image                        -   ON
 * Delete image sizes                                   -   ON
 * Delete all image sizes from user profile page        -   ON
 * Delete all image sizes from: post, type_post, page   -   ON
 * Modify user table                                    -   ON
 * 
 **/
require_once ('inc/functions-limits.php');

/*
 * Remove Admin bar                                     -   Off
 * Remove WordPress Meta Generator                      -   ON
 * REMOVE WP EMOJI                                      -   ON
 * Removing WordPress Version from pages, 
   RSS, scripts and styles                              -   ON
 * Change logotype link to site (not to wordpress.org)  -   ON
 * Remove title in logotype "сайт работает на wordpress"-   ON
 * Custom WordPress Footer                              -   ON
 * Remove WordPress Version From The Admin Footer       -   ON
 * 
 *
require_once('inc/functions-remove.php');
*/
/*
 * Disable Updates
 *
 *
 *

require_once('inc/functions-updates.php');
*/
/*
 * Breadcrumbs                                          -   ON
 * Cyr to lat                                           -   ON
 */
require_once ('inc/functions-plugins.php');

/*
===================================================================
          Custom site background
===================================================================
*/
require_once ('inc/functions-background-image.php');


/*
===================================================================
          Add favicon
===================================================================
*/

function my_favicon() {
	echo '<link rel="shortcut Icon" type="image/x-icon"
 href="' . get_template_directory_uri() . '/assets/images/favicon.ico" />';
}
add_action('wp_head', 'my_favicon');

/*
===================================================================
          Switch default core markup for search form, comment form,
          and comments to output valid HTML5.
===================================================================
*/

add_theme_support('html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
));

/*
===================================================================
          Enable support for Post Formats.
===================================================================
*/

add_theme_support('post-formats', array(
    'aside',
    'image',
    'video',
    'quote',
    'link',
    'gallery',
    'status',
    'audio',
    'chat',
));

/*
===================================================================
          Register Scripts and Css
===================================================================
*/

function glegrand_scripts()
{
    // Styles
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
	wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css');
	wp_enqueue_style('general', get_template_directory_uri() . '/assets/css/general.css');

    // Scripts
    // отменяем зарегистрированный jQuery
    // вместо "jquery-core", можно вписать "jquery", тогда будет отменен еще и jquery-migrate
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/script.js', false, null, true);
}

add_action('wp_enqueue_scripts', 'glegrand_scripts');

// Cниппет, который добавит асинхронную загрузку для скриптов, подключенных через wp_enqueue_script():

add_filter('script_loader_tag', 'add_async_attribute', 10, 2);

function add_async_attribute($tag, $handle)
{
    if(!is_admin()){
        if ('jquery-core' == $handle) {
            return $tag;
        }
        return str_replace(' src', ' defer src', $tag);
    }else{
        return $tag;
    }

}

/*
===================================================================
          Register Nav Menu
===================================================================
*/

register_nav_menus(array(
    'primary' => 'Primary Menu',
    'second' => 'Second Menu',
    'third' => 'Banner Menu'
));

add_filter( 'nav_menu_css_class', 'change_menu_item_css_classes', 10, 4 );

function change_menu_item_css_classes( $classes, $item, $args, $depth ) {
    if ( $args->theme_location === 'third' ) {
        $classes[] = 'three-col';
    } elseif ($args->theme_location === 'second') {
        $classes[] = 'four-col';
    }
    return $classes;
}

/*
===================================================================
          Register sidebar
===================================================================
*/

function glegrand_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'glegrand' ),
		'id' => 'sidebar',
		'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'glegrand' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>'
	) );
}
add_action( 'widgets_init', 'glegrand_widgets_init' );

/*
===================================================================
          Add thumbnails to Post and Pages
===================================================================
*/

add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );