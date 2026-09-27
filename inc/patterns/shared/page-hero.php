<?php
/**
 * Pattern: Page hero (both flows) - used by the "Page with hero" template.
 *
 * The page's featured image under a dark overlay, its title and its manual excerpt. Editors only
 * set those three things on the page; the hero itself is not part of the page content.
 *
 * @package Medispace
 */

$medispace_page_hero = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/page-hero.php";

return [
    "title" => __("Page hero (featured image, title, excerpt)", "medispace"),
    "categories" => ["banner"],
    "keywords" => ["hero", "banner", "page"],
    "viewportWidth" => 1440,
    "inserter" => false,
    "content" => $medispace_page_hero(["dynamic" => true]),
];
