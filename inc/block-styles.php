<?php
/**
 * Medispace Theme: Block styles
 *
 * Стилі кнопок з UI kit. Сам вигляд — у assets/css/buttons.css,
 * відмінності між флоу — токенами у styles/*.json.
 *
 * @package Medispace
 */

add_action("init", function () {
    register_block_style("core/button", [
        "name" => "outline-light",
        "label" => __("Outline (dark background)", "medispace"),
    ]);

    register_block_style("core/button", [
        "name" => "arrow",
        "label" => __("Text with arrow", "medispace"),
    ]);

    // Loads on the front end and inside the editor canvas, only when a button is on the page.
    wp_enqueue_block_style("core/button", [
        "handle" => "medispace-buttons",
        "src" => MEDISPACE_THEME_URL . "/assets/css/buttons.css",
        "path" => MEDISPACE_THEME_PATH . "/assets/css/buttons.css",
        "ver" => filemtime(MEDISPACE_THEME_PATH . "/assets/css/buttons.css"),
    ]);
});
