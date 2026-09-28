<?php
/**
 * Pattern: Rental coverage overview - Medical (Pricing; two navy cards: what the rent includes,
 * with green checks, and what it does not, with red crosses - the designer's icons).
 * Styles: assets/css/patterns.css ("Rental coverage - Medical").
 *
 * @package Medispace
 */

$medispace_card = function (string $title, array $items, string $modifier) {
    $li = "";
    foreach ($items as $item) {
        $li .= '<!-- wp:list-item -->
<li>' . esc_html($item) . '</li>
<!-- /wp:list-item -->';
    }
    return '<!-- wp:column {"className":"medical-coverage__card","backgroundColor":"dark","textColor":"white","style":{"spacing":{"padding":{"top":"24px","right":"24px","bottom":"24px","left":"24px"},"blockGap":"24px"}}} -->
<div class="wp-block-column medical-coverage__card has-white-color has-dark-background-color has-text-color has-background" style="padding-top:24px;padding-right:24px;padding-bottom:24px;padding-left:24px"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"700"}}} -->
<p style="font-weight:700">' . esc_html($title) . '</p>
<!-- /wp:paragraph -->

<!-- wp:list {"className":"is-style-check medical-coverage__list ' . $modifier . '"} -->
<ul class="wp-block-list is-style-check medical-coverage__list ' . $modifier . '">' . $li . '</ul>
<!-- /wp:list --></div>
<!-- /wp:column -->';
};

return [
    "title" => __("Rental coverage overview - Medical", "medispace"),
    "categories" => ["medispace-medical", "text"],
    "keywords" => ["pricing", "includes", "rent", "list"],
    "viewportWidth" => 1440,
    "content" =>
        '<!-- wp:group {"metadata":{"name":"Rental coverage"},"align":"full","style":{"spacing":{"margin":{"top":"var(--wp--custom--section-gap)","bottom":"var(--wp--custom--section-gap)"},"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"},"blockGap":"32px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:var(--wp--custom--section-gap);margin-bottom:var(--wp--custom--section-gap);padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">' . esc_html__("Rental Coverage Overview", "medispace") . '</h2>
<!-- /wp:heading -->

<!-- wp:columns {"className":"medical-coverage","style":{"spacing":{"blockGap":{"left":"24px","top":"24px"}}}} -->
<div class="wp-block-columns medical-coverage">' .
        $medispace_card(__("All rentals include:", "medispace"), [
            __("Use of two exam rooms, with printers and computers in each room, from 9am to 5pm", "medispace"),
            __("1 front desk space for your own MOA", "medispace"),
            __("Access to our equipment, supplies, and shared spaces", "medispace"),
        ], "is-included") .
        $medispace_card(__("Rentals do NOT include:", "medispace"), [
            __("Use of our MOA time, including answering your phone calls, patient check in, or preparation. On-the-day MOA coverage may be negotiated with an additional fee", "medispace"),
            __("Use of our phones and fax machine: to avoid confusion, you have to maintain your own phone and fax number (eg. VoIP phone app and e-Fax such as SRFax) for your business for both incoming and outgoing calls and faxes", "medispace"),
            __("Use of our payment processing system. You may want to use services such as Square if you wish to accept credit card payments", "medispace"),
            __("We do not wish to host a physical walk-in clinic, all of the patients seen should be by appointment only", "medispace"),
        ], "is-excluded") .
        '</div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
];
