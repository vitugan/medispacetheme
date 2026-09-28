<?php
/**
 * Pattern: Location highlights - Medical (a navy band under the map: four points with the
 * designer's icon tiles, divided by thin lines; stacked on phones).
 * Styles: assets/css/patterns.css ("Location - Medical").
 *
 * @package Medispace
 */

$medispace_icons = MEDISPACE_THEME_URL . "/assets/images/medical/location";
$medispace_items = [
    __("Highly accessible location just off Highway 66, 30 minutes from The White House, with 150 covered and 75 uncovered parking spaces.", "medispace"),
    __("Conveniently located in close proximity to George Washington University Int Medical, Sam Medical Center of America, and other medical facilities.", "medispace"),
    __("Walkable to dozens of amenities such as restaurants, shopping, and 0.5 miles from O Museum in The Mansion.", "medispace"),
    __("Access to outdoor walking space, offering a peaceful environment for physical activities.", "medispace"),
];

$medispace_cells = "";
foreach ($medispace_items as $medispace_i => $medispace_text) {
    $medispace_cells .= '<!-- wp:group {"className":"medical-location-features__item","style":{"spacing":{"blockGap":"16px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group medical-location-features__item"><!-- wp:image {"width":"48px","height":"48px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . esc_url($medispace_icons . "/icon-location-" . ($medispace_i + 1) . ".svg") . '" alt="" style="width:48px;height:48px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>' . esc_html($medispace_text) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

';
}

return [
    "title" => __("Location highlights - Medical", "medispace"),
    "categories" => ["medispace-medical", "featured"],
    "keywords" => ["location", "features", "parking", "amenities"],
    "viewportWidth" => 1440,
    "content" =>
        '<!-- wp:group {"metadata":{"name":"Location highlights"},"align":"full","className":"medical-location-band","style":{"spacing":{"margin":{"top":"40px","bottom":"var(--wp--custom--section-gap)"},"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"constrained","wideSize":"1640px"}} -->
<div class="wp-block-group alignfull medical-location-band" style="margin-top:40px;margin-bottom:var(--wp--custom--section-gap);padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"align":"wide","className":"medical-location-features","backgroundColor":"dark","textColor":"white","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide medical-location-features has-white-color has-dark-background-color has-text-color has-background">' . $medispace_cells . '</div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
];
