<?php
function customize_footer_settings () {
    register_setting( 'customize-footer-group', 'footer_title' );
    register_setting( 'customize-footer-group', 'facebook' );
    register_setting( 'customize-footer-group', 'instagram' );

    add_settings_section( 'customize-footer-options', __( 'Внешний вид', 'customize' ), 'customize_footer_options', 'customize_theme_appearance' );

    add_settings_field( 'footer-title', __( 'Заголовок', 'customize' ), 'customize_footer_title', 'customize-footer-options' );
    add_settings_field( 'facebook', __( 'Заголовок подвала', 'customize' ), 'customize_facebook', 'customize-footer-options' );
    add_settings_field( 'instagram', __( 'Заголовок подвала', 'customize' ), 'customize_instagram', 'customize-footer-options' );
}

function customize_footer_options() {
    echo 'Страница редактирования информации в подвале';
}

function customize_footer_title() {
    $footer = 'footer_title';
    $footerField = esc_attr( get_option( $footer ) );
    echo '<input type="text" name="'. $footer .'" value="'. $footerField .'" placeholder="'.__( 'Заголовок', 'customize' ).'" />'; // name = SLUG meta field
}

function customize_facebook() {
    $footer = 'facebook';
    $footerField = esc_attr( get_option( $footer ) );
    echo '<input type="text" name="'. $footer .'" value="'. $footerField .'" placeholder="'.__( 'Заголовок', 'customize' ).'" />'; // name = SLUG meta field
}

function customize_instagram() {
    $footer = 'instagram';
    $footerField = esc_attr( get_option( $footer ) );
    echo '<input type="text" name="'. $footer .'" value="'. $footerField .'" placeholder="'.__( 'Заголовок', 'customize' ).'" />'; // name = SLUG meta field
}

function customize_theme_appearance_page() {
    // Генерация Админ Страницы
    require_once('admin/admin-footer-settings.php');
}