<?php
$bannerImage = esc_attr( get_option( 'banner_image' ) );
$bannerTitle = esc_attr( get_option( 'banner_title' ) );
$bannerTagline = esc_attr( get_option( 'banner_tagline' ) );
$bannerAddress = esc_attr( get_option( 'banner_address' ) );
$bannerPhonePrefix = esc_attr( get_option( 'banner_phone_prefix' ) );
$bannerPhoneOne = esc_attr( get_option( 'banner_phone_one' ) );
$bannerPhoneTwo = esc_attr( get_option( 'banner_phone_two' ) );
$bannerMode = esc_attr( get_option( 'banner_mode' ) );
?>

    <div class="banner">
        <div class="wrapper">
            <div class="banner-bg">
                <?php
                if ( isset( $bannerImage ) ) {
                    $bannerImage = get_template_directory_uri() . '/assets/images/glegrand-bg.png';
                }
                ?>

                <img src="<?php echo( $bannerImage ); ?>" alt="<?php _e( 'Banner Image', 'glegrandsale' ); ?>">
                <div class="banner-info">
                    <div class="banner-title"><?php _e( $bannerTitle, 'glegrandsale' ) ?></div>
                    <div class="banner-slogan"><?php _e( $bannerTagline, 'glegrandsale' ) ?></div>
                    <div id="banner-contacts">
                        <div class="banner-address"><?php _e( $bannerAddress, 'glegrandsale' ) ?></div>
                        <div class="banner-phone">
                            <?php _e( $bannerPhonePrefix, 'glegrandsale' ) ?>
                            <a href="tel:<?php echo $bannerPhoneOne ?>"><?php echo $bannerPhoneOne ?></a>,
                            <a href="tel:<?php echo $bannerPhoneTwo ?>"><?php echo $bannerPhoneTwo ?></a>
                        </div>
                        <div class="banner-mode"><?php _e( $bannerMode, 'glegrandsale' ) ?></div>
                    </div>
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
        'items_wrap'      => '<ul id="banner-wrap-menu" class="raw">%3$s</ul>',
        'depth'           => 0,
    ] );
    ?>
</div>
<div class="clearfix"></div>

<?php

$text = 'content-banner.php - end of code';

echo strip_tags($text);

?>