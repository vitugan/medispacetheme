<?php
/**
 * Pattern: Dedicated workspaces - Medical.
 *
 * Heading and intro, then four photo cards (cover blocks) with a navy gradient fading down
 * and the room type at the top. Styles: assets/css/patterns.css ("Workspace cards").
 *
 * @package Medispace
 */

$medispace_dir = MEDISPACE_THEME_URL . "/assets/images/medical/workspaces";
$medispace_gradient = "linear-gradient(180deg,rgba(5,29,72,1) 12%,rgba(5,29,72,0.1) 100%)";

$medispace_card = function ($image, $title) use ($medispace_dir, $medispace_gradient) {
    $url = esc_url($medispace_dir . "/" . $image);
    return '<!-- wp:cover {"url":"' . $url . '","dimRatio":100,"customGradient":"' . $medispace_gradient . '","isUserOverlayColor":true,"minHeight":365,"contentPosition":"top left","isDark":true,"metadata":{"name":"' . esc_attr($title) . '"},"className":"workspace-card","style":{"spacing":{"padding":{"top":"40px","right":"var:preset|spacing|50","bottom":"40px","left":"var:preset|spacing|50"}}},"layout":{"type":"default"}} -->
<div class="wp-block-cover has-custom-content-position is-position-top-left workspace-card" style="padding-top:40px;padding-right:var(--wp--preset--spacing--50);padding-bottom:40px;padding-left:var(--wp--preset--spacing--50);min-height:365px"><img class="wp-block-cover__image-background" alt="" src="' . $url . '" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient" style="background:' . $medispace_gradient . '"></span><div class="wp-block-cover__inner-container"><!-- wp:heading {"level":3,"textColor":"white","fontSize":"h-4"} -->
<h3 class="wp-block-heading has-white-color has-text-color has-h-4-font-size">' . esc_html($title) . '</h3>
<!-- /wp:heading --></div></div>
<!-- /wp:cover -->';
};

return [
    "title" => __("Dedicated workspaces - Medical", "medispace"),
    "categories" => ["medispace-medical", "featured"],
    "keywords" => ["workspaces", "rooms", "spaces", "cards"],
    "viewportWidth" => 1440,
    "content" =>
        '<!-- wp:group {"metadata":{"name":"Dedicated workspaces"},"align":"full","style":{"spacing":{"margin":{"top":"var(--wp--custom--section-gap)","bottom":"var(--wp--custom--section-gap)"},"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"},"blockGap":"32px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:var(--wp--custom--section-gap);margin-bottom:var(--wp--custom--section-gap);padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"metadata":{"name":"Head"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"534px"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">' . esc_html__("Dedicated Workspaces", "medispace") . '</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"gray-80"} -->
<p class="has-text-align-center has-gray-80-color has-text-color">' . esc_html__("Our thoughtfully designed floor plan blends innovation and functionality, creating an environment where healthcare professionals can thrive.", "medispace") . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Cards"},"className":"workspace-cards","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"grid","columnCount":4,"minimumColumnWidth":"220px"}} -->
<div class="wp-block-group workspace-cards">' .
        $medispace_card("exam-rooms.webp", __("Exam Rooms", "medispace")) . "\n\n" .
        $medispace_card("therapy-spaces.webp", __("Therapy Spaces", "medispace")) . "\n\n" .
        $medispace_card("procedure-rooms.webp", __("Medical Procedure Rooms", "medispace")) . "\n\n" .
        $medispace_card("bodywork-spaces.webp", __("Bodywork Spaces", "medispace")) . '</div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
];
