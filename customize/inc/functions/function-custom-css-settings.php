<?php

/* Admin Banner settings and custom fields */
function customize_css_settings() {
    register_setting(
        'customize-custom-css-group', //уникальное имя для хранения информации в базе дынных
        'customize_css', // slug meta field
        'customize_sanitize_custom_css'
    );

    add_settings_section(
        'customize-custom-css-section', // id
        __( '', 'customize' ), // title
        'customize_custom_css_section_callback', // регистрация функции
        'customize_theme_custom_css'  // page место где выводится форма (SLUG URL страницы)
    );

    add_settings_field(
        'customize-css', // id
        __( 'Добавить CSS', 'customize' ), // title
        'customize_custom_css_field_callback', // регистрация функции
        'customize_theme_custom_css', // page
        'customize-custom-css-section' // section ID
    );
}

function customize_custom_css_section_callback() {
    echo __( 'Редактируйте Тему с помощью CSS', 'customize' );
}

function customize_custom_css_field_callback () {
    $css = get_option( 'customize_css' );
    $css = ( empty($css) ? '/* Custom CSS */' : $css );
    echo '
        <div id="customCss"> '.$css.' </div>
        <textarea id="customize_css" name="customize_css" style="display: none;visibility: hidden;"> '.$css.' </textarea>
'; // name = SLUG meta field
}

// Sanitize section
function customize_sanitize_custom_css( $input ) {
    $output = esc_textarea( $input );
    return $output;
}

function customize_theme_custom_css_page () {
    // Генерация Админ Страницы
    require_once('admin/admin-custom-css.php');
}