# Bloqueo de Etiquetas Automáticas

**Versión:** 2.0  
**Autor:** Antonio Cambronero & ChatGPT  
**Licencia:** GPLv2 o posterior

## Descripción

Este plugin elimina etiquetas generadas automáticamente a partir de hashtags en el contenido del post. Funciona no solo en las entradas (`post`) estándar, sino también en todos los **tipos personalizados de post** que utilicen la taxonomía `post_tag`.

## ¿Por qué usarlo?

Si utilizas hashtags como `#ejemplo` en el contenido de tus entradas o podcasts, algunos plugins podrían convertirlos automáticamente en etiquetas. Este plugin evita ese comportamiento.

## Instalación

1. Descarga el archivo `.zip` de este repositorio.
2. Sube y activa el plugin en tu sitio de WordPress desde **Plugins > Añadir nuevo > Subir plugin**.
3. ¡Listo! No requiere configuración adicional.

## Cómo funciona

- Detecta hashtags en el contenido (`#etiqueta`)
- Compara con las etiquetas actuales del post
- Elimina aquellas etiquetas que coincidan con hashtags, conservando solo las asignadas manualmente

## Compatibilidad

✅ Funciona con cualquier tipo de post que use etiquetas (`post_tag`), como entradas, podcasts, artículos, etc.

## Changelog

### 2.0
- Soporte completo para tipos de post personalizados con `post_tag`.

### 1.3
- Se eliminan solo las etiquetas que coincidan con hashtags detectados en el contenido.

## Requisitos

- WordPress 5.0 o superior
- PHP 7.0 o superior

## Licencia

Este plugin está licenciado bajo la [GNU General Public License v2.0](https://www.gnu.org/licenses/gpl-2.0.html).
