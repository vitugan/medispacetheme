<?php
/**
 * Shared builder for inner-page heroes (About, Services, service pages, Blog, FAQ, Portfolio,
 * Contact): photo under an 80% black overlay, heading and intro aligned left in the wide column.
 *
 * The page template's overlay header sits on top of it on desktop; the extra top offset for the
 * fixed header comes from assets/css/patterns.css (header.is-overlay + main ...).
 *
 * Lives outside inc/patterns/ so the pattern auto-discovery does not register it.
 *
 * @package Medispace
 */

/**
 * @param array{title:string, text?:string, image:string} $args
 * @return string Block markup.
 */
return function (array $args) {
    $image = esc_url($args["image"]);
    $text = "";
    if (!empty($args["text"])) {
        $text = '

<!-- wp:paragraph {"className":"page-hero__text"} -->
<p class="page-hero__text">' . esc_html($args["text"]) . '</p>
<!-- /wp:paragraph -->';
    }

    return '<!-- wp:cover {"url":"' . $image . '","dimRatio":80,"customOverlayColor":"#000000","isUserOverlayColor":true,"isDark":true,"metadata":{"name":"Page hero"},"align":"full","className":"page-hero","style":{"spacing":{"padding":{"top":"clamp(40px, 6.25vw, 120px)","right":"var:preset|spacing|40","bottom":"var(--wp--custom--section-gap)","left":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull page-hero" style="padding-top:clamp(40px, 6.25vw, 120px);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--custom--section-gap);padding-left:var(--wp--preset--spacing--40)"><img class="wp-block-cover__image-background" alt="" src="' . $image . '" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-background-dim-80 has-background-dim" style="background-color:#000000"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"metadata":{"name":"Text"},"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"textColor":"white","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group alignwide has-white-color has-text-color"><!-- wp:heading {"level":1,"style":{"typography":{"fontWeight":"500"}},"fontSize":"h-1"} -->
<h1 class="wp-block-heading has-h-1-font-size" style="font-weight:500">' . esc_html($args["title"]) . '</h1>
<!-- /wp:heading -->' . $text . '</div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->';
};
