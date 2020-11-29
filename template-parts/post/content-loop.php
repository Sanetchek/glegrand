<div class="two-col">
    <div class="block">
        <article class="article">
            <?php
            the_post_thumbnail('medium');
            the_title('<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>');
            the_excerpt(  );
            ?>
        </article>
    </div>
</div>