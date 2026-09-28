<?php
/**
 * Pattern: Spaces hero - Medical (the Spaces archive title, intro and "Schedule Tour" on the
 * mint-to-peach gradient, the designer's collage with the "Spaces Rate 4.9" card).
 *
 * @package Medispace
 */

$medispace_medical_hero = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/medical-hero.php";

return [
    "title" => __("Spaces hero - Medical", "medispace"),
    "categories" => ["medispace-medical", "banner"],
    "keywords" => ["hero", "banner", "spaces", "rooms"],
    "viewportWidth" => 1440,
    "inserter" => false,
    "content" => $medispace_medical_hero([
        "heading" => "archive",
        "text" => __("We invite you to schedule a personalized tour of our state-of-the-art medical coworking facility.", "medispace"),
        "button" => true,
        "image" => MEDISPACE_THEME_URL . "/assets/images/medical/page-hero/spaces.webp",
        "gradient" => "hero-mint-peach",
    ]),
];
