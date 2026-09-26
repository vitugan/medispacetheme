<?php
/**
 * Pattern: Meet our talented team - Construction (About).
 *
 * Heading + intro and a 3-column grid of photo cards (cover with the photo, frosted bottom
 * panel: position, name, phone and email with icons on primary tiles). Static content - the
 * theme has no team post type; edit the cards in the editor.
 *
 * @package Medispace
 */

$medispace_team_dir = MEDISPACE_THEME_URL . "/assets/images/construction/team";
$medispace_gradient = "linear-gradient(180deg,rgba(7,11,27,0) 0%,#070b1b 100%)";

$medispace_contact_row = function ($icon, $text, $href) use ($medispace_team_dir) {
    return '<!-- wp:group {"metadata":{"name":"' . ($icon === "phone" ? "Phone" : "Email") . '"},"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:group {"metadata":{"name":"Icon"},"style":{"spacing":{"padding":{"top":"4px","right":"4px","bottom":"4px","left":"4px"}}},"backgroundColor":"primary","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group has-primary-background-color has-background" style="padding-top:4px;padding-right:4px;padding-bottom:4px;padding-left:4px"><!-- wp:image {"width":"16px","height":"16px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . esc_url($medispace_team_dir . "/icon-" . $icon . ".svg") . '" alt="" style="width:16px;height:16px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|gray-30"},"typography":{"textDecoration":"none"}}}},"textColor":"gray-30"} -->
<p class="has-gray-30-color has-text-color has-link-color"><a href="' . esc_url($href) . '">' . esc_html($text) . '</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->';
};

$medispace_people = [
    ["stephanie-powell", __("Director", "medispace"), "Stephanie Powell", "0450 211 982", "s.powell@mspace.com.au"],
    ["christopher-white", __("Estimator", "medispace"), "Christopher White", "0450 290 905", "c.white@mspace.com.au"],
    ["brian-clark", __("Sales Manager/Flooring", "medispace"), "Brian Clark", "0450 315 822", "b.clark@mspace.com.au"],
    ["michael-davis", __("General Manager Joinery Division", "medispace"), "Michael Davis", "0450 313 029", "m.davis@mspace.com.au"],
    ["emily-miller", __("Senior Project Manager", "medispace"), "Emily Miller", "0450 318 004", "e.miller@mspace.com.au"],
    ["william-anderson", __("Bookkeeper/Office Manager", "medispace"), "William Anderson", "0450 008 450", "w.anderson@mspace.com.au"],
];

$medispace_cards = "";
foreach ($medispace_people as [$slug, $role, $name, $phone, $email]) {
    $img = esc_url($medispace_team_dir . "/" . $slug . ".webp");
    $medispace_cards .= '<!-- wp:cover {"url":"' . $img . '","alt":"' . esc_attr($name) . '","dimRatio":0,"isUserOverlayColor":true,"focalPoint":{"x":0.5,"y":0.2},"minHeight":397,"isDark":true,"metadata":{"name":"' . esc_attr($name) . '"},"className":"team-card","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-cover team-card" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:397px"><img class="wp-block-cover__image-background" alt="' . esc_attr($name) . '" src="' . $img . '" style="object-position:50% 20%" data-object-fit="cover" data-object-position="50% 20%"/><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"metadata":{"name":"Panel"},"className":"team-card__content","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"14px","left":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|50"},"color":{"gradient":"' . $medispace_gradient . '"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group team-card__content has-background" style="background:' . $medispace_gradient . ';padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:14px;padding-left:var(--wp--preset--spacing--50)"><!-- wp:group {"metadata":{"name":"Main"},"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"textColor":"white"} -->
<p class="has-white-color has-text-color">' . esc_html($role) . '</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"textColor":"white","fontSize":"h-5"} -->
<h3 class="wp-block-heading has-white-color has-text-color has-h-5-font-size">' . esc_html($name) . '</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Contacts"},"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group">' . $medispace_contact_row("phone", $phone, "tel:" . preg_replace("/\s+/", "", $phone)) . "\n\n" . $medispace_contact_row("mail", $email, "mailto:" . $email) . '</div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

';
}

return [
    "title" => __("Meet our talented team - Construction", "medispace"),
    "categories" => ["medispace-construction", "team"],
    "keywords" => ["team", "people", "staff", "about"],
    "viewportWidth" => 1440,
    "content" =>
        '<!-- wp:group {"metadata":{"name":"Team"},"align":"full","style":{"spacing":{"margin":{"top":"var(--wp--custom--section-gap)","bottom":"var(--wp--custom--section-gap)"},"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"},"blockGap":"32px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:var(--wp--custom--section-gap);margin-bottom:var(--wp--custom--section-gap);padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"metadata":{"name":"Head"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"534px"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">' . esc_html__("Meet our talented team", "medispace") . '</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"gray-80"} -->
<p class="has-text-align-center has-gray-80-color has-text-color">' . esc_html__("Interested in purchasing medical office space, subdividing an existing tenancy, creating a new look in your medical office or just updating your current medical office? MedicalSpace professionals will be able to assist you.", "medispace") . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Cards"},"className":"team-grid","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"280px"}} -->
<div class="wp-block-group team-grid">' . rtrim($medispace_cards) . '</div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
];
