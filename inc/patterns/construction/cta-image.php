<?php
/**
 * Pattern: Call to Action - Construction (with background image).
 *
 * @package Medispace
 */

$medispace_cta_banner = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/cta-banner.php";

return [
    "title" => __("Call to Action with image - Construction", "medispace"),
    "categories" => ["medispace-construction", "call-to-action"],
    "keywords" => ["cta", "contact", "banner", "image"],
    "viewportWidth" => 1440,
    "content" => $medispace_cta_banner([
        "title" => __("Our mission is to provide you the most cost-effective medical office fit-out solution in the most convenient way possible", "medispace"),
        "text" => __("Have an idea but not sure where to start?", "medispace"),
        "button" => __("Book a consultation", "medispace"),
        "url" => home_url("/contact/"),
        "width" => "810px",
        "image" => MEDISPACE_THEME_URL . "/assets/images/construction/cta/cta-bg.webp",
    ]),
];
