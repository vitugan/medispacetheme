<?php
/**
 * Shared builder for the project cards Query Loop template (Portfolio archive and project
 * category pages): featured image, category badge and date, title, excerpt, "Learn more".
 * Reuses the service card styles (equal heights, "Learn more" arrow) plus "Project cards" in
 * assets/css/patterns.css.
 *
 * Lives outside inc/patterns/ so the pattern auto-discovery does not register it.
 *
 * @package Medispace
 */

/**
 * @return string wp:post-template block markup (goes inside a wp:query with the
 * "service-cards project-cards" classes).
 */
return function () {
    return '<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"grid","columnCount":2,"minimumColumnWidth":"320px"}} -->
<!-- wp:group {"metadata":{"name":"Card"},"className":"service-card project-card","style":{"spacing":{"blockGap":"0"}},"backgroundColor":"light-blue","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group service-card project-card has-light-blue-background-color has-background"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"531/218","sizeSlug":"large"} /-->

<!-- wp:group {"metadata":{"name":"Text"},"className":"service-card__text","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|50"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group service-card__text" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:group {"metadata":{"name":"Type and date"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:post-terms {"term":"msc_project_cat","separator":" ","className":"project-card__badge","style":{"spacing":{"padding":{"top":"10px","bottom":"10px","left":"10px","right":"10px"}},"typography":{"fontWeight":"700","lineHeight":"1.5"},"elements":{"link":{"color":{"text":"var:preset|color|white"},"typography":{"textDecoration":"none"}}}},"backgroundColor":"gray-100","textColor":"white","fontSize":"body-s"} /-->

<!-- wp:post-date {"format":"M j, Y","className":"project-card__date","style":{"typography":{"fontWeight":"500"}}} /--></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Content"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:post-title {"level":3,"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|gray-100"},"typography":{"textDecoration":"none"}}}},"textColor":"gray-100","fontSize":"h-5"} /-->

<!-- wp:post-excerpt {"showMoreOnNewLine":false,"style":{"typography":{"fontWeight":"400"}},"textColor":"gray-100","fontSize":"body-s"} /--></div>
<!-- /wp:group -->

<!-- wp:read-more {"content":"' . esc_attr__("Learn more", "medispace") . '","className":"service-card__more"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template -->';
};
