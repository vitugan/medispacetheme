<?php
/**
 * Shared builder for Medical text + collage sections (About: Our Vision, About Doctor Office
 * Space for Rent): heading, paragraphs and an optional button next to one collage image from
 * the design (transparent PNG/WebP, the shapes are in the image). Styles: assets/css/patterns.css
 * ("Medical media and text").
 *
 * Lives outside inc/patterns/ so the pattern auto-discovery does not register it.
 *
 * @package Medispace
 */

/**
 * @param array{
 *     title:string, paragraphs:string[], image:string, image_alt?:string, image_width?:int,
 *     image_position?:"left"|"right", button?:array{label:string, url:string}
 * } $args
 * @return string Block markup.
 */
return function (array $args) {
    $paragraphs = "";
    foreach ($args["paragraphs"] as $text) {
        $paragraphs .= '

<!-- wp:paragraph {"textColor":"gray-80"} -->
<p class="has-gray-80-color has-text-color">' . esc_html($text) . '</p>
<!-- /wp:paragraph -->';
    }

    $button = "";
    if (!empty($args["button"])) {
        $button = '

<!-- wp:buttons {"className":"is-mobile-full"} -->
<div class="wp-block-buttons is-mobile-full"><!-- wp:button {"style":{"spacing":{"padding":{"left":"70px","right":"70px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="' . esc_url($args["button"]["url"]) . '" style="padding-right:70px;padding-left:70px">' . esc_html($args["button"]["label"]) . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->';
    }

    $width = (int) ($args["image_width"] ?? 564);
    $right = ($args["image_position"] ?? "left") === "right";

    $text = '<!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%"><!-- wp:group {"metadata":{"name":"Content"},"style":{"spacing":{"blockGap":"40px"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:group {"metadata":{"name":"Text"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:heading -->
<h2 class="wp-block-heading">' . esc_html($args["title"]) . '</h2>
<!-- /wp:heading -->' . $paragraphs . '</div>
<!-- /wp:group -->' . $button . '</div>
<!-- /wp:group --></div>
<!-- /wp:column -->';

    $align = $right ? "right" : "left";
    $image = '<!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%"><!-- wp:image {"width":"' . $width . 'px","sizeSlug":"full","linkDestination":"none","align":"' . $align . '","className":"medical-media__image"} -->
<figure class="wp-block-image align' . $align . ' size-full is-resized medical-media__image"><img src="' . esc_url($args["image"]) . '" alt="' . esc_attr($args["image_alt"] ?? "") . '" style="width:' . $width . 'px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->';

    // Phones stack the columns in source order: the text first for an image-right section.
    $columns = $right ? $text . "\n\n" . $image : $image . "\n\n" . $text;

    return '<!-- wp:group {"metadata":{"name":"Content section"},"align":"full","style":{"spacing":{"margin":{"top":"var(--wp--custom--section-gap)","bottom":"var(--wp--custom--section-gap)"},"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:var(--wp--custom--section-gap);margin-bottom:var(--wp--custom--section-gap);padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:columns {"verticalAlignment":"center","className":"medical-media","style":{"spacing":{"blockGap":{"top":"40px","left":"60px"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center medical-media">' . $columns . '</div>
<!-- /wp:columns --></div>
<!-- /wp:group -->';
};
