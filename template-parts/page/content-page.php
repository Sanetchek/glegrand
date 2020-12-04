<article id="page-content" <?php post_class(); ?>>
    <?php if ( !is_front_page() ) {?>
    <header class="entry-header">
        <?php get_template_part( 'template-parts/navigation/nav', 'breadcrumbs' );?>
        <div class="page-thumbnail">
            <?php
                if( has_post_thumbnail() ) {
                    the_post_thumbnail('large');
                }
                else {
                    echo '<img loading="lazy" src="'.get_template_directory_uri().'/assets/images/page-replace-image.jpg" alt="Picture"/>';
                }
                ?>
        </div><!-- .post-thumbnail -->

    </header><!-- .entry-header -->
    <main class="single-page content">
        <?php the_title( '<h1 class="single-page-title">', '</h1>' ); ?>
        <div class="single-page-content">
            <div class="single-page-content-wrapper">
                <?php the_content(); ?>
            </div>
        </div>
        <div class="clearfix"></div>
    </main>

    <?php } else {?>
    <header class="entry-header">
        <?php the_title( '<h1 class="front-page anim-items anim-no-hide">', '</h1>' ); ?>
    </header><!-- .entry-header -->
    <main class="content front-page anim-items anim-no-hide">
        <?php the_content(); ?>
    </main>
    <?php } ?>
</article>
