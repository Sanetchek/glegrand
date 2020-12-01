<?php get_header(); ?>

<div id="content" class="wrapper">

    <!-- This sets the $curauth variable -->

    <?php
    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
    ?>

    <h2 class="author-name"><?php _e('Автор: ', 'theme_language'); ?><b><?php echo $curauth->nickname; ?></b></h2>

    <div class="author-info">
        <div class="author-sitename">
            <span><?php _e('Название сайта:', 'theme_language'); ?></span>
            <span><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></span>
        </div>
        <div class="author-description">
            <span><?php _e('О себе: ', 'theme_language'); ?></span>
            <span><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_description; ?></a></span>
        </div>

    </div>

    <h2><?php _e('Публикации автора', 'theme_language'); ?>:</h2>

    <ul class="author-posts">
        <!-- The Loop -->

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <li><?php _e('Название: ', 'theme_language'); ?>
                <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
                    <b><?php the_title(); ?></b></a>,
                <?php _e('Дата: ', 'theme_language'); ?><i><?php the_time('d M Y'); ?></i> <?php _e('в', 'theme_language'); ?> <?php the_category('&');?>
            </li>

        <?php endwhile; else: ?>
            <p><?php _e('У этого автора публикаций пока нет.', 'theme_language'); ?></p>

        <?php endif; ?>

        <!-- End Loop -->

    </ul>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?> 