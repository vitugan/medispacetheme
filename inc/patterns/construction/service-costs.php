<?php
/**
 * Pattern: Service - understanding costs - Construction (service layout 1, image right).
 *
 * Text with a check list next to a photo (media-text builder).
 *
 * @package Medispace
 */

$medispace_media_text = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/media-text.php";

return [
    "title" => __("Service - understanding costs - Construction", "medispace"),
    "categories" => ["medispace-construction", "text", "media"],
    "keywords" => ["costs", "list", "image", "text", "service"],
    "viewportWidth" => 1440,
    "content" => $medispace_media_text([
        "title" => __("Understanding costs", "medispace"),
        "paragraphs" => [
            __("Your investment in custom medical cabinetry is determined by:", "medispace"),
            [
                "list" => [
                    __("Material quality (basic, mid-grade, or premium)", "medispace"),
                    __("Cabinet quantity and dimensions", "medispace"),
                    __("Special features (LED lighting, technology integration)", "medispace"),
                    __("Hardware selection and storage solutions", "medispace"),
                ],
            ],
            __("Every project is unique. We provide detailed cost breakdowns during initial consultations and work with you to optimize your investment while achieving your goals.", "medispace"),
        ],
        "image" => MEDISPACE_THEME_URL . "/assets/images/construction/services/costs-meeting.webp",
        "image_alt" => __("Consultation over office plans", "medispace"),
        "image_position" => "right",
    ]),
];
