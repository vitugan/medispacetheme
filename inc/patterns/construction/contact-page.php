<?php
/**
 * Pattern: Contact page - Construction (map + "Request a consultation" form).
 *
 * The contact us section with the Contact page heading; sits right under the page hero.
 *
 * @package Medispace
 */

$medispace_contact_title = __("Request a consultation", "medispace");
$medispace_contact = require __DIR__ . "/contact-us.php";
unset($medispace_contact_title);

return array_merge($medispace_contact, [
    "title" => __("Contact page - Construction", "medispace"),
    "keywords" => ["contact", "form", "map", "consultation"],
]);
