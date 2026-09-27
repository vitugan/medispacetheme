<?php
/**
 * Pattern: Latest news - Construction.
 *
 * Real posts via Query Loop: sticky posts first, then the latest ones, 3 in total
 * (see inc/query-sticky-first.php). Each card is a Cover showing the featured image.
 *
 * @package Medispace
 */

$medispace_post_cards = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/post-cards.php";

return [
    "title" => __("Latest news - Construction", "medispace"),
    "categories" => ["medispace-construction", "posts"],
    "keywords" => ["blog", "news", "posts", "query"],
    "viewportWidth" => 1440,
    "content" =>
        '<!-- wp:group {"metadata":{"name":"Latest news"},"align":"full","style":{"spacing":{"margin":{"top":"var(--wp--custom--section-gap)","bottom":"var(--wp--custom--section-gap)"},"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"},"blockGap":"40px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:var(--wp--custom--section-gap);margin-bottom:var(--wp--custom--section-gap);padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:query {"queryId":1,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"medispaceStickyFirst":true},"metadata":{"name":"Latest posts"},"className":"blog-cards"} -->
<div class="wp-block-query blog-cards"><!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"32px"}}}} -->
<h2 class="wp-block-heading has-text-align-center" style="margin-bottom:32px">' . esc_html__("News & advice? Read our blog", "medispace") . '</h2>
<!-- /wp:heading -->

' . $medispace_post_cards() . '

<!-- wp:query-no-results -->
<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">' . esc_html__("No posts yet.", "medispace") . '</p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="' . esc_url(home_url("/blog/")) . '">' . esc_html__("View all projects", "medispace") . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->',
];
