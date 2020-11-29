<div class="comment_form">
    <div class="form">
        <div id="comments">
            <ol class="commentlist">
                <?php if ( have_comments() ) : ?>


                    <?php
                    /*
                     * Loop through and list the comments. Tell wp_list_comments()
                     * to use ispynyc_comment() to format the comments.
                     * If you want to overload this in a child theme then you can
                     * define ispynyc_comment() and that will be used instead.
                     * See ispynyc_comment() in glegrand/functions.php for more.
                     */
                    wp_list_comments( array(
                        'callback' => 'customize_comment_list_callback',
                        'reverse_top_level'  => 'desc',
                        'login_text' => ''
                    ) );
                    ?>


                    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
                        <div class="navigation">
                            <div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Старые комментарии', 'glegrand' ) ); ?></div>
                            <div class="nav-next"><?php next_comments_link( __( 'Новые комментарии <span class="meta-nav">&rarr;</span>', 'glegrand' ) ); ?></div>
                        </div><!-- .navigation -->
                    <?php endif; // check for comment navigation ?>

                <?php else : ?>


                <?php endif; // end have_comments() ?>
            </ol>

            <?php if( !( is_user_logged_in() ) ) : ?>
                <div class="comment-register">
                    <p class="must-log-in"><?php _e( 'Чтобы оставить комментарий войдите или зарегистрируйтесь.', 'glegrand' ) ?></p>
                </div>
            <?php else : ?>
                <?php
                $args = array(
                    'fields'               => array(
                        'author' => '<p class="comment-form-author">' . '<input id="author" class="author required" name="author" type="text" value="" size="30" aria-required="true" placeholder="nickname"></p>',
                        'email'  => '<p class="comment-form-email">' . '<input id="email" class="email required" name="email" type="email" value="" size="30" aria-required="true" placeholder="email"></p>',

                    ),
                    'comment_field' =>
                        '<p class="comment-form-comment">
                    <textarea id="comment" name="comment" class="comment-form-item required" cols="45" rows="8" placeholder="'. __( 'Напишите свой комментарий', 'glegrand' ) .'"></textarea>
                    </p>',
                    'comment_notes_after'   => '',
                    'label_submit'          => 'Publish',
                    'title_reply'           => '',
                    'comment_notes_before'  => '',
                    'title_reply_to'        => __( 'Ответить %s или', 'glegrand' ),
                    'cancel_reply_link'     => __( 'Отмена', 'glegrand' ),
                    'format'                => 'xhtml',
                    'logged_in_as'          => '',
                );
                comment_form($args);
                ?>
            <?php endif; ?>
        </div>
    </div>
</div><!-- #comments -->