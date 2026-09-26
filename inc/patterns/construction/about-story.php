<?php
/**
 * Pattern: About: our story - Construction (image right).
 *
 * @package Medispace
 */

$medispace_media_text = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/media-text.php";

return [
    "title" => __("About: our story - Construction", "medispace"),
    "categories" => ["medispace-construction", "text", "media"],
    "keywords" => ["about", "image", "text", "media"],
    "viewportWidth" => 1440,
    "content" => $medispace_media_text([
        "title" => __("Our story", "medispace"),
        "paragraphs" => [
            __("As a family-owned company, we've always prioritized quality, trust, and long-term relationships. Today, we specialize exclusively in the design, engineering, and construction of medical clinics, delivering each project with an aim to break out of the ordinary.", "medispace"),
            __("Our journey is marked by numerous successful projects and a culture of teamwork that helps us effectively collaborate with clients and their professional teams. This shared spirit empowers us to identify value-adding opportunities and overcome potential issues, ensuring a seamless project delivery every time.", "medispace"),
        ],
        "image" => MEDISPACE_THEME_URL . "/assets/images/construction/about/team-meeting.webp",
        "image_alt" => __("Team meeting in the office", "medispace"),
        "image_position" => "right",
    ]),
];
