<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
	<ul id="sidebar">
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</ul>
<?php endif; ?>

<?php

$text = 'sidebar.php - end of code';

echo strip_tags($text);

?>
