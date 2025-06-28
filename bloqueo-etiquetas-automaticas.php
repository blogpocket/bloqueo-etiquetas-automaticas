<?php
/**
 * Plugin Name: Bloqueo de Etiquetas Automáticas
 * Description: Solo permite etiquetas asignadas manualmente. Elimina cualquier etiqueta añadida automáticamente por contenido (como hashtags con #).
 * Version: 1.2
 * Author: Antonio Cambronero & ChatGPT
 */

defined( 'ABSPATH' ) or die( 'Acceso directo no permitido.' );

// Hook en el último momento posible antes de guardar definitivamente
add_action('wp_insert_post', 'bea_bloquear_etiquetas_automaticas', 999, 3);
function bea_bloquear_etiquetas_automaticas($post_id, $post, $update) {
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
    if ( wp_is_post_revision($post_id) ) return;
    if ( ! current_user_can('edit_post', $post_id) ) return;
    if ( $post->post_type !== 'post' ) return;

    if ( isset($_POST['tax_input']['post_tag']) ) {
        $manual_tags_raw = $_POST['tax_input']['post_tag'];
        $manual_tags_array = array_map('sanitize_text_field', explode(',', $manual_tags_raw));
        wp_set_post_tags($post_id, $manual_tags_array, false); // Reemplaza completamente
    } else {
        wp_set_post_tags($post_id, array(), false); // Elimina todas si no se enviaron
    }
}
