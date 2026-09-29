<?php
/**
 * Pattern: Hero - Medical (Home).
 *
 * Light-blue gradient section: heading, intro and "Schedule Tour" on the left, the photo pair
 * on the right (one image from the design), and a white metrics panel with a rounded corner at
 * the bottom left (phones: stacked, metrics centered). Styles: assets/css/patterns.css
 * ("Hero - Medical").
 *
 * @package Medispace
 */

$medispace_metric = function ($value, $label) {
    return '<!-- wp:group {"metadata":{"name":"' . esc_attr($value) . '"},"className":"medical-hero__metric","style":{"spacing":{"blockGap":"6px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group medical-hero__metric"><!-- wp:paragraph {"className":"medical-hero__metric-value","style":{"typography":{"fontWeight":"600","lineHeight":"1.25"}},"textColor":"primary","fontSize":"h-3","fontFamily":"heading"} -->
<p class="medical-hero__metric-value has-primary-color has-text-color has-heading-font-family has-h-3-font-size" style="font-weight:600;line-height:1.25">' . esc_html($value) . '</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"gray-100","fontSize":"body-s"} -->
<p class="has-gray-100-color has-text-color has-body-s-font-size">' . esc_html($label) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->';
};

return [
    "title" => __("Hero - Medical", "medispace"),
    "categories" => ["medispace-medical", "banner"],
    "keywords" => ["hero", "banner", "home"],
    "viewportWidth" => 1440,
    "content" =>
        '<!-- wp:group {"metadata":{"name":"Hero"},"align":"full","className":"medical-hero","style":{"spacing":{"padding":{"top":"clamp(40px, 4.2vw, 80px)","right":"var:preset|spacing|40","bottom":"0","left":"var:preset|spacing|40"},"blockGap":"0"}},"gradient":"hero-sky","layout":{"type":"constrained","wideSize":"1640px"}} -->
<div class="wp-block-group alignfull medical-hero has-hero-sky-gradient-background has-background" style="padding-top:clamp(40px, 4.2vw, 80px);padding-right:var(--wp--preset--spacing--40);padding-bottom:0;padding-left:var(--wp--preset--spacing--40)"><!-- wp:columns {"verticalAlignment":"center","align":"wide","className":"medical-hero__columns","style":{"spacing":{"blockGap":{"top":"40px","left":"65px"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center medical-hero__columns"><!-- wp:column {"verticalAlignment":"center","width":"46%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:46%"><!-- wp:group {"metadata":{"name":"Text"},"style":{"spacing":{"blockGap":"40px"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:group {"metadata":{"name":"Content"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":1,"style":{"typography":{"fontWeight":"600"}},"fontSize":"h-1"} -->
<h1 class="wp-block-heading has-h-1-font-size" style="font-weight:600">' . esc_html__("Flexible Medical & Therapy Office Spaces for Rent", "medispace") . '</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"medical-hero__text","textColor":"gray-100"} -->
<p class="medical-hero__text has-gray-100-color has-text-color">' . esc_html__("Rent private exam rooms – daily, weekly, monthly, or annual medical office rentals", "medispace") . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"is-mobile-full"} -->
<div class="wp-block-buttons is-mobile-full"><!-- wp:button {"style":{"spacing":{"padding":{"left":"36.81px","right":"36.81px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="' . esc_url(home_url("/contact/")) . '" style="padding-right:36.81px;padding-left:36.81px">' . esc_html__("Schedule Tour", "medispace") . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"54%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:54%"><!-- wp:image {"width":"838px","sizeSlug":"full","linkDestination":"none","className":"medical-hero__image"} -->
<figure class="wp-block-image size-full is-resized medical-hero__image"><img src="' . esc_url(MEDISPACE_THEME_URL . "/assets/images/medical/hero/hero-collage.webp") . '" alt="' . esc_attr__("Treatment room and dental chair", "medispace") . '" style="width:838px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:group {"metadata":{"name":"Metrics"},"className":"medical-hero__metrics","backgroundColor":"white","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group medical-hero__metrics has-white-background-color has-background">' .
        $medispace_metric("100+", __("Healthcare providers launch their practices", "medispace")) . "\n\n" .
        $medispace_metric("95%", __("Satisfaction rate from our clients", "medispace")) . "\n\n" .
        $medispace_metric("200+", __("Fully stocked exam rooms", "medispace")) . '</div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
];
