<?php
/**
 * Pattern: Service - featured projects - Construction (service layout 2).
 *
 * The Home "Our projects" slider with the service page heading.
 *
 * @package Medispace
 */

$medispace_projects_title = __("Our featured medical office design and construction projects", "medispace");
$medispace_projects = require __DIR__ . "/projects.php";
unset($medispace_projects_title);

return array_merge($medispace_projects, [
    "title" => __("Service - featured projects - Construction", "medispace"),
    "keywords" => ["projects", "portfolio", "slider", "service"],
]);
