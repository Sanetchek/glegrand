<?php
// $detect = new Mobile_Detect;
global $detect;

$gallery = new WP_Query(array(
    'post_type' => 'customize-gallery',
    'posts_per_page' => -1,
    'order' => 'ASC'
));
?>
<div class="raw">

    <?php if( $detect->isMobile() ) { ?>
    <div class="one-col">
        <div class="block">
            <?php if ( $gallery->have_posts() ) { $count = 0;
                while ( $gallery->have_posts() ) {
                    $gallery->the_post();

                    the_post_thumbnail('large');
                    $count++;
                }
            } ?>
        </div>
    </div>

    <?php } else if( $detect->isTablet() ) { ?>
    <div class="two-col">
        <div class="block">
            <?php if ( $gallery->have_posts() ) { $count = 0;
                while ( $gallery->have_posts() ) {
                    $gallery->the_post();

                    if ( $count % 2 == 0 ){
                        the_post_thumbnail('large');
                    }
                    $count++;
                }
            } ?>
        </div>
    </div>
    <div class="two-col">
        <div class="block">
            <?php if ( $gallery->have_posts() ) { $count = 0;
                while ( $gallery->have_posts() ) {
                    $gallery->the_post();

                    if ( $count % 2 == 1 ){
                        the_post_thumbnail('large');
                    }
                    $count++;
                }
            } ?>
        </div>
    </div>

    <?php } else { ?>

    <div class="four-col">
        <div class="block">
            <?php if ( $gallery->have_posts() ) { $count = 0;
                while ( $gallery->have_posts() ) {
                    $gallery->the_post();

                    if ( $count % 4 == 0 ){
                        the_post_thumbnail('large');
                    }
                    $count++;
                }
            } ?>
        </div>
    </div>
    <div class="four-col">
        <div class="block">
            <?php if ( $gallery->have_posts() ) { $count = 0;
                while ( $gallery->have_posts() ) {
                    $gallery->the_post();

                    if ( $count % 4 == 1 ){
                        the_post_thumbnail('large');
                    }
                    $count++;
                }
            } ?>
        </div>
    </div>
    <div class="four-col">
        <div class="block">
            <?php if ( $gallery->have_posts() ) { $count = 0;
                while ( $gallery->have_posts() ) {
                    $gallery->the_post();

                    if ( $count % 4 == 2 ){
                        the_post_thumbnail('large');
                    }
                    $count++;
                }
            } ?>
        </div>
    </div>
    <div class="four-col">
        <div class="block">
            <?php if ( $gallery->have_posts() ) { $count = 0;
                while ( $gallery->have_posts() ) {
                    $gallery->the_post();

                    if ( $count % 4 == 3 ){
                        the_post_thumbnail('large');
                    }
                    $count++;
                }
            } ?>
        </div>
    </div>


    <?php } ?>
</div>

<?php wp_reset_query(); ?>
