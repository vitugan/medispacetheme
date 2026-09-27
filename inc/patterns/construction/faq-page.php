<?php
/**
 * Pattern: FAQ page - Construction.
 *
 * Question groups (heading + accordion, anchored) and a "Categories" navigation: core Details
 * with a list of links to the groups. Desktop: a sticky column on the right, always open, the
 * group in view highlighted; phones: a collapsed dropdown above the questions
 * (assets/js/faq-nav.js, styles in assets/css/patterns.css "FAQ page").
 *
 * @package Medispace
 */

$medispace_faq_accordion = require MEDISPACE_THEME_PATH . "/inc/pattern-parts/faq-accordion.php";

// The design only shows the answer of the first question; the others repeat it until real copy.
$medispace_answer = __("Costs vary widely based on size, complexity, and materials. We provide transparent, detailed quotes to help you understand the investment and avoid surprises.", "medispace");

$medispace_groups = [
    "pricing" => [__("Pricing", "medispace"), [
        __("What are the typical costs for a medical fit-out?", "medispace"),
        __("Do you offer financing options for fit-out projects?", "medispace"),
        __("Are there any hidden costs I should be aware of?", "medispace"),
        __("How can I reduce the cost of my medical fit-out?", "medispace"),
    ]],
    "project-stages" => [__("Project stages", "medispace"), [
        __("What are the key stages of a fit-out project?", "medispace"),
        __("How do you handle project approvals and permits?", "medispace"),
        __("How do you manage communication during the project?", "medispace"),
        __("What happens after the fit-out is complete?", "medispace"),
    ]],
    "fit-out-budget" => [__("Fit-out budget", "medispace"), [
        __("How can I create a realistic fit-out budget?", "medispace"),
        __("What factors affect the overall cost of a fit-out?", "medispace"),
        __("Are there ways to phase the fit-out to manage costs?", "medispace"),
        __("What are the penalties for exceeding the budget?", "medispace"),
    ]],
    "design" => [__("Design", "medispace"), [
        __("How can I create a welcoming and functional space?", "medispace"),
        __("What design trends are popular in medical spaces?", "medispace"),
        __("How do you incorporate technology into the design?", "medispace"),
        __("Can you help me with branding and signage?", "medispace"),
    ]],
];

$medispace_sections = "";
$medispace_links = "";
$medispace_first = true;
foreach ($medispace_groups as $anchor => [$title, $questions]) {
    $medispace_sections .= '<!-- wp:group {"metadata":{"name":"' . esc_attr($title) . '"},"anchor":"' . $anchor . '","className":"faq-group","style":{"spacing":{"blockGap":"32px"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div id="' . $anchor . '" class="wp-block-group faq-group"><!-- wp:heading -->
<h2 class="wp-block-heading">' . esc_html($title) . '</h2>
<!-- /wp:heading -->

' . $medispace_faq_accordion(["questions" => $questions, "answer" => $medispace_answer, "open" => $medispace_first ? 0 : null]) . '</div>
<!-- /wp:group -->

';
    $medispace_links .= '<!-- wp:list-item -->
<li><a href="#' . $anchor . '">' . esc_html($title) . '</a></li>
<!-- /wp:list-item -->';
    $medispace_first = false;
}

return [
    "title" => __("FAQ page - Construction", "medispace"),
    "categories" => ["medispace-construction", "text"],
    "keywords" => ["faq", "questions", "accordion", "categories"],
    "viewportWidth" => 1440,
    "content" =>
        '<!-- wp:group {"metadata":{"name":"FAQ"},"align":"full","style":{"spacing":{"margin":{"top":"clamp(40px, 4.17vw, 80px)","bottom":"var(--wp--custom--section-gap)"},"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:clamp(40px, 4.17vw, 80px);margin-bottom:var(--wp--custom--section-gap);padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"metadata":{"name":"Columns"},"align":"wide","className":"faq-page","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide faq-page"><!-- wp:details {"className":"faq-nav","fontSize":"body-m"} -->
<details class="wp-block-details faq-nav has-body-m-font-size"><summary>' . esc_html__("Categories", "medispace") . '</summary><!-- wp:list {"className":"faq-nav__list"} -->
<ul class="wp-block-list faq-nav__list">' . $medispace_links . '</ul>
<!-- /wp:list --></details>
<!-- /wp:details -->

<!-- wp:group {"metadata":{"name":"Questions"},"className":"faq-groups","style":{"spacing":{"blockGap":"var:preset|spacing|fluid-80"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group faq-groups">' . rtrim($medispace_sections) . '</div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
];
