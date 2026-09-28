<?php
/**
 * Shared builder for the Medical inner-page hero ("Page hero - Medical", the blog and archive
 * templates): a gradient preset background, heading, optional intro and "Schedule Tour", and an
 * image on the right (810 x 329 in the design, the rounded shape is in the image).
 * Styles: assets/css/patterns.css ("Page hero - Medical").
 *
 * Lives outside inc/patterns/ so the pattern auto-discovery does not register it.
 *
 * @package Medispace
 */

/**
 * @param array{
 *     heading:"post"|"archive"|"static", title?:string, text?:string, button?:bool,
 *     image?:string, gradient?:string
 * } $args
 *
 * heading: "post" = the page title (core Post Title), "archive" = core Query Title without the
 * prefix, "static" = $args["title"]. gradient: a "hero-…" preset of styles/flow-3-medical.json.
 * @return string Block markup.
 */
return function (array $args) {
    $gradient = $args["gradient"] ?? "hero-lavender";
    $h1_attrs = '"level":1,"style":{"typography":{"fontWeight":"600"}},"fontSize":"h-1"';

    switch ($args["heading"] ?? "post") {
        case "archive":
            $heading = '<!-- wp:query-title {"type":"archive","showPrefix":false,' . $h1_attrs . '} /-->';
            break;
        case "static":
            $heading = '<!-- wp:heading {' . $h1_attrs . '} -->
<h1 class="wp-block-heading has-h-1-font-size" style="font-weight:600">' . esc_html($args["title"]) . '</h1>
<!-- /wp:heading -->';
            break;
        default:
            $heading = '<!-- wp:post-title {' . $h1_attrs . '} /-->';
    }

    $text = "";
    if (!empty($args["text"])) {
        $text = '

<!-- wp:paragraph {"className":"medical-page-hero__text","textColor":"gray-100"} -->
<p class="medical-page-hero__text has-gray-100-color has-text-color">' . esc_html($args["text"]) . '</p>
<!-- /wp:paragraph -->';
    }

    $button = "";
    if (!empty($args["button"])) {
        $button = '

<!-- wp:buttons {"className":"is-mobile-full"} -->
<div class="wp-block-buttons is-mobile-full"><!-- wp:button {"style":{"spacing":{"padding":{"left":"38px","right":"38px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="' . esc_url(home_url("/contact/")) . '" style="padding-right:38px;padding-left:38px">' . esc_html__("Schedule Tour", "medispace") . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->';
    }

    $image = "";
    if (!empty($args["image"])) {
        $image = '

<!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%"><!-- wp:image {"width":"810px","sizeSlug":"full","linkDestination":"none","align":"right","className":"medical-page-hero__image"} -->
<figure class="wp-block-image alignright size-full is-resized medical-page-hero__image"><img src="' . esc_url($args["image"]) . '" alt="" style="width:810px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->';
    }

    return '<!-- wp:group {"metadata":{"name":"Page hero"},"align":"full","className":"medical-page-hero","style":{"spacing":{"padding":{"top":"clamp(32px, 2.6vw, 50px)","right":"var:preset|spacing|40","bottom":"clamp(32px, 2.6vw, 50px)","left":"var:preset|spacing|40"}}},"gradient":"' . $gradient . '","layout":{"type":"constrained","wideSize":"1640px"}} -->
<div class="wp-block-group alignfull medical-page-hero has-' . $gradient . '-gradient-background has-background" style="padding-top:clamp(32px, 2.6vw, 50px);padding-right:var(--wp--preset--spacing--40);padding-bottom:clamp(32px, 2.6vw, 50px);padding-left:var(--wp--preset--spacing--40)"><!-- wp:columns {"verticalAlignment":"center","align":"wide","className":"medical-page-hero__columns","style":{"spacing":{"blockGap":{"top":"32px","left":"60px"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center medical-page-hero__columns"><!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%"><!-- wp:group {"metadata":{"name":"Text"},"style":{"spacing":{"blockGap":"40px"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:group {"metadata":{"name":"Content"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group">' . $heading . $text . '</div>
<!-- /wp:group -->' . $button . '</div>
<!-- /wp:group --></div>
<!-- /wp:column -->' . $image . '</div>
<!-- /wp:columns --></div>
<!-- /wp:group -->';
};
