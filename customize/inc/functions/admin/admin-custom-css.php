<h1><?php _e('Custom CSS', 'customize'); ?></h1>

<form id="save-custom-css-form" method="post" action="options.php">
    <?php settings_fields( 'customize-custom-css-group' ); // function-admin-menu => function customize_theme_settings() ?>
    <?php do_settings_sections( 'customize_theme_custom_css' ); //имя страницы на которой выводим поля ?>
    <?php submit_button(); ?>
</form><?php
