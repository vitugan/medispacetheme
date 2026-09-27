<?php
/**
 * Pattern: Portfolio hero - Construction (the projects archive).
 *
 * Light hero with breadcrumbs, as in the Portfolio design.
 *
 * @package Medispace
 */

$medispace_page_hero = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/page-hero.php";

return [
    "title" => __("Portfolio hero - Construction", "medispace"),
    "categories" => ["medispace-construction", "banner"],
    "keywords" => ["hero", "banner", "portfolio", "projects"],
    "viewportWidth" => 1440,
    "inserter" => false,
    "content" => $medispace_page_hero([
        "title" => __("Portfolio", "medispace"),
        "image" => MEDISPACE_THEME_URL . "/assets/images/construction/portfolio-hero.webp",
        "breadcrumbs" => true,
        "variant" => "light",
    ]),
];
