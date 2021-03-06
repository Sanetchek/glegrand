<?php get_header(); ?>

<?php get_template_part( 'template-parts/page/content', 'banner' ); ?>

<div id="content-page">
   <div class="page-overlay"></div>
    <div class="wrapper">
        <div class="content-about">
            <?php if ( have_posts() ) :
            while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/page/content', 'page' );

            endwhile;
        endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
