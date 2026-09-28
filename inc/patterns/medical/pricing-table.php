<?php
/**
 * Pattern: Pricing table - Medical ("Find Your Perfect Fit at MediSpace").
 *
 * The prices are written once, as one card per space (name, weekdays, weekends, full-time and
 * "Book Now"), so each space is edited in one place. On phones and tablets the cards stack as in
 * the mobile design; from 1024px the CSS lays them out as the desktop table: a label column on
 * the left, the spaces as columns and a "Book Now" column on the right (rows aligned with CSS
 * subgrid). Styles: assets/css/patterns.css ("Pricing table - Medical").
 *
 * @package Medispace
 */

$medispace_book = function () {
    return '<!-- wp:buttons {"className":"is-mobile-full"} -->
<div class="wp-block-buttons is-mobile-full"><!-- wp:button {"style":{"spacing":{"padding":{"left":"33px","right":"33px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="' . esc_url(home_url("/contact/")) . '" style="padding-right:33px;padding-left:33px">' . esc_html__("Book Now", "medispace") . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->';
};

$medispace_labels = [
    __("Space:", "medispace"),
    __("Weekdays:", "medispace"),
    __("Weekends:", "medispace"),
    __("Full-Time:", "medispace"),
];

$medispace_spaces = [
    [__("Medical Procedure Room", "medispace"), __("$30/hour", "medispace"), __("$40/hour", "medispace"), __("$1,500/month", "medispace")],
    [__("Medical Exam Room", "medispace"), __("$30/hour", "medispace"), __("$35/hour", "medispace"), __("$1,700/month", "medispace")],
    [__("Therapy Space", "medispace"), __("$40/hour", "medispace"), __("$50/hour", "medispace"), __("$2,300/month", "medispace")],
    [__("Bodywork Space", "medispace"), __("$45/hour", "medispace"), __("$60/hour", "medispace"), __("$2,500/month", "medispace")],
];

// Desktop label column (hidden on phones and tablets, where each card has its own labels).
$medispace_label_cells = "";
foreach ($medispace_labels as $medispace_label) {
    $medispace_label_cells .= '<!-- wp:paragraph {"className":"medical-pricing__cell"} -->
<p class="medical-pricing__cell">' . esc_html(rtrim($medispace_label, ":")) . '</p>
<!-- /wp:paragraph -->

';
}

$medispace_cards = "";
foreach ($medispace_spaces as $medispace_space) {
    $medispace_rows = "";
    foreach ($medispace_space as $medispace_i => $medispace_value) {
        $medispace_rows .= '<!-- wp:group {"className":"medical-pricing__cell","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group medical-pricing__cell"><!-- wp:paragraph {"className":"medical-pricing__label"} -->
<p class="medical-pricing__label">' . esc_html($medispace_labels[$medispace_i]) . '</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"medical-pricing__value"} -->
<p class="medical-pricing__value">' . esc_html($medispace_value) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

';
    }
    $medispace_cards .= '<!-- wp:group {"metadata":{"name":"' . esc_attr($medispace_space[0]) . '"},"className":"medical-pricing__space","layout":{"type":"default"}} -->
<div class="wp-block-group medical-pricing__space">' . $medispace_rows . $medispace_book() . '</div>
<!-- /wp:group -->

';
}

// Desktop "Book Now" column: an empty header cell and one button per rate row.
$medispace_action_cells = '<!-- wp:group {"className":"medical-pricing__cell","layout":{"type":"default"}} -->
<div class="wp-block-group medical-pricing__cell"></div>
<!-- /wp:group -->

';
for ($medispace_i = 0; $medispace_i < 3; $medispace_i++) {
    $medispace_action_cells .= '<!-- wp:group {"className":"medical-pricing__cell","layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-group medical-pricing__cell">' . $medispace_book() . '</div>
<!-- /wp:group -->

';
}

return [
    "title" => __("Pricing table - Medical", "medispace"),
    "description" => __("Rates per space: a table on desktop, one card per space on phones.", "medispace"),
    "categories" => ["medispace-medical", "featured"],
    "keywords" => ["pricing", "prices", "rates", "table", "plans"],
    "viewportWidth" => 1440,
    "content" =>
        '<!-- wp:group {"metadata":{"name":"Pricing"},"align":"full","style":{"spacing":{"margin":{"top":"var(--wp--custom--section-gap)","bottom":"var(--wp--custom--section-gap)"},"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"},"blockGap":"32px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:var(--wp--custom--section-gap);margin-bottom:var(--wp--custom--section-gap);padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"metadata":{"name":"Head"},"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained","contentSize":"534px"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">' . esc_html__("Find Your Perfect Fit at MediSpace", "medispace") . '</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"gray-80"} -->
<p class="has-text-align-center has-gray-80-color has-text-color">' . esc_html__("We offer 3 flexible pricing options. All of our rates are subject to GST.", "medispace") . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Table"},"align":"wide","className":"medical-pricing","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide medical-pricing"><!-- wp:group {"metadata":{"name":"Labels"},"className":"medical-pricing__labels","layout":{"type":"default"}} -->
<div class="wp-block-group medical-pricing__labels">' . $medispace_label_cells . '</div>
<!-- /wp:group -->

' . $medispace_cards . '<!-- wp:group {"metadata":{"name":"Book Now"},"className":"medical-pricing__actions","layout":{"type":"default"}} -->
<div class="wp-block-group medical-pricing__actions">' . $medispace_action_cells . '</div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
];
