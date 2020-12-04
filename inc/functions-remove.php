<?php

/*
===================================================================
          Remove Admin bar
===================================================================
*/

// add_filter('show_admin_bar', '__return_false');

/*
===================================================================
          Remove WordPress Meta Generator
===================================================================
*/

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10);
remove_action('wp_head', 'parent_post_rel_link', 10);
remove_action('wp_head', 'wp_shortlink_wp_head', 10);
remove_action('wp_head', 'adjacent_posts_rel_link', 10);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);

/*
===================================================================
          REMOVE WP EMOJI
===================================================================
*/

function themeslug_disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'wp_resource_hints', 'themeslug_disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'themeslug_disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 */
function themeslug_disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 */
function themeslug_disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
    if ( 'dns-prefetch' == $relation_type ) {
        // Strip out any URLs referencing the WordPress.org emoji location
        $emoji_svg_url_bit = 'https://s.w.org/images/core/emoji/';
        foreach ( $urls as $key => $url ) {
            if ( strpos( $url, $emoji_svg_url_bit ) !== false ) {
                unset( $urls[$key] );
            }
        }
    }

    return $urls;
}

/*
===================================================================
          Removing WordPress Version from pages, RSS, scripts and styles
===================================================================
*/
add_filter('the_generator', '__return_empty_string');
function rem_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'rem_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'rem_wp_ver_css_js', 9999 );

/*
===================================================================
           Change logotype link to site (not to wordpress.org)
===================================================================
*/

add_filter( 'login_headerurl', create_function('', 'return get_home_url();') );

/*
===================================================================
           Remove title in logotype "сайт работает на wordpress"
===================================================================
*/

add_filter( 'login_headertitle', create_function('', 'return false;') );

/*
===================================================================
           Custom WordPress Footer
===================================================================
*/

function remove_footer_admin () {
    echo '&copy; - Aleksandr Gryshko Theme';
}
add_filter('admin_footer_text', 'remove_footer_admin');

/*
===================================================================
           Remove WordPress Version From The Admin Footer
===================================================================
*/

function remove_wordpress_version() {
    remove_filter( 'update_footer', 'core_update_footer' );
}
add_action( 'admin_menu', 'remove_wordpress_version' );
