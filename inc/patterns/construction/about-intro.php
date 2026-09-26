<?php
/**
 * Pattern: About intro - Construction (image left).
 *
 * @package Medispace
 */

$medispace_media_text = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/media-text.php";

return [
    "title" => __("About intro - Construction", "medispace"),
    "categories" => ["medispace-construction", "text", "media"],
    "keywords" => ["about", "image", "text", "media"],
    "viewportWidth" => 1440,
    "content" => $medispace_media_text([
        "title" => __("MedicalSpace: building exceptional medical offices", "medispace"),
        "paragraphs" => [
            __("MedicalSpace, a trusted family business, has been transforming the landscape of medical clinics in the Chicagoland area and the Midwest for over two decades.", "medispace"),
        ],
        "image" => MEDISPACE_THEME_URL . "/assets/images/construction/about/office-hall.webp",
        "image_alt" => __("Medical office hallway", "medispace"),
        "image_position" => "left",
    ]),
];
