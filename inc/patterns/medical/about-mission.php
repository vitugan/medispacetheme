<?php
/**
 * Pattern: Our mission - Medical (About; light-blue section, three white cards with the
 * designer's navy icon tiles, text only).
 *
 * @package Medispace
 */

$medispace_feature_cards = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/feature-cards.php";
$medispace_icons = MEDISPACE_THEME_URL . "/assets/images/medical/about";

return [
    "title" => __("Our mission - Medical", "medispace"),
    "categories" => ["medispace-medical", "featured"],
    "keywords" => ["about", "mission", "values", "cards"],
    "viewportWidth" => 1440,
    "content" => $medispace_feature_cards([
        "variant" => "tinted",
        "section_bg" => "light-blue",
        "columns" => 3,
        "stacked" => true,
        "icon_tile" => false,
        "card_padding_y" => "40px",
        "card_gap" => "var:preset|spacing|50",
        "title" => __("Our Mission", "medispace"),
        "items" => [
            ["icon" => $medispace_icons . "/icon-mission-1.svg", "text" => __("Revolutionize the way healthcare professionals work by providing a collaborative and flexible coworking space that aims for innovation, and patient care", "medispace")],
            ["icon" => $medispace_icons . "/icon-mission-2.svg", "text" => __("Empower medical professionals to focus on exceptional patient care while we take care of their workspace needs", "medispace")],
            ["icon" => $medispace_icons . "/icon-mission-3.svg", "text" => __("Provide comprehensive amenities, administrative support, and cost-effective solutions to advance the health and well-being of individuals and communities we serve", "medispace")],
        ],
    ]),
];
