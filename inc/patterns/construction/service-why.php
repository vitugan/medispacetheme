<?php
/**
 * Pattern: Service - why choose us - Construction (service layout 1, Custom cabinetry).
 *
 * White section, four light-grey cards with dark icon tiles (feature-cards "plain").
 *
 * @package Medispace
 */

$medispace_feature_cards = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/feature-cards.php";
$medispace_icons = MEDISPACE_THEME_URL . "/assets/images/construction/services";

return [
    "title" => __("Service - why choose us - Construction", "medispace"),
    "categories" => ["medispace-construction", "featured"],
    "keywords" => ["why", "benefits", "features", "service"],
    "viewportWidth" => 1440,
    "content" => $medispace_feature_cards([
        "variant" => "plain",
        "title" => __("Why choose cabinets by MedicalSpace?", "medispace"),
        "items" => [
            [
                "icon" => $medispace_icons . "/icon-craftsmanship.svg",
                "title" => __("Expert craftsmanship", "medispace"),
                "text" => __("Our custom cabinet solutions are meticulously crafted by skilled artisans, ensuring the highest level of quality and durability for your dental or medical practice.", "medispace"),
            ],
            [
                "icon" => $medispace_icons . "/icon-tailored.svg",
                "title" => __("Tailored design", "medispace"),
                "text" => __("We work closely with you to create medical cabinets that cater to your specific needs, preferences, and workflow efficiency, resulting in a truly personalized and efficient workspace for you and your staff.", "medispace"),
            ],
            [
                "icon" => $medispace_icons . "/icon-integration.svg",
                "title" => __("Seamless integration", "medispace"),
                "text" => __("Our dental and medical cabinets are designed to integrate seamlessly with your existing equipment and technology, allowing for a smooth and efficient workflow within your practice.", "medispace"),
            ],
            [
                "icon" => $medispace_icons . "/icon-support.svg",
                "title" => __("Local support and service", "medispace"),
                "text" => __("We're committed to providing exceptional customer service and ongoing support for our custom medical cabinets, ensuring your practice continues to thrive with our high-quality cabinetry solutions.", "medispace"),
            ],
        ],
    ]),
];
