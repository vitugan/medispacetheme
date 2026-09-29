<?php
/**
 * Pattern: All-inclusive amenities - Medical (Home "Benefits").
 *
 * Light-grey section with six white rounded cards (icon above centered title and text) and a
 * "Contact Us" button: the feature-cards builder, stacked, with the designer's icons that
 * already contain their light-blue tile.
 *
 * @package Medispace
 */

$medispace_feature_cards = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/feature-cards.php";
$medispace_icons = MEDISPACE_THEME_URL . "/assets/images/medical/benefits";

return [
    "title" => __("All-inclusive amenities - Medical", "medispace"),
    "categories" => ["medispace-medical", "featured"],
    "keywords" => ["benefits", "amenities", "features", "cards"],
    "viewportWidth" => 1440,
    "content" => $medispace_feature_cards([
        "variant" => "tinted",
        "columns" => 3,
        "stacked" => true,
        "icon_tile" => false,
        "card_padding_y" => "40px",
        "card_gap" => "var:preset|spacing|40",
        "title" => __("All-Inclusive Amenities", "medispace"),
        "items" => [
            [
                "icon" => $medispace_icons . "/icon-benefit-1.svg",
                "title" => __("Private Exam Rooms", "medispace"),
                "text" => __("Fully furnished suites, including an exam table, sink, and cabinetry in every room", "medispace"),
            ],
            [
                "icon" => $medispace_icons . "/icon-benefit-2.svg",
                "title" => __("Staff Work Stations", "medispace"),
                "text" => __("Abundant space for your staff", "medispace"),
            ],
            [
                "icon" => $medispace_icons . "/icon-benefit-3.svg",
                "title" => __("Basic Medical Supplies", "medispace"),
                "text" => __("Medical exam kits, physical exam tools, PPE, and blood draw supplies", "medispace"),
            ],
            [
                "icon" => $medispace_icons . "/icon-benefit-4.svg",
                "title" => __("On-Site Receptionist", "medispace"),
                "text" => __("Staff to greet your patients upon arrival and provide general information", "medispace"),
            ],
            [
                "icon" => $medispace_icons . "/icon-benefit-5.svg",
                "title" => __("Office Essentials", "medispace"),
                "text" => __("Private lockers, cold storage, mail, and fax/scan/copy/print capabilities", "medispace"),
            ],
            [
                "icon" => $medispace_icons . "/icon-benefit-6.svg",
                "title" => __("Daily Cleanings", "medispace"),
                "text" => __("Janitorial services and frequent sanitation are strictly implemented", "medispace"),
            ],
        ],
        "button" => [
            "label" => __("Contact Us", "medispace"),
            "url" => home_url("/contact/"),
            "padding_x" => "72.85px",
        ],
    ]),
];
