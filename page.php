<?php get_header(); ?>

        <?php
        while ( have_posts() ) : the_post();

            get_template_part( 'template-parts/page/content', 'page' );
            
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

        endwhile; // End of the loop.
        ?>

<?php get_footer(); ?>

<?php

$text = 'page.php - end of code';

echo strip_tags($text);

?>
