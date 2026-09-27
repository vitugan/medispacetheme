<?php
/**
 * Shared builder for inner-page heroes (About, Services, service pages, Blog, FAQ, Portfolio,
 * Contact): photo under an 80% black overlay, heading and intro aligned left in the wide column.
 *
 * Text sits at the top: 40px below it at least, and the hero is at least 482px tall on desktop
 * (assets/css/patterns.css), like every inner-page banner in the design.
 *
 * Two modes:
 * - static:  title, text and image are written into the markup (archive heroes: an archive has
 *            no page to take them from);
 * - dynamic: the cover uses the featured image, the heading is the post title and the intro is
 *            the manual excerpt (hidden when empty, see inc/page-hero.php) - one hero for every
 *            page on the "Page with hero" template.
 *
 * The page template's overlay header sits on top of it on desktop; the extra top offset for the
 * fixed header comes from assets/css/patterns.css (header.is-overlay + main ...).
 *
 * Lives outside inc/patterns/ so the pattern auto-discovery does not register it.
 *
 * @package Medispace
 */

/**
 * @param array{
 *     title?:string, text?:string, image?:string, breadcrumbs?:bool, dynamic?:bool,
 *     variant?:"dark"|"light", button?:array{label:string, url:string}
 * } $args
 *
 * breadcrumbs: core Breadcrumbs block ("Home → Services") above the heading.
 * variant: "dark" (80% black overlay, white text; default) or "light" (80% white overlay, dark
 * text, blue crumb links - service pages; the header needs the "is-on-light" class there).
 * button: primary button under the title instead of the intro text (service pages).
 * @return string Block markup.
 */
return function (array $args) {
    $dynamic = !empty($args["dynamic"]);
    $light = ($args["variant"] ?? "dark") === "light";
    $button = $args["button"] ?? null;

    if ($dynamic) {
        $heading = '<!-- wp:post-title {"level":1,"style":{"typography":{"fontWeight":"500"}},"fontSize":"h-1"} /-->';
        if (!$button) {
            $heading .= '

<!-- wp:post-excerpt {"className":"page-hero__text"} /-->';
        }
    } else {
        $heading = '<!-- wp:heading {"level":1,"style":{"typography":{"fontWeight":"500"}},"fontSize":"h-1"} -->
<h1 class="wp-block-heading has-h-1-font-size" style="font-weight:500">' . esc_html($args["title"]) . '</h1>
<!-- /wp:heading -->';
        if (!empty($args["text"])) {
            $heading .= '

<!-- wp:paragraph {"className":"page-hero__text"} -->
<p class="page-hero__text">' . esc_html($args["text"]) . '</p>
<!-- /wp:paragraph -->';
        }
    }

    if ($button) {
        $heading .= '

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="' . esc_url($button["url"]) . '">' . esc_html($button["label"]) . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->';
    }

    // With breadcrumbs the heading and intro keep their 16px gap (24px to a button) and the
    // crumbs sit 12px above.
    $inner_gap = $button ? "var:preset|spacing|50" : "var:preset|spacing|40";
    if (!empty($args["breadcrumbs"])) {
        $heading = '<!-- wp:breadcrumbs {"separator":"→","className":"page-hero__breadcrumbs","fontSize":"body-s"} /-->

<!-- wp:group {"metadata":{"name":"Heading"},"style":{"spacing":{"blockGap":"' . $inner_gap . '"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group">' . $heading . '</div>
<!-- /wp:group -->';
    }
    $gap = empty($args["breadcrumbs"]) ? $inner_gap : "12px";

    $overlay_attr = $light ? '"overlayColor":"white",' : '"customOverlayColor":"#000000",';
    $overlay_span = $light
        ? '<span aria-hidden="true" class="wp-block-cover__background has-white-background-color has-background-dim-80 has-background-dim"></span>'
        : '<span aria-hidden="true" class="wp-block-cover__background has-background-dim-80 has-background-dim" style="background-color:#000000"></span>';
    $text_color = $light ? "gray-100" : "white";
    $class = "page-hero" . ($light ? " is-light" : "");

    if ($dynamic) {
        $image_attr = '"useFeaturedImage":true,';
        $image_tag = "";
    } else {
        $image = esc_url($args["image"]);
        $image_attr = '"url":"' . $image . '",';
        $image_tag = '<img class="wp-block-cover__image-background" alt="" src="' . $image . '" data-object-fit="cover"/>';
    }

    return '<!-- wp:cover {' . $image_attr . '"dimRatio":80,' . $overlay_attr . '"isUserOverlayColor":true,"contentPosition":"top left","isDark":' . ($light ? "false" : "true") . ',"metadata":{"name":"Page hero"},"align":"full","className":"' . $class . '","style":{"spacing":{"padding":{"top":"clamp(40px, 6.25vw, 120px)","right":"var:preset|spacing|40","bottom":"40px","left":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover' . ($light ? " is-light" : "") . ' alignfull has-custom-content-position is-position-top-left ' . $class . '" style="padding-top:clamp(40px, 6.25vw, 120px);padding-right:var(--wp--preset--spacing--40);padding-bottom:40px;padding-left:var(--wp--preset--spacing--40)">' . $image_tag . '' . $overlay_span . '<div class="wp-block-cover__inner-container"><!-- wp:group {"metadata":{"name":"Text"},"align":"wide","style":{"spacing":{"blockGap":"' . $gap . '"}},"textColor":"' . $text_color . '","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group alignwide has-' . $text_color . '-color has-text-color">' . $heading . '</div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->';
};
