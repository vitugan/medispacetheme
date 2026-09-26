<?php
/**
 * Pattern: Header - Construction.
 *
 * Rendered by parts/header-construction.html. Dark + light logo (the light one is shown while
 * the header is transparent over the hero, see .is-overlay in patterns.css), one navigation block (inline on desktop,
 * full-screen overlay on mobile, with its own "Request proposal" button inside the overlay)
 * and the desktop CTA button. Menu links are inline (no wp_navigation post needed).
 *
 * @package Medispace
 */

$medispace_link = function ($label, $path) {
    return '<!-- wp:navigation-link {"label":"' . esc_attr($label) . '","url":"' . esc_url(home_url($path)) . '","kind":"custom"} /-->';
};

$medispace_services = "";
foreach ([
    "custom-cabinetry" => __("Custom cabinetry", "medispace"),
    "interior-layout-design" => __("Interior and layout design", "medispace"),
    "new-office-construction" => __("New office construction", "medispace"),
    "office-remodeling" => __("Office remodeling", "medispace"),
    "office-relocation" => __("Office relocation", "medispace"),
    "equipment-recommendations" => __("Equipment recommendations", "medispace"),
] as $slug => $label) {
    $medispace_services .= $medispace_link($label, "/services/" . $slug . "/") . "\n";
}

$medispace_cta = __("Request proposal", "medispace");
$medispace_cta_url = home_url("/contact/");

return [
    "title" => __("Header - Construction", "medispace"),
    "categories" => ["medispace-construction", "header"],
    "blockTypes" => ["core/template-part/header"],
    "inserter" => false,
    "content" =>
        '<!-- wp:group {"metadata":{"name":"Header"},"align":"full","className":"site-header","style":{"spacing":{"padding":{"top":"18px","bottom":"18px","right":"var:preset|spacing|40","left":"var:preset|spacing|40"}},"shadow":"0 4px 17.5px rgba(0,0,0,0.05)"},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull site-header has-white-background-color has-background" style="padding-top:18px;padding-right:var(--wp--preset--spacing--40);padding-bottom:18px;padding-left:var(--wp--preset--spacing--40);box-shadow:0 4px 17.5px rgba(0,0,0,0.05)"><!-- wp:group {"metadata":{"name":"Bar"},"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"metadata":{"name":"Logo"},"className":"site-header__brand","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group site-header__brand"><!-- wp:image {"width":"179px","height":"29px","sizeSlug":"full","linkDestination":"custom","className":"site-header__logo site-header__logo--dark"} -->
<figure class="wp-block-image size-full is-resized site-header__logo site-header__logo--dark"><a href="' . esc_url(home_url("/")) . '"><img src="' . esc_url(MEDISPACE_THEME_URL . "/assets/images/construction/header/logo-dark.svg") . '" alt="' . esc_attr__("MediSpace", "medispace") . '" style="width:179px;height:29px"/></a></figure>
<!-- /wp:image -->

<!-- wp:image {"width":"179px","height":"29px","sizeSlug":"full","linkDestination":"custom","className":"site-header__logo site-header__logo--light"} -->
<figure class="wp-block-image size-full is-resized site-header__logo site-header__logo--light"><a href="' . esc_url(home_url("/")) . '"><img src="' . esc_url(MEDISPACE_THEME_URL . "/assets/images/construction/footer/logo-light.svg") . '" alt="' . esc_attr__("MediSpace", "medispace") . '" style="width:179px;height:29px"/></a></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:navigation {"textColor":"gray-100","overlayBackgroundColor":"white","overlayTextColor":"gray-100","overlayMenu":"mobile","icon":"menu","className":"site-header__nav","style":{"typography":{"fontWeight":"700"},"spacing":{"blockGap":"32px"}},"fontSize":"body-m","layout":{"type":"flex","justifyContent":"center"}} -->
' . $medispace_link(__("About", "medispace"), "/about/") . '
<!-- wp:navigation-submenu {"label":"' . esc_attr__("Services", "medispace") . '","url":"' . esc_url(home_url("/services/")) . '","kind":"custom"} -->
' . $medispace_services . '<!-- /wp:navigation-submenu -->
' . $medispace_link(__("Portfolio", "medispace"), "/portfolio/") . '
' . $medispace_link(__("Contacts", "medispace"), "/contact/") . '
' . $medispace_link(__("Blog", "medispace"), "/blog/") . '
<!-- wp:buttons {"className":"site-header__menu-cta"} -->
<div class="wp-block-buttons site-header__menu-cta"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="' . esc_url($medispace_cta_url) . '">' . esc_html($medispace_cta) . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
<!-- /wp:navigation -->

<!-- wp:buttons {"className":"site-header__cta"} -->
<div class="wp-block-buttons site-header__cta"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="' . esc_url($medispace_cta_url) . '">' . esc_html($medispace_cta) . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
];
