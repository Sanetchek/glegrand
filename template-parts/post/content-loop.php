<article>
    <header class="post-header">
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

</article><!-- #post-## -->