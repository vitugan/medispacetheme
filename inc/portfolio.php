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
