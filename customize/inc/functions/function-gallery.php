<?php
/**
 * Gallery
 */

function theme_custom_gallery() {
    register_post_type('customize-gallery', array(
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'hierarhical' => false,
        'supports' => array('thumbnail'),
        'menu_position' => 2,
        'menu_icon'   => 'dashicons-images-alt',

        'labels' => array(
            'name'                  => __( 'Галерея', 'theme_language' ),
            'all_items'             => __( 'Все изображения', 'theme_language' ),
            'add_new'               => __( 'Добавить новое изображение', 'theme_language' ),
            'add_new_item'          => __( 'Добавить изображение', 'theme_language' ),
            'featured_image'        => __( 'Загрузить изображение', 'theme_language' ),
            'singular_name'         => __( 'Изображение', 'theme_language' ),
            'edit_item'             => __( 'Редактировать изображение', 'theme_language' ),
            'new_item'              => __( 'Новое изображение', 'theme_language' ),
            'view_item'             => __( 'Просмотреть изображение', 'theme_language' ),
            'search_items'          => __( 'Найти изображение', 'theme_language' ),
            'not_found'             => __( 'Изображение не найдено', 'theme_language' ),
            'not_found_in_trash'    => __( 'В корзине изображений не найдено', 'theme_language' ),
            'parent_item_colon'     => ''
        )
    ));
}
add_action('init', 'theme_custom_gallery');

add_filter( 'manage_customize-gallery_posts_columns', 'customize_set_gallery_columns' );

function customize_set_gallery_columns( $columns ) {
    unset( $columns['title'] );
    unset( $columns['date'] );
    $columns['picture'] = __( 'Изображения', 'theme_language' );

    return $columns;
}

add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);

function posts_custom_columns($column_name, $id){
 if($column_name === 'picture'){
        the_post_thumbnail( 'thumbnail' );
    }
}
