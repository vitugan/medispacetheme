<?php
/**
 * Page hero support (templates/page-hero.html, inc/patterns/shared/page-hero.php).
 *
 * @package Medispace
 */

/**
 * Pages get an Excerpt panel: the hero shows it as the intro under the title.
 */
function medispace_page_excerpt_support()
{
    add_post_type_support("page", "excerpt");
}
add_action("init", "medispace_page_excerpt_support");

/**
 * The hero intro shows the manual excerpt only. Without one, core would generate it from the
 * page content - here a stack of sections - so print nothing instead.
 */
function medispace_page_hero_excerpt($block_content, $block, $instance)
{
    $class = $block["attrs"]["className"] ?? "";
    if (false === strpos($class, "page-hero__text")) {
        return $block_content;
    }
    $post_id = $instance->context["postId"] ?? get_the_ID();
    return $post_id && has_excerpt($post_id) ? $block_content : "";
}
add_filter("render_block_core/post-excerpt", "medispace_page_hero_excerpt", 10, 3);

/**
 * Archive label = plural name ("Services" instead of "Service Archives"): the core Breadcrumbs
 * block and archive titles use it, and the design shows "Home → Services".
 */
function medispace_archive_label_is_name($labels)
{
    $labels->archives = $labels->name;
    return $labels;
}
add_filter("post_type_labels_msc_service", "medispace_archive_label_is_name");
add_filter("post_type_labels_project", "medispace_archive_label_is_name");
