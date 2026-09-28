<?php
/**
 * Pattern: Space hero - Medical (single space page: title, intro and "Schedule Tour" on the
 * lavender gradient, a room photo in the design's rounded shape).
 *
 * @package Medispace
 */

$medispace_medical_hero = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/medical-hero.php";

return [
    "title" => __("Space hero - Medical", "medispace"),
    "categories" => ["medispace-medical", "banner"],
    "keywords" => ["hero", "banner", "space", "room"],
    "viewportWidth" => 1440,
    "content" => $medispace_medical_hero([
        "heading" => "static",
        "title" => __("Fully Furnished Medical Exam Rooms for Rent", "medispace"),
        "text" => __("Looking for a professional, fully equipped medical exam room for rent in Washington? MedicalSpace offers flexible, modern exam rooms designed for physicians, nurse practitioners, and other healthcare professionals.", "medispace"),
        "button" => true,
        "image" => MEDISPACE_THEME_URL . "/assets/images/medical/page-hero/space.webp",
        "gradient" => "hero-lavender",
    ]),
];
