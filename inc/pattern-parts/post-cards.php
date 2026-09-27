<?php
/**
 * Shared builder for the post cards Query Loop template (Home "News & advice" and the Blog /
 * archive pages): a Cover with the featured image, the category badge on top and a dark
 * gradient panel with the title and the date at the bottom. Styles: assets/css/patterns.css
 * ("Blog cards").
 *
 * Lives outside inc/patterns/ so the pattern auto-discovery does not register it.
 *
 * @package Medispace
 */

/**
 * @return string wp:post-template block markup (goes inside a wp:query with the "blog-cards" class).
 */
return function () {
    $medispace_gradient = "linear-gradient(180deg, rgba(7, 11, 27, 0) 0%, rgba(7, 11, 27, 1) 100%)";

    return '<!-- wp:post-template {"style":{"spacing":{"blockGap":"22px"}},"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:cover {"useFeaturedImage":true,"dimRatio":0,"isUserOverlayColor":true,"minHeight":385,"isDark":true,"metadata":{"name":"Card"},"className":"blog-card","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-cover blog-card" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:385px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:post-terms {"term":"category","separator":" ","className":"blog-card__badge","style":{"spacing":{"padding":{"top":"6px","bottom":"6px","left":"10px","right":"10px"}},"typography":{"fontWeight":"700","lineHeight":"22px"},"elements":{"link":{"color":{"text":"var:preset|color|primary"},"typography":{"textDecoration":"none"}}}},"backgroundColor":"light-blue","fontSize":"body-s"} /-->

<!-- wp:group {"metadata":{"name":"Text"},"className":"blog-card__content","style":{"spacing":{"blockGap":"0","padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"}},"dimensions":{"minHeight":"170px"},"color":{"gradient":"' . $medispace_gradient . '"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"space-between"}} -->
<div class="wp-block-group blog-card__content has-background" style="background:' . $medispace_gradient . ';min-height:170px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:post-title {"level":3,"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"},"typography":{"textDecoration":"none"}}}},"textColor":"white","fontSize":"h-5"} /-->

<!-- wp:post-date {"format":"jS F Y","textColor":"white"} /--></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->
<!-- /wp:post-template -->';
};
