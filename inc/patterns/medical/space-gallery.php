<?php
/**
 * Pattern: Space gallery - Medical (single space page: the Home gallery mosaic without a heading -
 * a large photo left, a 2 x 2 grid right; the large one on top on phones).
 * Styles: assets/css/patterns.css ("Gallery mosaic").
 *
 * @package Medispace
 */

$medispace_dir = MEDISPACE_THEME_URL . "/assets/images/medical/gallery";

$medispace_image = function ($file, $alt) use ($medispace_dir) {
    return '<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"gallery-mosaic__item"} -->
<figure class="wp-block-image size-full gallery-mosaic__item"><img src="' . esc_url($medispace_dir . "/" . $file) . '" alt="' . esc_attr($alt) . '"/></figure>
<!-- /wp:image -->';
};

return [
    "title" => __("Space gallery - Medical", "medispace"),
    "categories" => ["medispace-medical", "gallery"],
    "keywords" => ["gallery", "images", "photos", "space", "room"],
    "viewportWidth" => 1440,
    "content" =>
        '<!-- wp:group {"metadata":{"name":"Gallery"},"align":"full","style":{"spacing":{"margin":{"top":"var(--wp--custom--section-gap)","bottom":"var(--wp--custom--section-gap)"},"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:var(--wp--custom--section-gap);margin-bottom:var(--wp--custom--section-gap);padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"metadata":{"name":"Images"},"className":"gallery-mosaic","layout":{"type":"default"}} -->
<div class="wp-block-group gallery-mosaic">' .
        $medispace_image("reception.webp", __("Reception desk", "medispace")) . "\n\n" .
        $medispace_image("patient-room.webp", __("Patient room", "medispace")) . "\n\n" .
        $medispace_image("dental-chair.webp", __("Dental chair", "medispace")) . "\n\n" .
        $medispace_image("operating-room.webp", __("Operating room", "medispace")) . "\n\n" .
        $medispace_image("corridor.webp", __("Clinic corridor", "medispace")) . '</div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
];
