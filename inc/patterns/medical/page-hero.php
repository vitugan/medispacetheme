<?php
/**
 * Pattern: Page hero - Medical (inner pages: Spaces, About, Pricing, Blog, Space, Contact,
 * Location).
 *
 * One hero for every inner page of the flow, as in the design: a gradient background, title,
 * intro and "Schedule Tour" on the left, an image on the right (810 x 329 in the design, the
 * rounded shape is in the image). Pick the page's gradient in Block settings → Background
 * (presets "Hero: …" from styles/flow-3-medical.json); delete the intro, button or image when a
 * page does not have them. Styles: assets/css/patterns.css ("Page hero - Medical").
 *
 * @package Medispace
 */

$medispace_medical_hero = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/medical-hero.php";

return [
    "title" => __("Page hero - Medical", "medispace"),
    "description" => __("Gradient header for inner pages: title, intro, button and an image. Choose the gradient in the block's Background settings.", "medispace"),
    "categories" => ["medispace-medical", "banner"],
    "keywords" => ["hero", "banner", "page", "header", "gradient"],
    "viewportWidth" => 1440,
    "content" => $medispace_medical_hero([
        "heading" => "post",
        "text" => __("Looking for a professional, fully equipped medical office? Book a private room by the hour, day or month.", "medispace"),
        "button" => true,
        "image" => MEDISPACE_THEME_URL . "/assets/images/medical/page-hero/contact.webp",
        "gradient" => "hero-lavender",
    ]),
];
