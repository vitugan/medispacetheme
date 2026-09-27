<?php
/**
 * Pattern: Service - intro - Construction (service layout 1, image left).
 *
 * First section under the service hero: photo and a few paragraphs, the last one bold
 * (media-text builder).
 *
 * @package Medispace
 */

$medispace_media_text = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/media-text.php";

return [
    "title" => __("Service - intro - Construction", "medispace"),
    "categories" => ["medispace-construction", "text", "media"],
    "keywords" => ["service", "intro", "image", "text"],
    "viewportWidth" => 1440,
    "content" => $medispace_media_text([
        "title" => __("Custom cabinetry manufacturer", "medispace"),
        "paragraphs" => [
            __("At MedicalSpace, we specialize in crafting custom dental office cabinets to elevate the aesthetics of your practice. With every dental cabinet designed and crafted by our experts, your newly redesigned dental office is guaranteed to have a premium and personalized touch.", "medispace"),
            __("Our state-of-the-art manufacturing process utilizes CNC-controlled milling and edge-bending machines to ensure the highest quality and accuracy. In-house solid-surface custom manufacturing ensures high quality, a wide selection of materials, colors, size, and shape, and flexibility.", "medispace"),
            [
                "text" => __("Choose MedicalSpace for your next dental office renovation and experience the difference that our custom dental cabinets can make.", "medispace"),
                "bold" => true,
            ],
        ],
        "image" => MEDISPACE_THEME_URL . "/assets/images/construction/services/cabinetry-office.webp",
        "image_alt" => __("Dental office with custom cabinetry", "medispace"),
        "image_position" => "left",
    ]),
];
