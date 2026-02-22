<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <section class="error-404 not-found liquid-glass">
            <header class="page-header">
                <h1 class="page-title"><?php _e('¡Oops! Página no encontrada', 'ticket-to-ride-liquid'); ?></h1>
            </header>

            <div class="page-content">
                <p><?php _e('Parece que no podemos encontrar lo que estás buscando. Tal vez la búsqueda puede ayudar.', 'ticket-to-ride-liquid'); ?></p>

                <?php get_search_form(); ?>

                <div class="error-buttons" style="margin-top: 30px;">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn-primary">
                        <?php _e('Volver al Inicio', 'ticket-to-ride-liquid'); ?>
                    </a>
                </div>
            </div>
        </section>
    </div>
</main>

<?php
get_footer();
