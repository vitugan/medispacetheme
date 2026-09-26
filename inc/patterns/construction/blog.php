<?php
/**
 * Pattern: Latest news - Construction.
 *
 * Real posts via Query Loop: sticky posts first, then the latest ones, 3 in total
 * (see inc/query-sticky-first.php). Each card is a Cover showing the featured image.
 *
 * @package Medispace
 */

$medispace_gradient = "linear-gradient(180deg,rgba(7,11,27,0) 0%,#070b1b 100%)";

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

<!-- wp:post-template {"style":{"spacing":{"blockGap":"22px"}},"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:cover {"useFeaturedImage":true,"dimRatio":0,"isUserOverlayColor":true,"minHeight":385,"isDark":true,"metadata":{"name":"Card"},"className":"blog-card","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-cover blog-card" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:385px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:post-terms {"term":"category","separator":" ","className":"blog-card__badge","style":{"spacing":{"padding":{"top":"6px","bottom":"6px","left":"10px","right":"10px"}},"typography":{"fontWeight":"700","lineHeight":"22px"},"elements":{"link":{"color":{"text":"var:preset|color|primary"},"typography":{"textDecoration":"none"}}}},"backgroundColor":"light-blue","fontSize":"body-s"} /-->

<!-- wp:group {"metadata":{"name":"Text"},"className":"blog-card__content","style":{"spacing":{"blockGap":"0","padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"}},"dimensions":{"minHeight":"170px"},"color":{"gradient":"' . $medispace_gradient . '"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"space-between"}} -->
<div class="wp-block-group blog-card__content has-background" style="background:' . $medispace_gradient . ';min-height:170px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:post-title {"level":3,"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"},"typography":{"textDecoration":"none"}}}},"textColor":"white","fontSize":"h-5"} /-->

<!-- wp:post-date {"format":"jS F Y","textColor":"white"} /--></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
<!-- /wp:post-template -->

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
