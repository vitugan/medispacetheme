<?php
/**
 * Pattern: Project case - Construction (starter content for a new project).
 *
 * Offered in the "Choose a pattern" dialog when a project is created (blockTypes
 * core/post-content + postTypes project); the hero (breadcrumbs, title, excerpt) and the footer
 * come from the single project template. Design: Project_Case_Template (Burch Dental Spa).
 *
 * The specifications table is plain content (the MediSpace Core project fields have no
 * location / area / timeline): edit the values in place.
 *
 * @package Medispace
 */

$medispace_icons = MEDISPACE_THEME_URL . "/assets/images/construction/projects";

$medispace_spec = function ($icon, $label, $value) use ($medispace_icons) {
    return '<!-- wp:group {"metadata":{"name":"' . esc_attr($label) . '"},"className":"project-specs__row","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group project-specs__row"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:image {"width":"32px","height":"32px","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full is-resized"><img src="' . esc_url($medispace_icons . "/icon-" . $icon . ".svg") . '" alt="" style="width:32px;height:32px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>' . esc_html($label) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"align":"right"} -->
<p class="has-text-align-right">' . esc_html($value) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->';
};

$medispace_rule = '<!-- wp:separator {"className":"is-style-wide","backgroundColor":"gray-80"} -->
<hr class="wp-block-separator has-text-color has-gray-80-color has-alpha-channel-opacity has-gray-80-background-color has-background is-style-wide"/>
<!-- /wp:separator -->';

$medispace_list = function (array $items) {
    $li = "";
    foreach ($items as $item) {
        $li .= '<!-- wp:list-item -->
<li>' . esc_html($item) . '</li>
<!-- /wp:list-item -->';
    }
    return '<!-- wp:list {"className":"is-style-check project-list"} -->
<ul class="wp-block-list is-style-check project-list">' . $li . '</ul>
<!-- /wp:list -->';
};

return [
    "title" => __("Project case - Construction", "medispace"),
    "description" => __("Specifications, main goals, scope of work and a wide photo.", "medispace"),
    "categories" => ["medispace-construction", "portfolio"],
    "keywords" => ["project", "case", "portfolio", "specifications"],
    "blockTypes" => ["core/post-content"],
    "postTypes" => ["project"],
    "viewportWidth" => 1440,
    "content" =>
        '<!-- wp:group {"metadata":{"name":"Project case"},"align":"full","className":"project-case","style":{"spacing":{"margin":{"top":"var:preset|spacing|fluid-80","bottom":"var(--wp--custom--section-gap)"},"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|fluid-80"}},"layout":{"type":"constrained","contentSize":"810px","wideSize":"1362px"}} -->
<div class="wp-block-group alignfull project-case" style="margin-top:var(--wp--preset--spacing--fluid-80);margin-bottom:var(--wp--custom--section-gap);padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:group {"metadata":{"name":"Specifications"},"className":"project-specs","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","right":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|40"}},"backgroundColor":"gray-100","textColor":"white","fontSize":"body-l","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group project-specs has-white-color has-gray-100-background-color has-text-color has-background has-body-l-font-size" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)">' .
        $medispace_spec("type", __("Type", "medispace"), __("Dental Practice", "medispace")) . "\n\n" . $medispace_rule . "\n\n" .
        $medispace_spec("location", __("Location", "medispace"), __("Machesney Park, IL", "medispace")) . "\n\n" . $medispace_rule . "\n\n" .
        $medispace_spec("area", __("Square Footage", "medispace"), __("7000 SF", "medispace")) . "\n\n" . $medispace_rule . "\n\n" .
        $medispace_spec("timeline", __("Project Timeline", "medispace"), __("28 weeks", "medispace")) . '</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Main project goals"},"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:heading -->
<h2 class="wp-block-heading">' . esc_html__("Main project goals", "medispace") . '</h2>
<!-- /wp:heading -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:paragraph -->
<p>' . esc_html__("Craft a cutting-edge, streamlined environment for the new Burch Dental location in Machesney Park", "medispace") . '</p>
<!-- /wp:paragraph -->

' . $medispace_list([
            __("Create a modern, efficient space for Burch Dental Machesney Park location", "medispace"),
            __("Enhance the patient experience through custom design elements and attention to detail in order to achieve combination of stylish modern and welcoming ambiance", "medispace"),
            __("Optimize the floor plan for improved workflow and productivity, patient’s and team member’s comfort", "medispace"),
            __("Updating over-all building appearance transforming form outdated bricks to modern composite facade", "medispace"),
            __("Improvement of natural light exposure by adding additional windows for treatment rooms", "medispace"),
        ]) . '</div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Scope of work"},"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:heading -->
<h2 class="wp-block-heading">' . esc_html__("Scope of work", "medispace") . '</h2>
<!-- /wp:heading -->

' . $medispace_list([
            __("Layout design and in space virtual walk-through presentation", "medispace"),
            __("Interior design", "medispace"),
            __("Architectural drawings and permit application", "medispace"),
            __("Exterior build out, existing windows replacement and additional windows installation", "medispace"),
            __("Interior design and complete interior build-out", "medispace"),
            __("Central Nitrous Installation", "medispace"),
            __("Custom dental cabinetry design, fabrication, and installation", "medispace"),
            __("Custom reception desk design, fabrication, and installation", "medispace"),
            __("Custom office cabinetry and furniture design, fabrication, and installation", "medispace"),
            __("IT network and sound system wiring and installation", "medispace"),
        ]) . '</div>
<!-- /wp:group -->

<!-- wp:image {"aspectRatio":"1362/560","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"wide"} -->
<figure class="wp-block-image alignwide size-full"><img src="' . esc_url(MEDISPACE_THEME_URL . "/assets/images/construction/projects/burch-dental-spa.webp") . '" alt="' . esc_attr__("Treatment room of Burch Dental Spa", "medispace") . '" style="aspect-ratio:1362/560;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->',
];
