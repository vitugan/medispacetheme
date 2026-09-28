<?php
/**
 * Pattern: Blog hero - Medical (posts page).
 *
 * The Medical page hero (inc/pattern-parts/medical-hero.php) with the blog gradient and image.
 *
 * @package Medispace
 */

$medispace_medical_hero = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/medical-hero.php";

return [
    "title" => __("Blog hero - Medical", "medispace"),
    "categories" => ["medispace-medical", "banner"],
    "keywords" => ["hero", "banner", "blog"],
    "viewportWidth" => 1440,
    "inserter" => false,
    "content" => $medispace_medical_hero([
        "heading" => "static",
        "title" => __("Blog", "medispace"),
        "text" => __("The rise of medical coworking spaces offers professionals flexible, cost-effective office space with essential amenities and collaborative environments.", "medispace"),
        "image" => MEDISPACE_THEME_URL . "/assets/images/medical/page-hero/blog.webp",
        "gradient" => "hero-blue-green",
    ]),
];
