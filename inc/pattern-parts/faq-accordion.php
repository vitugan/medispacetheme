<?php
/**
 * Shared builder for FAQ accordions: core Accordion with the "faq-list" class (bordered cards,
 * the open one grey, "+" turning into "x"; styles in assets/css/patterns.css "FAQ").
 * Used by the FAQ section (About, service pages) and the FAQ page groups.
 *
 * Lives outside inc/patterns/ so the pattern auto-discovery does not register it.
 *
 * @package Medispace
 */

/**
 * @param array{questions:string[], answer:string|string[], open?:int|null} $args
 *
 * answer: one text for every question, or one per question.
 * open: index of the question open by default (none when null).
 * @return string wp:accordion block markup.
 */
return function (array $args) {
    $open_index = array_key_exists("open", $args) ? $args["open"] : 0;
    $items = "";
    foreach ($args["questions"] as $i => $question) {
        $answer = is_array($args["answer"]) ? $args["answer"][$i] : $args["answer"];
        $open = $i === $open_index;
        $items .= '<!-- wp:accordion-item {' . ($open ? '"openByDefault":true,' : "") . '"style":{"spacing":{"padding":{"top":"clamp(16px, 2vw, 24px)","right":"clamp(16px, 2vw, 24px)","bottom":"clamp(16px, 2vw, 24px)","left":"clamp(16px, 2vw, 24px)"},"blockGap":"var:preset|spacing|40"},"border":{"width":"1px"}},"borderColor":"gray-20"} -->
<div class="wp-block-accordion-item' . ($open ? " is-open" : "") . ' has-border-color has-gray-20-border-color" style="border-width:1px;padding-top:clamp(16px, 2vw, 24px);padding-right:clamp(16px, 2vw, 24px);padding-bottom:clamp(16px, 2vw, 24px);padding-left:clamp(16px, 2vw, 24px)"><!-- wp:accordion-heading' . ($open ? ' {"openByDefault":true}' : "") . ' -->
<h3 class="wp-block-accordion-heading"><button type="button" class="wp-block-accordion-heading__toggle"><span class="wp-block-accordion-heading__toggle-title">' . esc_html($question) . '</span><span class="wp-block-accordion-heading__toggle-icon" aria-hidden="true">+</span></button></h3>
<!-- /wp:accordion-heading -->

<!-- wp:accordion-panel -->
<div role="region" class="wp-block-accordion-panel"><!-- wp:paragraph {"textColor":"gray-80"} -->
<p class="has-gray-80-color has-text-color">' . esc_html($answer) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:accordion-panel --></div>
<!-- /wp:accordion-item -->

';
    }

    return '<!-- wp:accordion {"autoclose":true,"className":"faq-list","style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
<div role="group" class="wp-block-accordion faq-list">' . rtrim($items) . '</div>
<!-- /wp:accordion -->';
};
