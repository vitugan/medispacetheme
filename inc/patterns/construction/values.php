<?php
/**
 * Pattern: Our values - Construction (About).
 *
 * Light-blue section, three white cards with the icon above centered text, and a CTA.
 * Built on the shared feature-cards builder.
 *
 * @package Medispace
 */

$medispace_feature_cards = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/feature-cards.php";
$medispace_icons = MEDISPACE_THEME_URL . "/assets/images/construction/values";

return [
    "title" => __("Our values - Construction", "medispace"),
    "categories" => ["medispace-construction", "features"],
    "keywords" => ["values", "about", "cards"],
    "viewportWidth" => 1440,
    "content" => $medispace_feature_cards([
        "title" => __("Our values", "medispace"),
        "variant" => "tinted",
        "section_bg" => "light-blue",
        "columns" => 3,
        "stacked" => true,
        "items" => [
            [
                "icon" => $medispace_icons . "/icon-honesty.svg",
                "title" => __("Honesty", "medispace"),
                "text" => __("We believe in upholding our agreements, delivering on promises, and maintaining absolute transparency.", "medispace"),
            ],
            [
                "icon" => $medispace_icons . "/icon-knowledge.svg",
                "title" => __("Knowledge", "medispace"),
                "text" => __("Specializing exclusively in medical office design and construction has equipped us with an in-depth understanding of the industry.", "medispace"),
            ],
            [
                "icon" => $medispace_icons . "/icon-experience.svg",
                "title" => __("Experience", "medispace"),
                "text" => __("Our vast experience has shaped our expertise, making us a preferred partner for medical practice projects.", "medispace"),
            ],
        ],
        "button" => [
            "label" => __("Request proposal", "medispace"),
            "url" => home_url("/contact/"),
        ],
    ]),
];
