<?php
/**
 * Pattern: Header - Medical.
 *
 * Rendered by parts/header-medical.html. Same structure and styles as the Construction header
 * (className "site-header", assets/css/patterns.css): logo, one navigation block (inline on
 * desktop, full-screen overlay on phones with its own "Book Now" button) and, on desktop, the
 * phone link and the "Book Now" button. "site-header--medical" adds the Medical details:
 * regular weight links, the phone icon and the designer's burger.
 *
 * @package Medispace
 */

$medispace_link = function ($label, $path) {
    return '<!-- wp:navigation-link {"label":"' . esc_attr($label) . '","url":"' . esc_url(preg_match("#^https?://#", $path) ? $path : home_url($path)) . '","kind":"custom"} /-->';
};

$medispace_spaces = "";
// The demo spaces (msc_space posts of MediSpace Core).
foreach ([
    "medical-exam-rooms" => __("Exam Rooms", "medispace"),
    "therapy-spaces" => __("Therapy Spaces", "medispace"),
    "medical-procedure-rooms" => __("Medical Procedure Rooms", "medispace"),
    "bodywork-spaces" => __("Bodywork Spaces", "medispace"),
] as $slug => $label) {
    $medispace_spaces .= $medispace_link($label, "/spaces/" . $slug . "/") . "\n";
}

$medispace_cta = __("Book Now", "medispace");
$medispace_cta_url = home_url("/contact/");
$medispace_phone = "+68 685 88666";

return [
    "title" => __("Header - Medical", "medispace"),
    "categories" => ["medispace-medical", "header"],
    "blockTypes" => ["core/template-part/header"],
    "inserter" => false,
    "content" =>
        '<!-- wp:group {"metadata":{"name":"Header"},"align":"full","className":"site-header site-header--medical","style":{"spacing":{"padding":{"top":"18px","bottom":"18px","right":"var:preset|spacing|40","left":"var:preset|spacing|40"}},"shadow":"0 4px 17.5px rgba(0,0,0,0.05)"},"backgroundColor":"white","layout":{"type":"constrained","wideSize":"1640px"}} -->
<div class="wp-block-group alignfull site-header site-header--medical has-white-background-color has-background" style="padding-top:18px;padding-right:var(--wp--preset--spacing--40);padding-bottom:18px;padding-left:var(--wp--preset--spacing--40);box-shadow:0 4px 17.5px rgba(0,0,0,0.05)"><!-- wp:group {"metadata":{"name":"Bar"},"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"metadata":{"name":"Logo"},"className":"site-header__brand","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group site-header__brand"><!-- wp:image {"width":"179px","height":"29px","sizeSlug":"full","linkDestination":"custom","className":"site-header__logo site-header__logo--dark"} -->
<figure class="wp-block-image size-full is-resized site-header__logo site-header__logo--dark"><a href="' . esc_url(home_url("/")) . '"><img src="' . esc_url(MEDISPACE_THEME_URL . "/assets/images/medical/logo-dark.svg") . '" alt="' . esc_attr__("MediSpace", "medispace") . '" style="width:179px;height:29px"/></a></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:navigation {"textColor":"gray-100","overlayBackgroundColor":"white","overlayTextColor":"gray-100","overlayMenu":"mobile","icon":"menu","className":"site-header__nav","style":{"typography":{"fontWeight":"500"},"spacing":{"blockGap":"32px"}},"fontSize":"body-m","layout":{"type":"flex","justifyContent":"center"}} -->
<!-- wp:navigation-submenu {"label":"' . esc_attr__("Spaces", "medispace") . '","url":"' . esc_url(home_url("/spaces/")) . '","kind":"custom"} -->
' . $medispace_spaces . '<!-- /wp:navigation-submenu -->
' . $medispace_link(__("Location", "medispace"), "/location/") . '
' . $medispace_link(__("Pricing", "medispace"), "/pricing/") . '
' . $medispace_link(__("About Us", "medispace"), "/about/") . '
' . $medispace_link(__("FAQ", "medispace"), "/faq/") . '
' . $medispace_link(__("Blog", "medispace"), "/blog/") . '
' . $medispace_link(__("Contact Us", "medispace"), "/contact/") . '
<!-- wp:buttons {"className":"site-header__menu-cta"} -->
<div class="wp-block-buttons site-header__menu-cta"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="' . esc_url($medispace_cta_url) . '">' . esc_html($medispace_cta) . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
<!-- /wp:navigation -->

<!-- wp:group {"metadata":{"name":"Contact"},"className":"site-header__cta","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group site-header__cta"><!-- wp:paragraph {"className":"site-header__phone","style":{"elements":{"link":{"color":{"text":"var:preset|color|gray-100"},":hover":{"color":{"text":"var:preset|color|primary"}},"typography":{"textDecoration":"none"}}},"typography":{"fontWeight":"500"}},"textColor":"gray-100"} -->
<p class="site-header__phone has-gray-100-color has-text-color has-link-color" style="font-weight:500"><a href="tel:' . esc_attr(preg_replace("/[^+0-9]/", "", $medispace_phone)) . '">' . esc_html($medispace_phone) . '</a></p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"spacing":{"padding":{"left":"42px","right":"42px"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="' . esc_url($medispace_cta_url) . '" style="padding-right:42px;padding-left:42px">' . esc_html($medispace_cta) . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
];
