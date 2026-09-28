<?php
/**
 * Pattern: Page hero - Medical (inner pages: Spaces, About, Pricing, Blog, Space, Contact,
 * Location).
 *
 * One hero for every inner page of the flow, as in the design: a gradient background, title,
 * intro and "Schedule Tour" on the left, an image on the right (810 x 329 in the design, the
 * rounded shape is in the image). Pick the page's gradient in Block settings → Background
 * (presets "Hero: …" from styles/flow-3-medical.json); delete the intro, button or image when a
 * page does not have them. Styles: assets/css/patterns.css ("Page hero - Medical").
 *
 * @package Medispace
 */

return [
    "title" => __("Page hero - Medical", "medispace"),
    "description" => __("Gradient header for inner pages: title, intro, button and an image. Choose the gradient in the block's Background settings.", "medispace"),
    "categories" => ["medispace-medical", "banner"],
    "keywords" => ["hero", "banner", "page", "header", "gradient"],
    "viewportWidth" => 1440,
    "content" =>
        '<!-- wp:group {"metadata":{"name":"Page hero"},"align":"full","className":"medical-page-hero","style":{"spacing":{"padding":{"top":"clamp(32px, 2.6vw, 50px)","right":"var:preset|spacing|40","bottom":"clamp(32px, 2.6vw, 50px)","left":"var:preset|spacing|40"}}},"gradient":"hero-lavender","layout":{"type":"constrained","wideSize":"1640px"}} -->
<div class="wp-block-group alignfull medical-page-hero has-hero-lavender-gradient-background has-background" style="padding-top:clamp(32px, 2.6vw, 50px);padding-right:var(--wp--preset--spacing--40);padding-bottom:clamp(32px, 2.6vw, 50px);padding-left:var(--wp--preset--spacing--40)"><!-- wp:columns {"verticalAlignment":"center","align":"wide","className":"medical-page-hero__columns","style":{"spacing":{"blockGap":{"top":"32px","left":"60px"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center medical-page-hero__columns"><!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%"><!-- wp:group {"metadata":{"name":"Text"},"style":{"spacing":{"blockGap":"40px"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:group {"metadata":{"name":"Content"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:post-title {"level":1,"style":{"typography":{"fontWeight":"600"}},"fontSize":"h-1"} /-->

<!-- wp:paragraph {"className":"medical-page-hero__text","textColor":"gray-100"} -->
<p class="medical-page-hero__text has-gray-100-color has-text-color">' . esc_html__("Looking for a professional, fully equipped medical office? Book a private room by the hour, day or month.", "medispace") . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"is-mobile-full"} -->
<div class="wp-block-buttons is-mobile-full"><!-- wp:button {"style":{"spacing":{"padding":{"left":"38px","right":"38px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="' . esc_url(home_url("/contact/")) . '" style="padding-right:38px;padding-left:38px">' . esc_html__("Schedule Tour", "medispace") . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%"><!-- wp:image {"width":"810px","sizeSlug":"full","linkDestination":"none","align":"right","className":"medical-page-hero__image"} -->
<figure class="wp-block-image alignright size-full is-resized medical-page-hero__image"><img src="' . esc_url(MEDISPACE_THEME_URL . "/assets/images/medical/page-hero/contact.webp") . '" alt="" style="width:810px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
];
