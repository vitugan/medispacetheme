<?php
/**
 * Pattern: Blog list - Medical (blog and post archive templates).
 *
 * The main query's posts in rounded cards (9 per page, inc/blog.php) and pagination with
 * rounded page numbers.
 *
 * @package Medispace
 */

$medispace_post_cards = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/post-cards-rounded.php";

return [
    "title" => __("Blog list - Medical", "medispace"),
    "categories" => ["medispace-medical", "posts"],
    "keywords" => ["blog", "posts", "archive", "query"],
    "viewportWidth" => 1440,
    "inserter" => false,
    "content" =>
        '<!-- wp:group {"metadata":{"name":"Blog"},"align":"full","style":{"spacing":{"margin":{"top":"clamp(40px, 4.17vw, 80px)","bottom":"var(--wp--custom--section-gap)"},"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:clamp(40px, 4.17vw, 80px);margin-bottom:var(--wp--custom--section-gap);padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:query {"queryId":7,"query":{"inherit":true},"metadata":{"name":"Posts"},"className":"post-cards-rounded"} -->
<div class="wp-block-query post-cards-rounded">' . $medispace_post_cards(["large_arrow" => true]) . '

<!-- wp:query-pagination {"paginationArrow":"chevron","className":"blog-pagination is-rounded","style":{"spacing":{"margin":{"top":"32px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
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
