<?php
/**
 * Pattern: Archive hero - Construction (category, tag, date archives).
 *
 * The blog hero with the archive name (core Query Title, no "Category:" prefix).
 *
 * @package Medispace
 */

$medispace_page_hero = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/page-hero.php";

return [
    "title" => __("Archive hero - Construction", "medispace"),
    "categories" => ["medispace-construction", "banner"],
    "keywords" => ["hero", "banner", "archive", "category"],
    "viewportWidth" => 1440,
    "inserter" => false,
    "content" => $medispace_page_hero([
        "archive_title" => true,
        "image" => MEDISPACE_THEME_URL . "/assets/images/construction/blog-hero.webp",
        "breadcrumbs" => true,
        "variant" => "light",
    ]),
];
