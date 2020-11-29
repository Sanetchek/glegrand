<?php

/*
 * Enqueue scripts                     -   ON
 * Simple ajax comment form mod        -   ON
 * Disable comment js                  -   ON
 * Comment form                        -   ON
 * Reorder comment fields              -   ON
 *
 **/

add_filter( 'comments_template', 'custom_comment_template' );
function custom_comment_template($comment_template){
    global $post, $withcomments;
    if ( ! ( is_single() || is_page() || $withcomments ) || empty( $post ) ) {
        return;
    }
    // Path to our new comment template file
    $new_theme_template = get_template_directory() . '/comments/template-parts/content-comments.php';

    // Override if it exsits
    if( file_exists( $new_theme_template ) )
        $comment_template = $new_theme_template;
    return $comment_template;
}

/*
===================================================================
          Register Scripts and Css
===================================================================
*/

function custom_comments_scripts()
{
    // Styles
    //wp_enqueue_style('style', get_template_directory_uri() . '/style.css');


    // Scripts
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-form');
    wp_localize_script( 'jquery', 'ajax_var', // добавим объект с глобальными JS переменными
        array('url' => admin_url('admin-ajax.php')) // и сунем в него путь до AJAX обработчика
    );
    wp_enqueue_script( 'comments', get_template_directory_uri() . '/comments/js/comments.min.js', array('jquery'), null, true );
}
add_action('wp_enqueue_scripts', 'custom_comments_scripts');

/*
   ===================================================================
               Simple ajax comment form mod
   ===================================================================
*/
/**
 * Adding processing message at comment form
 * Use inline style so we don't need to load more file
 */

function simple_ajax_comment_form_mod( $settings ){
    printf( '<div class="submitting-comment" style="padding: 15px 20px; text-align: center; display: none;">%s</div>', __( 'Отправка сообщения...', 'glegrand' ) );
}
add_action( 'comment_form', 'simple_ajax_comment_form_mod' );

/*
   ===================================================================
               Disable comment js
   ===================================================================
*/

function disable_comment_js(){
    wp_deregister_script( 'comment-reply' );
}
add_action('init','disable_comment_js');

/*
   ===================================================================
               Comment list form
   ===================================================================
*/
function customize_comment_list_callback( $comment, $args, $depth ) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }

    $classes = ' ' . comment_class( empty( $args['has_children'] ) ? '' : 'parent', null, null, false );
    ?>

    <<?php echo $tag, $classes; ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) { ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
    } ?>

    <div class="comment-author vcard">
        <?php
        if ( $args['avatar_size'] != 0 ) {
            echo get_avatar( $comment, $args['avatar_size'] );
        }
        printf(
            __( '<cite class="fn">%s</cite> <span class="says">:</span>' ),
            get_comment_author_link()
        );
        ?>
    </div>

    <?php if ( $comment->comment_approved == '0' ) { ?>
        <em class="comment-awaiting-moderation">
            <?php _e( 'Ваш комментарий на модерации.', 'glegrand' ); ?>
        </em><br/>
    <?php } ?>

    <div class="comment-meta commentmetadata">
        <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
            <?php
            printf(
                __( '%1$s в %2$s', 'glegrand' ),
                get_comment_date(),
                get_comment_time()
            ); ?>
        </a>

        <?php edit_comment_link( __( '(Изменить)', 'glegrand' ), '  ', '' ); ?>
    </div>

    <?php comment_text(); ?>

    <div class="reply">
        <?php
        comment_reply_link(
            array_merge(
                $args,
                array(
                    'add_below' => $add_below,
                    'depth'     => $depth,
                    'max_depth' => $args['max_depth']
                )
            )
        ); ?>
    </div>

    <?php if ( 'div' != $args['style'] ) { ?>
        </div>
    <?php }
}

/*
   ===================================================================
               Reorder comment fields
   ===================================================================
*/

add_filter('comment_form_fields', 'kama_reorder_comment_fields' );
function kama_reorder_comment_fields( $fields ){
    // die(print_r( $fields )); // посмотрим какие поля есть

    $new_fields = array(); // сюда соберем поля в новом порядке

    $myorder = array('author','email','comment'); // нужный порядок

    foreach( $myorder as $key ){
        $new_fields[ $key ] = $fields[ $key ];
        unset( $fields[ $key ] );
    }

    // если остались еще какие-то поля добавим их в конец
    if( $fields )
        foreach( $fields as $key => $val )
            $new_fields[ $key ] = $val;

    return $new_fields;
}