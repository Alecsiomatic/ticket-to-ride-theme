<?php
/**
 * The template for displaying single posts
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <?php
        while (have_posts()) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('single-post liquid-glass'); ?>>
                
                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-featured-image">
                        <?php the_post_thumbnail('ttr-featured'); ?>
                    </div>
                <?php endif; ?>
                
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    
                    <div class="entry-meta">
                        <span class="posted-on">
                            <time datetime="<?php echo get_the_date('c'); ?>">
                                <?php echo get_the_date(); ?>
                            </time>
                        </span>
                        <span class="byline">
                            por <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                <?php the_author(); ?>
                            </a>
                        </span>
                        <?php if (has_category()) : ?>
                            <span class="cat-links">
                                en <?php the_category(', '); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                </header>

                <div class="entry-content">
                    <?php
                    the_content();

                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . __('Páginas:', 'ticket-to-ride-liquid'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div>

                <?php if (has_tag()) : ?>
                    <footer class="entry-footer">
                        <div class="tags-links">
                            <?php the_tags('<span class="tags-label">Etiquetas: </span>', ', '); ?>
                        </div>
                    </footer>
                <?php endif; ?>
            </article>

            <?php
            // Navegación entre posts
            the_post_navigation(array(
                'prev_text' => '<span class="nav-subtitle">' . __('Anterior:', 'ticket-to-ride-liquid') . '</span> <span class="nav-title">%title</span>',
                'next_text' => '<span class="nav-subtitle">' . __('Siguiente:', 'ticket-to-ride-liquid') . '</span> <span class="nav-title">%title</span>',
            ));

            // Si los comentarios están abiertos o hay al menos un comentario
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;

        endwhile;
        ?>
    </div>
</main>

<?php
get_footer();
