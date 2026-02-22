<?php
/**
 * Theme Name: Ticket to Ride - Liquid Glass
 * Theme URI: https://tickettoride.com
 * Description: Tema con efectos liquid glass para Elementor
 * Author: Custom Theme
 * Version: 1.0
 * Text Domain: ticket-to-ride-liquid
 */

// Seguridad: No permitir acceso directo
if (!defined('ABSPATH')) {
    exit;
}

// Constantes del tema
define('TTR_THEME_VERSION', '1.4.1');
define('TTR_THEME_DIR', get_template_directory());
define('TTR_THEME_URI', get_template_directory_uri());

/**
 * Configuración del tema
 */
function ttr_theme_setup() {
    // Soporte para título del sitio
    add_theme_support('title-tag');
    
    // Soporte para logo personalizado
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    
    // Soporte para imágenes destacadas
    add_theme_support('post-thumbnails');
    
    // Soporte para HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    // Soporte para Elementor
    add_theme_support('elementor');
    
    // Registrar menús
    register_nav_menus(array(
        'primary' => __('Menú Principal', 'ticket-to-ride-liquid'),
        'footer'  => __('Menú Footer', 'ticket-to-ride-liquid'),
    ));
    
    // Tamaños de imagen personalizados
    add_image_size('ttr-featured', 1200, 600, true);
    add_image_size('ttr-thumbnail', 400, 300, true);
}
add_action('after_setup_theme', 'ttr_theme_setup');

/**
 * Enqueue scripts y estilos
 */
function ttr_enqueue_scripts() {
    // Estilo principal
    wp_enqueue_style('ttr-style', get_stylesheet_uri(), array(), TTR_THEME_VERSION);
    
    // Google Fonts
    wp_enqueue_style('ttr-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap', array(), null);
    
    // Estilos adicionales de liquid glass
    wp_enqueue_style('ttr-liquid-glass', TTR_THEME_URI . '/assets/css/liquid-glass-effects.css', array('ttr-style'), TTR_THEME_VERSION);
    
    // Estilos de Elementor personalizados
    wp_enqueue_style('ttr-elementor-custom', TTR_THEME_URI . '/assets/css/elementor-custom.css', array('ttr-style'), TTR_THEME_VERSION);
    
    // Scripts personalizados
    wp_enqueue_script('ttr-scripts', TTR_THEME_URI . '/assets/js/theme-scripts.js', array('jquery'), TTR_THEME_VERSION, true);
    
    // Pasar variables a JavaScript
    wp_localize_script('ttr-scripts', 'ttrTheme', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('ttr-nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'ttr_enqueue_scripts');

/**
 * Registrar áreas de widgets
 */
function ttr_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar Principal', 'ticket-to-ride-liquid'),
        'id'            => 'sidebar-1',
        'description'   => __('Añade widgets aquí', 'ticket-to-ride-liquid'),
        'before_widget' => '<section id="%1$s" class="widget liquid-glass %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer 1', 'ticket-to-ride-liquid'),
        'id'            => 'footer-1',
        'description'   => __('Primera columna del footer', 'ticket-to-ride-liquid'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer 2', 'ticket-to-ride-liquid'),
        'id'            => 'footer-2',
        'description'   => __('Segunda columna del footer', 'ticket-to-ride-liquid'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer 3', 'ticket-to-ride-liquid'),
        'id'            => 'footer-3',
        'description'   => __('Tercera columna del footer', 'ticket-to-ride-liquid'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'ttr_widgets_init');

/**
 * Añadir clases personalizadas al body
 */
function ttr_body_classes($classes) {
    $classes[] = 'ttr-liquid-glass-theme';
    
    if (is_page_template('template-full-width.php')) {
        $classes[] = 'full-width-template';
    }
    
    return $classes;
}
add_filter('body_class', 'ttr_body_classes');

/**
 * Personalizar el excerpt
 */
function ttr_custom_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'ttr_custom_excerpt_length');

function ttr_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'ttr_excerpt_more');

/**
 * Soporte para Elementor - Registrar ubicaciones de tema
 */
function ttr_register_elementor_locations($elementor_theme_manager) {
    $elementor_theme_manager->register_location('header');
    $elementor_theme_manager->register_location('footer');
    $elementor_theme_manager->register_location('single');
    $elementor_theme_manager->register_location('archive');
}
add_action('elementor/theme/register_locations', 'ttr_register_elementor_locations');

/**
 * Añadir opciones de personalización del tema
 */
function ttr_customize_register($wp_customize) {
    // Sección de colores
    $wp_customize->add_section('ttr_colors', array(
        'title'    => __('Colores del Tema', 'ticket-to-ride-liquid'),
        'priority' => 30,
    ));
    
    // Color principal (amarillo)
    $wp_customize->add_setting('ttr_primary_color', array(
        'default'   => '#FFC107',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ttr_primary_color', array(
        'label'    => __('Color Principal (Amarillo)', 'ticket-to-ride-liquid'),
        'section'  => 'ttr_colors',
        'settings' => 'ttr_primary_color',
    )));
    
    // Color secundario (rojo)
    $wp_customize->add_setting('ttr_secondary_color', array(
        'default'   => '#E81F26',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'ttr_secondary_color', array(
        'label'    => __('Color Secundario (Rojo)', 'ticket-to-ride-liquid'),
        'section'  => 'ttr_colors',
        'settings' => 'ttr_secondary_color',
    )));
    
    // Sección de efectos liquid glass
    $wp_customize->add_section('ttr_effects', array(
        'title'    => __('Efectos Liquid Glass', 'ticket-to-ride-liquid'),
        'priority' => 35,
    ));
    
    // Intensidad del blur
    $wp_customize->add_setting('ttr_blur_intensity', array(
        'default'   => 10,
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control('ttr_blur_intensity', array(
        'label'    => __('Intensidad del Blur (px)', 'ticket-to-ride-liquid'),
        'section'  => 'ttr_effects',
        'settings' => 'ttr_blur_intensity',
        'type'     => 'number',
        'input_attrs' => array(
            'min'  => 5,
            'max'  => 30,
            'step' => 1,
        ),
    ));
}
add_action('customize_register', 'ttr_customize_register');

/**
 * Aplicar colores personalizados
 */
function ttr_customizer_css() {
    $primary_color = get_theme_mod('ttr_primary_color', '#FFC107');
    $secondary_color = get_theme_mod('ttr_secondary_color', '#E81F26');
    $blur_intensity = get_theme_mod('ttr_blur_intensity', 10);
    ?>
    <style type="text/css">
        :root {
            --ttr-yellow: <?php echo esc_attr($primary_color); ?>;
            --ttr-red: <?php echo esc_attr($secondary_color); ?>;
        }
        .liquid-glass {
            backdrop-filter: blur(<?php echo esc_attr($blur_intensity); ?>px);
            -webkit-backdrop-filter: blur(<?php echo esc_attr($blur_intensity); ?>px);
        }
    </style>
    <?php
}
add_action('wp_head', 'ttr_customizer_css');

/**
 * Añadir soporte para Woocommerce (opcional)
 */
function ttr_woocommerce_support() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'ttr_woocommerce_support');

/**
 * Crear páginas de plantilla Elementor al activar el tema
 */
function ttr_theme_activation() {
    // Verificar si es la primera activación
    if (!get_option('ttr_theme_activated')) {
        // Marcar como activado
        update_option('ttr_theme_activated', true);
        
        // Aquí puedes añadir código para importar plantillas por defecto
    }
}
add_action('after_switch_theme', 'ttr_theme_activation');

/**
 * Shortcode para botón con efecto liquid glass
 */
function ttr_button_shortcode($atts, $content = null) {
    $atts = shortcode_atts(array(
        'color' => 'red',
        'url'   => '#',
        'target' => '_self',
    ), $atts);
    
    $class = ($atts['color'] === 'yellow') ? 'btn-secondary' : 'btn-primary';
    
    return sprintf(
        '<a href="%s" target="%s" class="%s">%s</a>',
        esc_url($atts['url']),
        esc_attr($atts['target']),
        esc_attr($class),
        esc_html($content)
    );
}
add_shortcode('ttr_button', 'ttr_button_shortcode');

/**
 * Shortcode para card con efecto liquid glass
 */
function ttr_card_shortcode($atts, $content = null) {
    $atts = shortcode_atts(array(
        'color' => 'default',
    ), $atts);
    
    $class = 'card';
    if ($atts['color'] === 'red') {
        $class .= ' liquid-glass-red';
    } elseif ($atts['color'] === 'yellow') {
        $class .= ' liquid-glass-yellow';
    }
    
    return sprintf('<div class="%s">%s</div>', esc_attr($class), do_shortcode($content));
}
add_shortcode('ttr_card', 'ttr_card_shortcode');

/**
 * Función helper para obtener el logo
 */
function ttr_get_logo() {
    if (has_custom_logo()) {
        the_custom_logo();
    } else {
        echo '<h1 class="site-title"><a href="' . esc_url(home_url('/')) . '">' . get_bloginfo('name') . '</a></h1>';
    }
}

/**
 * Menú de navegación
 */
function ttr_primary_menu() {
    wp_nav_menu(array(
        'theme_location' => 'primary',
        'menu_class'     => 'primary-menu',
        'container'      => 'nav',
        'container_class' => 'main-navigation',
        'fallback_cb'    => false,
    ));
}
