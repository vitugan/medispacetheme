<?php
/**
 * Pattern: Who we serve - Construction.
 *
 * Heading + grid of audience tiles (icon + label). 7 in a row on desktop; the grid keeps each
 * tile at least 140px wide, so it falls back to 2 per row on phones, as in the design.
 *
 * @package Medispace
 */

$medispace_icons = MEDISPACE_THEME_URL . "/assets/images/construction/serve";
$medispace_audience = [
    "doctors" => __("Doctors & Physicians", "medispace"),
    "nurses" => __("Nurse Practitioners", "medispace"),
    "dentists" => __("Dentists", "medispace"),
    "plastic-surgeons" => __("Plastic Surgeons", "medispace"),
    "dermatologists" => __("Dermatologists", "medispace"),
    "physician-assistants" => __("Physician Assistants", "medispace"),
    "aestheticians" => __("Medical Aestheticians & More", "medispace"),
];

$medispace_tiles = "";
foreach ($medispace_audience as $icon => $label) {
    $medispace_tiles .= '<!-- wp:group {"metadata":{"name":"Tile"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","right":"10px","bottom":"var:preset|spacing|40","left":"10px"},"blockGap":"var:preset|spacing|40"}},"backgroundColor":"light-gray","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group has-light-gray-background-color has-background" style="padding-top:var(--wp--preset--spacing--40);padding-right:10px;padding-bottom:var(--wp--preset--spacing--40);padding-left:10px"><!-- wp:image {"width":"32px","height":"32px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . esc_url($medispace_icons . "/icon-" . $icon . ".svg") . '" alt="" style="width:32px;height:32px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontWeight":"700"}},"textColor":"gray-100"} -->
<p class="has-text-align-center has-gray-100-color has-text-color" style="font-weight:700">' . esc_html($label) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

';
}

return [
    "title" => __("Who we serve - Construction", "medispace"),
    "categories" => ["medispace-construction", "features"],
    "keywords" => ["audience", "clients", "who we serve", "icons"],
    "viewportWidth" => 1440,
    "content" =>
        '<!-- wp:group {"metadata":{"name":"Who we serve"},"align":"full","style":{"spacing":{"margin":{"top":"clamp(40px, 4.2vw, 80px)","bottom":"var(--wp--custom--section-gap)"},"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"},"blockGap":"32px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:clamp(40px, 4.2vw, 80px);margin-bottom:var(--wp--custom--section-gap);padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">' . esc_html__("Who we serve?", "medispace") . '</h2>
<!-- /wp:heading -->

<!-- wp:group {"metadata":{"name":"Tiles"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","columnCount":7,"minimumColumnWidth":"140px"}} -->
<div class="wp-block-group">' . rtrim($medispace_tiles) . '</div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
];
