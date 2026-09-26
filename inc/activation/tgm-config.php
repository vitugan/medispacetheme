<?php
/**
 * Medispace Theme: required plugins (TGM Plugin Activation).
 *
 * - MediSpace Core (bundled): services/projects post types and the projects slider block.
 * - Contact Form 7 (wordpress.org): contact forms in the patterns.
 *
 * @package Medispace
 */

add_action("tgmpa_register", "medispace_register_required_plugins");

function medispace_register_required_plugins()
{
    $plugins = [
        [
            "name" => "MediSpace Core",
            "slug" => "medispace-core",
            "source" => get_template_directory() . "/inc/activation/plugins/medispace-core.zip",
            "version" => "1.0.1",
            "required" => true,
        ],
        [
            "name" => "Contact Form 7",
            "slug" => "contact-form-7",
            "required" => true,
        ],
    ];

    $config = [
        "id" => "medispace",
        "menu" => "medispace-install-plugins",
        "parent_slug" => "themes.php",
        "capability" => "edit_theme_options",
        "has_notices" => true,
        "dismissable" => false,
        "is_automatic" => true,
        "strings" => [
            "notice_can_install_required" => _n_noop(
                "This theme requires the following plugin: %1\$s.",
                "This theme requires the following plugins: %1\$s.",
                "medispace",
            ),
            "notice_can_activate_required" => _n_noop(
                "The following required plugin is currently inactive: %1\$s.",
                "The following required plugins are currently inactive: %1\$s.",
                "medispace",
            ),
        ],
    ];

    tgmpa($plugins, $config);
}
