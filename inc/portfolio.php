<?php
/**
 * Portfolio support: MediSpace Core "project" post type and its "msc_project_cat" taxonomy
 * (templates/archive-project-{flow}.html, templates/taxonomy-msc_project_cat-{flow}.html).
 *
 * @package Medispace
 */

/**
 * URL of the projects archive (the plugin's rewrite slug, "projects" by default); falls back to
 * /portfolio/ when the plugin is not active.
 */
function medispace_projects_url()
{
    $url = post_type_exists("project") ? get_post_type_archive_link("project") : false;
    return $url ?: home_url("/portfolio/");
}

/**
 * Six projects per page on the projects archive and its category pages (two columns).
 */
function medispace_projects_per_page($query)
{
    if (is_admin() || !$query->is_main_query()) {
        return;
    }
    if ($query->is_post_type_archive("project") || $query->is_tax("msc_project_cat")) {
        $query->set("posts_per_page", 6);
    }
}
add_action("pre_get_posts", "medispace_projects_per_page");

/**
 * The design calls the projects archive "Portfolio" (breadcrumbs "Home → Portfolio", titles).
 */
function medispace_projects_archive_label($labels)
{
    $labels->archives = __("Portfolio", "medispace");
    return $labels;
}
add_filter("post_type_labels_project", "medispace_projects_archive_label", 20);

/**
 * Project category tabs keep the order the categories were created in (the design's order:
 * Medical office, Dental practice, ...) instead of alphabetical: only while the core Categories
 * block renders the msc_project_cat list.
 */
function medispace_project_tabs_order($parsed_block)
{
    if ("core/categories" === ($parsed_block["blockName"] ?? "") && "msc_project_cat" === ($parsed_block["attrs"]["taxonomy"] ?? "")) {
        add_filter("get_terms_args", "medispace_project_terms_by_id");
    }
    return $parsed_block;
}
add_filter("render_block_data", "medispace_project_tabs_order");

function medispace_project_terms_by_id($args)
{
    $args["orderby"] = "term_id";
    return $args;
}

function medispace_project_tabs_order_done($block_content, $block)
{
    remove_filter("get_terms_args", "medispace_project_terms_by_id");
    return $block_content;
}
add_filter("render_block_core/categories", "medispace_project_tabs_order_done", 5, 2);
