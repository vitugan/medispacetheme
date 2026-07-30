<?php
/**
 * Medispace Theme: Flow Template Resolution
 *
 * Resolves the generic "header" / "footer" / "front-page" slugs to the
 * active flow's source file, entirely in-memory, at render time.
 *
 * Why this hook and not `get_block_file_template`:
 * WordPress checks the database FIRST, and only calls the final
 * `get_block_template` filter with a non-null $template when a DB
 * override already exists (e.g. the user customized it in the Site
 * Editor). In that case this filter returns early and never touches
 * the result — so once a user edits a template, their edit always
 * wins, automatically, with no extra bookkeeping needed.
 *
 * This filter only fires with $template === null, meaning neither a
 * DB override nor a matching theme file (header.html etc.) exists —
 * exactly the gap we need to fill for the generic, flow-agnostic slugs.
 *
 * @package Medispace
 */

add_filter("get_block_template", "medispace_resolve_flow_template", 10, 3);

/**
 * @param WP_Block_Template|null $template      Result so far (null = nothing found in DB or theme files).
 * @param string                 $id            "{$theme}//{$slug}".
 * @param string                 $template_type 'wp_template' or 'wp_template_part'.
 * @return WP_Block_Template|null
 */
function medispace_resolve_flow_template($template, $id, $template_type)
{
    // Something already resolved it (DB customization or a real file) — never override that.
    if (null !== $template) {
        return $template;
    }

    $parts = explode("//", $id, 2);

    if (count($parts) < 2 || get_stylesheet() !== $parts[0]) {
        return $template;
    }

    $slug = $parts[1];

    // Map of managed generic slugs to their registry key, scoped by template type.
    $managed = [
        "wp_template" => [
            "front-page" => "front_page_template",
            "home"       => "front_page_template",
        ],
        "wp_template_part" => [
            "header" => "header_template_part",
            "footer" => "footer_template_part",
        ],
    ];

    if (empty($managed[$template_type][$slug])) {
        return $template;
    }

    $flow_slug = medispace_get_active_flow();

    if (!$flow_slug) {
        return $template;
    }

    $flows = medispace_get_available_flows();

    if (!isset($flows[$flow_slug])) {
        return $template;
    }

    $file_key = $managed[$template_type][$slug];
    $file_path = MEDISPACE_THEME_PATH . $flows[$flow_slug][$file_key];

    if (!is_readable($file_path)) {
        return $template;
    }

    $content = file_get_contents($file_path);

    if (false === $content) {
        return $template;
    }

    $new_template = new WP_Block_Template();
    $new_template->id = $id;
    $new_template->theme = get_stylesheet();
    $new_template->slug = $slug;
    $new_template->type = $template_type;
    $new_template->title = ucwords(str_replace("-", " ", $slug));
    $new_template->content = $content;
    $new_template->source = "theme";
    $new_template->status = "publish";
    $new_template->has_theme_file = true;
    $new_template->is_custom = false;
    $new_template->post_types = [];

    if ("wp_template_part" === $template_type) {
        $new_template->area =
            "header" === $slug
                ? WP_TEMPLATE_PART_AREA_HEADER
                : WP_TEMPLATE_PART_AREA_FOOTER;
    }

    return $new_template;
}

add_filter("get_block_templates", "medispace_resolve_flow_templates", 10, 3);

/**
 * Filters the list of queried block templates to inject the active flow's home template.
 *
 * Why this filter is needed:
 * On the front end, WordPress resolves the main page template by calling `get_block_templates()`
 * with a query for the template hierarchy (e.g. ['front-page', 'index'] or ['home', 'index']).
 * This queries multiple templates at once and applies the plural `get_block_templates` filter,
 * completely bypassing the singular `get_block_template` filter. To ensure the active flow's
 * home template is selected, we must hook here and inject it into the queried templates array.
 *
 * @param WP_Block_Template[] $query_result Array of found block templates.
 * @param array               $query        Query variables.
 * @param string              $template_type 'wp_template' or 'wp_template_part'.
 * @return WP_Block_Template[]
 */
function medispace_resolve_flow_templates($query_result, $query, $template_type)
{
    if ("wp_template" !== $template_type) {
        return $query_result;
    }

    $slugs = isset($query["slug__in"]) ? $query["slug__in"] : [];

    if (empty($slugs)) {
        return $query_result;
    }

    // Slugs we want to resolve dynamically.
    $target_slugs = ["front-page", "home"];
    $intersect = array_intersect($slugs, $target_slugs);

    if (empty($intersect)) {
        return $query_result;
    }

    // If there is already a database override (user customization) for a target slug, let it win.
    foreach ($query_result as $tpl) {
        if (in_array($tpl->slug, $target_slugs) && "custom" === $tpl->source) {
            return $query_result;
        }
    }

    $flow_slug = medispace_get_active_flow();
    if (!$flow_slug) {
        return $query_result;
    }

    $flows = medispace_get_available_flows();
    if (!isset($flows[$flow_slug])) {
        return $query_result;
    }

    foreach ($intersect as $slug) {
        // Check if this slug was already resolved (e.g. from the DB or a physical file).
        $exists = false;
        foreach ($query_result as $tpl) {
            if ($tpl->slug === $slug) {
                $exists = true;
                break;
            }
        }

        if (!$exists) {
            $id = get_stylesheet() . "//" . $slug;
            $resolved = medispace_resolve_flow_template(null, $id, "wp_template");
            if ($resolved) {
                $query_result[] = $resolved;
            }
        }
    }

    return $query_result;
}
