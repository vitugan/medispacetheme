<?php
/**
 * Pattern: Location map - Medical (centered heading and intro, a full-width live map with the
 * designer's marker, recolored to the design's grey street map by inc/map-tint.php).
 *
 * Needs the MediSpace Core plugin ("Cover Map Block"). Styles: assets/css/patterns.css
 * ("Location - Medical").
 *
 * @package Medispace
 */

// 1133 21st St NW, Washington, DC 20036 (Lafayette Centre); adjust in the block settings.
$medispace_map = serialize_block_attributes([
    "lat" => 38.9053,
    "lng" => -77.0467,
    "zoom" => 15,
    "height" => 558,
    "markerImage" => [
        "url" => MEDISPACE_THEME_URL . "/assets/images/medical/location/icon-marker.svg",
        "width" => 72,
        "height" => 78,
    ],
    "markerSize" => 72,
    // OpenStreetMap tiles (no API key), recolored in CSS.
    "themeUrl" => "https://tile.openstreetmap.org/{z}/{x}/{y}.png",
    "themeAttribution" => '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    "align" => "full",
    "className" => "medical-location-map",
]);

return [
    "title" => __("Location map - Medical", "medispace"),
    "categories" => ["medispace-medical", "contact"],
    "keywords" => ["location", "map", "address"],
    "viewportWidth" => 1440,
    "content" =>
        '<!-- wp:group {"metadata":{"name":"Location"},"align":"full","style":{"spacing":{"margin":{"top":"var(--wp--custom--section-gap)","bottom":"0"},"blockGap":"32px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:var(--wp--custom--section-gap);margin-bottom:0"><!-- wp:group {"metadata":{"name":"Head"},"style":{"spacing":{"blockGap":"var:preset|spacing|40","padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"constrained","contentSize":"491px"}} -->
<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">' . esc_html__("Location", "medispace") . '</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"gray-80"} -->
<p class="has-text-align-center has-gray-80-color has-text-color">' . esc_html__("Med Land, Washington, is a vibrant community with a growing population and a focus on life sciences. MedicalSpace is located in the MedStar Health: Medical Center at Lafayette Centre building.", "medispace") . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:medisapce-core/cover-map-block ' . $medispace_map . ' /--></div>
<!-- /wp:group -->',
];
