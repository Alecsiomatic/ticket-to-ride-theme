# Ticket to Ride - Liquid Glass Theme

Un tema moderno para WordPress con efectos de vidrio líquido (glassmorphism), diseñado específicamente para Elementor y inspirado en los colores vibrantes de Ticket to Ride.

## 🎨 Características

- **Efectos Liquid Glass**: Efectos avanzados de glassmorphism con blur y transparencias
- **Colores Vibrantes**: Amarillo dorado (#FFC107) y rojo vibrante (#E81F26)
- **Compatible con Elementor**: Totalmente optimizado para el constructor Elementor
- **Responsive**: Diseño adaptable a todos los dispositivos
- **Animaciones Fluidas**: Efectos de animación suaves y profesionales
- **Personalizable**: Panel de personalización en WordPress para ajustar colores y efectos

## 📋 Requisitos

- WordPress 5.9 o superior
- PHP 7.4 o superior
- Elementor (recomendado)
- Navegador moderno con soporte para backdrop-filter

## 🚀 Instalación

1. Descarga el tema como archivo ZIP
2. Ve a WordPress Admin > Apariencia > Temas > Añadir nuevo
3. Haz clic en "Subir tema" y selecciona el archivo ZIP
4. Activa el tema después de la instalación

### Instalación Manual

1. Sube la carpeta `TicketToRideTheme` a `/wp-content/themes/`
2. Activa el tema desde WordPress Admin > Apariencia > Temas

## 🎯 Configuración Inicial

### 1. Subir Logo

1. Ve a **Apariencia > Personalizar > Identidad del sitio**
2. Sube tu logo de Ticket to Ride
3. Ajusta el tamaño recomendado: 300x100px

### 2. Configurar Menús

1. Ve a **Apariencia > Menús**
2. Crea un nuevo menú y asígnalo a "Menú Principal"
3. Crea otro menú para el footer si lo deseas

### 3. Personalizar Colores

1. Ve a **Apariencia > Personalizar > Colores del Tema**
2. Ajusta los colores principales:
   - Color Principal (Amarillo): `#FFC107`
   - Color Secundario (Rojo): `#E81F26`
3. Ajusta la intensidad del efecto blur en **Efectos Liquid Glass**

### 4. Configurar Elementor

1. Instala y activa Elementor
2. Crea una nueva página con Elementor
3. Usa las plantillas incluidas:
   - **Página de Inicio - Liquid Glass**
   - **Ancho Completo - Elementor**

## 📱 Plantillas Incluidas

### template-home.php
Plantilla principal para la página de inicio con sección hero y efectos liquid glass.

### template-full-width.php
Plantilla de ancho completo perfecta para páginas creadas con Elementor.

## 🎨 Clases CSS Disponibles

### Efectos de Vidrio Líquido

```html
<div class="liquid-glass">Contenido con efecto glass</div>
<div class="liquid-glass-red">Efecto glass con tinte rojo</div>
<div class="liquid-glass-yellow">Efecto glass con tinte amarillo</div>
<div class="glass-panel">Panel con reflejo</div>
<div class="frosted-glass">Vidrio esmerilado</div>
```

### Cards y Contenedores

```html
<div class="card">Card básico con efecto glass</div>
<div class="depth-card">Card con efecto de profundidad</div>
```

### Botones

```html
<a href="#" class="btn-primary">Botón Principal (Rojo)</a>
<a href="#" class="btn-secondary">Botón Secundario (Amarillo)</a>
<a href="#" class="btn-liquid">Botón con efecto líquido</a>
```

### Efectos Especiales

```html
<div class="liquid-wave">Efecto de ola líquida</div>
<div class="droplet-effect">Efecto de gotas</div>
<div class="ripple-effect">Efecto ripple al hacer hover</div>
```

### Utilidades

```html
<div class="text-center">Texto centrado</div>
<div class="text-red">Texto en rojo</div>
<div class="text-yellow">Texto en amarillo</div>
<div class="fade-in-up">Animación de entrada</div>
```

## 🔧 Shortcodes

### Botón Personalizado

```php
[ttr_button url="#" color="red" target="_self"]Texto del botón[/ttr_button]
```

Parámetros:
- `url`: URL del enlace (default: #)
- `color`: "red" o "yellow" (default: red)
- `target`: "_self" o "_blank" (default: _self)

### Card con Efecto Glass

```php
[ttr_card color="default"]
  Contenido de la card
[/ttr_card]
```

Parámetros:
- `color`: "default", "red" o "yellow" (default: default)

## 🎭 Áreas de Widgets

El tema incluye las siguientes áreas para widgets:

- **Sidebar Principal**: Barra lateral para posts y páginas
- **Footer 1, 2, 3**: Tres columnas en el footer

## 🎨 Paleta de Colores

```css
Amarillo Principal: #FFC107
Amarillo Oscuro: #FFA000
Rojo Principal: #E81F26
Rojo Oscuro: #C41E20
Blanco: #FFFFFF
```

## 🌐 Navegadores Compatibles

- Chrome 76+
- Firefox 70+
- Safari 13+
- Edge 79+

**Nota**: Los efectos de backdrop-filter pueden no funcionar en navegadores antiguos.

## 📦 Estructura de Archivos

```
TicketToRideTheme/
├── assets/
│   ├── css/
│   │   └── liquid-glass-effects.css
│   └── js/
│       └── theme-scripts.js
├── footer.php
├── functions.php
├── header.php
├── index.php
├── sidebar.php
├── style.css
├── template-full-width.php
├── template-home.php
└── README.md
```

## 🎓 Uso con Elementor

### Crear una Página de Inicio

1. Crea una nueva página llamada "Inicio"
2. Selecciona la plantilla "Página de Inicio - Liquid Glass"
3. Edita con Elementor
4. Añade secciones con la clase CSS `liquid-glass-section` para efectos glass

### Añadir Efectos a Secciones

En Elementor:
1. Selecciona una sección
2. Ve a Avanzado > Clases CSS
3. Añade: `liquid-glass-section` o `liquid-background`

### Estilos de Títulos

Para títulos con efecto glass:
1. Añade un widget de título
2. En Avanzado > Clases CSS añade: `glass-heading`

## 🔄 Actualizaciones

Este tema se actualiza regularmente. Para actualizar:

1. Descarga la última versión
2. Desactiva el tema actual
3. Elimina la carpeta del tema antiguo
4. Sube la nueva versión
5. Reactiva el tema

**Importante**: Guarda una copia de seguridad antes de actualizar.

## 💡 Tips y Trucos

### Mejorar el Rendimiento

- Usa las imágenes con lazy loading: `<img data-src="imagen.jpg" class="lazy">`
- Minimiza el uso de elementos con backdrop-filter en dispositivos móviles
- Optimiza las imágenes antes de subirlas

### Personalización Avanzada

Puedes añadir CSS personalizado en:
- **Apariencia > Personalizar > CSS Adicional**

Ejemplo para cambiar el color de los botones:
```css
.btn-primary {
    background: linear-gradient(135deg, #tu-color-1, #tu-color-2);
}
```

### Animaciones Personalizadas

Añade data-attribute para contadores animados:
```html
<span class="counter" data-count="150">0</span>
```

## 🐛 Solución de Problemas

### Los efectos de vidrio no se ven

- Verifica que tu navegador soporte `backdrop-filter`
- Asegúrate de que las clases CSS estén correctamente aplicadas
- Limpia la caché del navegador y de WordPress

### El menú no aparece

- Ve a **Apariencia > Menús** y asigna un menú a "Menú Principal"
- Verifica que el menú tenga elementos

### Las imágenes no cargan

- Verifica los permisos de la carpeta de medios
- Regenera las miniaturas con un plugin como "Regenerate Thumbnails"

## 📝 Licencia

Este tema está licenciado bajo GNU General Public License v2 o posterior.

## 👨‍💻 Soporte

Para soporte y consultas:
- Documentación: Este archivo README
- Issues: Reporta problemas en el repositorio del tema

## 🎉 Créditos

- Diseñado para **Ticket to Ride**
- Efectos de glassmorphism inspirados en las últimas tendencias de diseño UI
- Compatible con Elementor Page Builder

---

**Versión**: 1.0  
**Última actualización**: Noviembre 2025  
**Autor**: Custom Theme

¡Disfruta creando páginas impresionantes con efectos de vidrio líquido! 🎨✨
