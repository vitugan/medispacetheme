<?php
/**
 * Pattern: The world of health care is changing - Medical (Home content block, image left).
 *
 * Left: two columns - a photo with a light-blue stat card under it ("Daily Visitors") and a
 * tall arched photo (the designer's file, the arch is in the image). Right: heading, text and a
 * button. Styles: assets/css/patterns.css ("Health care collage").
 *
 * @package Medispace
 */

$medispace_dir = MEDISPACE_THEME_URL . "/assets/images/medical";

return [
    "title" => __("The world of health care is changing - Medical", "medispace"),
    "categories" => ["medispace-medical", "text", "media"],
    "keywords" => ["about", "image", "text", "stats"],
    "viewportWidth" => 1440,
    "content" =>
        '<!-- wp:group {"metadata":{"name":"Health care"},"align":"full","style":{"spacing":{"margin":{"top":"var(--wp--custom--section-gap)","bottom":"var(--wp--custom--section-gap)"},"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:var(--wp--custom--section-gap);margin-bottom:var(--wp--custom--section-gap);padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:columns {"verticalAlignment":"center","className":"health-care-columns","style":{"spacing":{"blockGap":{"top":"40px","left":"60px"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center health-care-columns"><!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%"><!-- wp:group {"metadata":{"name":"Collage"},"className":"health-care-collage","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group health-care-collage"><!-- wp:group {"metadata":{"name":"Photo and stat"},"className":"health-care-collage__side","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group health-care-collage__side"><!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"health-care-collage__photo"} -->
<figure class="wp-block-image size-full health-care-collage__photo"><img src="' . esc_url($medispace_dir . "/about-block/reception.webp") . '" alt="' . esc_attr__("Clinic reception", "medispace") . '"/></figure>
<!-- /wp:image -->

<!-- wp:group {"metadata":{"name":"Stat"},"className":"health-care-stat","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"},"blockGap":"0"}},"backgroundColor":"light-blue","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group health-care-stat has-light-blue-background-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:image {"width":"60px","height":"60px","sizeSlug":"full","linkDestination":"none","className":"health-care-stat__icon"} -->
<figure class="wp-block-image size-full is-resized health-care-stat__icon"><img src="' . esc_url($medispace_dir . "/icons/icon-visitors.svg") . '" alt="" style="width:60px;height:60px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"className":"health-care-stat__label","textColor":"gray-80","fontSize":"body-s"} -->
<p class="health-care-stat__label has-gray-80-color has-text-color has-body-s-font-size">' . esc_html__("Daily Visitors", "medispace") . '</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"health-care-stat__value","style":{"typography":{"fontWeight":"600","lineHeight":"1.2"}},"textColor":"gray-100","fontSize":"h-3"} -->
<p class="health-care-stat__value has-gray-100-color has-text-color has-h-3-font-size" style="font-weight:600;line-height:1.2">7,980</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"health-care-collage__tall"} -->
<figure class="wp-block-image size-full health-care-collage__tall"><img src="' . esc_url($medispace_dir . "/about-block/workspace.webp") . '" alt="' . esc_attr__("Private office with a desk", "medispace") . '"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%"><!-- wp:group {"metadata":{"name":"Content"},"style":{"spacing":{"blockGap":"40px"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:group {"metadata":{"name":"Text"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:heading -->
<h2 class="wp-block-heading">' . esc_html__("The World of Health Care is Changing", "medispace") . '</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"gray-80"} -->
<p class="has-gray-80-color has-text-color">' . esc_html__("MedicalSpace is dedicated to supporting healthcare providers by offering flexible medical coworking spaces and comprehensive administrative services. We aim to reduce your startup costs and streamline your operations so you can focus on patient care.", "medispace") . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"is-mobile-full"} -->
<div class="wp-block-buttons is-mobile-full"><!-- wp:button {"style":{"spacing":{"padding":{"left":"34px","right":"34px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="' . esc_url(home_url("/about/")) . '" style="padding-right:34px;padding-left:34px">' . esc_html__("Learn More About Us", "medispace") . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
];
