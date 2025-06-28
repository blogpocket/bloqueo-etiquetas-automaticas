# Bloqueo de Etiquetas Automáticas

**Versión:** 1.2  
**Autor:** Antonio Cambronero & ChatGPT  
**Licencia:** GPLv2 o posterior

## Descripción

Este plugin evita que se asignen etiquetas automáticamente a los posts a partir del contenido (por ejemplo, hashtags como `#ejemplo`).  
Solo se conservarán las etiquetas introducidas manualmente desde el editor de entradas.

### ¿Por qué usarlo?

Algunos plugins o fragmentos de código pueden generar etiquetas a partir de hashtags encontrados en el contenido de las entradas.  
Este plugin bloquea completamente ese comportamiento y garantiza que **solo se usen las etiquetas que escribas manualmente**.

## Instalación

1. Descarga el archivo `.zip` de este repositorio.
2. Sube y activa el plugin en tu sitio de WordPress desde **Plugins > Añadir nuevo > Subir plugin**.
3. ¡Listo! No requiere configuración adicional.

## Cómo funciona

El plugin se engancha al hook `wp_insert_post` con alta prioridad (999), lo que garantiza que sobrescribe cualquier intento previo de añadir etiquetas automáticamente.  
Elimina cualquier etiqueta no introducida manualmente desde el editor del post.

## Changelog

### 1.2
- Se utiliza el hook `wp_insert_post` en lugar de `save_post` para garantizar que se anulan todas las etiquetas generadas automáticamente.

## Requisitos

- WordPress 5.0 o superior
- PHP 7.0 o superior

## Licencia

Este plugin está licenciado bajo la [GNU General Public License v2.0](https://www.gnu.org/licenses/gpl-2.0.html).
