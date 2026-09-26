<?php
/**
 * Pattern: About: our vision - Construction (image left).
 *
 * @package Medispace
 */

$medispace_media_text = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/media-text.php";

return [
    "title" => __("About: our vision - Construction", "medispace"),
    "categories" => ["medispace-construction", "text", "media"],
    "keywords" => ["about", "image", "text", "media"],
    "viewportWidth" => 1440,
    "content" => $medispace_media_text([
        "title" => __("Our vision for the future", "medispace"),
        "paragraphs" => [
            __("As we look to the future, we're excited to continue breaking out of the ordinary, challenging ourselves to innovate and improve with each project. Our goal is to build lasting relationships with our clients, helping them create practices that they’re proud to call their own.", "medispace"),
        ],
        "image" => MEDISPACE_THEME_URL . "/assets/images/construction/about/team-vision.webp",
        "image_alt" => __("Team discussing a project", "medispace"),
        "image_position" => "left",
    ]),
];
