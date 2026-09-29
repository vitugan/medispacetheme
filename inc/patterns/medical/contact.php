<?php
/**
 * Pattern: Contact - Medical (Contact Us page, under the page hero).
 *
 * "Drop us a line" heading, three contact details on navy tiles split by thin dividers, a
 * rule, then a navy card (building icon, pitch, "View Pricing") next to the theme's Contact
 * Form 7 form (inc/contact-form.php; rounded fields from the flow's custom.form tokens).
 * Styles: assets/css/patterns.css ("Contact - Medical").
 *
 * @package Medispace
 */

$medispace_dir = MEDISPACE_THEME_URL . "/assets/images/medical/contact";

$medispace_detail = function ($name, $icon, $label, $value, $href = "") use ($medispace_dir) {
    $value_html = $href ? '<a href="' . esc_url($href) . '">' . esc_html($value) . "</a>" : esc_html($value);
    return '<!-- wp:group {"metadata":{"name":"' . $name . '"},"className":"medical-contact__detail","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group medical-contact__detail"><!-- wp:image {"width":"48px","height":"48px","sizeSlug":"full","linkDestination":"none","className":"medical-contact__icon"} -->
<figure class="wp-block-image size-full is-resized medical-contact__icon"><img src="' . esc_url($medispace_dir . "/" . $icon) . '" alt="" style="width:48px;height:48px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"metadata":{"name":"Text"},"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"textColor":"gray-70","fontSize":"body-s"} -->
<p class="has-gray-70-color has-text-color has-body-s-font-size">' . esc_html($label) . '</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|gray-100"},"typography":{"textDecoration":"none"}}},"typography":{"fontWeight":"700"}},"textColor":"gray-100","fontSize":"body-s"} -->
<p class="has-gray-100-color has-text-color has-link-color has-body-s-font-size" style="font-weight:700">' . $value_html . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->';
};

return [
    "title" => __("Contact - Medical", "medispace"),
    "categories" => ["medispace-medical", "contact"],
    "keywords" => ["contact", "form", "email", "phone", "address"],
    "viewportWidth" => 1440,
    "content" =>
        '<!-- wp:group {"metadata":{"name":"Contact"},"align":"full","className":"medical-contact","style":{"spacing":{"margin":{"top":"var(--wp--custom--section-gap)","bottom":"var(--wp--custom--section-gap)"},"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"},"blockGap":"32px"}},"layout":{"type":"constrained","contentSize":"946px"}} -->
<div class="wp-block-group alignfull medical-contact" style="margin-top:var(--wp--custom--section-gap);margin-bottom:var(--wp--custom--section-gap);padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"metadata":{"name":"Head"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"420px"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">' . esc_html__("Drop us a line", "medispace") . '</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"gray-80"} -->
<p class="has-text-align-center has-gray-80-color has-text-color">' . esc_html__("Interested? Please leave your contact info and we will get back to you ASAP", "medispace") . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Details"},"className":"medical-contact__details","style":{"spacing":{"blockGap":"40px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group medical-contact__details">' .
        $medispace_detail("Email", "icon-mail.svg", __("Email:", "medispace"), "contact@medicalspace.com", "mailto:contact@medicalspace.com") . "\n\n" .
        $medispace_detail("Phone", "icon-phone.svg", __("Phone:", "medispace"), "(414) 687 - 5892", "tel:+14146875892") . "\n\n" .
        $medispace_detail("Location", "icon-location.svg", __("Location:", "medispace"), "1133 21st St NW, WA, DC 20036, United States") . '</div>
<!-- /wp:group -->

<!-- wp:separator {"className":"is-style-wide medical-contact__rule","backgroundColor":"gray-20"} -->
<hr class="wp-block-separator has-text-color has-gray-20-color has-alpha-channel-opacity has-gray-20-background-color has-background is-style-wide medical-contact__rule"/>
<!-- /wp:separator -->

<!-- wp:columns {"className":"medical-contact__columns","style":{"spacing":{"blockGap":{"top":"40px","left":"40px"}}}} -->
<div class="wp-block-columns medical-contact__columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"metadata":{"name":"Card"},"className":"medical-contact__card","style":{"spacing":{"padding":{"top":"64px","right":"var:preset|spacing|50","bottom":"64px","left":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|50"}},"backgroundColor":"dark","textColor":"white","layout":{"type":"flex","orientation":"vertical","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group medical-contact__card has-white-color has-dark-background-color has-text-color has-background" style="padding-top:64px;padding-right:var(--wp--preset--spacing--50);padding-bottom:64px;padding-left:var(--wp--preset--spacing--50)"><!-- wp:image {"width":"60px","height":"60px","sizeSlug":"full","linkDestination":"none","className":"medical-contact__card-icon"} -->
<figure class="wp-block-image size-full is-resized medical-contact__card-icon"><img src="' . esc_url($medispace_dir . "/icon-building.svg") . '" alt="" style="width:60px;height:60px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"metadata":{"name":"Text"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontWeight":"600","lineHeight":"1.3"}},"textColor":"white","fontSize":"h-5","fontFamily":"body"} -->
<h3 class="wp-block-heading has-text-align-center has-white-color has-text-color has-body-font-family has-h-5-font-size" style="font-weight:600;line-height:1.3">' . esc_html__("Expand Your Practice with MedicalSpace Co-Working Offices", "medispace") . '</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontWeight":"500"}}} -->
<p class="has-text-align-center" style="font-weight:500">' . esc_html__("Discover a new way to practice in our co-working offices for lease, crafted specifically to meet the needs of healthcare providers.", "medispace") . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"borderColor":"primary","className":"is-style-outline-light","style":{"spacing":{"padding":{"left":"59.5px","right":"59.5px"}},"typography":{"fontWeight":"500"}}} -->
<div class="wp-block-button is-style-outline-light" style="font-weight:500"><a class="wp-block-button__link has-border-color has-primary-border-color wp-element-button" href="' . esc_url(home_url("/pricing/")) . '" style="padding-right:59.5px;padding-left:59.5px">' . esc_html__("View Pricing", "medispace") . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center">' . medispace_contact_form_block() . '</div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
];
