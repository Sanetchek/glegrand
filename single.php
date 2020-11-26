<?php get_header();

if ( have_posts() ) :
	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/post/content', 'loop' );
		
	endwhile;
endif;

 get_footer(); ?>

<?php

$text = 'single.php - end of code';

echo strip_tags($text);

?>
