<?php
/**
 * Pattern: Space features - Medical (single space page: light-gray section, three white cards
 * with the designer's icon tiles, centered text, "Contact Us").
 *
 * @package Medispace
 */

$medispace_feature_cards = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/feature-cards.php";
$medispace_icons = MEDISPACE_THEME_URL . "/assets/images/medical/spaces";

return [
    "title" => __("Space features - Medical", "medispace"),
    "categories" => ["medispace-medical", "featured"],
    "keywords" => ["space", "room", "features", "cards"],
    "viewportWidth" => 1440,
    "content" => $medispace_feature_cards([
        "variant" => "tinted",
        "columns" => 3,
        "stacked" => true,
        "icon_tile" => false,
        "card_padding_y" => "40px",
        "title" => __("Modern, Flexible, and Affordable Medical Space for Independent Providers", "medispace"),
        "items" => [
            ["icon" => $medispace_icons . "/icon-feature-1.svg", "title" => __("Everything You Need, Already in Place", "medispace"), "text" => __("Each of our private exam rooms comes fully furnished with medical-grade equipment, including an electronically powered exam table for patient accessibility and practitioner comfort.", "medispace")],
            ["icon" => $medispace_icons . "/icon-feature-2.svg", "title" => __("Flexible Booking That Works for Your Schedule", "medispace"), "text" => __("You can reserve exam rooms by the hour, day, or month, giving you the freedom to scale your space usage up or down as your patient load changes. No hidden fees or rigid contracts.", "medispace")],
            ["icon" => $medispace_icons . "/icon-feature-3.svg", "title" => __("Designed for Care, Ready for You", "medispace"), "text" => __("Each space is thoughtfully laid out to support smooth clinical operations while maintaining a clean, professional look that builds patient trust.", "medispace")],
        ],
        "button" => ["label" => __("Contact Us", "medispace"), "url" => home_url("/contact/"), "padding_x" => "72.85px"],
    ]),
];
