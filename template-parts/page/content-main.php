    <div class="four-col">
        <div class="block">
           <?php
           the_title('<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>');
           the_excerpt();
           ?>
            <footer>
                <p>Автор статьи: <?php the_author_posts_link(); ?></p>
            </footer>
        </div>
    </div>

    <?php

    $text = 'content-main.php - end of code';

    echo strip_tags($text);

    ?>