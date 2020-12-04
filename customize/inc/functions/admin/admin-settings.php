<h1><?php _e('Настройка темы', 'theme_language'); ?></h1>
<?php
$favicon = esc_attr( get_option( 'favicon' ) );
$headerLogo = esc_attr( get_option( 'header_logo' ) );
$footerLogo = esc_attr( get_option( 'footer_logo' ) );
$bannerImage = esc_attr( get_option( 'banner_image' ) );
$bannerTitle = esc_attr( get_option( 'banner_title' ) );
$bannerTagline = esc_attr( get_option( 'banner_tagline' ) );
$bannerAddress = esc_attr( get_option( 'banner_address' ) );
$bannerPhonePrefix = esc_attr( get_option( 'banner_phone_prefix' ) );
$bannerPhoneOne = esc_attr( get_option( 'banner_phone_one' ) );
$bannerPhoneTwo = esc_attr( get_option( 'banner_phone_two' ) );
$footerHourMode = esc_attr( get_option( 'footer_hour_mode' ) );
$bannerMode = esc_attr( get_option( 'banner_mode' ) );
$footerTitle = esc_attr( get_option( 'footer_title' ) );
$fbSlug = esc_attr( get_option( 'facebook' ) );
$instaSlug = esc_attr( get_option( 'instagram' ) );

$fbImage = get_template_directory_uri() . '/assets/images/facebook.png';
$instaImage = get_template_directory_uri() . '/assets/images/instagram.png';
?>

<div class="wrapper">
    <div class="favicon">
        <img id="favicon" src="<?php print $favicon ?>" alt="<?php _e( 'Favicon', 'glegrandsale' ); ?>">
        <span class="fav-site-name"><?php bloginfo( 'name' ) ?></span>
        <a href="#" class="cross"></a>
    </div>
    <hr>
</div>
<header id="header">
    <div class="wrapper">
        <div class="left">
            <div class="logo">
                <img id="header-logo" src="<?php print $headerLogo ?>" alt="<?php _e( 'Логотип', 'glegrandsale' ); ?>">
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

</header>

<div class="banner">
    <div class="wrapper">


        <div class="banner-bg">
            <?php
            if ( empty($bannerImage) ) {
                $bannerImage = get_template_directory_uri() . '/assets/images/glegrand-bg.png';
            }
            ?>

            <img id="banner-picture" src="<?php print $bannerImage ?>" alt="<?php _e( 'Banner Image', 'glegrandsale' ); ?>">
            <div class="banner-info">
                <span id="banner-title" class="banner-title"><?php _e( $bannerTitle, 'glegrandsale' ) ?></span>
                <span id="banner-slogan" class="banner-slogan"><?php _e( $bannerTagline, 'glegrandsale' ) ?></span>
                <span id="banner-address" class="banner-address output-address"><?php _e( $bannerAddress, 'glegrandsale' ) ?></span>
                <span id="banner-phone" class="banner-phone">
                    <span id="banner-pref" class="output-pref"><?php _e( $bannerPhonePrefix, 'glegrandsale' ) ?> </span>
                    <a id="banner-phone-one" class="output-phone-one" href="tel:<?php print $bannerPhoneOne ?>"><?php echo $bannerPhoneOne ?>, </a>
                    <a id="banner-phone-two" class="output-phone-two" href="tel:<?php print $bannerPhoneTwo ?>"><?php echo $bannerPhoneTwo ?></a>
                </span>
                <span id="banner-mode" class="banner-mode output-mode"><?php _e( $bannerMode, 'glegrandsale' ) ?></span>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="raw">
        <div class="three-col">
            <div class="block footer-contacts">
                <div class="footer-title"><?php _e( $footerTitle, 'glegrandsale') ?></div>
                <div class="footer-address output-address"><?php _e( $bannerAddress, 'glegrandsale' ) ?></div>
                <div class="footer-phone">
                    <span class="output-pref"><?php _e( $bannerPhonePrefix, 'glegrandsale' ) ?></span>
                    <a class="output-phone-one" href="tel:<?php echo $bannerPhoneOne ?>"><?php echo $bannerPhoneOne ?></a>,
                    <a class="output-phone-two" href="tel:<?php echo $bannerPhoneTwo ?>"><?php echo $bannerPhoneTwo ?></a>
                </div>
                <h4 id="footer-hour-mode"><?php _e( $footerHourMode, 'glegrandsale' ) ?></h4>
                <span class="footer-mode output-mode"><?php _e( $bannerMode, 'glegrandsale' ) ?></span>
            </div>
        </div>
        <div class="three-col ">
            <div class="block footer-social">
                <div class="footer-social-icon">
                    <h4 class="footer-social-head"><?php _e('Социальные сети:', 'glegrandsale') ?></h4>
                    <a target="_blank" href="https://www.facebook.com/<?php print $fbSlug ?>/"><img src="<?php print $fbImage ?>" alt=""></a>
                    <a target="_blank" href="https://www.instagram.com/<?php print $instaSlug ?>/"><img src="<?php print $instaImage ?>" alt=""></a>
                </div>
            </div>
        </div>
        <div class="three-col">
            <div class="block footer-logo">
                <a href="#">
                    <img id="footer-logo" src="<?php print $footerLogo ?>" alt="<?php _e( 'Логотип', 'glegrandsale' ); ?>">
                </a>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</footer>

<form method="post" action="options.php">
    <?php settings_fields( 'customize-settings-group' ); // function-admin-menu => function customize_theme_settings() ?>
    <?php do_settings_sections( 'customize_theme' ); //имя страницы на которой выводим поля ?>
    <?php submit_button(); ?>
</form>
