<?php
/**
 * Pattern: Footer - Construction.
 *
 * Rendered by parts/footer-construction.html. Lives in a pattern (not the part
 * itself) so strings are translatable and asset URLs come from the theme.
 *
 * @package Medispace
 */

$medispace_img = MEDISPACE_THEME_URL . "/assets/images/construction/footer";

$medispace_contact = function ($name, $icon, $label, $value, $href = "") use ($medispace_img) {
    $value_html = $href
        ? '<a href="' . esc_url($href) . '">' . esc_html($value) . "</a>"
        : esc_html($value);

    return '<!-- wp:group {"metadata":{"name":"' . $name . '"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:group {"metadata":{"name":"Icon"},"style":{"spacing":{"padding":{"top":"12px","right":"12px","bottom":"12px","left":"12px"}}},"backgroundColor":"dark","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group has-dark-background-color has-background" style="padding-top:12px;padding-right:12px;padding-bottom:12px;padding-left:12px"><!-- wp:image {"width":"24px","height":"24px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . esc_url($medispace_img . "/" . $icon) . '" alt="" style="width:24px;height:24px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Text"},"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"400"}},"textColor":"gray-50","fontSize":"body-s"} -->
<p class="has-gray-50-color has-text-color has-body-s-font-size" style="font-weight:400">' . esc_html($label) . '</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"},"typography":{"textDecoration":"none"}}},"typography":{"fontWeight":"600"}},"textColor":"white","fontSize":"body-s"} -->
<p class="has-white-color has-text-color has-link-color has-body-s-font-size" style="font-weight:600">' . $value_html . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->';
};

$medispace_nav = function (array $links) {
    $items = "";
    foreach ($links as $label => $path) {
        $items .= '<!-- wp:navigation-link {"label":"' . esc_attr($label) . '","url":"' . esc_url(home_url($path)) . '","kind":"custom"} /-->' . "\n";
    }

    return '<!-- wp:navigation {"textColor":"white","overlayMenu":"never","className":"footer-nav","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"fontSize":"body-m","layout":{"type":"flex","orientation":"vertical"}} -->
' . $items . '<!-- /wp:navigation -->';
};

return [
    "title" => __("Footer - Construction", "medispace"),
    "categories" => ["medispace-construction", "footer"],
    "blockTypes" => ["core/template-part/footer"],
    "inserter" => false,
    "content" =>
        '<!-- wp:group {"metadata":{"name":"Footer"},"align":"full","style":{"spacing":{"padding":{"top":"80px","bottom":"0","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"backgroundColor":"gray-100","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-gray-100-background-color has-background" style="padding-top:80px;padding-right:var(--wp--preset--spacing--40);padding-bottom:0;padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"metadata":{"name":"Footer main"},"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|70"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"metadata":{"name":"Contacts"},"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group">' .
        $medispace_contact("Email", "icon-email.svg", __("Email:", "medispace"), "contact@medicalspace.com", "mailto:contact@medicalspace.com") .
        "\n\n" .
        $medispace_contact("Phone", "icon-phone.svg", __("Phone:", "medispace"), "(414) 687 - 5892", "tel:+14146875892") .
        "\n\n" .
        $medispace_contact("Location", "icon-location.svg", __("Location:", "medispace"), "10 Booth Place, Balcatta WA 6021") .
        '</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Menu"},"style":{"spacing":{"blockGap":"72px"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group">' .
        $medispace_nav([
            __("Home", "medispace") => "/",
            __("About us", "medispace") => "/about/",
            __("FAQs", "medispace") => "/faq/",
        ]) .
        "\n\n" .
        $medispace_nav([
            __("Services", "medispace") => "/services/",
            __("Portfolio", "medispace") => "/portfolio/",
            __("Blog", "medispace") => "/blog/",
        ]) .
        '</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Logo info"},"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:image {"width":"179px","height":"29px","sizeSlug":"full","linkDestination":"custom"} -->
<figure class="wp-block-image size-full is-resized"><a href="' . esc_url(home_url("/")) . '"><img src="' . esc_url($medispace_img . "/logo-light.svg") . '" alt="' . esc_attr__("MediSpace", "medispace") . '" style="width:179px;height:29px"/></a></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"textColor":"gray-50"} -->
<p class="has-gray-50-color has-text-color">' . esc_html__("Builders Number — PN10983", "medispace") . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Footer bottom"},"align":"wide","style":{"spacing":{"margin":{"top":"60px"},"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}},"border":{"top":{"color":"var:preset|color|gray-80","width":"1px"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
<div class="wp-block-group alignwide" style="border-top-color:var(--wp--preset--color--gray-80);border-top-width:1px;margin-top:60px;padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"elements":{"link":{"color":{"text":"var:preset|color|gray-50"},"typography":{"textDecoration":"none"}}}},"textColor":"gray-50"} -->
<p class="has-text-align-center has-gray-50-color has-text-color has-link-color">' .
        sprintf(
            /* translators: %s: current year. */
            esc_html__("Copyright © %s MedicalSpace", "medispace"),
            gmdate("Y"),
        ) .
        " | " . esc_html__("All Rights Reserved", "medispace") .
        ' | <a href="' . esc_url(home_url("/terms-and-conditions/")) . '">' . esc_html__("Terms and Conditions", "medispace") . "</a>" .
        ' | <a href="' . esc_url(home_url("/privacy-policy/")) . '">' . esc_html__("Privacy Policy", "medispace") . "</a>" .
        '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
];
