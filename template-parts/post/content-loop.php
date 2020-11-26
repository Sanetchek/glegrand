<article>
    <header class="post-header">
	    <?php get_template_part( 'template-parts/navigation/nav', 'breadcrumbs' ); ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
	            <?php
		            the_post_thumbnail('large');
                ?>
            </a>
        </div><!-- .post-thumbnail -->

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
    if ( comments_open() || get_comments_number() ) :
	    comments_template();
    endif;
    ?>

	<?php


	/*the_post_navigation( array(
		'prev_text' => '<span>' . __( 'Предыдущая страница: ', 'glegrandsale' ) . '</span>'.  '<span class="post-title">%title</span>',
		'next_text' => '<span>' . __( 'Следующая страница: ', 'glegrandsale' ) . '</span>'.  '<span class="post-title">%title</span>',
		'before_page_number' => '<span>' . __( 'Страница: ', 'glegrandsale' ) . ' </span>',
	) );*/
    ?>

</article><!-- #post-## -->

<?php

$text = 'content-loop.php - end of code';

echo strip_tags($text);

?>