<?php
/**
 * Pattern: Frequently asked questions - Construction.
 *
 * Heading + intro, core accordion (bordered cards, the open one grey, "+" turning into "x"),
 * and a "See more FAQs" outline button. Used on About and the service pages in the design.
 *
 * @package Medispace
 */

// The design only shows the answer of the open question; the others repeat it until real copy.
$medispace_answer = __("This can depend on the size of the project and the level of your experience. To avoid common pitfalls, liability for work accidents or misconduct and managing a second full time job it may be recommended to employ the knowledge of a company who does this type of work.", "medispace");
$medispace_questions = [
    __("What do you offer that is different from other companies?", "medispace"),
    __("Do I need to hire a company or can I manage the fit-out myself?", "medispace"),
    __("How long does an office fit-out take?", "medispace"),
    __("Do you have an Occupational, Health and Safety Policy?", "medispace"),
];
$medispace_open = 1;

$medispace_items = "";
foreach ($medispace_questions as $i => $question) {
    $open = $i === $medispace_open;
    $medispace_items .= '<!-- wp:accordion-item {' . ($open ? '"openByDefault":true,' : "") . '"style":{"spacing":{"padding":{"top":"clamp(16px, 2vw, 24px)","right":"clamp(16px, 2vw, 24px)","bottom":"clamp(16px, 2vw, 24px)","left":"clamp(16px, 2vw, 24px)"},"blockGap":"var:preset|spacing|40"},"border":{"width":"1px"}},"borderColor":"gray-20"} -->
<div class="wp-block-accordion-item' . ($open ? " is-open" : "") . ' has-border-color has-gray-20-border-color" style="border-width:1px;padding-top:clamp(16px, 2vw, 24px);padding-right:clamp(16px, 2vw, 24px);padding-bottom:clamp(16px, 2vw, 24px);padding-left:clamp(16px, 2vw, 24px)"><!-- wp:accordion-heading' . ($open ? ' {"openByDefault":true}' : "") . ' -->
<h3 class="wp-block-accordion-heading"><button type="button" class="wp-block-accordion-heading__toggle"><span class="wp-block-accordion-heading__toggle-title">' . esc_html($question) . '</span><span class="wp-block-accordion-heading__toggle-icon" aria-hidden="true">+</span></button></h3>
<!-- /wp:accordion-heading -->

<!-- wp:accordion-panel -->
<div role="region" class="wp-block-accordion-panel"><!-- wp:paragraph {"textColor":"gray-80"} -->
<p class="has-gray-80-color has-text-color">' . esc_html($medispace_answer) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:accordion-panel --></div>
<!-- /wp:accordion-item -->

';
}

return [
    "title" => __("Frequently asked questions - Construction", "medispace"),
    "categories" => ["medispace-construction", "text"],
    "keywords" => ["faq", "questions", "accordion"],
    "viewportWidth" => 1440,
    "content" =>
        '<!-- wp:group {"metadata":{"name":"FAQs"},"align":"full","className":"faq-section","style":{"spacing":{"margin":{"top":"var(--wp--custom--section-gap)","bottom":"var(--wp--custom--section-gap)"},"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"},"blockGap":"40px"}},"layout":{"type":"constrained","contentSize":"810px"}} -->
<div class="wp-block-group alignfull faq-section" style="margin-top:var(--wp--custom--section-gap);margin-bottom:var(--wp--custom--section-gap);padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"metadata":{"name":"Content"},"style":{"spacing":{"blockGap":"32px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:group {"metadata":{"name":"Head"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained","contentSize":"534px"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","align":"full"} -->
<h2 class="wp-block-heading alignfull has-text-align-center">' . esc_html__("Frequently asked questions", "medispace") . '</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"gray-80"} -->
<p class="has-text-align-center has-gray-80-color has-text-color">' . esc_html__("If you’ve got questions but you’re not ready to reach out just yet please review our list of frequently asked questions.", "medispace") . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:accordion {"autoclose":true,"className":"faq-list","style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
<div role="group" class="wp-block-accordion faq-list">' . rtrim($medispace_items) . '</div>
<!-- /wp:accordion --></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"is-mobile-full","layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons is-mobile-full"><!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="' . esc_url(home_url("/faq/")) . '">' . esc_html__("See more FAQs", "medispace") . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->',
];
