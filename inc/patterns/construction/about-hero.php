<?php
/**
 * Pattern: About hero - Construction.
 *
 * @package Medispace
 */

$medispace_page_hero = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/page-hero.php";

return [
    "title" => __("About hero - Construction", "medispace"),
    "categories" => ["medispace-construction", "banner"],
    "keywords" => ["hero", "banner", "about"],
    "viewportWidth" => 1440,
    "content" => $medispace_page_hero([
        "title" => __("About MedicalSpace", "medispace"),
        "text" => __("Welcome to MedicalSpace, your trusted partner for creating dynamic and efficient medical office spaces", "medispace"),
        "image" => MEDISPACE_THEME_URL . "/assets/images/construction/about/hero-team.webp",
    ]),
];
