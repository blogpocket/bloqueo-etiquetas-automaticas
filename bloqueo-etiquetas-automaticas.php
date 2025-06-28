<?php
/**
 * Plugin Name: Bloqueo de Etiquetas Automáticas
 * Description: Elimina etiquetas que se hayan generado automáticamente a partir del contenido del post (por ejemplo, hashtags con #). Mantiene solo las etiquetas introducidas manualmente.
 * Version: 1.3
 * Author: Antonio Cambronero & ChatGPT
 */

defined( 'ABSPATH' ) or die( 'Acceso directo no permitido.' );

add_action('wp_insert_post', 'bea_filtrar_etiquetas_automaticas', 999, 3);
function bea_filtrar_etiquetas_automaticas($post_id, $post, $update) {
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
    if ( wp_is_post_revision($post_id) ) return;
    if ( ! current_user_can('edit_post', $post_id) ) return;
    if ( $post->post_type !== 'post' ) return;

    // Obtener contenido y etiquetas actuales
    $content = $post->post_content;
    $tags = wp_get_post_tags($post_id, array('fields' => 'names'));

    // Detectar hashtags en el contenido
    preg_match_all('/#(\w+)/u', $content, $matches);
    $hashtags_en_contenido = array_map('strtolower', $matches[1]);

    // Filtrar etiquetas que NO son hashtags
    $etiquetas_filtradas = array_filter($tags, function($tag) use ($hashtags_en_contenido) {
        return !in_array(strtolower($tag), $hashtags_en_contenido);
    });

    // Reemplazar las etiquetas del post con las etiquetas filtradas
    wp_set_post_tags($post_id, $etiquetas_filtradas, false);
}
