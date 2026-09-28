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
 *     items:array<array{icon:string, title?:string, text:string}>,
 *     variant?:"tinted"|"plain",
 *     columns?:int,
 *     stacked?:bool,
 *     section_bg?:string,
 *     button?:array{label:string, url:string, padding_x?:string},
 *     icon_tile?:bool,
 *     icon_size?:int,
 *     card_padding_y?:string,
 *     card_gap?:string
 * } $args
 *
 * columns: cards per row on wide screens (2 by default); stacked: icon above centered text
 * (Values) instead of icon beside the text; section_bg: palette slug of a tinted section
 * (light-gray by default); button: optional CTA under the cards; icon_tile: false when the icon
 * file already contains its tile (Medical), shown at icon_size px (72 by default);
 * card_padding_y / card_gap: card top-bottom padding and icon-text gap (block style values,
 * 24px presets by default).
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

    $icon_tile = $args["icon_tile"] ?? true;
    $icon_size = (int) ($args["icon_size"] ?? 72);
    $pad_y = $args["card_padding_y"] ?? "var:preset|spacing|50";
    $pad_y_css = str_starts_with($pad_y, "var:preset|spacing|") ? "var(--wp--preset--spacing--" . substr($pad_y, 19) . ")" : $pad_y;
    $card_gap = $args["card_gap"] ?? "var:preset|spacing|50";

    $cards = "";
    foreach ($args["items"] as $item) {
        if ($icon_tile) {
            $icon = '<!-- wp:group {"metadata":{"name":"Icon"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"backgroundColor":"' . $icon_bg . '","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group has-' . $icon_bg . '-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:image {"width":"32px","height":"32px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . esc_url($item["icon"]) . '" alt="" style="width:32px;height:32px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->';
        } else {
            $icon = '<!-- wp:image {"width":"' . $icon_size . 'px","height":"' . $icon_size . 'px","sizeSlug":"full","linkDestination":"none","className":"feature-card__icon"} -->
<figure class="wp-block-image size-full is-resized feature-card__icon"><img src="' . esc_url($item["icon"]) . '" alt="" style="width:' . $icon_size . 'px;height:' . $icon_size . 'px"/></figure>
<!-- /wp:image -->';
        }

        $cards .= '<!-- wp:group {"metadata":{"name":"Card"},"className":"feature-card' . ($stacked ? " is-stacked" : "") . '","style":{"spacing":{"padding":{"top":"' . $pad_y . '","right":"var:preset|spacing|50","bottom":"' . $pad_y . '","left":"var:preset|spacing|50"},"blockGap":"' . $card_gap . '"}},"backgroundColor":"' . $card_bg . '","layout":' . $card_layout . '} -->
<div class="wp-block-group feature-card' . ($stacked ? " is-stacked" : "") . ' has-' . $card_bg . '-background-color has-background" style="padding-top:' . $pad_y_css . ';padding-right:var(--wp--preset--spacing--50);padding-bottom:' . $pad_y_css . ';padding-left:var(--wp--preset--spacing--50)">' . $icon . '

<!-- wp:group {"metadata":{"name":"Text"},"className":"feature-card__text","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":' . $text_layout . '} -->
<div class="wp-block-group feature-card__text">' . (empty($item["title"]) ? "" : '<!-- wp:heading {' . $align_attr . '"level":3,"fontSize":"h-5"} -->
<h3 class="wp-block-heading' . $align_class . ' has-h-5-font-size">' . esc_html($item["title"]) . '</h3>
<!-- /wp:heading -->

') . '<!-- wp:paragraph {' . ($stacked ? '"align":"center",' : "") . '"textColor":"gray-80"} -->
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
        // Optional side padding (fixed-width buttons in the Medical design).
        $pad_x = $args["button"]["padding_x"] ?? "";
        $button_open = $pad_x
            ? '<!-- wp:button {"style":{"spacing":{"padding":{"left":"' . $pad_x . '","right":"' . $pad_x . '"}}}} -->'
            : "<!-- wp:button -->";
        $button_style = $pad_x ? ' style="padding-right:' . $pad_x . ';padding-left:' . $pad_x . '"' : "";
        $button = '

<!-- wp:buttons {"className":"is-mobile-full","style":{"spacing":{"margin":{"top":"40px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons is-mobile-full" style="margin-top:40px">' . $button_open . '
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="' . esc_url($args["button"]["url"]) . '"' . $button_style . '>' . esc_html($args["button"]["label"]) . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->';
    }

    return '<!-- wp:group {"metadata":{"name":"Why choose us"},"align":"full","style":{"spacing":{' . $spacing[0] . ',"blockGap":"32px"}}' . $section_bg . ',"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull' . $section_cls . '" style="' . $spacing[1] . '"><!-- wp:heading {"textAlign":"center","className":"feature-cards__title"} -->
<h2 class="wp-block-heading has-text-align-center feature-cards__title">' . esc_html($args["title"]) . '</h2>
<!-- /wp:heading -->

<!-- wp:group {"metadata":{"name":"Cards"},"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"grid","columnCount":' . $columns . ',"minimumColumnWidth":"' . ($columns > 2 ? "280px" : "320px") . '"}} -->
<div class="wp-block-group">' . rtrim($cards) . '</div>
<!-- /wp:group -->' . $button . '</div>
<!-- /wp:group -->';
};
