<?php /* Template Name: Gallery */ ?>
<?php get_header(); ?>

<div class="wrapper">
    <article id="page-galery" <?php post_class(); ?>>
        <header class="entry-header">
            <?php get_template_part( 'template-parts/navigation/nav', 'breadcrumbs' );?>
        </header><!-- .entry-header -->
        <main class="single-page-gallery content">
            <?php get_template_part( 'customize/template-parts/content', 'gallery' ); ?>
            <div class="clearfix"></div>
        </main>
    </article>
</div>

<?php get_footer(); ?>
