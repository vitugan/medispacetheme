<?php
/**
 * Shared builder for the "Call to Action" banner patterns.
 *
 * One core/cover block serves both designs: a solid dark banner and the same banner with a
 * tinted photo fading in from the right. The look comes from the `cta-banner` class
 * (assets/css/patterns.css), so adding an image to the plain variant in the editor picks up
 * the same treatment.
 *
 * Lives outside inc/patterns/ so the pattern auto-discovery does not register it.
 *
 * @package Medispace
 */

/**
 * @param array{title:string, text:string, button:string, url:string, width:string, image?:string} $args
 * @return string Block markup.
 */
return function (array $args) {
    $image = $args["image"] ?? "";

    // Plain: solid overlay. With image: gradient overlay that fades the photo in from the right.
    $gradient = "linear-gradient(90deg,var(--wp--preset--color--gray-100) 65%,rgba(8,32,44,0) 100%)";
    $cover_attrs = $image
        ? '"url":"' . esc_url($image) . '","dimRatio":100,"customGradient":"' . $gradient . '","isUserOverlayColor":true,"focalPoint":{"x":1,"y":0.5},"isDark":true,'
        : '"dimRatio":100,"overlayColor":"gray-100","isUserOverlayColor":true,"isDark":true,';
    $overlay = $image
        ? '<img class="wp-block-cover__image-background" alt="" src="' . esc_url($image) . '" style="object-position:100% 50%" data-object-fit="cover" data-object-position="100% 50%"/><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient" style="background:' . $gradient . '"></span>'
        : '<span aria-hidden="true" class="wp-block-cover__background has-gray-100-background-color has-background-dim-100 has-background-dim"></span>';

    return '<!-- wp:cover {' . $cover_attrs . '"metadata":{"name":"Call to Action"},"align":"full","className":"cta-banner","style":{"spacing":{"padding":{"top":"clamp(40px, 5vw, 60px)","bottom":"clamp(40px, 5vw, 60px)","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"layout":{"type":"constrained","contentSize":"' . $args["width"] . '"}} -->
<div class="wp-block-cover alignfull cta-banner" style="padding-top:clamp(40px, 5vw, 60px);padding-right:var(--wp--preset--spacing--40);padding-bottom:clamp(40px, 5vw, 60px);padding-left:var(--wp--preset--spacing--40)">' . $overlay . '<div class="wp-block-cover__inner-container"><!-- wp:group {"metadata":{"name":"Content"},"style":{"spacing":{"blockGap":"clamp(30px, 3vw, 40px)"}},"textColor":"white","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group has-white-color has-text-color"><!-- wp:group {"metadata":{"name":"Text"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">' . esc_html($args["title"]) . '</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">' . esc_html($args["text"]) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="' . esc_url($args["url"]) . '">' . esc_html($args["button"]) . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->';
};
