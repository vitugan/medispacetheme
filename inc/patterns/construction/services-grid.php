<?php
/**
 * Pattern: Services grid - Construction (Services archive).
 *
 * Query Loop that inherits the archive query (all published services, the "Posts per page"
 * reading setting), 3-column service cards and pagination when there is more than one page.
 *
 * @package Medispace
 */

$medispace_service_cards = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/service-cards.php";

return [
    "title" => __("Services grid - Construction", "medispace"),
    "categories" => ["medispace-construction", "query"],
    "keywords" => ["services", "cards", "archive", "query"],
    "viewportWidth" => 1440,
    "inserter" => false,
    "content" =>
        '<!-- wp:group {"metadata":{"name":"Services"},"align":"full","style":{"spacing":{"margin":{"top":"clamp(40px, 4.17vw, 80px)","bottom":"var(--wp--custom--section-gap)"},"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:clamp(40px, 4.17vw, 80px);margin-bottom:var(--wp--custom--section-gap);padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:query {"queryId":3,"query":{"inherit":true},"metadata":{"name":"Services"},"className":"service-cards"} -->
<div class="wp-block-query service-cards">' . $medispace_service_cards() . '

<!-- wp:query-pagination {"style":{"spacing":{"margin":{"top":"40px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">' . esc_html__("No services yet.", "medispace") . '</p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->',
];
