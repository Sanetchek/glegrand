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
 **/
require_once('inc/functions-remove.php');

/*
 * Disable Updates
 *

require_once('inc/functions-updates.php');
*/
/*
 * Breadcrumbs                                          -   ON
 * Cyr to lat                                           -   ON
 */
require_once ('inc/functions-plugins.php');

/*
 * Прописываем путь к форме комментариев    -   ON
 * Enqueue scripts                          -   ON
 * Simple ajax comment form mod             -   ON
 * Disable comment js                       -   ON
 * Comment form                             -   ON
 * Reorder comment fields                   -   ON
 *
 **/
require_once('comments/function-comments.php');

/*
===================================================================
          Custom site background
===================================================================
*/
require_once ('inc/functions-background-image.php');

/*
===================================================================
          Custom site background
===================================================================
*/
require_once ('inc/vendor/Mobile_Detect.php');

/*
===================================================================
          Установим глобальную переменную для Mobile_Detect
===================================================================
*/
function mobileDetectGlobal() {
    global $detect;
    $detect = new Mobile_Detect;
}
add_action('after_setup_theme', 'mobileDetectGlobal');

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

function glegrand_scripts()
{
    // Styles
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/theme-style.css');

    // Scripts
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-form');
    wp_localize_script( 'jquery', 'ajax_var', // добавим объект с глобальными JS переменными
        array('url' => admin_url('admin-ajax.php')) // и сунем в него путь до AJAX обработчика
    );

    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/script.js', false, null, true);
}
add_action('wp_enqueue_scripts', 'glegrand_scripts');
add_action( 'wp_ajax_nopriv_glegrand_scripts','glegrand_scripts' );
add_action( 'wp_ajax_glegrand_scripts', 'glegrand_scripts' );

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
        $classes[] = 'anim-items';
    } elseif ($args->theme_location === 'second') {
        $classes[] = 'four-col';
        $classes[] = 'anim-items';
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
        'name' => __( 'Main Sidebar', 'theme_language' ),
        'id' => 'sidebar',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme_language' ),
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

/*
===================================================================
          Постраничная навигация
===================================================================
*/
function wp_corenavi() {
    global $wp_query;
    $total = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
    $a['total'] = $total;
    $a['mid_size'] = 3; // сколько ссылок показывать слева и справа от текущей
    $a['end_size'] = 1; // сколько ссылок показывать в начале и в конце
    $a['prev_text'] = '&laquo;'; // текст ссылки "Предыдущая страница"
    $a['next_text'] = '&raquo;'; // текст ссылки "Следующая страница"

    if ( $total > 1 ) echo '<nav class="pagination">';
    echo paginate_links( $a );
    if ( $total > 1 ) echo '</nav>';
}

/*
===================================================================
          Shortcode
===================================================================
*/

// Shortcode для вывода номеров телефона
function phone_shortcode(){
    $bannerPhonePrefix = esc_attr( get_option( 'banner_phone_prefix' ) );
    $bannerPhoneOne = esc_attr( get_option( 'banner_phone_one' ) );
    $bannerPhoneTwo = esc_attr( get_option( 'banner_phone_two' ) );

    return '<p">
            <span>'.__( $bannerPhonePrefix, 'theme_language' ) .'</span>
            ,
            <a href="tel:'.  $bannerPhoneTwo .'">'. $bannerPhoneTwo .'</a>
          </p>';
}
add_shortcode('shortcode_phone_tag', 'phone_shortcode');

function prefix_phone_shortcode(){
    $bannerPhonePrefix = esc_attr( get_option( 'banner_phone_prefix' ) );

    return '<span>'.__( $bannerPhonePrefix, 'theme_language' ) .'</span>';
}
add_shortcode('shortcode_phone_pref', 'prefix_phone_shortcode');

function phone_one_shortcode(){
    $bannerPhoneOne = esc_attr( get_option( 'banner_phone_one' ) );

    return '<a href="tel:'. $bannerPhoneOne .'">'.  $bannerPhoneOne .'</a>';
}
add_shortcode('shortcode_phone_one', 'phone_one_shortcode');

function phone_two_shortcode(){
    $bannerPhoneTwo = esc_attr( get_option( 'banner_phone_two' ) );

    return '<a href="tel:'.  $bannerPhoneTwo .'">'. $bannerPhoneTwo .'</a>';
}
add_shortcode('shortcode_phone_two', 'phone_two_shortcode');

function address_shortcode(){
    $bannerAddress = esc_attr( get_option( 'banner_address' ) );

    return '<span>'. $bannerAddress .'</span>';
}
add_shortcode('shortcode_address', 'address_shortcode');

function mode_shortcode(){
    $bannerMode = esc_attr( get_option( 'banner_mode' ) );

    return '<span>'. $bannerMode .'</span>';
}
add_shortcode('shortcode_mode', 'mode_shortcode');

function social_shortcode(){
    $fbSlug = esc_attr( get_option( 'facebook' ) );
    $instaSlug = esc_attr( get_option( 'instagram' ) );
    $fbImage = get_template_directory_uri() . '/assets/images/facebook.png';
    $instaImage = get_template_directory_uri() . '/assets/images/instagram.png';

    return '<div class="social-icon">
    <a target="_blank" href="https://www.facebook.com/'. $fbSlug .'/"><img src="'. $fbImage .'" alt=""></a>
    <a target="_blank" href="https://www.instagram.com/'. $instaSlug .'/"><img src="'. $instaImage .'" alt=""></a>
    </div>';
}
add_shortcode('shortcode_social', 'social_shortcode');
