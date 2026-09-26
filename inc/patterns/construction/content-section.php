<?php
/**
 * Pattern: Content section - Construction (image left, with button).
 *
 * @package Medispace
 */

$medispace_media_text = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/media-text.php";

return [
    "title" => __("Content section - Construction", "medispace"),
    "categories" => ["medispace-construction", "text", "media"],
    "keywords" => ["about", "image", "text", "media"],
    "viewportWidth" => 1440,
    "content" => $medispace_media_text([
        "title" => __("Discover the perfect blend of style and functionality for your medical practice", "medispace"),
        "paragraphs" => [
            __("We specialize in expert medical office design and construction. With 25 years of industry-specific experience, our dedicated team is committed to creating state-of-the-art, functional, and visually appealing offices tailored to the unique needs of dental and medical professionals.", "medispace"),
        ],
        "image" => MEDISPACE_THEME_URL . "/assets/images/construction/content/office-building.webp",
        "image_alt" => __("Modern office buildings", "medispace"),
        "image_position" => "left",
        "button" => [
            "label" => __("About us", "medispace"),
            "url" => home_url("/about/"),
        ],
    ]),
];
