<?php
/**
 * The main template file
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <div class="content-area liquid-glass">
            <?php
            if (have_posts()) :
                
                if (is_home() && !is_front_page()) :
                    ?>
                    <header>
                        <h1 class="page-title"><?php single_post_title(); ?></h1>
                    </header>
                    <?php
                endif;

                /* Start the Loop */
                while (have_posts()) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail('ttr-featured'); ?>
                            </div>
                        <?php endif; ?>
                        
                        <header class="entry-header">
                            <h2 class="entry-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <div class="entry-meta">
                                <span class="posted-on"><?php echo get_the_date(); ?></span>
                                <span class="byline"> por <?php the_author(); ?></span>
                            </div>
                        </header>

                        <div class="entry-content">
                            <?php the_excerpt(); ?>
                        </div>

                        <footer class="entry-footer">
                            <a href="<?php the_permalink(); ?>" class="btn-primary">Leer más</a>
                        </footer>
                    </article>
                    <?php
                endwhile;

                the_posts_navigation();

            else :
                ?>
                <p><?php _e('No se encontraron publicaciones.', 'ticket-to-ride-liquid'); ?></p>
                <?php
            endif;
            ?>
        </div>
        
        <?php get_sidebar(); ?>
    </div>
</main>

<?php
get_footer();
