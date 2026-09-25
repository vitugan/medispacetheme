<?php
/**
 * Pattern: Our tailored services - Construction.
 *
 * Query Loop of the MediSpace Core "msc_service" post type (6 latest), cards with the
 * featured image, title, excerpt and a "Learn more" link to the service page.
 *
 * @package Medispace
 */

return [
    "title" => __("Our tailored services - Construction", "medispace"),
    "categories" => ["medispace-construction", "query"],
    "keywords" => ["services", "cards", "query"],
    "viewportWidth" => 1440,
    "content" =>
        '<!-- wp:group {"metadata":{"name":"Our tailored services"},"align":"full","style":{"spacing":{"margin":{"top":"var(--wp--custom--section-gap)","bottom":"var(--wp--custom--section-gap)"},"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"},"blockGap":"40px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:var(--wp--custom--section-gap);margin-bottom:var(--wp--custom--section-gap);padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:query {"queryId":2,"query":{"perPage":6,"pages":0,"offset":0,"postType":"msc_service","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"metadata":{"name":"Services"},"className":"service-cards"} -->
<div class="wp-block-query service-cards"><!-- wp:group {"metadata":{"name":"Head"},"style":{"spacing":{"blockGap":"var:preset|spacing|40","margin":{"bottom":"32px"}}},"layout":{"type":"constrained","contentSize":"534px"}} -->
<div class="wp-block-group" style="margin-bottom:32px"><!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">' . esc_html__("Our tailored services", "medispace") . '</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"gray-80"} -->
<p class="has-text-align-center has-gray-80-color has-text-color">' . esc_html__("Our expert team is dedicated to providing tailored solutions that meet your unique needs and ensure a seamless experience from start to finish.", "medispace") . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:group {"metadata":{"name":"Card"},"className":"service-card","style":{"spacing":{"blockGap":"0"}},"backgroundColor":"light-blue","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group service-card has-light-blue-background-color has-background"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"346/240","sizeSlug":"large"} /-->

<!-- wp:group {"metadata":{"name":"Text"},"className":"service-card__text","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|50"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group service-card__text" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:group {"metadata":{"name":"Content"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:post-title {"level":3,"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|gray-100"},"typography":{"textDecoration":"none"}}}},"textColor":"gray-100","fontSize":"h-5"} /-->

<!-- wp:post-excerpt {"showMoreOnNewLine":false,"style":{"typography":{"fontWeight":"400"}},"textColor":"gray-80","fontSize":"body-s"} /--></div>
<!-- /wp:group -->

<!-- wp:read-more {"content":"' . esc_attr__("Learn more", "medispace") . '","className":"service-card__more"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">' . esc_html__("No services yet.", "medispace") . '</p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query -->

<!-- wp:buttons {"className":"is-mobile-full","layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons is-mobile-full"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="' . esc_url(home_url("/services/")) . '">' . esc_html__("View all services", "medispace") . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->',
];
