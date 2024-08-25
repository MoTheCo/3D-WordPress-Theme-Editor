<?php
/*
 * Plugin Name: 3d Theme Editor
 * Description: Ermöglicht das Anpassen von Texten und Iframe-URLs für ein Three.js-Projekt im WordPress-Backend.
 * Version: 1.0
 * Author: Adam Moldovan
 */

require_once(explode("wp-content", __FILE__)[0] . "wp-load.php");

// Admin-Menü hinzufügen
add_action('admin_menu', 'custom_threejs_texts_menu');
function custom_threejs_texts_menu() {
    add_options_page('3D Theme Editor', '3D Theme Editor', 'manage_options', 'custom-threejs-texts', 'custom_threejs_texts_options');
}

// Einstellungen registrieren
add_action('admin_init', 'custom_threejs_texts_register_settings');
function custom_threejs_texts_register_settings() {
    $settings = [
        'threejs_main_title', 'threejs_field1_title', 'threejs_field2_title', 'threejs_field3_title',
        'threejs_iframe1_title', 'threejs_iframe2_title', 'threejs_iframe3_title',
        'threejs_iframe1_url', 'threejs_iframe2_url', 'threejs_iframe3_url'
    ];
    foreach ($settings as $setting) {
        register_setting('custom_threejs_texts_options_group', $setting);
    }
}

// Einstellungen-Seite
function custom_threejs_texts_options() {
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }
    require_once('settings-page.php');
}

// Function to update JSON when specific options are updated
function custom_threejs_texts_json() {
    $data = array(
        'main_title' => get_option('threejs_main_title'),
        'field1_title' => get_option('threejs_field1_title'),
        'field2_title' => get_option('threejs_field2_title'),
        'field3_title' => get_option('threejs_field3_title'),
        'iframe1_title' => get_option('threejs_iframe1_title'),
        'iframe2_title' => get_option('threejs_iframe2_title'),
        'iframe3_title' => get_option('threejs_iframe3_title'),
        'iframe1_url' => get_option('threejs_iframe1_url'),
        'iframe2_url' => get_option('threejs_iframe2_url'),
        'iframe3_url' => get_option('threejs_iframe3_url')
    );

    $file_path = WP_CONTENT_DIR . '/plugins/3d/threejs-texts.json'; // Use WP_CONTENT_DIR to get the WordPress content directory
    if (file_put_contents($file_path, json_encode($data, JSON_PRETTY_PRINT)) === false) {
        // Error handling if JSON file can't be written
        error_log('Failed to write to JSON file at ' . $file_path);
    }
}

// Hook into updated_option to trigger JSON update only for relevant options
function trigger_after_option_update($option_name, $old_value, $new_value) {
    $relevant_options = [
        'threejs_main_title', 'threejs_field1_title', 'threejs_field2_title', 'threejs_field3_title',
        'threejs_iframe1_title', 'threejs_iframe2_title', 'threejs_iframe3_title',
        'threejs_iframe1_url', 'threejs_iframe2_url', 'threejs_iframe3_url'
    ];

    if (in_array($option_name, $relevant_options)) {
        custom_threejs_texts_json();
    }
}

add_action('updated_option', 'trigger_after_option_update', 10, 3);
?>
