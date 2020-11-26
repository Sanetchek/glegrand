<?php

function customize_banner_settings() {
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

    add_settings_section(
        'customize-banner-options', // id
        __( 'Внешний вид банера', 'customize' ), // title
        'customize_top_options', // регистрация функции
        'customize_theme'  // page место где выводится форма (SLUG URL страницы)
    );

    add_settings_field( 'banner-image', __( 'Картинка банера', 'customize' ), 'customize_banner_image', 'customize_theme', 'customize-banner-options' );
    add_settings_field(
        'banner-title', // id
        __( 'Заголовок банера', 'customize' ), // title
        'customize_banner_title', // регистрация функции
        'customize_theme', // page
        'customize-banner-options' // section ID
    );
    add_settings_field( 'banner-tagline', __( 'Слоган в банере', 'customize' ), 'customize_banner_tagline', 'customize_theme', 'customize-banner-options' );
    add_settings_field( 'banner-address', __( 'Адрес', 'customize' ), 'customize_banner_address', 'customize_theme', 'customize-banner-options' );
    add_settings_field( 'banner-phone', __( 'Телефон', 'customize' ), 'customize_banner_phone', 'customize_theme', 'customize-banner-options' );
    add_settings_field( 'banner-mode', __( 'Режим работы', 'customize' ), 'customize_banner_mode', 'customize_theme', 'customize-banner-options' );
}

function customize_top_options() {
    echo 'Страница редактирования информации в Банере';
}

function customize_banner_image () {
    $banner = 'banner_image';
    $bannerField = esc_attr( get_option( $banner ) );
    echo '<input type="button" class="button button-secondary" value="'. __( 'Загрузить картинку', 'cusomize' ) .'" id="upload-button"><input type="hidden" id="banner-image" name="'. $banner .'" value="'. $bannerField .'" />'; // name = SLUG meta field
}

function customize_banner_title () {
    $banner = 'banner_title';
    $bannerField = esc_attr( get_option( $banner ) );
    echo '<input type="text" id="banner-input-title" name="'. $banner .'" value="'. $bannerField .'" placeholder="'.__( 'Заголовок банера', 'customize' ).'" />'; // name = SLUG meta field
}

function customize_banner_tagline () {
    $banner = 'banner_tagline';
    $bannerField = esc_attr( get_option( $banner ) );
    echo '<input type="text" id="banner-input-tagline" name="'. $banner .'" value="'. $bannerField .'" placeholder="'.__( 'Слоган в банере', 'customize' ).'" />'; // name = SLUG meta field
}

function customize_banner_address () {
    $banner = 'banner_address';
    $bannerField = esc_attr( get_option( $banner ) );
    echo '<input type="text" id="banner-input-address" name="'. $banner .'" value="'. $bannerField .'" placeholder="'.__( 'Адрес', 'customize' ).'" />'; // name = SLUG meta field
}

function customize_banner_phone () {
    $bannerPhonePrefix = 'banner_phone_prefix';
    $bannerPhoneOne = 'banner_phone_one';
    $bannerPhoneTwo = 'banner_phone_two';
    $bannerPrefixField = esc_attr( get_option( $bannerPhonePrefix ) );
    $bannerPhoneOneField = esc_attr( get_option( $bannerPhoneOne ) );
    $bannerPhoneTwoField = esc_attr( get_option( $bannerPhoneTwo ) );
    echo '
    <input type="text" id="banner-input-prefix" name="'. $bannerPhonePrefix .'" value="'. $bannerPrefixField .'" placeholder="'.__( 'Тел. или какое-то обозначение телефонов', 'customize' ).'" />
    <input type="text" id="banner-input-phone-one" name="'. $bannerPhoneOne .'" value="'. $bannerPhoneOneField .'" placeholder="'.__( 'Номер телефона', 'customize' ).'" />
    <input type="text" id="banner-input-phone-two" name="'. $bannerPhoneTwo .'" value="'. $bannerPhoneTwoField .'" placeholder="'.__( 'Номер телефона', 'customize' ).'" />    
    '; // name = SLUG meta field
}

function customize_banner_mode () {
    $banner = 'banner_mode';
    $bannerField = esc_attr( get_option( $banner ) );
    echo '<input type="text" id="banner-input-mode" name="'. $banner .'" value="'. $bannerField .'" placeholder="'.__( 'Режим работы', 'customize' ).'" />'; // name = SLUG meta field
}

function customize_theme_create_page () {
    // Генерация Админ Страницы
    require_once('admin/admin-settings.php');
}