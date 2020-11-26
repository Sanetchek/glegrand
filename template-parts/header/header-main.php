<header id="header">
	<div class="wrapper">
		<div class="left">
			<a href="<?php echo get_home_url(); ?>" class="logo">
				<span class="glegrand glegrand-logo"></span>
			</a>
		</div>
		<div class="right">
			<div class="header-nav">
                <?php
                wp_nav_menu( [
                    'theme_location'  => 'primary',
                    'container'       => 'div',
                    'container_class' => 'main-menu',
                    'echo'            => true,
                    'fallback_cb'     => '',
                    'before'          => '',
                    'after'           => '<span class="und-line"></span>',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '<ul id="top-menu">%3$s</ul>',
                    'depth'           => 0,
                    'walker'          => '',
                ] );
                ?>
			</div>
		</div>
	</div>

</header>

<?php

$text = 'header-main.php - end of code';

echo strip_tags($text);

?>