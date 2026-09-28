<?php
/**
 * Pattern: Location hero - Medical (a long static title and "Schedule Tour" on the sand-to-aqua
 * gradient, the photo of two doctors in the design's rounded shape).
 *
 * @package Medispace
 */

$medispace_medical_hero = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/medical-hero.php";

return [
    "title" => __("Location hero - Medical", "medispace"),
    "categories" => ["medispace-medical", "banner"],
    "keywords" => ["hero", "banner", "location"],
    "viewportWidth" => 1440,
    "content" => $medispace_medical_hero([
        "heading" => "static",
        "title" => __("Medical Office Spaces for Rent in Washington – Flexible Terms, Modern Amenities!", "medispace"),
        "button" => true,
        "image" => MEDISPACE_THEME_URL . "/assets/images/medical/page-hero/location.webp",
        "gradient" => "hero-sand-aqua",
    ]),
];
