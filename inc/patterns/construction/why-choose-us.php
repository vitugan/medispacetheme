<?php
/**
 * Pattern: Why choose us - Construction (Home: light-gray section, white cards).
 *
 * @package Medispace
 */

$medispace_feature_cards = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/feature-cards.php";
$medispace_icons = MEDISPACE_THEME_URL . "/assets/images/construction/why";

return [
    "title" => __("Why choose us - Construction", "medispace"),
    "categories" => ["medispace-construction", "features"],
    "keywords" => ["why", "features", "benefits", "cards"],
    "viewportWidth" => 1440,
    "content" => $medispace_feature_cards([
        "title" => __("Why choose us", "medispace"),
        "variant" => "tinted",
        "items" => [
            [
                "icon" => $medispace_icons . "/icon-turnkey.svg",
                "title" => __("One-stop, turnkey solutions", "medispace"),
                "text" => __("Our comprehensive services cover everything from site selection and design to construction and furnishing. We take end-to-end approach and are committed to seamless project delivery.", "medispace"),
            ],
            [
                "icon" => $medispace_icons . "/icon-expertise.svg",
                "title" => __("Industry-specific expertise", "medispace"),
                "text" => __("Our exclusive focus on medical offices ensures an in-depth understanding of unique requirements and industry standarts,", "medispace"),
            ],
            [
                "icon" => $medispace_icons . "/icon-cabinetry.svg",
                "title" => __("Custom cabinetry", "medispace"),
                "text" => __("Our in-house woodworking shop allows us to craft tailor-made cabinetry solutions that perfectly align with practice’s needs and style.", "medispace"),
            ],
            [
                "icon" => $medispace_icons . "/icon-local.svg",
                "title" => __("Local expertise", "medispace"),
                "text" => __("With dozens of successful projects, we take pride in our deep understanding of the local market and commitment to the community.", "medispace"),
            ],
        ],
    ]),
];
