# Guía de Instalación Rápida - Ticket to Ride Theme

## 📦 Pasos de Instalación

### 1. Preparar el Tema

Comprime toda la carpeta `TicketToRideTheme` en un archivo ZIP.

```bash
# En Windows (PowerShell)
Compress-Archive -Path TicketToRideTheme -DestinationPath TicketToRideTheme.zip
```

### 2. Instalar en WordPress

1. **Subir el tema:**
   - Ve a tu WordPress Admin
   - Navega a: **Apariencia > Temas > Añadir nuevo**
   - Haz clic en **Subir tema**
   - Selecciona el archivo `TicketToRideTheme.zip`
   - Haz clic en **Instalar ahora**

2. **Activar el tema:**
   - Una vez instalado, haz clic en **Activar**

### 3. Configuración Inicial (5 minutos)

#### A. Subir el Logo

1. Ve a: **Apariencia > Personalizar > Identidad del sitio**
2. En "Logo", haz clic en **Seleccionar logo**
3. Sube tu imagen de "Ticket to Ride"
4. Ajusta el tamaño si es necesario
5. Haz clic en **Publicar**

#### B. Configurar Menú

1. Ve a: **Apariencia > Menús**
2. Crea un nuevo menú (ej: "Menú Principal")
3. Añade páginas: Inicio, Servicios, Contacto, etc.
4. En "Ajustes del menú", marca **Menú Principal**
5. Guarda el menú

#### C. Personalizar Colores (Opcional)

1. Ve a: **Apariencia > Personalizar > Colores del Tema**
2. Ajusta:
   - **Color Principal (Amarillo)**: `#FFC107`
   - **Color Secundario (Rojo)**: `#E81F26`
3. En **Efectos Liquid Glass**:
   - **Intensidad del Blur**: 10-15px
4. Haz clic en **Publicar**

### 4. Instalar Elementor

1. Ve a: **Plugins > Añadir nuevo**
2. Busca: **Elementor**
3. Instala y activa **Elementor Page Builder**

### 5. Crear tu Primera Página

#### Opción A: Página de Inicio con Plantilla

1. Ve a: **Páginas > Añadir nueva**
2. Título: "Inicio"
3. En "Atributos de página" > "Plantilla": Selecciona **Página de Inicio - Liquid Glass**
4. Haz clic en **Editar con Elementor**
5. Diseña tu página con los widgets de Elementor

#### Opción B: Página en Blanco con Elementor

1. Ve a: **Páginas > Añadir nueva**
2. Título de la página
3. En "Atributos de página" > "Plantilla": Selecciona **Ancho Completo - Elementor**
4. Haz clic en **Editar con Elementor**
5. Empieza desde cero

### 6. Aplicar Efectos Liquid Glass en Elementor

#### Para Secciones:

1. Selecciona una sección en Elementor
2. Ve a: **Avanzado > Clases CSS**
3. Añade una de estas clases:
   - `liquid-glass-bg` - Fondo con efecto glass
   - `liquid-background` - Fondo con animación
   - `dark-overlay` - Overlay oscuro

#### Para Títulos:

1. Añade un widget de **Título**
2. Ve a: **Avanzado > Clases CSS**
3. Añade: `gradient-text`

#### Para Columnas:

1. Selecciona una columna
2. Ve a: **Avanzado > Clases CSS**
3. Añade: `glass-column`

### 7. Configurar Widgets del Footer

1. Ve a: **Apariencia > Widgets**
2. Arrastra widgets a:
   - **Footer 1**: Ej. Texto con información de contacto
   - **Footer 2**: Ej. Menú de navegación o enlaces
   - **Footer 3**: Ej. Últimas entradas o iconos sociales

### 8. Establecer Página de Inicio

1. Ve a: **Ajustes > Lectura**
2. En "Tu página de inicio muestra":
   - Selecciona: **Una página estática**
   - **Página de inicio**: Selecciona tu página "Inicio"
3. Guarda los cambios

## 🎨 Tips para Mejores Resultados

### Usar los Shortcodes del Tema

**Botones:**
```
[ttr_button url="/contacto" color="red"]Contáctanos[/ttr_button]
[ttr_button url="/servicios" color="yellow"]Ver Servicios[/ttr_button]
```

**Cards:**
```
[ttr_card color="yellow"]
Tu contenido aquí
[/ttr_card]
```

### Colores Recomendados

Al crear contenido en Elementor, usa estos colores para mantener la coherencia:

- **Amarillo principal**: `#FFC107`
- **Rojo principal**: `#E81F26`
- **Blanco**: `#FFFFFF`
- **Texto oscuro**: `#333333`

### Imágenes Optimizadas

- Usa imágenes de alta calidad
- Optimiza antes de subir (máx 200KB por imagen)
- Formatos recomendados: JPG para fotos, PNG para logos

## ⚠️ Solución de Problemas Comunes

### Los efectos de vidrio no se ven

**Solución:**
1. Ve a **Apariencia > Personalizar**
2. Busca "CSS Adicional" al final del menú
3. Añade:
```css
.liquid-glass {
    backdrop-filter: blur(10px) !important;
    -webkit-backdrop-filter: blur(10px) !important;
}
```

### El menú no aparece

**Solución:**
1. Ve a **Apariencia > Menús**
2. Verifica que el menú esté asignado a "Menú Principal"
3. Asegúrate de que tenga al menos un elemento

### El logo es muy grande/pequeño

**Solución:**
1. Ve a **Apariencia > Personalizar > CSS Adicional**
2. Añade:
```css
.site-logo img {
    max-height: 60px !important;
}
```

### Elementor no carga correctamente

**Solución:**
1. Ve a **Plugins**
2. Desactiva y reactiva Elementor
3. Ve a **Elementor > Herramientas > Regenerar CSS**
4. Limpia la caché del navegador

## 📞 Checklist Final

- [ ] Tema instalado y activado
- [ ] Logo subido
- [ ] Menú configurado
- [ ] Colores personalizados
- [ ] Elementor instalado
- [ ] Página de inicio creada
- [ ] Widgets del footer configurados
- [ ] Página de inicio establecida en Ajustes > Lectura
- [ ] Probado en móvil y desktop

## 🚀 ¡Listo!

Tu sitio de Ticket to Ride con efectos liquid glass está listo para usar.

**Próximos pasos:**
- Crea más páginas (Servicios, Contacto, etc.)
- Añade contenido y publicaciones
- Personaliza aún más con Elementor
- Prueba en diferentes dispositivos

---

**Tiempo estimado de instalación**: 15-20 minutos  
**Nivel de dificultad**: Principiante-Intermedio

¡Disfruta tu nuevo tema! 🎉
