<?php
/**
 * Pattern: Space intro - Medical (single space page: the rounded room photo left, heading and
 * two paragraphs right).
 *
 * @package Medispace
 */

$medispace_media_text = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/medical-media-text.php";

return [
    "title" => __("Space intro - Medical", "medispace"),
    "categories" => ["medispace-medical", "text", "media"],
    "keywords" => ["space", "room", "intro", "image", "text"],
    "viewportWidth" => 1440,
    "content" => $medispace_media_text([
        "title" => __("Empower Your Practice with Premier Exam Rooms in Washington", "medispace"),
        "paragraphs" => [
            __("At MedicalSpace, we offer fully furnished exam rooms for rent in Washington, designed specifically for independent healthcare professionals. Whether you’re launching a private practice, expanding to a second location, or scaling down from a larger space, our turnkey medical office solutions help you stay flexible and focused on patient care— without the commitment of a long-term lease or costly build-outs.", "medispace"),
            __("Our goal is to make medical office space accessible, affordable, and ready-to-use, so you can walk in and start seeing patients immediately.", "medispace"),
        ],
        "image" => MEDISPACE_THEME_URL . "/assets/images/medical/spaces/intro-dental.webp",
        "image_alt" => __("Furnished treatment room", "medispace"),
        "image_position" => "left",
    ]),
];
