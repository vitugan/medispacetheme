<?php
/**
 * This file' adds functions to the medispace theme for WordPress.
 *
 * @package medispace
 * @author  Ecdevstudio
 * @license GNU General Public License v2 or later
 * @link    https://medispace.com/
 */

if (!defined("MEDISPACE_THEME_VERSION")) {
    define("MEDISPACE_THEME_VERSION", "1.0.0");
}
if (!defined("MEDISPACE_THEME_URL")) {
    define("MEDISPACE_THEME_URL", get_template_directory_uri());
}
if (!defined("MEDISPACE_THEME_PATH")) {
    define("MEDISPACE_THEME_PATH", get_template_directory());
}
add_filter("should_load_separate_core_block_assets", "__return_true");

require get_template_directory() . "/inc/block-patterns.php";

/**
 * Flow selector.
 */
require MEDISPACE_THEME_PATH . "/inc/flows.php";
require MEDISPACE_THEME_PATH . '/inc/flow-template-resolver.php';
require MEDISPACE_THEME_PATH . "/inc/admin/flow-selector.php";
require MEDISPACE_THEME_PATH . '/inc/fonts/custom-fonts.php';

add_action("init", function () {
    register_block_pattern_category("medispace-sections", [
        "label" => __("MediSpace Sections", "medispace"),
    ]);
});

add_action("wp_enqueue_scripts", function () {
    wp_enqueue_style(
        "medispace-patterns",
        get_template_directory_uri() . "/assets/css/patterns.css",
        [],
        filemtime(
            get_template_directory() . "/assets/fonts/../css/patterns.css",
        ),
    );
});
