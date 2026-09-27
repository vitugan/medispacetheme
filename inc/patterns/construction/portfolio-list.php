<?php
/**
 * Pattern: Portfolio list - Construction (projects archive and project category templates).
 *
 * Project category tabs (core Categories on msc_project_cat + an "All" tab from inc/blog.php,
 * same look as the blog tabs), the project cards of the main query (6 per page,
 * inc/portfolio.php) and pagination.
 *
 * @package Medispace
 */

$medispace_project_cards = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/project-cards.php";

return [
    "title" => __("Portfolio list - Construction", "medispace"),
    "categories" => ["medispace-construction", "portfolio"],
    "keywords" => ["portfolio", "projects", "archive", "query"],
    "viewportWidth" => 1440,
    "inserter" => false,
    "content" =>
        '<!-- wp:group {"metadata":{"name":"Portfolio"},"align":"full","style":{"spacing":{"margin":{"top":"clamp(40px, 4.17vw, 80px)","bottom":"var(--wp--custom--section-gap)"},"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|60"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:clamp(40px, 4.17vw, 80px);margin-bottom:var(--wp--custom--section-gap);padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:categories {"taxonomy":"msc_project_cat","showOnlyTopLevel":true,"className":"blog-tabs"} /-->

<!-- wp:query {"queryId":5,"query":{"inherit":true},"metadata":{"name":"Projects"},"className":"service-cards project-cards"} -->
<div class="wp-block-query service-cards project-cards">' . $medispace_project_cards() . '

<!-- wp:query-pagination {"paginationArrow":"chevron","className":"blog-pagination","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<!-- wp:query-pagination-previous {"label":" "} /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next {"label":" "} /-->
<!-- /wp:query-pagination -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">' . esc_html__("No projects yet.", "medispace") . '</p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->',
];
