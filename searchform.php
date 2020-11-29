<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="search"
           class="search-field"
           placeholder="<?php echo _e( 'Что найти &hellip; ?', 'placeholder', 'glegrand' ); ?>"
           value="<?php echo get_search_query(); ?>"
           name="s" />

    <button type="submit" class="search-submit button button-primary"><span class="search-text"><?php echo _e( 'Найти', 'submit button', 'glegrand' ); ?></span></button>
</form>