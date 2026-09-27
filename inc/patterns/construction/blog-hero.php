<?php
/**
 * Pattern: Blog hero - Construction (posts page).
 *
 * Light hero with breadcrumbs (Home → Blog) and the static "Blog" title: Query Title prints
 * nothing on the posts page, it only works on archives (see archive-hero.php).
 *
 * @package Medispace
 */

$medispace_page_hero = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/page-hero.php";

return [
    "title" => __("Blog hero - Construction", "medispace"),
    "categories" => ["medispace-construction", "banner"],
    "keywords" => ["hero", "banner", "blog"],
    "viewportWidth" => 1440,
    "inserter" => false,
    "content" => $medispace_page_hero([
        "title" => __("Blog", "medispace"),
        "image" => MEDISPACE_THEME_URL . "/assets/images/construction/blog-hero.webp",
        "breadcrumbs" => true,
        "variant" => "light",
    ]),
];
