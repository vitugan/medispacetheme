<?php
/**
 * Shared builder for "Content section" patterns: image + heading, text and optional button.
 *
 * The design repeats this section on many pages with the image on either side and with or
 * without a button. Columns stack on mobile in source order, so an image-right section shows
 * its text first on mobile, as in the design.
 *
 * Lives outside inc/patterns/ so the pattern auto-discovery does not register it.
 *
 * @package Medispace
 */

/**
 * @param array{
 *     title:string,
 *     paragraphs:array<string|array{text:string, bold?:bool}|array{list:string[]}>,
 *     image:string,
 *     image_alt?:string,
 *     image_position?:"left"|"right",
 *     button?:array{label:string, url:string}
 * } $args
 *
 * paragraphs: plain strings, ["text" => ..., "bold" => true] for a bold paragraph, or
 * ["list" => [...]] for a check list (core List, "Check list" style from inc/block-styles.php).
 * @return string Block markup.
 */
return function (array $args) {
    $paragraphs = "";
    foreach ($args["paragraphs"] as $item) {
        if (is_array($item) && isset($item["list"])) {
            $items = "";
            foreach ($item["list"] as $li) {
                $items .= '<!-- wp:list-item -->
<li>' . esc_html($li) . '</li>
<!-- /wp:list-item -->';
            }
            $paragraphs .= '<!-- wp:list {"className":"is-style-check","textColor":"gray-80"} -->
<ul class="wp-block-list is-style-check has-gray-80-color has-text-color">' . $items . '</ul>
<!-- /wp:list -->

';
            continue;
        }

        $text = is_array($item) ? $item["text"] : $item;
        $bold = is_array($item) && !empty($item["bold"]);
        $paragraphs .= $bold
            ? '<!-- wp:paragraph {"style":{"typography":{"fontWeight":"700"}},"textColor":"gray-80"} -->
<p class="has-gray-80-color has-text-color" style="font-weight:700">' . esc_html($text) . '</p>
<!-- /wp:paragraph -->

'
            : '<!-- wp:paragraph {"textColor":"gray-80"} -->
<p class="has-gray-80-color has-text-color">' . esc_html($text) . '</p>
<!-- /wp:paragraph -->

';
    }

    $button = "";
    if (!empty($args["button"])) {
        $button = '

<!-- wp:buttons {"className":"is-mobile-full"} -->
<div class="wp-block-buttons is-mobile-full"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="' . esc_url($args["button"]["url"]) . '">' . esc_html($args["button"]["label"]) . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->';
    }

    $image = '<!-- wp:column {"verticalAlignment":"center","width":"52%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:52%"><!-- wp:image {"aspectRatio":"5/4","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="' . esc_url($args["image"]) . '" alt="' . esc_attr($args["image_alt"] ?? "") . '" style="aspect-ratio:5/4;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->';

    $text = '<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"metadata":{"name":"Content"},"style":{"spacing":{"blockGap":"clamp(30px, 3vw, 40px)"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:group {"metadata":{"name":"Text"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:heading -->
<h2 class="wp-block-heading">' . esc_html($args["title"]) . '</h2>
<!-- /wp:heading -->

' . rtrim($paragraphs) . '</div>
<!-- /wp:group -->' . $button . '</div>
<!-- /wp:group --></div>
<!-- /wp:column -->';

    $columns = ($args["image_position"] ?? "left") === "right" ? $text . "\n\n" . $image : $image . "\n\n" . $text;

    return '<!-- wp:group {"metadata":{"name":"Content section"},"align":"full","style":{"spacing":{"margin":{"top":"var(--wp--custom--section-gap)","bottom":"var(--wp--custom--section-gap)"},"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:var(--wp--custom--section-gap);margin-bottom:var(--wp--custom--section-gap);padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"30px","left":"60px"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center">' . $columns . '</div>
<!-- /wp:columns --></div>
<!-- /wp:group -->';
};
