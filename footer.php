    </div><!-- #content -->

    <footer id="colophon" class="site-footer">
        <div class="container">
            <div class="footer-widgets">
                <div class="footer-column">
                    <?php dynamic_sidebar('footer-1'); ?>
                </div>
                <div class="footer-column">
                    <?php dynamic_sidebar('footer-2'); ?>
                </div>
                <div class="footer-column">
                    <?php dynamic_sidebar('footer-3'); ?>
                </div>
            </div>
            
            <div class="footer-bottom">
                <div class="footer-info">
                    <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('Todos los derechos reservados.', 'ticket-to-ride-liquid'); ?></p>
                </div>
                
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'menu_class'     => 'footer-menu',
                    'container'      => 'nav',
                    'container_class' => 'footer-navigation',
                    'fallback_cb'    => false,
                ));
                ?>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
