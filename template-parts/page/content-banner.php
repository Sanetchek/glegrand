<?php
$bannerImage = esc_attr( get_option( 'banner_image' ) );
$attachment_id = attachment_url_to_postid( $bannerImage );
$bannerTitle = esc_attr( get_option( 'banner_title' ) );
$bannerTagline =  get_option( 'banner_tagline' ) ;
?>

<div class="banner">
    <?php if( ! ($bannerImage) ) : ?>
        <img loading="lazy" src="<?php echo get_template_directory_uri(). '/assets/images/1-3.jpg' ?>" alt="<?php _e( 'Salon Glegrand', 'theme_language' ); ?>">
    <?php else : ?>
        <img src="<?php wp_get_attachment_image_url( $attachment_id, 'full' )   ?>" srcset="<?php echo wp_get_attachment_image_srcset( $attachment_id, 'full' ) ?>"
     sizes="<?php echo wp_get_attachment_image_sizes( $attachment_id, 'full' ) ?>" alt="<?php _e( 'Salon Glegrand', 'theme_language' ); ?>">
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
   <div class="banner-container-menu">
       <?php get_sidebar(); ?>
    </div>
</div>

