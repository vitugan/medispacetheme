<?php
/**
 * Pattern: Call to Action - Construction (solid background).
 *
 * @package Medispace
 */

$medispace_cta_banner = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/cta-banner.php";

return [
    "title" => __("Call to Action - Construction", "medispace"),
    "categories" => ["medispace-construction", "call-to-action"],
    "keywords" => ["cta", "contact", "banner"],
    "viewportWidth" => 1440,
    "content" => $medispace_cta_banner([
        "title" => __("Not sure where to start?", "medispace"),
        "text" => __("Reach out to us!", "medispace"),
        "button" => __("Contact us", "medispace"),
        "url" => home_url("/contact/"),
        "width" => "534px",
    ]),
];
