<?php
/**
 * Pattern: Blog list - Construction (blog and post archive templates).
 *
 * Category tabs (core Categories + an "All" tab from inc/blog.php), the post cards of the main
 * query (9 per page, inc/blog.php) and pagination.
 *
 * @package Medispace
 */

$medispace_post_cards = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/post-cards.php";

return [
    "title" => __("Blog list - Construction", "medispace"),
    "categories" => ["medispace-construction", "posts"],
    "keywords" => ["blog", "posts", "archive", "categories", "query"],
    "viewportWidth" => 1440,
    "inserter" => false,
    "content" =>
        '<!-- wp:group {"metadata":{"name":"Blog"},"align":"full","style":{"spacing":{"margin":{"top":"clamp(40px, 4.17vw, 80px)","bottom":"var(--wp--custom--section-gap)"},"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|60"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:clamp(40px, 4.17vw, 80px);margin-bottom:var(--wp--custom--section-gap);padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:categories {"showOnlyTopLevel":true,"className":"blog-tabs"} /-->

<!-- wp:query {"queryId":4,"query":{"inherit":true},"metadata":{"name":"Posts"},"className":"blog-cards"} -->
<div class="wp-block-query blog-cards">' . $medispace_post_cards() . '

<!-- wp:query-pagination {"paginationArrow":"chevron","className":"blog-pagination","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<!-- wp:query-pagination-previous {"label":" "} /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next {"label":" "} /-->
<!-- /wp:query-pagination -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">' . esc_html__("No posts yet.", "medispace") . '</p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->',
];
