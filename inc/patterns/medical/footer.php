<?php
/**
 * Pattern: Footer - Medical.
 *
 * Rendered by parts/footer-medical.html. Light footer: logo and intro, two menus with blue
 * chevrons, contacts on grey tiles; bottom bar with the copyright, legal links and social icons
 * (phones: legal links, icons, copyright). Styles: assets/css/patterns.css ("Footer - Medical").
 *
 * @package Medispace
 */

$medispace_img = MEDISPACE_THEME_URL . "/assets/images/medical";

$medispace_contact = function ($name, $icon, $label, $value, $href = "") use ($medispace_img) {
    $value_html = $href
        ? '<a href="' . esc_url($href) . '">' . esc_html($value) . "</a>"
        : esc_html($value);

    return '<!-- wp:group {"metadata":{"name":"' . $name . '"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:group {"metadata":{"name":"Icon"},"className":"footer-contact__icon","style":{"spacing":{"padding":{"top":"12px","right":"12px","bottom":"12px","left":"12px"}}},"backgroundColor":"gray-20","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group footer-contact__icon has-gray-20-background-color has-background" style="padding-top:12px;padding-right:12px;padding-bottom:12px;padding-left:12px"><!-- wp:image {"width":"24px","height":"24px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . esc_url($medispace_img . "/footer/" . $icon) . '" alt="" style="width:24px;height:24px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Text"},"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"textColor":"gray-70","fontSize":"body-s"} -->
<p class="has-gray-70-color has-text-color has-body-s-font-size">' . esc_html($label) . '</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|gray-100"},"typography":{"textDecoration":"none"}}},"typography":{"fontWeight":"700"}},"textColor":"gray-100","fontSize":"body-s"} -->
<p class="has-gray-100-color has-text-color has-link-color has-body-s-font-size" style="font-weight:700">' . $value_html . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->';
};

$medispace_nav = function (array $links) {
    $items = "";
    foreach ($links as $label => $path) {
        $items .= '<!-- wp:navigation-link {"label":"' . esc_attr($label) . '","url":"' . esc_url(preg_match("#^https?://#", $path) ? $path : home_url($path)) . '","kind":"custom"} /-->' . "\n";
    }

    return '<!-- wp:navigation {"textColor":"gray-100","overlayMenu":"never","className":"footer-nav footer-nav--chevron","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"fontSize":"body-m","layout":{"type":"flex","orientation":"vertical"}} -->
' . $items . '<!-- /wp:navigation -->';
};

return [
    "title" => __("Footer - Medical", "medispace"),
    "categories" => ["medispace-medical", "footer"],
    "blockTypes" => ["core/template-part/footer"],
    "inserter" => false,
    "content" =>
        '<!-- wp:group {"metadata":{"name":"Footer"},"align":"full","className":"medical-footer","style":{"spacing":{"padding":{"top":"clamp(40px, 3.65vw, 70px)","bottom":"0","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"backgroundColor":"light-gray","layout":{"type":"constrained","wideSize":"1640px"}} -->
<div class="wp-block-group alignfull medical-footer has-light-gray-background-color has-background" style="padding-top:clamp(40px, 3.65vw, 70px);padding-right:var(--wp--preset--spacing--40);padding-bottom:0;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"metadata":{"name":"Footer main"},"align":"wide","className":"medical-footer__main","style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
<div class="wp-block-group alignwide medical-footer__main"><!-- wp:group {"metadata":{"name":"Logo info"},"className":"medical-footer__info","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group medical-footer__info"><!-- wp:image {"width":"179px","height":"29px","sizeSlug":"full","linkDestination":"custom"} -->
<figure class="wp-block-image size-full is-resized"><a href="' . esc_url(home_url("/")) . '"><img src="' . esc_url($medispace_img . "/logo-dark.svg") . '" alt="' . esc_attr__("MediSpace", "medispace") . '" style="width:179px;height:29px"/></a></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"textColor":"gray-80"} -->
<p class="has-gray-80-color has-text-color">' . esc_html__("MedicalSpace provides a flexible solution to rent furnished medical office space with no lease commitments or up-front costs.", "medispace") . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Menu"},"className":"medical-footer__menu","style":{"spacing":{"blockGap":"80px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group medical-footer__menu">' .
        $medispace_nav([
            __("About Us", "medispace") => "/about/",
            __("FAQs", "medispace") => "/faq/",
            __("Pricing", "medispace") => "/pricing/",
        ]) .
        "\n\n" .
        $medispace_nav([
            __("Location", "medispace") => "/location/",
            __("Blog", "medispace") => "/blog/",
            __("Contact Us", "medispace") => "/contact/",
        ]) .
        '</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Contacts"},"className":"medical-footer__contacts","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group medical-footer__contacts">' .
        $medispace_contact("Email", "icon-mail.svg", __("Email:", "medispace"), "contact@medicalspace.com", "mailto:contact@medicalspace.com") .
        "\n\n" .
        $medispace_contact("Phone", "icon-phone.svg", __("Phone:", "medispace"), "(414) 687 - 5892", "tel:+14146875892") .
        "\n\n" .
        $medispace_contact("Location", "icon-location.svg", __("Location:", "medispace"), "1133 21st St NW, WA, DC 20036, United States") .
        '</div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Footer bottom"},"align":"wide","className":"medical-footer__bottom","style":{"spacing":{"margin":{"top":"var:preset|spacing|80"},"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}},"border":{"top":{"color":"var:preset|color|gray-20","width":"1px"}},"elements":{"link":{"color":{"text":"var:preset|color|gray-50"},":hover":{"color":{"text":"var:preset|color|primary"}},"typography":{"textDecoration":"none"}}}},"textColor":"gray-50","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group alignwide medical-footer__bottom has-gray-50-color has-text-color has-link-color" style="border-top-color:var(--wp--preset--color--gray-20);border-top-width:1px;margin-top:var(--wp--preset--spacing--80);padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"className":"medical-footer__copyright","style":{"typography":{"fontWeight":"500"}}} -->
<p class="medical-footer__copyright" style="font-weight:500">' .
        sprintf(
            /* translators: %s: current year. */
            esc_html__("Copyright © %s MedicalSpace", "medispace"),
            gmdate("Y"),
        ) .
        " | " . esc_html__("All Rights Reserved", "medispace") . '</p>
<!-- /wp:paragraph -->

<!-- wp:group {"metadata":{"name":"Legal and social"},"className":"medical-footer__legal","style":{"spacing":{"blockGap":"60px"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group medical-footer__legal"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"500"}}} -->
<p style="font-weight:500"><a href="' . esc_url(home_url("/terms-and-conditions/")) . '">' . esc_html__("Terms and Conditions", "medispace") . '</a> | <a href="' . esc_url(home_url("/privacy-policy/")) . '">' . esc_html__("Privacy Policy", "medispace") . '</a></p>
<!-- /wp:paragraph -->

<!-- wp:social-links {"iconColor":"white","iconColorValue":"#ffffff","iconBackgroundColor":"gray-30","iconBackgroundColorValue":"#b5bcc0","size":"has-small-icon-size","className":"medical-footer__social","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|40"}}}} -->
<ul class="wp-block-social-links has-small-icon-size has-icon-color has-icon-background-color medical-footer__social"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"instagram"} /-->

<!-- wp:social-link {"url":"#","service":"linkedin"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
];
