<?php get_header(); ?>

    <?php get_template_part( 'template-parts/navigation/nav', 'breadcrumbs' ); ?>

    <article class="article">

    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'template-parts/post/content', 'loop' ); ?>

        <?php endwhile; ?>

        <?php if (function_exists(wp_corenavi)) {
            wp_corenavi();
        } ?>
        <?php wp_reset_postdata(); ?>

    <?php else:  ?>

        <section class="search-and-filter">
            <div class="search-wrap">
        <span class="search-filter">
            <span class="glegrand glegrand-filter"></span>
            <?php _e("Фильтр", 'glegrand'); ?>
        </span>
                <?php get_search_form(); ?>
            </div>
        </section>
        <div class="clearfix"></div>

    <?php endif; ?>

    </article>

<?php get_footer(); ?>

<?php

$text = 'index.php - end of code';

echo strip_tags($text);

?>
