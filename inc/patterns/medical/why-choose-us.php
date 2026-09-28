<?php
/**
 * Pattern: Why choose us - Medical.
 *
 * Heading and intro on the left, a 2 x 2 grid of light-grey rounded cards (the designer's
 * navy icon tiles, title, text) on the right; phones stack them.
 *
 * @package Medispace
 */

$medispace_icons = MEDISPACE_THEME_URL . "/assets/images/medical/why";

$medispace_card = function ($icon, $title, $text) use ($medispace_icons) {
    return '<!-- wp:group {"metadata":{"name":"' . esc_attr($title) . '"},"className":"why-card","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|40"}},"backgroundColor":"light-gray","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group why-card has-light-gray-background-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:image {"width":"48px","height":"48px","sizeSlug":"full","linkDestination":"none","className":"why-card__icon"} -->
<figure class="wp-block-image size-full is-resized why-card__icon"><img src="' . esc_url($medispace_icons . "/" . $icon) . '" alt="" style="width:48px;height:48px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"metadata":{"name":"Text"},"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"600","lineHeight":"1.3"}},"fontSize":"body-l","fontFamily":"body"} -->
<h3 class="wp-block-heading has-body-font-family has-body-l-font-size" style="font-weight:600;line-height:1.3">' . esc_html($title) . '</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"gray-80"} -->
<p class="has-gray-80-color has-text-color">' . esc_html($text) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->';
};

return [
    "title" => __("Why choose us - Medical", "medispace"),
    "categories" => ["medispace-medical", "featured"],
    "keywords" => ["why", "benefits", "features", "cards"],
    "viewportWidth" => 1440,
    "content" =>
        '<!-- wp:group {"metadata":{"name":"Why choose us"},"align":"full","style":{"spacing":{"margin":{"top":"var(--wp--custom--section-gap)","bottom":"var(--wp--custom--section-gap)"},"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:var(--wp--custom--section-gap);margin-bottom:var(--wp--custom--section-gap);padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:columns {"verticalAlignment":"center","className":"why-columns","style":{"spacing":{"blockGap":{"top":"32px","left":"60px"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center why-columns"><!-- wp:column {"verticalAlignment":"center","width":"41.7%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:41.7%"><!-- wp:group {"metadata":{"name":"Text"},"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:heading -->
<h2 class="wp-block-heading">' . esc_html__("Why Choose Us?", "medispace") . '</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"gray-80"} -->
<p class="has-gray-80-color has-text-color">' . esc_html__("Practice confidently in a space built exclusively for healthcare providers — without long-term leases or costly build-outs.", "medispace") . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"58.3%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:58.3%"><!-- wp:group {"metadata":{"name":"Cards"},"className":"why-cards","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"grid","columnCount":2,"minimumColumnWidth":"240px"}} -->
<div class="wp-block-group why-cards">' .
        $medispace_card("icon-choose-1.svg", __("No Lease Commitments", "medispace"), __("Start a new practice, work part-time, or explore a new location risk-free.", "medispace")) . "\n\n" .
        $medispace_card("icon-choose-2.svg", __("No Up-Front Costs", "medispace"), __("Avoid expensive build-outs, high-security deposits, and construction delays.", "medispace")) . "\n\n" .
        $medispace_card("icon-choose-3.svg", __("Turn-Key Medical Suites", "medispace"), __("Fully furnished, HIPAA-compliant medical facility with essentials included.", "medispace")) . "\n\n" .
        $medispace_card("icon-choose-4.svg", __("You Are Your Own Boss", "medispace"), __("Maintain full clinical independence and control your schedule, practice decisions.", "medispace")) . '</div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
];
