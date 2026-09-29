<?php
/**
 * Pattern: Who we are - Medical (About; centered heading and text, a wide rounded photo,
 * "Book Now").
 *
 * @package Medispace
 */

return [
    "title" => __("Who we are - Medical", "medispace"),
    "categories" => ["medispace-medical", "text", "media"],
    "keywords" => ["about", "who we are", "image"],
    "viewportWidth" => 1440,
    "content" =>
        '<!-- wp:group {"metadata":{"name":"Who we are"},"align":"full","style":{"spacing":{"margin":{"top":"var(--wp--custom--section-gap)","bottom":"var(--wp--custom--section-gap)"},"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"},"blockGap":"40px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:var(--wp--custom--section-gap);margin-bottom:var(--wp--custom--section-gap);padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"metadata":{"name":"Content"},"style":{"spacing":{"blockGap":"32px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:group {"metadata":{"name":"Head"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"600px"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">' . esc_html__("Who We Are", "medispace") . '</h2>
<!-- /wp:heading -->

<!-- wp:group {"metadata":{"name":"Text"},"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"center","textColor":"gray-80"} -->
<p class="has-text-align-center has-gray-80-color has-text-color">' . esc_html__("MedicalSpace is a dynamic medical coworking hub dedicated to empowering healthcare professionals. Founded with a vision to revolutionize how healthcare practitioners work, we provide flexible, tailored solutions to meet diverse needs.", "medispace") . '</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","textColor":"gray-80"} -->
<p class="has-text-align-center has-gray-80-color has-text-color">' . esc_html__("Each room has the essentials, so you can walk in and start your day without delays. A receptionist is on-site to support your schedule and help manage client check-ins, creating a smooth and professional experience.", "medispace") . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:image {"aspectRatio":"1086/542","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"medical-who__image"} -->
<figure class="wp-block-image size-full medical-who__image"><img src="' . esc_url(MEDISPACE_THEME_URL . "/assets/images/medical/about/who-we-are.webp") . '" alt="' . esc_attr__("Modern medical office building", "medispace") . '" style="aspect-ratio:1086/542;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"is-mobile-full","layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons is-mobile-full"><!-- wp:button {"style":{"spacing":{"padding":{"left":"74.54px","right":"74.54px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="' . esc_url(home_url("/contact/")) . '" style="padding-right:74.54px;padding-left:74.54px">' . esc_html__("Book Now", "medispace") . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->',
];
