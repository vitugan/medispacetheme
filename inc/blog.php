<?php
/**
 * Blog listing and FAQ page support (templates/home-{flow}.html, templates/archive-{flow}.html,
 * inc/patterns/<flow>/blog-list.php).
 *
 * @package Medispace
 */

/**
 * Nine posts per page on the blog and post archives: the cards sit in rows of three.
 */
function medispace_blog_posts_per_page($query)
{
    if (is_admin() || !$query->is_main_query()) {
        return;
    }
    if ($query->is_home() || $query->is_category() || $query->is_tag() || $query->is_date() || $query->is_author()) {
        $query->set("posts_per_page", 9);
    }
}
add_action("pre_get_posts", "medispace_blog_posts_per_page");

/**
 * Category tabs: core Categories block with the "blog-tabs" class gets an "All" tab first,
 * linking to the posts page and marked current there (core marks the current category).
 */
function medispace_blog_tabs_all($block_content, $block)
{
    if (false === strpos($block["attrs"]["className"] ?? "", "blog-tabs")) {
        return $block_content;
    }
    $posts_page = (int) get_option("page_for_posts");
    $url = $posts_page ? get_permalink($posts_page) : home_url("/");
    $current = is_home() ? " current-cat" : "";
    $all = '<li class="cat-item cat-item-all' . $current . '"><a href="' . esc_url($url) . '"' . ($current ? ' aria-current="page"' : "") . ">" . esc_html__("All", "medispace") . "</a></li>";
    return preg_replace("/(<ul\b[^>]*>)/", '$1' . $all, $block_content, 1);
}
add_filter("render_block_core/categories", "medispace_blog_tabs_all", 10, 2);

/**
 * FAQ page navigation script (inc/patterns/<flow>/faq-page.php): loaded only with the block.
 */
function medispace_faq_nav_script($block_content, $block)
{
    if (false !== strpos($block["attrs"]["className"] ?? "", "faq-nav")) {
        wp_enqueue_script(
            "medispace-faq-nav",
            MEDISPACE_THEME_URL . "/assets/js/faq-nav.js",
            [],
            filemtime(MEDISPACE_THEME_PATH . "/assets/js/faq-nav.js"),
            ["in_footer" => true, "strategy" => "defer"],
        );
    }
    return $block_content;
}
add_filter("render_block_core/details", "medispace_faq_nav_script", 10, 2);
