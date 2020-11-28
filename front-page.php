<?php get_header(); ?>

<?php get_template_part( 'template-parts/page/content', 'banner' ); ?>

<div id="content-page">
    <div class="wrapper">
        <div class="content-about">
        <?php if ( have_posts() ) :
            while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/page/content', 'page' );

            endwhile;

        else :

            get_template_part( 'template-parts/page/content', 'none' );

        endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>