<?php

/*
===================================================================
          Register Scripts and Css
===================================================================
*/

function customize_profile_scripts( $hook )
{

    if ( 'toplevel_page_customize_theme' != $hook &&
         'glegrand_page_customize_theme_appearance' != $hook
    )
    { return; }

    // Scripts
    wp_enqueue_script('customize', get_template_directory_uri() . '/customize/js/customize.js', array('jquery', 'jquery-form'), null, true);
    // добавляет возможность работы с библиотекой картинок
    wp_enqueue_media();

    // Styles
    wp_enqueue_style('customize', get_template_directory_uri() . '/customize/css/customize.css');

    // Добавляет возможность вставлять путь к теме в файлах js, исп. themePath.templateUrl + '/customize/images/';
    $templateUrlArray = array( 'templateUrl' => get_template_directory_uri() );
    wp_localize_script( 'customize', 'themePath', $templateUrlArray );
    // Enqueued script with localized data.
    wp_enqueue_script( 'customize' );

}
add_action('admin_enqueue_scripts', 'customize_profile_scripts');
// add_action('wp_enqueue_scripts', 'customize_profile_scripts');


/*
===================================================================
          Add Customize Menu
===================================================================
*/
require_once( 'inc/function-admin-menu.php' );