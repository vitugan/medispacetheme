<?php
/**
 * Pattern: Our vision - Medical (About; collage left).
 *
 * @package Medispace
 */

$medispace_media_text = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/medical-media-text.php";

return [
    "title" => __("Our vision - Medical", "medispace"),
    "categories" => ["medispace-medical", "text", "media"],
    "keywords" => ["about", "vision", "image", "text"],
    "viewportWidth" => 1440,
    "content" => $medispace_media_text([
        "title" => __("Our Vision", "medispace"),
        "paragraphs" => [
            __("We envision a collaborative healthcare environment where practitioners can thrive, patients can receive exceptional care, and innovation can flourish. Our goal is to redefine medical coworking by providing state-of-the-art facilities and a supportive community for healthcare professionals.", "medispace"),
        ],
        "image" => MEDISPACE_THEME_URL . "/assets/images/medical/about/vision-collage.webp",
        "image_alt" => __("Colleagues talking in a clinic and a dental chair", "medispace"),
        "image_position" => "left",
    ]),
];
