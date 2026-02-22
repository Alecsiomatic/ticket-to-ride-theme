<?php
/**
 * Template Name: Página de Inicio - Liquid Glass
 * Template Post Type: page
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="hero-section section">
        <div class="container">
            <div class="hero-content liquid-glass fade-in-up">
                <h1 class="hero-title"><?php the_title(); ?></h1>
                <div class="hero-description">
                    <?php the_content(); ?>
                </div>
                <div class="hero-buttons">
                    <a href="#servicios" class="btn-primary">Explorar Servicios</a>
                    <a href="#contacto" class="btn-secondary">Contáctanos</a>
                </div>
            </div>
        </div>
    </section>

    <?php
    // Si Elementor está activo, mostrar el contenido de Elementor
    if (did_action('elementor/loaded')) {
        // El contenido de Elementor se renderiza automáticamente
    }
    ?>
</main>

<?php
get_footer();
