<?php
/**
 * Template Name: Ancho Completo - Elementor
 * Template Post Type: page
 */

get_header();
?>

<main id="primary" class="site-main full-width">
    <?php
    while (have_posts()) :
        the_post();
        the_content();
    endwhile;
    ?>
</main>

<?php
get_footer();
