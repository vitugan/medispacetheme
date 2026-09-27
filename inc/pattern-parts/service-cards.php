<?php
/**
 * Shared builder for the service cards Query Loop template (Home "Our tailored services" and the
 * Services archive): featured image, title, excerpt and a "Learn more" link on a light-blue card.
 * Styles: assets/css/patterns.css ("Service cards").
 *
 * Lives outside inc/patterns/ so the pattern auto-discovery does not register it.
 *
 * @package Medispace
 */

/**
 * @return string wp:post-template block markup (goes inside a wp:query with the "service-cards" class).
 */
return function () {
    return '<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"grid","columnCount":3}} -->
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
<!-- /wp:post-template -->';
};
