<?php
/**
 * Pattern: Service layout 1 - Construction (starter content for a new service).
 *
 * Offered in the "Choose a pattern" dialog when a service is created (blockTypes
 * core/post-content + postTypes msc_service). The hero, contact form and footer come from the
 * single service template; this is only the content between them. Design:
 * Single_Service_Template_1 (Custom cabinetry).
 *
 * @package Medispace
 */

$medispace_sections = [
    "service-intro",
    "service-types",
    "service-cta",
    "service-costs",
    "service-why",
    "faq",
];

return [
    "title" => __("Service layout 1 - Construction", "medispace"),
    "description" => __("Intro, product types, call to action, costs, why choose us and FAQ.", "medispace"),
    "categories" => ["medispace-construction", "featured"],
    "keywords" => ["service", "layout", "page"],
    "blockTypes" => ["core/post-content"],
    "postTypes" => ["msc_service"],
    "viewportWidth" => 1440,
    "content" => implode("\n\n", array_map(function ($slug) {
        return '<!-- wp:pattern {"slug":"medispace/construction-' . $slug . '"} /-->';
    }, $medispace_sections)),
];
