<?php
$footerTitle = esc_attr( get_option( 'footer_title' ) );
$bannerAddress = esc_attr( get_option( 'banner_address' ) );
$bannerPhonePrefix = esc_attr( get_option( 'banner_phone_prefix' ) );
$bannerPhoneOne = esc_attr( get_option( 'banner_phone_one' ) );
$bannerPhoneTwo = esc_attr( get_option( 'banner_phone_two' ) );
$bannerMode = esc_attr( get_option( 'banner_mode' ) );
$footerHourMode = esc_attr( get_option( 'footer_hour_mode' ) );
$fbSlug = esc_attr( get_option( 'facebook' ) );
$instaSlug = esc_attr( get_option( 'instagram' ) );

$fbImage = get_template_directory_uri() . '/assets/images/facebook.png';
$instaImage = get_template_directory_uri() . '/assets/images/instagram.png';
?>


<div class="wrapper">
    <div class="raw">
        <div class="three-col">
            <div class="block footer-contacts">
                <div class="footer-title anim-items"><?php _e( $footerTitle, 'theme_language') ?></div>
                <div class="footer-address"><?php _e( $bannerAddress, 'theme_language' ) ?></div>
                <div class="footer-phone">
                    <?php _e( $bannerPhonePrefix, 'theme_language' ) ?>
                    <a href="tel:<?php echo $bannerPhoneOne ?>"><?php echo $bannerPhoneOne ?></a>,
                    <a href="tel:<?php echo $bannerPhoneTwo ?>"><?php echo $bannerPhoneTwo ?></a>
                </div>
                <h4 class="footer-hour-mode"><?php _e( $footerHourMode, 'theme_language' ) ?></h4>
                <span class="footer-mode"><?php _e( $bannerMode, 'theme_language' ) ?></span>
            </div>
        </div>
        <div class="three-col ">
            <div class="block footer-social">
                <div class="footer-social-icon">
                    <h4 class="footer-social-head"><?php _e('Социальные сети:', 'theme_language') ?></h4>
                    <a target="_blank" href="https://www.facebook.com/<?php print $fbSlug ?>/"><img src="<?php print $fbImage ?>" alt=""></a>
                    <a target="_blank" href="https://www.instagram.com/<?php print $instaSlug ?>/"><img src="<?php print $instaImage ?>" alt=""></a>
                </div>
            </div>
        </div>
        <div class="three-col footer-logo">
            <div class="block">
                <a href="<?php echo get_home_url(); ?>" class="logo">
                    <span class="glegrand glegrand-logo"></span>
                </a>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
