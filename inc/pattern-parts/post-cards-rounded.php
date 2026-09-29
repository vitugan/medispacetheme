<?php
/**
 * Shared builder for rounded post cards (Medical "Latest News" and the Medical blog): a
 * light-blue card with rounded corners, the featured image on top, title, a three-line
 * excerpt, the date and a round arrow link. Styles: assets/css/patterns.css ("Rounded post
 * cards").
 *
 * Lives outside inc/patterns/ so the pattern auto-discovery does not register it.
 *
 * @package Medispace
 */

/**
 * @param array{columns?:int, large_arrow?:bool, reveal_label?:string} $args
 *
 * large_arrow: the 40px arrow of the blog page design (36px on Home). reveal_label: the link
 * text of a "reveal-arrow" link (assets/css/patterns.css), Home "Latest News"; otherwise the
 * arrow alone ("Read more" for screen readers).
 * @return string wp:post-template block markup (goes inside a wp:query with the
 * "post-cards-rounded" class).
 */
return function (array $args = []) {
    $columns = (int) ($args["columns"] ?? 3);
    $more_class = !empty($args["reveal_label"])
        ? "reveal-arrow" . (!empty($args["large_arrow"]) ? " is-lg" : "")
        : "post-card-rounded__more" . (!empty($args["large_arrow"]) ? " post-card-rounded__more--lg" : "");
    $more_label = $args["reveal_label"] ?? __("Read more", "medispace");

    return '<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"grid","columnCount":' . $columns . ',"minimumColumnWidth":"280px"}} -->
<!-- wp:group {"metadata":{"name":"Card"},"className":"post-card-rounded","style":{"spacing":{"blockGap":"0"}},"backgroundColor":"light-blue","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group post-card-rounded has-light-blue-background-color has-background"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"346/228","sizeSlug":"large"} /-->

<!-- wp:group {"metadata":{"name":"Text"},"className":"post-card-rounded__text","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|50"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group post-card-rounded__text" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:group {"metadata":{"name":"Content"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:post-title {"level":3,"isLink":true,"style":{"typography":{"fontWeight":"600","lineHeight":"1.3"},"elements":{"link":{"color":{"text":"var:preset|color|gray-100"},"typography":{"textDecoration":"none"}}}},"textColor":"gray-100","fontSize":"body-l","fontFamily":"body"} /-->

<!-- wp:post-excerpt {"showMoreOnNewLine":false,"className":"post-card-rounded__excerpt","textColor":"gray-80"} /--></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Date and link"},"className":"post-card-rounded__meta","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group post-card-rounded__meta"><!-- wp:post-date {"format":"M j, Y","style":{"typography":{"fontWeight":"700"}},"textColor":"gray-80"} /-->

<!-- wp:read-more {"content":"' . esc_attr($more_label) . '","className":"' . $more_class . '"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template -->';
};
