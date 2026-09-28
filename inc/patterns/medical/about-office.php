<?php
/**
 * Pattern: About doctor office space for rent - Medical (About; collage right).
 *
 * @package Medispace
 */

$medispace_media_text = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/medical-media-text.php";

return [
    "title" => __("About doctor office space for rent - Medical", "medispace"),
    "categories" => ["medispace-medical", "text", "media"],
    "keywords" => ["about", "office", "rent", "image", "text"],
    "viewportWidth" => 1440,
    "content" => $medispace_media_text([
        "title" => __("About Doctor Office Space for Rent", "medispace"),
        "paragraphs" => [
            __("MediSpace is revolutionizing the medical field by providing fully equipped office space for doctors with on-site amenities and flexible rental options.", "medispace"),
            __("Rent space by the day, with all the essential office equipment, basic medical supplies, and a professional receptionist. MedicalSpace offers a unique opportunity for doctors and medical professionals to collaborate and expand their network.", "medispace"),
        ],
        "image" => MEDISPACE_THEME_URL . "/assets/images/medical/about/office-collage.webp",
        "image_alt" => __("Clinic reception and a nurse at the front desk", "medispace"),
        "image_position" => "right",
        "button" => ["label" => __("Book Now", "medispace"), "url" => home_url("/contact/")],
    ]),
];
