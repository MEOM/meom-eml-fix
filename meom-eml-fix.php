<?php
/**
 * Plugin Name: MEOM Enhanced media library Fix
 * Plugin Uri: https://github.com/MEOM/meom-eml-fix
 * Description: Fix Enhanced media library error that causes problems with image uploads in WP 5.3
 * Version: 1.0.0
 * Author: MEOM
 * Author URI: https://www.meom.fi
 *
 * @package meom-eml-fix
 */

if ( ! defined( 'MEOM_EML_VERSION' ) ) {
	define( 'MEOM_EML_VERSION', '1.0.0' );
}

/**
 * Register new eml-media-views script that doesn't break uploading new images
 * Fix source: https://wordpress.org/support/topic/potential-fix-wordpress-5-3-conflict-compatibility-error/#post-12153346
 *
 * @return void
 */
function meom_eml_enqueue_media() {
    if ( ! is_admin() ) {
        return;
    }
    wp_enqueue_script(
        'wpuxss-eml-media-views-script',
        plugin_dir_url( __FILE__ ) . 'js/eml-media-views.js',
        array( 'media-views' ),
        MEOM_EML_VERSION,
        true
    );
}
add_action( 'wp_enqueue_media', 'meom_eml_enqueue_media', 1 );
