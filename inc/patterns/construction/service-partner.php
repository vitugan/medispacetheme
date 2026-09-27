<?php
/**
 * Pattern: Service - design partner - Construction (service layout 2, image left).
 *
 * @package Medispace
 */

$medispace_media_text = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/media-text.php";

return [
    "title" => __("Service - design partner - Construction", "medispace"),
    "categories" => ["medispace-construction", "text", "media"],
    "keywords" => ["service", "partner", "image", "text"],
    "viewportWidth" => 1440,
    "content" => $medispace_media_text([
        "title" => __("MedicalSpace - your trusted medical office design partner", "medispace"),
        "paragraphs" => [
            __("We understand the importance of optimizing clinic layouts, prioritizing patient comfort, and adhering to strict safety regulations. Our comprehensive services are designed to meet your unique needs. We guarantee exceptional, on-time, and budget-friendly results.", "medispace"),
            __("Trust MedicalSpace, your trusted medical office design partner, to elevate your practice with a stunning, modern, and boutique-inspired clinic design.", "medispace"),
        ],
        "image" => MEDISPACE_THEME_URL . "/assets/images/construction/services/design-partner.webp",
        "image_alt" => __("Modern medical office interior", "medispace"),
        "image_position" => "left",
    ]),
];
