<h1><?php _e('Настройка темы', 'customize'); ?></h1>
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
            if ( empty($bannerImage) ) {
                $bannerImage = get_template_directory_uri() . '/assets/images/glegrand-bg.png';
            }
            ?>

            <img id="banner-picture" src="<?php print $bannerImage ?>" alt="<?php _e( 'Banner Image', 'glegrandsale' ); ?>">
            <div class="banner-info">
                <span id="banner-title" class="banner-title"><?php _e( $bannerTitle, 'glegrandsale' ) ?></span>
                <span id="banner-slogan" class="banner-slogan"><?php _e( $bannerTagline, 'glegrandsale' ) ?></span>
                <span id="banner-address" class="banner-address"><?php _e( $bannerAddress, 'glegrandsale' ) ?></span>
                <span id="banner-phone" class="banner-phone">
                    <span id="banner-pref"><?php _e( $bannerPhonePrefix, 'glegrandsale' ) ?> </span>
                    <a id="banner-phone-one" href="tel:<?php print $bannerPhoneOne ?>"><?php echo $bannerPhoneOne ?>, </a>
                    <a id="banner-phone-two" href="tel:<?php print $bannerPhoneTwo ?>"><?php echo $bannerPhoneTwo ?></a>
                </span>
                <span id="banner-mode" class="banner-mode"><?php _e( $bannerMode, 'glegrandsale' ) ?></span>
            </div>
        </div>
    </div>
</div>

<form method="post" action="options.php">
    <?php settings_fields( 'customize-settings-group' ); // function-admin-menu => function customize_theme_settings() ?>
	<?php do_settings_sections( 'customize_theme' ); //имя страницы на которой выводим поля ?>
	<?php submit_button(); ?>
</form>