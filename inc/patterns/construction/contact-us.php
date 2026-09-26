<?php
/**
 * Pattern: Contact us (map + form) - Construction.
 *
 * MediSpace Core "cover map" block (live Leaflet map, office marker) with a white card on top:
 * heading, intro and the theme's Contact Form 7 form (inc/contact-form.php). Used on About,
 * Services, service pages and Contact in the design.
 *
 * @package Medispace
 */

// 10 Booth Place, Balcatta WA 6021 (approximate; adjust in the block settings).
$medispace_map = serialize_block_attributes([
    "lat" => -31.8756,
    "lng" => 115.8162,
    "zoom" => 15,
    "height" => 662,
    "markerImage" => [
        "url" => MEDISPACE_THEME_URL . "/assets/images/construction/contact/map-marker.svg",
        "width" => 74,
        "height" => 74,
    ],
    "markerSize" => 74,
    // OpenStreetMap tiles (no API key; the plugin's default CARTO style now requires one),
    // greyed out in CSS to match the design.
    "themeUrl" => "https://tile.openstreetmap.org/{z}/{x}/{y}.png",
    "themeAttribution" => '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    "align" => "full",
    "className" => "contact-map",
]);

return [
    "title" => __("Contact us (map + form) - Construction", "medispace"),
    "categories" => ["medispace-construction", "contact"],
    "keywords" => ["contact", "form", "map", "get in touch"],
    "viewportWidth" => 1440,
    "content" =>
        '<!-- wp:medisapce-core/cover-map-block ' . $medispace_map . ' -->
<!-- wp:group {"metadata":{"name":"Contact card"},"className":"contact-card","style":{"spacing":{"padding":{"top":"clamp(32px, 2.1vw, 40px)","right":"clamp(32px, 2.1vw, 40px)","bottom":"clamp(32px, 2.1vw, 40px)","left":"clamp(32px, 2.1vw, 40px)"},"blockGap":"var:preset|spacing|60"},"border":{"width":"1px"},"shadow":"0 4px 17.5px rgba(0,0,0,0.05)"},"backgroundColor":"white","borderColor":"gray-20","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group contact-card has-border-color has-gray-20-border-color has-white-background-color has-background" style="border-width:1px;padding-top:clamp(32px, 2.1vw, 40px);padding-right:clamp(32px, 2.1vw, 40px);padding-bottom:clamp(32px, 2.1vw, 40px);padding-left:clamp(32px, 2.1vw, 40px);box-shadow:0 4px 17.5px rgba(0,0,0,0.05)"><!-- wp:group {"metadata":{"name":"Head"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:heading -->
<h2 class="wp-block-heading">' . esc_html__("Get in touch", "medispace") . '</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"gray-80"} -->
<p class="has-gray-80-color has-text-color">' . esc_html__("Please fill out the form below to request a personal consultation to determine your practice needs.", "medispace") . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

' . medispace_contact_form_block() . '</div>
<!-- /wp:group -->
<!-- /wp:medisapce-core/cover-map-block -->',
];
