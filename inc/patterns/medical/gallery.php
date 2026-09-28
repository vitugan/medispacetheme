<?php
/**
 * Pattern: Office space gallery - Medical.
 *
 * Heading and intro, then a mosaic of five images: a large one on the left and a 2 x 2 grid on
 * the right (phones: the large one on top). Plain image blocks, laid out in
 * assets/css/patterns.css ("Gallery mosaic"), so each photo can be replaced in the editor.
 *
 * @package Medispace
 */

$medispace_dir = MEDISPACE_THEME_URL . "/assets/images/medical/gallery";

$medispace_image = function ($file, $alt) use ($medispace_dir) {
    return '<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"gallery-mosaic__item"} -->
<figure class="wp-block-image size-full gallery-mosaic__item"><img src="' . esc_url($medispace_dir . "/" . $file) . '" alt="' . esc_attr($alt) . '"/></figure>
<!-- /wp:image -->';
};

return [
    "title" => __("Office space gallery - Medical", "medispace"),
    "categories" => ["medispace-medical", "gallery"],
    "keywords" => ["gallery", "images", "photos", "office"],
    "viewportWidth" => 1440,
    "content" =>
        '<!-- wp:group {"metadata":{"name":"Gallery"},"align":"full","style":{"spacing":{"margin":{"top":"var(--wp--custom--section-gap)","bottom":"var(--wp--custom--section-gap)"},"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"},"blockGap":"32px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:var(--wp--custom--section-gap);margin-bottom:var(--wp--custom--section-gap);padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"metadata":{"name":"Head"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"534px"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">' . esc_html__("Medical Office Space for Rent Gallery", "medispace") . '</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"gray-80"} -->
<p class="has-text-align-center has-gray-80-color has-text-color">' . esc_html__("Discover what makes our medical office space for rent stand out.", "medispace") . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Images"},"className":"gallery-mosaic","layout":{"type":"default"}} -->
<div class="wp-block-group gallery-mosaic">' .
        $medispace_image("reception.webp", __("Reception desk", "medispace")) . "\n\n" .
        $medispace_image("patient-room.webp", __("Patient room", "medispace")) . "\n\n" .
        $medispace_image("dental-chair.webp", __("Dental chair", "medispace")) . "\n\n" .
        $medispace_image("operating-room.webp", __("Operating room", "medispace")) . "\n\n" .
        $medispace_image("corridor.webp", __("Clinic corridor", "medispace")) . '</div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
];
