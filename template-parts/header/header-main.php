<?php $headerLogo = esc_attr( get_option( 'header_logo' ) ); ?>

<header id="header">
    <div class="wrapper">
        <div class="left header-log-height">
            <a href="<?php echo get_home_url(); ?>" class="logo">
            <?php if( ! ($headerLogo) ) : ?>
                <span class="glegrand glegrand-logo"></span>
            <?php else : ?>
                <img id="header-logo" src="<?php echo $headerLogo ?>" alt="<?php _e( 'Логотип', 'theme_language' ); ?>">
            <?php endif ?>
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
                <div id="burger-menu" class="burger-menu">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>
            </div>
        </div>
    </div>

</header>
