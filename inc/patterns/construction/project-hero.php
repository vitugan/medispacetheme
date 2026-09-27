<?php
/**
 * Pattern: Project hero - Construction (single project template).
 *
 * Dark hero from the project itself: featured image, breadcrumbs (Home → Portfolio → project),
 * title and the manual excerpt.
 *
 * @package Medispace
 */

$medispace_page_hero = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/page-hero.php";

return [
    "title" => __("Project hero - Construction", "medispace"),
    "categories" => ["medispace-construction", "banner"],
    "keywords" => ["hero", "banner", "project", "portfolio"],
    "viewportWidth" => 1440,
    "inserter" => false,
    "content" => $medispace_page_hero(["dynamic" => true, "breadcrumbs" => true]),
];
