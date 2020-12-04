<?php

/*
===================================================================
          Register Scripts and Css
===================================================================
*/

function customize_profile_scripts( $hook )
{
    if ( 'toplevel_page_customize_theme' == $hook ){
        // Scripts
        wp_enqueue_script('customize', get_template_directory_uri() . '/customize/js/customize.js', array('jquery', 'jquery-form'), null, true);
        // добавляет возможность работы с библиотекой картинок
        wp_enqueue_media();

        // Styles
        wp_enqueue_style('customize', get_template_directory_uri() . '/customize/css/customize.min.css');

        // Добавляет возможность вставлять путь к теме в файлах js, исп. themePath.templateUrl + '/customize/images/';
        $templateUrlArray = array( 'templateUrl' => get_template_directory_uri() );
        wp_localize_script( 'customize', 'themePath', $templateUrlArray );
        // Enqueued script with localized data.
        wp_enqueue_script( 'customize' );

    } else if( 'glegrand_page_customize_theme_custom_css' == $hook ){
        // Scripts
        //wp_enqueue_script( 'ace', get_template_directory_uri() . '/customize/js/ace/ace.js', array('jquery'), null, true );
        //wp_enqueue_script('css-js', get_template_directory_uri() . '/customize/js/css-script.min.js', array('jquery'), null, true);

        // Styles
        //wp_enqueue_style('ace', get_template_directory_uri() . '/customize/css/ace.min.css');

    } else { return; }



}
add_action('admin_enqueue_scripts', 'customize_profile_scripts');
// add_action('wp_enqueue_scripts', 'customize_profile_scripts');


/*
===================================================================
          Add Customize Menu
===================================================================
*/
require_once( 'inc/function-admin-menu.php' );

/*
===================================================================
          Add favicon
===================================================================
*/

function my_favicon() {
    $favicon = esc_attr( get_option( 'favicon' ) );
    if (isset($favicon)) {
        echo '<link rel="shortcut Icon" type="image/x-icon" href="' . $favicon . '" />';
    } else {
        echo '<link rel="shortcut Icon" type="image/x-icon" href="' . get_template_directory_uri() . '/customize/images/favicon.png" />';
    }

}
add_action('wp_head', 'my_favicon');
