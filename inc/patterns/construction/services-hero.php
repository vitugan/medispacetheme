<?php
/**
 * Pattern: Services hero - Construction (Services archive).
 *
 * @package Medispace
 */

$medispace_page_hero = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/page-hero.php";

return [
    "title" => __("Services hero - Construction", "medispace"),
    "categories" => ["medispace-construction", "banner"],
    "keywords" => ["hero", "banner", "services"],
    "viewportWidth" => 1440,
    "content" => $medispace_page_hero([
        "title" => __("Services", "medispace"),
        "text" => __("Our expert team is dedicated to providing tailored solutions that meet your unique needs and ensure a seamless experience from start to finish.", "medispace"),
        "image" => MEDISPACE_THEME_URL . "/assets/images/construction/services/hero.webp",
        "breadcrumbs" => true,
    ]),
];
