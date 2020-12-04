<?php /* Template Name: Gallery */ ?>
<?php get_header(); ?>

<div class="wrapper">
    <article id="page-gallery" <?php post_class(); ?>>
        <header class="entry-header">
            <?php get_template_part( 'template-parts/navigation/nav', 'breadcrumbs' );?>
        </header><!-- .entry-header -->
        <main class="single-page-gallery content">
            <?php the_title( '<h1 class="single-page-title">', '</h1>' ); ?>
            <?php get_template_part( 'customize/template-parts/content', 'gallery' ); ?>
            <div class="clearfix"></div>
            <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="img01">

            </div>
        </main>
    </article>
</div>

<?php get_footer(); ?>
