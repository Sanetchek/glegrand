Для того чтобы Форма Комментариев работала нужно подключить:
1. в файл function.php
        /*
         * Simple ajax comment form mod                         -   ON
         * Disable comment js                                   -   ON
         * Comment form                                         -   ON
         * Reorder comment fields                               -   ON
         */
        require_once('comments/function-comments.php');

2. а в файл comments.php
        <?php

        get_template_part( 'comments/template-parts/content', 'comments' );

        ?>