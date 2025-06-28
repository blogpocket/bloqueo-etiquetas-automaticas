# Bloqueo de Etiquetas Automáticas

**Versión:** 1.3  
**Autor:** Antonio Cambronero & ChatGPT  
**Licencia:** GPLv2 o posterior

## Descripción

Este plugin elimina etiquetas que se hayan generado automáticamente a partir del contenido del post (por ejemplo, hashtags como `#ejemplo`).  
Solo se conservarán las etiquetas introducidas manualmente desde el editor de entradas.

### ¿Por qué usarlo?

Algunos plugins o fragmentos de código pueden generar etiquetas a partir de hashtags encontrados en el contenido de las entradas.  
Este plugin bloquea ese comportamiento y garantiza que **solo se usen las etiquetas que escribas manualmente**.

## Instalación

1. Descarga el archivo `.zip` de este repositorio.
2. Sube y activa el plugin en tu sitio de WordPress desde **Plugins > Añadir nuevo > Subir plugin**.
3. ¡Listo! No requiere configuración adicional.

## Cómo funciona

El plugin escanea el contenido del post y elimina cualquier etiqueta que coincida con hashtags encontrados en el texto.  
De esta forma, se preservan únicamente las etiquetas introducidas manualmente.

## Changelog

### 1.3
- Nuevo enfoque: se eliminan solo las etiquetas que coincidan con hashtags detectados en el contenido.

### 1.2
- Cambio de hook a `wp_insert_post` para mayor prioridad y control.

## Requisitos

- WordPress 5.0 o superior
- PHP 7.0 o superior

## Licencia

Este plugin está licenciado bajo la [GNU General Public License v2.0](https://www.gnu.org/licenses/gpl-2.0.html).
