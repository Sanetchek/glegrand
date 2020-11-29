<article class="single-post">
    <header class="post-header">
	    <?php get_template_part( 'template-parts/navigation/nav', 'breadcrumbs' ); ?>

        <?php if ( is_single() ) {
                the_title( '<h1>', '</h1>' );
            } elseif ( is_front_page() && is_home() ) {
                the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            } else {
                the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            }
        ?>

    </header><!-- .entry-header -->

    <main>
        <?php the_content(); ?>

    </main>

    <?php
    the_post_navigation( array(
        'prev_text' => '<span>' . __( 'Предыдущая страница: ', 'glegrand' ) . '</span>'.  '<span class="post-title">%title</span>',
        'next_text' => '<span>' . __( 'Следующая страница: ', 'glegrand' ) . '</span>'.  '<span class="post-title">%title</span>',
        'before_page_number' => '<span>' . __( 'Страница: ', 'glegrand' ) . ' </span>',
    ) );
    ?>

    <?php if ( comments_open() || get_comments_number() ) :
            comments_template();
    endif;?>



</article><!-- #post-## -->