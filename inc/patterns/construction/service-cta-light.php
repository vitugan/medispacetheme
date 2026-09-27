<?php
/**
 * Pattern: Service - call to action (light) - Construction (service layout 2).
 *
 * Light-blue CTA banner; the button jumps to the contact form at the bottom of the page.
 *
 * @package Medispace
 */

$medispace_cta_banner = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/cta-banner.php";

return [
    "title" => __("Service - call to action (light) - Construction", "medispace"),
    "categories" => ["medispace-construction", "call-to-action"],
    "keywords" => ["cta", "proposal", "banner", "service"],
    "viewportWidth" => 1440,
    "content" => $medispace_cta_banner([
        "variant" => "light",
        "title" => __("Step into your future space today", "medispace"),
        "text" => __("See and perfect every detail of your custom cabinet design through our advanced 3D visualization technology.", "medispace"),
        "button" => __("Request proposal", "medispace"),
        "url" => "#contact",
        "width" => "534px",
    ]),
];
