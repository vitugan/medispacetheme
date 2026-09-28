<?php
/**
 * Pattern: Spaces list - Medical (the Spaces archive: one row per space - the rounded image on
 * the left, title, description and the arrow link on the right; stacked with "Learn more" on
 * phones).
 *
 * Query Loop over the MediSpace Core "msc_space" post type (inherits the archive query, sorted by
 * the "Order" field). The description is the space's excerpt. Styles: assets/css/patterns.css
 * ("Spaces list - Medical").
 *
 * @package Medispace
 */

return [
    "title" => __("Spaces list - Medical", "medispace"),
    "categories" => ["medispace-medical", "query"],
    "keywords" => ["spaces", "rooms", "list", "query"],
    "viewportWidth" => 1440,
    "inserter" => false,
    "content" =>
        '<!-- wp:group {"metadata":{"name":"Spaces"},"align":"full","style":{"spacing":{"margin":{"top":"var(--wp--custom--section-gap)","bottom":"0"},"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:var(--wp--custom--section-gap);margin-bottom:0;padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:query {"queryId":21,"query":{"perPage":12,"pages":0,"offset":0,"postType":"msc_space","order":"asc","orderBy":"title","author":"","search":"","exclude":[],"sticky":"","inherit":true},"className":"medical-spaces"} -->
<div class="wp-block-query medical-spaces"><!-- wp:post-template {"className":"medical-spaces__list","layout":{"type":"default"}} -->
<!-- wp:group {"className":"medical-space","layout":{"type":"default"}} -->
<div class="wp-block-group medical-space"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"571/354","className":"medical-space__image"} /-->

<!-- wp:group {"className":"medical-space__content","style":{"spacing":{"blockGap":"40px"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group medical-space__content"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:post-title {"level":2,"isLink":true} /-->

<!-- wp:post-excerpt {"textColor":"gray-80","excerptLength":100} /--></div>
<!-- /wp:group -->

<!-- wp:read-more {"content":"' . esc_attr__("Learn more", "medispace") . '","className":"medical-space__more"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">' . esc_html__("No spaces yet.", "medispace") . '</p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->',
];
