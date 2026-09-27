<?php
/**
 * Pattern: Our projects - Construction.
 *
 * $medispace_projects_title (set by a pattern that requires this file) overrides the heading,
 * e.g. inc/patterns/construction/service-projects.php.
 *
 * Heading, intro, button and the Swiper slider block from the MediSpace Core plugin
 * (medispace-core/swiper-slider). The block only accepts hex colors, so its CSS variables
 * are re-pointed to the flow's palette in assets/css/patterns.css (.projects-slider).
 *
 * @package Medispace
 */

$medispace_img = MEDISPACE_THEME_URL . "/assets/images/construction/projects";
$medispace_slide = function ($image, $badge, $title, $text) use ($medispace_img) {
    return [
        "backgroundUrl" => $medispace_img . "/" . $image,
        "backgroundId" => 0,
        "backgroundAlt" => "",
        "badge" => $badge,
        "title" => $title,
        "description" => $text,
        "linkText" => __("Learn more", "medispace"),
        "linkUrl" => medispace_projects_url(),
    ];
};

$medispace_slider = serialize_block_attributes([
    "slides" => [
        $medispace_slide("project-1.webp", __("Dental practice", "medispace"), __("Burch Dental Spa, Machesney Park, IL", "medispace"), __("Transforming existing dental practice in to the new modern home of Mc Govan's Family Dental", "medispace")),
        $medispace_slide("project-2.webp", __("Dental practice", "medispace"), __("Second Dental Clinic, Chicago, IL", "medispace"), __("Creating comfortable environments for families and advanced dental treatment.", "medispace")),
        $medispace_slide("project-3.webp", __("Dental practice", "medispace"), __("Burch Dental Spa, Machesney Park, IL", "medispace"), __("Transforming existing dental practice in to the new modern home of Mc Govan's Family Dental", "medispace")),
    ],
    "sliderHeight" => 560,
    "autoplay" => false,
    "loop" => true,
    "overlayColor" => "#08202c",
    "overlayOpacity" => 40,
    "cardPosition" => "left",
    "cardMaxWidth" => 531,
    "cardPadding" => 40,
    "className" => "projects-slider",
    "align" => "wide",
]);

return [
    "title" => __("Our projects - Construction", "medispace"),
    "categories" => ["medispace-construction", "gallery"],
    "keywords" => ["projects", "portfolio", "slider", "carousel"],
    "viewportWidth" => 1440,
    "content" =>
        '<!-- wp:group {"metadata":{"name":"Our projects"},"align":"full","style":{"spacing":{"margin":{"top":"var(--wp--custom--section-gap)","bottom":"var(--wp--custom--section-gap)"},"blockGap":"32px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:var(--wp--custom--section-gap);margin-bottom:var(--wp--custom--section-gap)"><!-- wp:group {"metadata":{"name":"Headings"},"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|fluid-40"}},"layout":{"type":"constrained","contentSize":"534px"}} -->
<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"metadata":{"name":"Text"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">' . esc_html($medispace_projects_title ?? __("Our projects", "medispace")) . '</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"gray-80"} -->
<p class="has-text-align-center has-gray-80-color has-text-color">' . esc_html__("Lorem ipsum dolor sit amet consectetur adipiscing eli mattis sit phasellus mollis sit aliquam sit nullam.", "medispace") . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"is-mobile-full","layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons is-mobile-full"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="' . esc_url(medispace_projects_url()) . '">' . esc_html__("View all projects", "medispace") . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:medispace-core/swiper-slider ' . $medispace_slider . ' /--></div>
<!-- /wp:group -->',
];
