<?php
/**
 * Pattern: Ideal for - Medical (single space page: heading, intro and a check list of the
 * practitioners the room suits, "Check Pricing Details"; the team photo right).
 *
 * @package Medispace
 */

$medispace_media_text = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/medical-media-text.php";

return [
    "title" => __("Ideal for - Medical", "medispace"),
    "categories" => ["medispace-medical", "text", "media"],
    "keywords" => ["space", "room", "practitioners", "list", "image"],
    "viewportWidth" => 1440,
    "content" => $medispace_media_text([
        "title" => __("Ideal for a Wide Range of Healthcare Professionals", "medispace"),
        "paragraphs" => [
            __("MedicalSpace supports a broad range of practitioners. Our exam room rentals are ideal for:", "medispace"),
        ],
        "list" => [
            __("Primary Care Physicians (MD, DO)", "medispace"),
            __("Nurse Practitioners and Physician Assistants", "medispace"),
            __("Dermatologists and Allergists", "medispace"),
            __("Pediatricians and OB-GYNs", "medispace"),
            __("Functional and Integrative Medicine practices", "medispace"),
            __("IV Therapy and Hormone Therapy clinics", "medispace"),
            __("Mental Health professionals needing a clinical exam setting", "medispace"),
            __("Physical Medicine, Chiropractic, and Pain Management providers", "medispace"),
        ],
        "image" => MEDISPACE_THEME_URL . "/assets/images/medical/spaces/ideal-team.webp",
        "image_alt" => __("Team of healthcare professionals", "medispace"),
        "image_position" => "right",
        "button" => ["label" => __("Check Pricing Details", "medispace"), "url" => home_url("/pricing/"), "padding_x" => "33.06px"],
    ]),
];
