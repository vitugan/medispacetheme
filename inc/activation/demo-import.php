<?php
/**
 * Demo content import (One Click Demo Import plugin, recommended through TGM).
 *
 * One demo per flow: every flow in the registry (inc/flows.php) with a
 * demo/<flow>/content.xml is offered on Appearance → Import Demo Data. A package holds:
 * - content.xml: WordPress export (pages, posts, services, projects, their images);
 * - media/: the images, imported from the theme instead of the site they were exported from.
 *
 * After the import the flow is activated (option + style variation), the Home / Blog pages
 * become the front page and the posts page, links that still point to the export site are
 * rewritten, the theme's contact form is created and permalinks are flushed.
 *
 * @package Medispace
 */

/** Site the demo packages were exported from; its URLs are rewritten on import. */
const MEDISPACE_DEMO_SOURCE_URL = "http://medispace.loc";

/**
 * Demo packages available in the theme, by flow slug.
 *
 * @return array<string, string> flow slug => package directory
 */
function medispace_demo_packages()
{
    $packages = [];
    foreach (array_keys(medispace_get_available_flows()) as $flow) {
        $dir = MEDISPACE_THEME_PATH . "/demo/" . $flow;
        if (is_readable($dir . "/content.xml")) {
            $packages[$flow] = $dir;
        }
    }
    return $packages;
}

add_filter("ocdi/import_files", function () {
    $flows = medispace_get_available_flows();
    $files = [];
    foreach (medispace_demo_packages() as $flow => $dir) {
        $files[] = [
            "import_file_name" => $flows[$flow]["label"],
            "local_import_file" => $dir . "/content.xml",
            "import_preview_image_url" => MEDISPACE_THEME_URL . $flows[$flow]["screenshot"],
            "import_notice" => __("Imports the demo pages, posts, services and projects of this flow and switches the site to it.", "medispace"),
        ];
    }
    return $files;
});

/**
 * Which flow is being imported: OCDI passes the chosen import file to its hooks; while the
 * content importer runs, the choice is kept in a transient.
 */
function medispace_demo_flow_from_import($selected_import)
{
    $name = $selected_import["import_file_name"] ?? "";
    foreach (medispace_get_available_flows() as $flow => $data) {
        if ($data["label"] === $name) {
            return $flow;
        }
    }
    return null;
}

add_action("ocdi/before_content_import", function ($selected_import) {
    $flow = medispace_demo_flow_from_import($selected_import);
    if ($flow) {
        set_transient("medispace_demo_import_flow", $flow, HOUR_IN_SECONDS);
    }
});

/**
 * Attachments: fetch the images from the package's media folder in the theme, not from the
 * export site (which does not exist for the buyer).
 */
add_filter("wxr_importer.pre_process.post", function ($data) {
    if (($data["post_type"] ?? "") !== "attachment" || empty($data["attachment_url"])) {
        return $data;
    }
    $flow = get_transient("medispace_demo_import_flow");
    if (!$flow) {
        return $data;
    }
    $file = basename(wp_parse_url($data["attachment_url"], PHP_URL_PATH));
    if (is_readable(MEDISPACE_THEME_PATH . "/demo/" . $flow . "/media/" . $file)) {
        $data["attachment_url"] = MEDISPACE_THEME_URL . "/demo/" . $flow . "/media/" . $file;
    }
    return $data;
});

add_action("ocdi/after_import", function ($selected_import) {
    global $wpdb;

    $flow = medispace_demo_flow_from_import($selected_import) ?: get_transient("medispace_demo_import_flow");
    delete_transient("medispace_demo_import_flow");

    // Flow: the same two steps as Appearance → Flow.
    $flows = medispace_get_available_flows();
    if ($flow && isset($flows[$flow])) {
        update_option("medispace_active_flow", $flow);
        medispace_apply_style_variation($flows[$flow]["style_variation"]);
        delete_transient("medispace_show_flow_notice");
    }

    // Front page and posts page.
    $home = get_page_by_path("home");
    $blog = get_page_by_path("blog");
    if ($home) {
        update_option("show_on_front", "page");
        update_option("page_on_front", $home->ID);
    }
    if ($blog) {
        update_option("page_for_posts", $blog->ID);
    }

    // Links and theme asset URLs saved in the content point to the export site.
    $replacements = [
        MEDISPACE_DEMO_SOURCE_URL . "/wp-content/themes/medispace" => MEDISPACE_THEME_URL,
        MEDISPACE_DEMO_SOURCE_URL => untrailingslashit(home_url()),
    ];
    foreach ($replacements as $from => $to) {
        if ($from === $to) {
            continue;
        }
        $wpdb->query($wpdb->prepare(
            "UPDATE {$wpdb->posts} SET post_content = REPLACE(post_content, %s, %s) WHERE post_content LIKE %s",
            $from,
            $to,
            "%" . $wpdb->esc_like($from) . "%",
        ));
    }

    // The theme's Contact Form 7 form (inc/contact-form.php).
    if (function_exists("medispace_get_contact_form")) {
        medispace_get_contact_form();
    }

    flush_rewrite_rules();
});

// The theme sets up everything itself; skip OCDI's "regenerate thumbnails" step and branding.
add_filter("ocdi/regenerate_thumbnails_in_content_import", "__return_false");
add_filter("ocdi/disable_pt_branding", "__return_true");
