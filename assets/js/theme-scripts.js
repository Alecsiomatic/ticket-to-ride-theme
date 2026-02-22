/**
 * Theme JavaScript
 * Ticket to Ride - Liquid Glass Theme
 */

(function($) {
    'use strict';

    // Esperar a que el documento esté listo
    $(document).ready(function() {
        
        // Añadir burbujas flotantes al fondo
        function createBubbles() {
            if ($('.bubble-background').length === 0) {
                $('body').append('<div class="bubble-background"></div>');
                
                for (let i = 0; i < 5; i++) {
                    $('.bubble-background').append('<div class="bubble"></div>');
                }
            }
        }
        
        createBubbles();
        
        // Efecto de parallax suave en elementos liquid glass
        $(window).on('scroll', function() {
            let scrolled = $(window).scrollTop();
            
            $('.liquid-glass').each(function() {
                let speed = 0.5;
                let offset = $(this).offset().top;
                let yPos = -(scrolled - offset) * speed;
                
                // Solo aplicar si el elemento está en el viewport
                if (offset < scrolled + $(window).height() && offset + $(this).height() > scrolled) {
                    $(this).find('::before').css('transform', 'translateY(' + yPos + 'px)');
                }
            });
        });
        
        // Efecto ripple en botones
        $('.btn-primary, .btn-secondary, .btn-liquid').on('click', function(e) {
            let $button = $(this);
            let $ripple = $('<span class="ripple"></span>');
            
            let diameter = Math.max($button.outerWidth(), $button.outerHeight());
            let radius = diameter / 2;
            
            $ripple.css({
                width: diameter,
                height: diameter,
                left: e.pageX - $button.offset().left - radius,
                top: e.pageY - $button.offset().top - radius
            });
            
            $ripple.appendTo($button);
            
            setTimeout(function() {
                $ripple.remove();
            }, 600);
        });
        
        // Animación de entrada para cards
        function animateCards() {
            $('.card, .depth-card').each(function() {
                let cardTop = $(this).offset().top;
                let cardBottom = cardTop + $(this).outerHeight();
                let viewportTop = $(window).scrollTop();
                let viewportBottom = viewportTop + $(window).height();
                
                if (cardBottom > viewportTop && cardTop < viewportBottom) {
                    $(this).addClass('fade-in-up');
                }
            });
        }
        
        animateCards();
        $(window).on('scroll', animateCards);
        
        // Efecto de gotas aleatorias
        function createDroplets() {
            if ($('.droplet-effect').length > 0) {
                setInterval(function() {
                    $('.droplet-effect').each(function() {
                        let $droplet = $('<div class="droplet"></div>');
                        let randomX = Math.random() * 100;
                        
                        $droplet.css({
                            left: randomX + '%',
                            animationDelay: Math.random() * 2 + 's'
                        });
                        
                        $(this).append($droplet);
                        
                        setTimeout(function() {
                            $droplet.remove();
                        }, 3000);
                    });
                }, 2000);
            }
        }
        
        createDroplets();
        
        // Smooth scroll para enlaces internos
        $('a[href^="#"]').on('click', function(e) {
            let target = $(this.hash);
            
            if (target.length) {
                e.preventDefault();
                
                $('html, body').animate({
                    scrollTop: target.offset().top - 100
                }, 800, 'swing');
            }
        });
        
        // Menú móvil responsive
        let mobileMenuToggle = $('<button class="mobile-menu-toggle">☰</button>');
        $('.main-navigation').prepend(mobileMenuToggle);
        
        mobileMenuToggle.on('click', function() {
            $('.main-navigation ul').slideToggle(300);
            $(this).toggleClass('active');
        });
        
        // Ajustar menú en resize
        $(window).on('resize', function() {
            if ($(window).width() > 768) {
                $('.main-navigation ul').css('display', '');
            }
        });
        
        // Efecto de hover mejorado para cards
        $('.card, .depth-card, .glass-panel').hover(
            function() {
                $(this).css('transform', 'translateY(-5px) scale(1.02)');
            },
            function() {
                $(this).css('transform', '');
            }
        );
        
        // Lazy loading para imágenes
        if ('IntersectionObserver' in window) {
            let imageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        let image = entry.target;
                        image.src = image.dataset.src;
                        image.classList.add('loaded');
                        imageObserver.unobserve(image);
                    }
                });
            });
            
            document.querySelectorAll('img[data-src]').forEach(function(img) {
                imageObserver.observe(img);
            });
        }
        
        // Añadir clase al hacer scroll
        $(window).on('scroll', function() {
            if ($(window).scrollTop() > 100) {
                $('body').addClass('scrolled');
                $('.site-header').addClass('scrolled');
            } else {
                $('body').removeClass('scrolled');
                $('.site-header').removeClass('scrolled');
            }
        });
        
        // Preloader opcional
        $(window).on('load', function() {
            $('.preloader').fadeOut(500);
        });
        
        // Añadir efectos de mouse para elementos glass
        $('.liquid-glass, .glass-panel').on('mousemove', function(e) {
            let rect = this.getBoundingClientRect();
            let x = e.clientX - rect.left;
            let y = e.clientY - rect.top;
            
            $(this).css({
                '--mouse-x': x + 'px',
                '--mouse-y': y + 'px'
            });
        });
        
        // Contador animado para números
        function animateCounter() {
            $('.counter').each(function() {
                let $this = $(this);
                let countTo = $this.attr('data-count');
                
                $({countNum: 0}).animate({
                    countNum: countTo
                }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function() {
                        $this.text(Math.floor(this.countNum));
                    },
                    complete: function() {
                        $this.text(this.countNum);
                    }
                });
            });
        }
        
        // Trigger contador cuando sea visible
        $(window).on('scroll', function() {
            $('.counter').each(function() {
                let counterTop = $(this).offset().top;
                let viewportBottom = $(window).scrollTop() + $(window).height();
                
                if (counterTop < viewportBottom && !$(this).hasClass('counted')) {
                    $(this).addClass('counted');
                    animateCounter();
                }
            });
        });
        
    });
    
    // Efectos adicionales al cargar la ventana
    $(window).on('load', function() {
        // Animar elementos con clase fade-in-up
        $('.fade-in-up').each(function(index) {
            $(this).css({
                'animation-delay': (index * 0.1) + 's'
            });
        });
    });
    
    // ==================================================
    // EVENTON - Traducciones al Español
    // ==================================================
    function translateEventON() {
        // Diccionario de traducciones
        var translations = {
            // Títulos y encabezados
            'Event Details': 'Detalles del Evento',
            'Time': 'Horario',
            'Ticket Section Title': 'Sección de Boletos',
            'Tickets': 'Boletos',
            
            // Leyendas de asientos
            'Seat Legends': 'Leyenda de Asientos',
            'Unavailable (Sold Out)': 'No Disponible (Agotado)',
            'Unavailable': 'No Disponible',
            'Sold Out': 'Agotado',
            "In someone's cart": 'En el carrito de otro usuario',
            'Your selected seats': 'Tus asientos seleccionados',
            'Seats in your cart': 'Asientos en tu carrito',
            'Reserved': 'Reservado',
            'Handicap Accessible': 'Acceso para Discapacitados',
            
            // Etiquetas del tooltip de asientos
            'SEC': 'SECC',
            'ROW': 'FILA',
            'SEAT': 'ASIENTO',
            'Ticket Price': 'Precio del Boleto',
            
            // Controles del mapa
            'Reset Map': 'Restablecer Mapa',
            'Loading Image..': 'Cargando Imagen...',
            'Loading..': 'Cargando...',
            
            // Carrito de boletos
            'Your Tickets In Cart': 'Tus Boletos en el Carrito',
            'Your seats will expire in': 'Tus asientos expirarán en',
            'Seats': 'Asientos',
            'Buy Now': 'Comprar Ahora',
            
            // Botones de carrito
            'View Cart': 'Ver Carrito',
            'Checkout': 'Finalizar Compra',
            'Add to Cart': 'Agregar al Carrito',
            'Added to cart': 'Agregado al Carrito',
            
            // Mensajes
            'Ticket could not be added to cart, try again later!': '¡No se pudo agregar el boleto al carrito, intenta más tarde!',
            'Quantity of Zero can not be added to cart!': '¡No se puede agregar una cantidad de cero al carrito!',
            'Price must be higher than minimum!': '¡El precio debe ser mayor al mínimo!',
            'Seats added to cart will expire in 15 minutes of inactivity in cart.': 'Los asientos agregados al carrito expirarán después de 15 minutos de inactividad.',
            
            // Más/Menos
            'more': 'más',
            'less': 'menos',
            'Show More': 'Mostrar Más',
            'Show Less': 'Mostrar Menos'
        };
        
        // Función para reemplazar texto en elementos
        function replaceText(selector) {
            $(selector).each(function() {
                var $el = $(this);
                
                // Para elementos con texto directo
                $el.contents().filter(function() {
                    return this.nodeType === 3; // Text nodes
                }).each(function() {
                    var text = this.textContent.trim();
                    if (translations[text]) {
                        this.textContent = this.textContent.replace(text, translations[text]);
                    }
                });
                
                // Para el texto del elemento completo
                var elementText = $el.text().trim();
                if (translations[elementText]) {
                    $el.text(translations[elementText]);
                }
            });
        }
        
        // Aplicar traducciones a elementos específicos de EventON
        replaceText('.evo_h3');
        replaceText('.legends_trig');
        replaceText('.evost_seat_legends_box span');
        replaceText('.evost_view_control span');
        replaceText('.evotx_cart_actions .evcal_btn');
        replaceText('.ev_more_text');
        replaceText('.evost_seats_footer p');
        replaceText('.evocard_main_image_hold');
        
        // Tooltip y etiquetas de asientos
        replaceText('.evost_ttc_data .label');
        replaceText('.evost_tt_data .label');
        replaceText('.evost_tix_title');
        replaceText('.evost_stub_action .count');
        replaceText('.evost_stub_action .evcal_btn');
        replaceText('.evost_cart_expirations span');
        
        // Traducir atributos data-txt y data-t
        $('[data-txt="less"]').attr('data-txt', 'menos');
        $('[data-txt="more"]').attr('data-txt', 'más');
        $('[data-t="Loading Image.."]').attr('data-t', 'Cargando Imagen...');
        
        // Forzar que las tarjetas de evento estén abiertas
        $('.event_description.evcal_eventcard').addClass('open').show();
        
        // Forzar que el contenido esté visible
        $('.eventon_full_description').css({
            'max-height': 'none',
            'overflow': 'visible'
        });
    }
    
    // Ejecutar traducciones cuando el DOM esté listo
    $(document).ready(function() {
        // Ejecutar inmediatamente
        setTimeout(translateEventON, 100);
        
        // Ejecutar de nuevo después de que AJAX cargue contenido
        setTimeout(translateEventON, 500);
        setTimeout(translateEventON, 1500);
        
        // Observar cambios en el DOM para contenido dinámico
        if (typeof MutationObserver !== 'undefined') {
            var observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.addedNodes.length > 0) {
                        setTimeout(translateEventON, 50);
                    }
                });
            });
            
            // Observar el body para cambios
            if (document.body) {
                observer.observe(document.body, {
                    childList: true,
                    subtree: true
                });
            }
        }
    });
    
})(jQuery);
