<?php
/**
 * Pattern: Flexible booking - Medical (Home content block, image right).
 *
 * Heading, intro, pricing check list (core List, "Check list" style - navy circles in the
 * Medical flow) and a button; the photo collage with the "Real Estate Since 2020" stamp is one
 * image from the design.
 *
 * @package Medispace
 */

$medispace_item = function ($label, $price, $note) {
    return '<!-- wp:list-item -->
<li><strong>' . esc_html($label) . '</strong> ' . wp_kses($price, ["strong" => []]) . '<br>' . esc_html($note) . '</li>
<!-- /wp:list-item -->';
};

return [
    "title" => __("Flexible booking - Medical", "medispace"),
    "categories" => ["medispace-medical", "text", "media"],
    "keywords" => ["booking", "pricing", "list", "image"],
    "viewportWidth" => 1440,
    "content" =>
        '<!-- wp:group {"metadata":{"name":"Flexible booking"},"align":"full","style":{"spacing":{"margin":{"top":"var(--wp--custom--section-gap)","bottom":"var(--wp--custom--section-gap)"},"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:var(--wp--custom--section-gap);margin-bottom:var(--wp--custom--section-gap);padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:columns {"verticalAlignment":"center","className":"booking-columns","style":{"spacing":{"blockGap":{"top":"40px","left":"60px"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center booking-columns"><!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%"><!-- wp:group {"metadata":{"name":"Content"},"style":{"spacing":{"blockGap":"40px"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:group {"metadata":{"name":"Text"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:heading -->
<h2 class="wp-block-heading">' . esc_html__("Flexible Booking", "medispace") . '</h2>
<!-- /wp:heading -->

<!-- wp:group {"metadata":{"name":"Description"},"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"textColor":"gray-80","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group has-gray-80-color has-text-color"><!-- wp:paragraph -->
<p>' . esc_html__("Book anytime and we will contact you shortly.", "medispace") . '</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}}} -->
<p style="font-weight:600">' . esc_html__("Pricing", "medispace") . '</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"is-style-check booking-prices"} -->
<ul class="wp-block-list is-style-check booking-prices">' .
        $medispace_item(__("Weekdays:", "medispace"), __("from $30 / Hour", "medispace"), __("Open 7 Days / Week", "medispace")) .
        $medispace_item(__("Weekdays:", "medispace"), __("from <strong>$40</strong> / Hour", "medispace"), __("Hourly, Part-Time, or Full-Time", "medispace")) .
        $medispace_item(__("Full-Time:", "medispace"), __("from <strong>$1,500</strong> / Month", "medispace"), __("Same-Day Booking Available", "medispace")) .
        '</ul>
<!-- /wp:list --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"is-mobile-full"} -->
<div class="wp-block-buttons is-mobile-full"><!-- wp:button {"style":{"spacing":{"padding":{"left":"33.06px","right":"33.06px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="' . esc_url(home_url("/pricing/")) . '" style="padding-right:33.06px;padding-left:33.06px">' . esc_html__("Check Pricing Details", "medispace") . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%"><!-- wp:image {"width":"564px","sizeSlug":"full","linkDestination":"none","align":"right","className":"booking-collage"} -->
<figure class="wp-block-image alignright size-full is-resized booking-collage"><img src="' . esc_url(MEDISPACE_THEME_URL . "/assets/images/medical/booking/booking-collage.webp") . '" alt="' . esc_attr__("Medical office building, dental room and operating room", "medispace") . '" style="width:564px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
];
