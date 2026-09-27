<?php
/**
 * Pattern: Service - call to action (makeover) - Construction (service layout 2).
 *
 * Dark CTA banner; the button jumps to the contact form at the bottom of the page.
 *
 * @package Medispace
 */

$medispace_cta_banner = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/cta-banner.php";

return [
    "title" => __("Service - call to action (makeover) - Construction", "medispace"),
    "categories" => ["medispace-construction", "call-to-action"],
    "keywords" => ["cta", "proposal", "banner", "service"],
    "viewportWidth" => 1440,
    "content" => $medispace_cta_banner([
        "title" => __("Give your practice a makeover with our customized office design", "medispace"),
        "text" => __("Start your journey with a design proposal request!", "medispace"),
        "button" => __("Request proposal", "medispace"),
        "url" => "#contact",
        "width" => "534px",
    ]),
];
