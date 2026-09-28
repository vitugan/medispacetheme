<?php
/**
 * Pattern: About hero - Medical ("Why MediSpace": the page title on the peach-to-sky gradient,
 * the photo collage with the "200+" card from the design).
 *
 * @package Medispace
 */

$medispace_medical_hero = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/medical-hero.php";

return [
    "title" => __("About hero - Medical", "medispace"),
    "categories" => ["medispace-medical", "banner"],
    "keywords" => ["hero", "banner", "about"],
    "viewportWidth" => 1440,
    "content" => $medispace_medical_hero([
        "heading" => "post",
        "image" => MEDISPACE_THEME_URL . "/assets/images/medical/page-hero/about.webp",
        "gradient" => "hero-peach-sky",
    ]),
];
