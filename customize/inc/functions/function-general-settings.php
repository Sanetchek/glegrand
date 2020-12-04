<?php
/* Admin Banner settings and custom fields */
function customize_banner_settings() {
    register_setting( 'customize-settings-group' , 'header_logo' );
    register_setting( 'customize-settings-group' , 'footer_logo' );
    register_setting( 'customize-settings-group' , 'favicon' );
    register_setting( 'customize-settings-group' , 'banner_image' );
    register_setting(
        'customize-settings-group', //уникальное имя для хранения информации в базе дынных
        'banner_title' // slug meta field
    );
    register_setting( 'customize-settings-group' , 'banner_tagline' );
    register_setting( 'customize-settings-group' , 'banner_address' );
    register_setting( 'customize-settings-group' , 'banner_phone_prefix' );
    register_setting( 'customize-settings-group' , 'banner_phone_one' );
    register_setting( 'customize-settings-group' , 'banner_phone_two' );
    register_setting( 'customize-settings-group' , 'banner_mode' );
    register_setting( 'customize-settings-group' , 'footer_hour_mode' );
    register_setting( 'customize-settings-group', 'footer_title' );
    register_setting( 'customize-settings-group', 'facebook' );
    register_setting( 'customize-settings-group', 'instagram', 'customize_sanitize_instagram' );

    add_settings_section(
        'customize-banner-options', // id
        __( 'Внешний вид', 'theme_language' ), // title
        'customize_top_options', // регистрация функции
        'customize_theme'  // page место где выводится форма (SLUG URL страницы)
    );

    add_settings_field( 'favicon', __( 'Favicon', 'theme_language' ), 'customize_favicon', 'customize_theme', 'customize-banner-options' );
    add_settings_field( 'header-footer-logo', __( 'Логотип сайта', 'theme_language' ), 'customize_header_footer_logo', 'customize_theme', 'customize-banner-options' );
    add_settings_field( 'banner-image', __( 'Картинка банера', 'theme_language' ), 'customize_banner_image', 'customize_theme', 'customize-banner-options' );
    add_settings_field(
        'banner-title', // id
        __( 'Заголовок банера', 'theme_language' ), // title
        'customize_banner_title', // регистрация функции
        'customize_theme', // page
        'customize-banner-options' // section ID
    );
    add_settings_field( 'banner-tagline', __( 'Слоган в банере', 'theme_language' ), 'customize_banner_tagline', 'customize_theme', 'customize-banner-options' );
    add_settings_field( 'banner-address', __( 'Адрес', 'theme_language' ), 'customize_banner_address', 'customize_theme', 'customize-banner-options' );
    add_settings_field( 'banner-phone', __( 'Телефон', 'theme_language' ), 'customize_banner_phone', 'customize_theme', 'customize-banner-options' );
    add_settings_field( 'footer-hour-mode', __( 'Заголовок для Режим работы', 'theme_language' ), 'customize_footer_hour_mode', 'customize_theme', 'customize-banner-options' );
    add_settings_field( 'banner-mode', __( 'Режим работы', 'theme_language' ), 'customize_banner_mode', 'customize_theme', 'customize-banner-options' );
    add_settings_field( 'footer-title', __( 'Заголовок подвала', 'theme_language' ), 'customize_footer_title', 'customize_theme', 'customize-banner-options' );
    add_settings_field( 'facebook', __( 'Facebook', 'theme_language' ), 'customize_facebook', 'customize_theme', 'customize-banner-options' );
    add_settings_field( 'instagram', __( 'Instagram', 'theme_language' ), 'customize_instagram', 'customize_theme', 'customize-banner-options' );
}

function customize_top_options() {
    echo __( 'Страница редактирования информации в Банере', 'theme_language' );
}

function customize_favicon() {
    $banner = 'favicon';
    $bannerField = esc_attr( get_option( $banner ) );
    echo '
    <input type="button" class="button button-secondary" value="'. __( 'Загрузить favicon', 'cusomize' ) .'" id="upload-favicon-button">
    <input type="hidden" id="value-favicon" name="'. $banner .'" value="'. $bannerField .'" />
    '; // name = SLUG meta field
}

function customize_header_footer_logo() {
    $headerLogo = 'header_logo';
    $headerLogoField = esc_attr( get_option( $headerLogo ) );
    $footerLogo = 'footer_logo';
    $footerLogoField = esc_attr( get_option( $headerLogo ) );
    echo '
    <input type="button" class="button button-secondary" value="'. __( 'Загрузить Логотип шапки', 'cusomize' ) .'" id="upload-header-logo-button">
    <input type="hidden" id="value-header-logo" name="'. $headerLogo .'" value="'. $headerLogoField .'" />
    '; // name = SLUG meta field
    echo '
    <input type="button" class="button button-secondary" value="'. __( 'Загрузить Логотип подвала', 'cusomize' ) .'" id="upload-footer-logo-button">
    <input type="hidden" id="value-footer-logo" name="'. $footerLogo .'" value="'. $footerLogoField .'" />
    '; // name = SLUG meta field
}

function customize_banner_image () {
    $banner = 'banner_image';
    $bannerField = esc_attr( get_option( $banner ) );
    echo '
    <input type="button" class="button button-secondary" value="'. __( 'Загрузить картинку', 'cusomize' ) .'" id="upload-button">
    <input type="hidden" id="banner-image" name="'. $banner .'" value="'. $bannerField .'" />
    '; // name = SLUG meta field
}

function customize_banner_title () {
    $banner = 'banner_title';
    $bannerField = esc_attr( get_option( $banner ) );
    echo '<input type="text" id="banner-input-title" name="'. $banner .'" value="'. $bannerField .'" placeholder="'.__( 'Заголовок банера', 'theme_language' ).'" />'; // name = SLUG meta field
}

function customize_banner_tagline () {
    $banner = 'banner_tagline';
    $bannerField = esc_attr( get_option( $banner ) );
    echo '<input type="text" id="banner-input-tagline" name="'. $banner .'" value="'. $bannerField .'" placeholder="'.__( 'Слоган в банере', 'theme_language' ).'" />'; // name = SLUG meta field
}

function customize_banner_address () {
    $banner = 'banner_address';
    $bannerField = esc_attr( get_option( $banner ) );
    echo '<input type="text" id="banner-input-address" name="'. $banner .'" value="'. $bannerField .'" placeholder="'.__( 'Адрес', 'theme_language' ).'" />'; // name = SLUG meta field
}

function customize_banner_phone () {
    $bannerPhonePrefix = 'banner_phone_prefix';
    $bannerPhoneOne = 'banner_phone_one';
    $bannerPhoneTwo = 'banner_phone_two';
    $bannerPrefixField = esc_attr( get_option( $bannerPhonePrefix ) );
    $bannerPhoneOneField = esc_attr( get_option( $bannerPhoneOne ) );
    $bannerPhoneTwoField = esc_attr( get_option( $bannerPhoneTwo ) );
    echo '
    <input type="text" id="banner-input-prefix" name="'. $bannerPhonePrefix .'" value="'. $bannerPrefixField .'" placeholder="'.__( 'Тел. или какое-то обозначение телефонов', 'theme_language' ).'" />
    <input type="text" id="banner-input-phone-one" name="'. $bannerPhoneOne .'" value="'. $bannerPhoneOneField .'" placeholder="'.__( 'Номер телефона', 'theme_language' ).'" />
    <input type="text" id="banner-input-phone-two" name="'. $bannerPhoneTwo .'" value="'. $bannerPhoneTwoField .'" placeholder="'.__( 'Номер телефона', 'theme_language' ).'" />
    '; // name = SLUG meta field
}

function customize_footer_hour_mode () {
    $banner = 'footer_hour_mode';
    $bannerField = esc_attr( get_option( $banner ) );
    echo '<input type="text" id="footer-input-hour-mode" name="'. $banner .'" value="'. $bannerField .'" placeholder="'.__( 'Заголовок для Режим работы', 'theme_language' ).'" />'; // name = SLUG meta field
}

function customize_banner_mode () {
    $banner = 'banner_mode';
    $bannerField = esc_attr( get_option( $banner ) );
    echo '<input type="text" id="banner-input-mode" name="'. $banner .'" value="'. $bannerField .'" placeholder="'.__( 'Режим работы', 'theme_language' ).'" />'; // name = SLUG meta field
}

function customize_theme_create_page () {
    // Генерация Админ Страницы
    require_once('admin/admin-settings.php');
}

function customize_footer_title() {
    $footer = 'footer_title';
    $footerField = esc_attr( get_option( $footer ) );
    echo '<input id="footer-input-title" type="text" name="'. $footer .'" value="'. $footerField .'" placeholder="'.__( 'Заголовок', 'theme_language' ).'" />'; // name = SLUG meta field
}

function customize_facebook() {
    $footer = 'facebook';
    $footerField = esc_attr( get_option( $footer ) );
    echo '<input type="text" name="'. $footer .'" value="'. $footerField .'" placeholder="'.__( 'Facebook', 'theme_language' ).'" />'; // name = SLUG meta field
}

function customize_instagram() {
    $footer = 'instagram';
    $footerField = esc_attr( get_option( $footer ) );
    echo '<input type="text" name="'. $footer .'" value="'. $footerField .'" placeholder="'.__( 'Instagram', 'theme_language' ).'" />'; // name = SLUG meta field
}

// Sanitization settings
function customize_sanitize_instagram( $input ) {
    $output = sanitize_text_field($input);
    $output = str_replace('@', '', $output);
    return $output;
}
