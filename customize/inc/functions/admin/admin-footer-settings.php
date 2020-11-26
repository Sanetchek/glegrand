<h1><?php _e('Настройка темы', 'customize'); ?></h1>
<?php
$footerTitle = esc_attr( get_option( 'footer_title' ) );
$bannerAddress = esc_attr( get_option( 'banner_address' ) );
$bannerPhonePrefix = esc_attr( get_option( 'banner_phone_prefix' ) );
$bannerPhoneOne = esc_attr( get_option( 'banner_phone_one' ) );
$bannerPhoneTwo = esc_attr( get_option( 'banner_phone_two' ) );
$bannerMode = esc_attr( get_option( 'banner_mode' ) );
?>

<footer class="footer">
<div class="raw">
    <div class="three-col">
        <div class="block footer-contacts">
            <div class="footer-title"><?php _e( $footerTitle, 'glegrandsale') ?></div>
            <div class="footer-address"><?php _e( $bannerAddress, 'glegrandsale' ) ?></div>
            <div class="footer-phone">
                <?php _e( $bannerPhonePrefix, 'glegrandsale' ) ?>
                <a href="tel:<?php echo $bannerPhoneOne ?>"><?php echo $bannerPhoneOne ?></a>,
                <a href="tel:<?php echo $bannerPhoneTwo ?>"><?php echo $bannerPhoneTwo ?></a>
            </div>
            <span class="banner-mode"><?php _e( $bannerMode, 'glegrandsale' ) ?></span>
        </div>
    </div>
    <div class="three-col ">
        <div class="block footer-social">
            <div class="footer-social-head"><?php _e('Социальные сети:', 'glegrandsale') ?></div>
            <div class="footer-social-icon">

            </div>
        </div>
    </div>
    <div class="three-col">
        <div class="block footer-logo">
            <a href="<?php echo get_home_url(); ?>" class="logo">
                <span class="glegrand glegrand-logo"></span>
            </a>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
</footer>

<form method="post" action="options.php">
    <?php settings_fields( 'customize-footer-group' ); // function-admin-menu => function customize_theme_settings() ?>
    <?php do_settings_sections( 'customize_theme_appearance' ); //имя страницы на которой выводим поля ?>
    <?php submit_button(); ?>
</form>