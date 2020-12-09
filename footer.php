                <div id="footer-menu">
                    <?php
                    wp_nav_menu( [
                        'theme_location'  => 'second',
                        'container'       => 'div',
                        'container_class' => 'footer-container-menu',
                        'menu_class'      => 'footer-menu',
                        'before'          => '<div class="block">',
                        'after'           => '</div>',
                        'link_before'     => '',
                        'items_wrap'      => '<ul id="footer-wrap-menu" class="raw">%3$s</ul>',
                        'depth'           => 0,
                    ] );
                    ?>
                </div>
            </div>
            <div class="clearfix"></div>
    </main>

    <footer class="footer">

        <?php

        get_template_part( 'template-parts/footer/content', 'footer' );

        ?>

    </footer>

<?php wp_footer(); ?>

</body>
</html>
