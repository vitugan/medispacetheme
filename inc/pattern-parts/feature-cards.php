<?php
/**
 * Shared builder for "Why choose us" style sections: heading + 2-column grid of icon cards.
 *
 * Two looks from the design:
 * - "tinted": light-gray section (padding), white cards, light-blue icon tiles (Home).
 * - "plain":  white section (section-gap margins), light-gray cards, dark icon tiles (Services).
 * Cards put the icon left of the text and wrap it above the text when the card gets narrow.
 *
 * Lives outside inc/patterns/ so the pattern auto-discovery does not register it.
 *
 * @package Medispace
 */

/**
 * @param array{
 *     title:string,
 *     items:array<array{icon:string, title:string, text:string}>,
 *     variant?:"tinted"|"plain",
 *     columns?:int,
 *     stacked?:bool,
 *     section_bg?:string,
 *     button?:array{label:string, url:string}
 * } $args
 *
 * columns: cards per row on wide screens (2 by default); stacked: icon above centered text
 * (Values) instead of icon beside the text; section_bg: palette slug of a tinted section
 * (light-gray by default); button: optional CTA under the cards.
 * @return string Block markup.
 */
return function (array $args) {
    $tinted = ($args["variant"] ?? "tinted") === "tinted";
    $card_bg = $tinted ? "white" : "light-gray";
    $icon_bg = $tinted ? "light-blue" : "gray-100";
    $columns = (int) ($args["columns"] ?? 2);
    $stacked = !empty($args["stacked"]);
    $card_layout = $stacked
        ? '{"type":"flex","orientation":"vertical","justifyContent":"center"}'
        : '{"type":"flex","flexWrap":"wrap","verticalAlignment":"top"}';
    $text_layout = $stacked
        ? '{"type":"flex","orientation":"vertical","justifyContent":"center"}'
        : '{"type":"flex","orientation":"vertical"}';
    $align_attr = $stacked ? '"textAlign":"center",' : "";
    $align_class = $stacked ? " has-text-align-center" : "";

    $cards = "";
    foreach ($args["items"] as $item) {
        $cards .= '<!-- wp:group {"metadata":{"name":"Card"},"className":"feature-card' . ($stacked ? " is-stacked" : "") . '","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|50"}},"backgroundColor":"' . $card_bg . '","layout":' . $card_layout . '} -->
<div class="wp-block-group feature-card' . ($stacked ? " is-stacked" : "") . ' has-' . $card_bg . '-background-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:group {"metadata":{"name":"Icon"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"backgroundColor":"' . $icon_bg . '","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group has-' . $icon_bg . '-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:image {"width":"32px","height":"32px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . esc_url($item["icon"]) . '" alt="" style="width:32px;height:32px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Text"},"className":"feature-card__text","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":' . $text_layout . '} -->
<div class="wp-block-group feature-card__text"><!-- wp:heading {' . $align_attr . '"level":3,"fontSize":"h-5"} -->
<h3 class="wp-block-heading' . $align_class . ' has-h-5-font-size">' . esc_html($item["title"]) . '</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {' . ($stacked ? '"align":"center",' : "") . '"textColor":"gray-80"} -->
<p class="' . ($stacked ? "has-text-align-center " : "") . 'has-gray-80-color has-text-color">' . esc_html($item["text"]) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

';
    }

    $spacing = $tinted
        ? ['"padding":{"top":"clamp(40px, 5vw, 60px)","bottom":"clamp(40px, 5vw, 60px)","right":"var:preset|spacing|40","left":"var:preset|spacing|40"}', "padding-top:clamp(40px, 5vw, 60px);padding-right:var(--wp--preset--spacing--40);padding-bottom:clamp(40px, 5vw, 60px);padding-left:var(--wp--preset--spacing--40)"]
        : ['"margin":{"top":"var(--wp--custom--section-gap)","bottom":"var(--wp--custom--section-gap)"},"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}', "margin-top:var(--wp--custom--section-gap);margin-bottom:var(--wp--custom--section-gap);padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"];
    $bg = $args["section_bg"] ?? "light-gray";
    $section_bg = $tinted ? ',"backgroundColor":"' . $bg . '"' : "";
    $section_cls = $tinted ? " has-" . $bg . "-background-color has-background" : "";

    $button = "";
    if (!empty($args["button"])) {
        $button = '

<!-- wp:buttons {"className":"is-mobile-full","style":{"spacing":{"margin":{"top":"40px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons is-mobile-full" style="margin-top:40px"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="' . esc_url($args["button"]["url"]) . '">' . esc_html($args["button"]["label"]) . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->';
    }

    return '<!-- wp:group {"metadata":{"name":"Why choose us"},"align":"full","style":{"spacing":{' . $spacing[0] . ',"blockGap":"32px"}}' . $section_bg . ',"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull' . $section_cls . '" style="' . $spacing[1] . '"><!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">' . esc_html($args["title"]) . '</h2>
<!-- /wp:heading -->

<!-- wp:group {"metadata":{"name":"Cards"},"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"grid","columnCount":' . $columns . ',"minimumColumnWidth":"' . ($columns > 2 ? "280px" : "320px") . '"}} -->
<div class="wp-block-group">' . rtrim($cards) . '</div>
<!-- /wp:group -->' . $button . '</div>
<!-- /wp:group -->';
};
