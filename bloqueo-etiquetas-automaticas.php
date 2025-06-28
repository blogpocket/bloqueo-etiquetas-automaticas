<?php
/**
 * Plugin Name: Bloqueo de Etiquetas Automáticas
 * Description: Elimina etiquetas generadas automáticamente a partir de hashtags en el contenido. Funciona para todos los tipos de contenido que usen la taxonomía 'post_tag'.
 * Version: 2.0
 * Author: Antonio Cambronero & ChatGPT
 */

defined( 'ABSPATH' ) or die( 'Acceso directo no permitido.' );

add_action('wp_insert_post', 'bea_filtrar_etiquetas_automaticas_en_todos_los_post_types', 999, 3);
function bea_filtrar_etiquetas_automaticas_en_todos_los_post_types($post_id, $post, $update) {
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
    if ( wp_is_post_revision($post_id) ) return;
    if ( ! current_user_can('edit_post', $post_id) ) return;

    // Solo actuar en post types que usen la taxonomía 'post_tag'
    $taxonomies = get_object_taxonomies($post->post_type);
    if ( !in_array('post_tag', $taxonomies) ) return;

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
