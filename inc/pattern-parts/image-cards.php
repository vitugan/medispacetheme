<?php
/**
 * Shared builder for static image cards: centered heading and intro, then a 3-column grid of
 * cards (photo, title, text) that look like the service cards (light-blue, 346:240 photo) but
 * are plain content, not a Query Loop - e.g. "Types of custom cabinets we produce".
 * Styles: assets/css/patterns.css ("Service cards").
 *
 * Lives outside inc/patterns/ so the pattern auto-discovery does not register it.
 *
 * @package Medispace
 */

/**
 * @param array{
 *     title:string,
 *     text?:string,
 *     items:array<array{image:string, title:string, text:string}>
 * } $args
 * @return string Block markup.
 */
return function (array $args) {
    $cards = "";
    foreach ($args["items"] as $item) {
        $cards .= '<!-- wp:group {"metadata":{"name":"Card"},"className":"service-card","style":{"spacing":{"blockGap":"0"}},"backgroundColor":"light-blue","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group service-card has-light-blue-background-color has-background"><!-- wp:image {"aspectRatio":"346/240","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="' . esc_url($item["image"]) . '" alt="' . esc_attr($item["title"]) . '" style="aspect-ratio:346/240;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:group {"metadata":{"name":"Text"},"className":"service-card__text","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group service-card__text" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:heading {"level":3,"fontSize":"h-5"} -->
<h3 class="wp-block-heading has-h-5-font-size">' . esc_html($item["title"]) . '</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"gray-80","fontSize":"body-s"} -->
<p class="has-gray-80-color has-text-color has-body-s-font-size">' . esc_html($item["text"]) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

';
    }

    $text = "";
    if (!empty($args["text"])) {
        $text = '

<!-- wp:paragraph {"align":"center","textColor":"gray-80"} -->
<p class="has-text-align-center has-gray-80-color has-text-color">' . esc_html($args["text"]) . '</p>
<!-- /wp:paragraph -->';
    }

    return '<!-- wp:group {"metadata":{"name":"Image cards"},"align":"full","style":{"spacing":{"margin":{"top":"var(--wp--custom--section-gap)","bottom":"var(--wp--custom--section-gap)"},"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"},"blockGap":"32px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:var(--wp--custom--section-gap);margin-bottom:var(--wp--custom--section-gap);padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"metadata":{"name":"Head"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"534px"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">' . esc_html($args["title"]) . '</h2>
<!-- /wp:heading -->' . $text . '</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Cards"},"className":"image-cards","style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"280px"}} -->
<div class="wp-block-group image-cards">' . rtrim($cards) . '</div>
<!-- /wp:group --></div>
<!-- /wp:group -->';
};
