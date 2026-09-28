<?php
/**
 * Pattern: Pricing hero - Medical (the page title, intro and "Schedule Tour" on the sky-to-mint
 * gradient, the designer's photo collage).
 *
 * @package Medispace
 */

$medispace_medical_hero = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/medical-hero.php";

return [
    "title" => __("Pricing hero - Medical", "medispace"),
    "categories" => ["medispace-medical", "banner"],
    "keywords" => ["hero", "banner", "pricing"],
    "viewportWidth" => 1440,
    "content" => $medispace_medical_hero([
        "heading" => "post",
        "text" => __("Affordable furnished medical office space for rent—perfect for healthcare providers looking for ready-to-use, professional workspaces with flexible terms.", "medispace"),
        "button" => true,
        "image" => MEDISPACE_THEME_URL . "/assets/images/medical/page-hero/pricing.webp",
        "gradient" => "hero-sky-mint",
    ]),
];
