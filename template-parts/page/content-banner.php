<?php
$bannerImage = esc_attr( get_option( 'banner_image' ) );
$bannerTitle = esc_attr( get_option( 'banner_title' ) );
$bannerTagline =  get_option( 'banner_tagline' ) ;
?>

<div class="banner">
    <?php if( ! ($bannerImage) ) : ?>
        <img loading="lazy" src="<?php echo get_template_directory_uri(). '/assets/images/1-3.jpg' ?>" alt="Salon Glegrand">
    <?php else : ?>
        <img src="<?php print $bannerImage ?>" alt="<?php _e( 'Логотип', 'theme_language' ); ?>">
    <?php endif ?>
    <div class="wrapper">
        <div class="banner-bg">
            <div class="banner-info">
                <div class="banner-title anim-items"><?php _e( $bannerTitle, 'theme_language' ) ?></div>
                <div class="banner-slogan anim-items"><?php echo $bannerTagline ?></div>
            </div>
        </div>
    </div>
</div>

<div class="wrapper">
    <?php
    wp_nav_menu( [
        'theme_location'  => 'third',
        'container'       => 'div',
        'container_class' => 'banner-container-menu',
        'menu_class'      => 'banner-menu',
        'before'          => '<div class="block">',
        'after'           => '</div>',
        'items_wrap'      => '<ul id="banner-wrap-menu" class="raw">%3$s</ul><div class="clearfix"></div>',
        'depth'           => 0,
    ] );
    ?>
</div>

