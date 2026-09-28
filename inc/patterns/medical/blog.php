<?php
/**
 * Pattern: Latest news - Medical.
 *
 * Real posts via Query Loop: sticky posts first, then the latest ones, 3 in total
 * (inc/query-sticky-first.php), in rounded cards (post-cards-rounded builder), and a
 * "View All" button to the blog.
 *
 * @package Medispace
 */

$medispace_post_cards = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/post-cards-rounded.php";
$medispace_posts_page = (int) get_option("page_for_posts");

return [
    "title" => __("Latest news - Medical", "medispace"),
    "categories" => ["medispace-medical", "posts"],
    "keywords" => ["blog", "news", "posts", "query"],
    "viewportWidth" => 1440,
    "content" =>
        '<!-- wp:group {"metadata":{"name":"Latest news"},"align":"full","style":{"spacing":{"margin":{"top":"var(--wp--custom--section-gap)","bottom":"var(--wp--custom--section-gap)"},"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"},"blockGap":"40px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:var(--wp--custom--section-gap);margin-bottom:var(--wp--custom--section-gap);padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:query {"queryId":6,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"medispaceStickyFirst":true},"metadata":{"name":"Latest posts"},"className":"post-cards-rounded"} -->
<div class="wp-block-query post-cards-rounded"><!-- wp:group {"metadata":{"name":"Head"},"style":{"spacing":{"blockGap":"var:preset|spacing|40","margin":{"bottom":"32px"}}},"layout":{"type":"constrained","contentSize":"534px"}} -->
<div class="wp-block-group" style="margin-bottom:32px"><!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">' . esc_html__("Latest News", "medispace") . '</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"gray-80"} -->
<p class="has-text-align-center has-gray-80-color has-text-color">' . esc_html__("Explore practical tips, the latest trends, and expert insights to improve your medical practice.", "medispace") . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

' . $medispace_post_cards() . '

<!-- wp:query-no-results -->
<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">' . esc_html__("No posts yet.", "medispace") . '</p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query -->

<!-- wp:buttons {"className":"is-mobile-full","layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons is-mobile-full"><!-- wp:button {"style":{"spacing":{"padding":{"left":"70px","right":"70px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="' . esc_url($medispace_posts_page ? get_permalink($medispace_posts_page) : home_url("/blog/")) . '" style="padding-right:70px;padding-left:70px">' . esc_html__("View All", "medispace") . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->',
];
