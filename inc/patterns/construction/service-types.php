<?php
/**
 * Pattern: Service - types - Construction (service layout 1, Custom cabinetry).
 *
 * "Types of custom cabinets we produce": six static image cards (image-cards builder).
 *
 * @package Medispace
 */

$medispace_image_cards = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/image-cards.php";
$medispace_dir = MEDISPACE_THEME_URL . "/assets/images/construction/services";

return [
    "title" => __("Service - types - Construction", "medispace"),
    "categories" => ["medispace-construction", "featured"],
    "keywords" => ["cards", "types", "products", "service"],
    "viewportWidth" => 1440,
    "content" => $medispace_image_cards([
        "title" => __("Types of custom cabinets we produce", "medispace"),
        "text" => __("Whether you need a cabinet for instrument storage or supply organization, our line of high-quality cabinets has got you covered.", "medispace"),
        "items" => [
            [
                "image" => $medispace_dir . "/rear-cabinets.webp",
                "title" => __("Rear cabinets", "medispace"),
                "text" => __("Rear cabinets are designed to provide easy access to instruments and supplies during procedures. Available as freestanding units with both side access doors or floor/wall mounted units. Fully customizable with front or site facing drawers and doors.", "medispace"),
            ],
            [
                "image" => $medispace_dir . "/side-cabinets.webp",
                "title" => __("Side cabinets", "medispace"),
                "text" => __("Side cabinets are a versatile storage solution for medical offices. They can be placed alongside dental chairs or against walls, providing additional storage space for supplies, instruments, and treatment room equipment.", "medispace"),
            ],
            [
                "image" => $medispace_dir . "/t-wall-cabinets.webp",
                "title" => __("T-wall cabinets", "medispace"),
                "text" => __("T-wall cabinets are designed to maximize storage space as well as providing an excellent decorative element to the office design. They're usually placed on the front face of walls dividing operatories.", "medispace"),
            ],
            [
                "image" => $medispace_dir . "/sterilization-centers.webp",
                "title" => __("Sterilization centers", "medispace"),
                "text" => __("Sterilization centers are dedicated spaces for cleaning and sterilizing instruments. This specialized cabinets house sterilization equipment and provide organized storage for sterilized tools, ensuring a safe and hygienic environment for your patients.", "medispace"),
            ],
            [
                "image" => $medispace_dir . "/laboratory-cabinetry.webp",
                "title" => __("Laboratory cabinetry", "medispace"),
                "text" => __("Laboratory cabinetry is designed to meet the unique needs of medical laboratories. These cabinets designed to accommodate your plastic lab work pans for outgoing and incoming lab cases.", "medispace"),
            ],
            [
                "image" => $medispace_dir . "/operatory-dividers.webp",
                "title" => __("Freestanding operatory dividers", "medispace"),
                "text" => __("Free-standing operatory dividers create separate workspaces within medical practices, offering privacy and improved organization. This is perfect for turning large rooms into a multi-operatory practice.", "medispace"),
            ],
        ],
    ]),
];
