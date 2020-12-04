<?php get_header(); ?>

<div class="wrapper">
    <header class="page-header">
        <?php get_template_part( 'template-parts/navigation/nav', 'breadcrumbs' ); ?>

        <?php get_search_form(); ?>
    </header><!-- .page-header -->

    <?php if ( have_posts() ) : ?>
    <?php endif; ?>
    <main>
        <article class="article">
            <div class="raw">
                <?php if ( have_posts() ) : ?>
                <?php  while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/post/content', 'loop' );

                        endwhile;

                    endif; ?>

            </div>
            <div class="clearfix"></div>
        </article>

    </main>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
