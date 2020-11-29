<?php
/*
===================================================================
          Add Customize Menu
===================================================================
*/
function customize_add_admin_page () {
    $siteName = strval( get_bloginfo( 'name' ) );
    // Создаем меню в админке
    add_menu_page( __('Пользовательские Настройки Темы', 'customize'), // Текст, который будет использован в теге title на странице.
        __( $siteName , 'customize'), // Название пункта в меню
        'manage_options', // Уровень доступа пользователя
        'customize_theme', // SLUG URL страницы (должно быть уникальным)
        'customize_theme_create_page', //  регистрация функции
        'dashicons-money', // иконка для меню (get_template_directory_uri(). '/img/icon.png' ) или dashicon wp
        '3' // позиция меню, по умолчанию в самый конец.
    );

    // Создаем подменю
    add_submenu_page (
        'customize_theme', // SLUG главной страницы
        __( 'Пользовательские Настройки Темы', 'customize' ), //тег title на странице,
        __( 'Настройка', 'customize' ), // Название пункта в меню
        'manage_options', // Уровень доступа пользователя
        'customize_theme', // SLUG URL страницы (должно быть уникальным)
        'customize_theme_create_page' //  регистрация функции
    );
    // Создаем 2 подменю
    add_submenu_page (
        'customize_theme', // SLUG главной страницы
        __( 'Настройки Внешнего Вида Темы', 'customize' ), //тег title на странице,
        __( 'Custom CSS', 'customize' ), // Название пункта в меню
        'manage_options', // Уровень доступа пользователя
        'customize_theme_custom_css', // SLUG URL страницы (должно быть уникальным)
        'customize_theme_custom_css_page' //  регистрация функции
    );

    // Включить пользовательские настройки
    add_action( 'admin_init', 'customize_banner_settings' );
    add_action( 'admin_init', 'customize_css_settings' );
}
add_action( 'admin_menu', 'customize_add_admin_page' );

require_once( 'functions/function-general-settings.php' );
require_once( 'functions/function-custom-css-settings.php' );