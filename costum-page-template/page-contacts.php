<?php /* Template Name: Contacts */ ?>
<?php get_header(); ?>

<div class="wrapper">
    <article id="page-contacts" <?php post_class(); ?>>
        <header class="entry-header">
            <?php get_template_part( 'template-parts/navigation/nav', 'breadcrumbs' );?>

        </header><!-- .entry-header -->
        <main class="single-page-cont content">
            <?php the_title( '<h1 class="single-page-title">', '</h1>' ); ?>
            <div class="single-page-contacts">
                <div class="single-page-contacts-wrapper">
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="clearfix"></div>
        </main>
    </article>
</div>

<?php get_footer(); ?>
