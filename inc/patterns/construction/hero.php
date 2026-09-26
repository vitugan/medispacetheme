<?php
/**
 * Pattern: Hero - Construction (Home).
 *
 * Full-width cover: photo with a top-to-bottom dark gradient, centered heading, intro and two
 * buttons, and a frosted features bar along the bottom (horizontal with dividers on desktop,
 * stacked on mobile - see assets/css/patterns.css, .hero-features).
 *
 * @package Medispace
 */

$medispace_hero = MEDISPACE_THEME_URL . "/assets/images/construction/hero";
$medispace_gradient = "linear-gradient(180deg,color-mix(in srgb,var(--wp--preset--color--gray-100) 95%,transparent) 0%,color-mix(in srgb,var(--wp--preset--color--gray-100) 20%,transparent) 100%)";

$medispace_features = "";
foreach ([
    "icon-process.svg" => __("Simple process", "medispace"),
    "icon-money.svg" => __("Transparent pricing", "medispace"),
    "icon-mark.svg" => __("Licensed & certified", "medispace"),
] as $icon => $label) {
    $medispace_features .= '<!-- wp:group {"metadata":{"name":"Feature"},"className":"hero-feature","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group hero-feature"><!-- wp:group {"metadata":{"name":"Icon"},"className":"hero-feature__icon","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group hero-feature__icon" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:image {"width":"24px","height":"24px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . esc_url($medispace_hero . "/" . $icon) . '" alt="" style="width:24px;height:24px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"style":{"typography":{"fontWeight":"700","lineHeight":"1.3"}},"textColor":"gray-100","fontSize":"body-l"} -->
<p class="has-gray-100-color has-text-color has-body-l-font-size" style="font-weight:700;line-height:1.3">' . esc_html($label) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

';
}

return [
    "title" => __("Hero - Construction", "medispace"),
    "categories" => ["medispace-construction", "banner"],
    "keywords" => ["hero", "banner", "cover"],
    "viewportWidth" => 1440,
    "content" =>
        '<!-- wp:cover {"url":"' . esc_url($medispace_hero . "/hero-reception.webp") . '","dimRatio":100,"customGradient":"' . $medispace_gradient . '","isUserOverlayColor":true,"isDark":true,"metadata":{"name":"Hero"},"align":"full","className":"home-hero","style":{"spacing":{"padding":{"top":"clamp(40px, 6.25vw, 120px)","right":"0","bottom":"0","left":"0"},"blockGap":"clamp(40px, 6.7vw, 129px)"}},"layout":{"type":"default"}} -->
<div class="wp-block-cover alignfull home-hero" style="padding-top:clamp(40px, 6.25vw, 120px);padding-right:0;padding-bottom:0;padding-left:0"><img class="wp-block-cover__image-background" alt="" src="' . esc_url($medispace_hero . "/hero-reception.webp") . '" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient" style="background:' . $medispace_gradient . '"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"metadata":{"name":"Content"},"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"},"blockGap":"clamp(30px, 3vw, 40px)"}},"textColor":"white","layout":{"type":"constrained","contentSize":"808px"}} -->
<div class="wp-block-group has-white-color has-text-color" style="padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"metadata":{"name":"Text"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"534px"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":1,"align":"full","style":{"typography":{"fontWeight":"500"}},"fontSize":"h-1"} -->
<h1 class="wp-block-heading alignfull has-text-align-center has-h-1-font-size" style="font-weight:500">' . esc_html__("Designing & managing healthcare-grade spaces", "medispace") . '</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">' . esc_html__("We're here to help you create your dream workspace without traditional upfront costs or long-term leases.", "medispace") . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"is-mobile-full","style":{"spacing":{"blockGap":{"top":"12px","left":"24px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons is-mobile-full"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="' . esc_url(home_url("/contact/")) . '">' . esc_html__("Talk to an expert", "medispace") . '</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline-light"} -->
<div class="wp-block-button is-style-outline-light"><a class="wp-block-button__link wp-element-button" href="' . esc_url(home_url("/portfolio/")) . '">' . esc_html__("View portfolio", "medispace") . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Features"},"className":"hero-features","style":{"spacing":{"blockGap":"28px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
<div class="wp-block-group hero-features">' . rtrim($medispace_features) . '</div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->',
];
