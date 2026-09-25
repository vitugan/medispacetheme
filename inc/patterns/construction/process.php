<?php
/**
 * Pattern: Our process - Construction.
 *
 * Heading + intro, then an image beside a core accordion of steps (first one open).
 * Used on Home and Single Service in the design with the same content.
 *
 * @package Medispace
 */

// The design only has copy for step 1; the other panels repeat it until real copy is provided.
$medispace_step_text = __("Our first meeting will be to identify your requirements, discuss your scope of work in detail and agree on a budget.", "medispace");
$medispace_steps = [
    __("Step 1. Discuss your project", "medispace"),
    __("Step 2. Design and space planning", "medispace"),
    __("Step 3. Apply for a Building Permit", "medispace"),
    __("Step 4. Commencement of project", "medispace"),
    __("Step 5. Completion of project", "medispace"),
];

$medispace_items = "";
foreach ($medispace_steps as $i => $title) {
    $open = 0 === $i ? '{"openByDefault":true}' : "";
    $item_attrs = '{' . (0 === $i ? '"openByDefault":true,' : "") . '"style":{"spacing":{"padding":{"top":"clamp(16px, 2vw, 24px)","right":"clamp(16px, 2vw, 24px)","bottom":"clamp(16px, 2vw, 24px)","left":"clamp(16px, 2vw, 24px)"},"blockGap":"clamp(16px, 2vw, 24px)"}},"backgroundColor":"light-gray"}';
    $medispace_items .= '<!-- wp:accordion-item ' . $item_attrs . ' -->
<div class="wp-block-accordion-item' . (0 === $i ? " is-open" : "") . ' has-light-gray-background-color has-background" style="padding-top:clamp(16px, 2vw, 24px);padding-right:clamp(16px, 2vw, 24px);padding-bottom:clamp(16px, 2vw, 24px);padding-left:clamp(16px, 2vw, 24px)"><!-- wp:accordion-heading' . ($open ? " " . $open : "") . ' -->
<h3 class="wp-block-accordion-heading"><button type="button" class="wp-block-accordion-heading__toggle"><span class="wp-block-accordion-heading__toggle-title">' . esc_html($title) . '</span><span class="wp-block-accordion-heading__toggle-icon" aria-hidden="true">+</span></button></h3>
<!-- /wp:accordion-heading -->

<!-- wp:accordion-panel -->
<div role="region" class="wp-block-accordion-panel"><!-- wp:paragraph {"textColor":"gray-80"} -->
<p class="has-gray-80-color has-text-color">' . esc_html($medispace_step_text) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:accordion-panel --></div>
<!-- /wp:accordion-item -->

';
}

return [
    "title" => __("Our process - Construction", "medispace"),
    "categories" => ["medispace-construction", "text"],
    "keywords" => ["process", "steps", "accordion", "faq"],
    "viewportWidth" => 1440,
    "content" =>
        '<!-- wp:group {"metadata":{"name":"Our process"},"align":"full","className":"process-section","style":{"spacing":{"margin":{"top":"var(--wp--custom--section-gap)","bottom":"var(--wp--custom--section-gap)"},"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"},"blockGap":"clamp(24px, 2.5vw, 32px)"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull process-section" style="margin-top:var(--wp--custom--section-gap);margin-bottom:var(--wp--custom--section-gap);padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"metadata":{"name":"Head"},"className":"process-head","style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"513px","justifyContent":"left"}} -->
<div class="wp-block-group process-head"><!-- wp:heading -->
<h2 class="wp-block-heading">' . esc_html__("Our process", "medispace") . '</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"gray-80"} -->
<p class="has-gray-80-color has-text-color">' . esc_html__("Experience a seamless, stress-free medical office transformation process with our step-by-step approach, designed to create a modern, efficient, and inviting space tailored exclusively to your vision and needs.", "medispace") . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"24px","left":"40px"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"width":"47.4%"} -->
<div class="wp-block-column" style="flex-basis:47.4%"><!-- wp:image {"aspectRatio":"515/534","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="' . esc_url(MEDISPACE_THEME_URL . "/assets/images/construction/process/reception.webp") . '" alt="' . esc_attr__("Medical office reception", "medispace") . '" style="aspect-ratio:515/534;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:accordion {"autoclose":true,"className":"process-steps","style":{"spacing":{"blockGap":"clamp(16px, 2vw, 24px)"}}} -->
<div role="group" class="wp-block-accordion process-steps">' . rtrim($medispace_items) . '</div>
<!-- /wp:accordion --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
];
