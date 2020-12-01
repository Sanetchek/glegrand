<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>

    <?php if ( !is_front_page() ) {?>
    <header class="entry-header">
        <?php get_template_part( 'template-parts/navigation/nav', 'breadcrumbs' );?>
        <div class="page-thumbnail">
                <?php
                if( has_post_thumbnail() ) {
                    the_post_thumbnail('large');
                }
                else {
                    echo '<img src="'.get_template_directory_uri().'/assets/images/page-replace-image.jpg" alt="Picture"/>';
                }
                ?>
        </div><!-- .post-thumbnail -->
        <?php the_title( '<h1>', '</h1>' ); ?>
    </header><!-- .entry-header -->
    <main class="content">
        <?php the_content(); ?>
    </main>

    <?php } else {?>
        <header class="entry-header">
            <?php the_title( '<h1 class="front-page anim-items anim-no-hide">', '</h1>' ); ?>
        </header><!-- .entry-header -->
        <div class="content front-page anim-items anim-no-hide">
            <?php the_content(); ?>
        </div>
    <?php } ?>
</article>