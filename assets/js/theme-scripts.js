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
    
})(jQuery);
