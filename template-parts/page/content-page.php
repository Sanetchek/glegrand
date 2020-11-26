<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">

	    <?php
        if ( ! is_front_page() ) {
            get_template_part( 'template-parts/navigation/nav', 'breadcrumbs' );?>

        <div class="page-thumbnail">
                <?php
                the_post_thumbnail('large');
                ?>
        </div><!-- .post-thumbnail -->

        <?php } ?>

        <?php the_title( '<h1>', '</h1>' ); ?>

    </header><!-- .entry-header -->

    <div class="content">

        <?php the_content(); ?>
    </div>
</article>

<?php

//$text = 'content-page.php - end of code';
//
//echo strip_tags($text);

?>
