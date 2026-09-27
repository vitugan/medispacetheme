<?php
/**
 * Pattern: Service hero - Construction (single service template).
 *
 * Light hero: the service's featured image under an 80% white overlay, breadcrumbs
 * (Home → Services → service), the title and a "Get in touch" button to the contact form.
 *
 * @package Medispace
 */

$medispace_page_hero = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/page-hero.php";

return [
    "title" => __("Service hero - Construction", "medispace"),
    "categories" => ["medispace-construction", "banner"],
    "keywords" => ["hero", "banner", "service"],
    "viewportWidth" => 1440,
    "inserter" => false,
    "content" => $medispace_page_hero([
        "dynamic" => true,
        "breadcrumbs" => true,
        "variant" => "light",
        "button" => ["label" => __("Get in touch", "medispace"), "url" => "#contact"],
    ]),
];
