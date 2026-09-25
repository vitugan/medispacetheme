<?php
/**
 * Pattern: Hero - Medical
 *
 * @package Medispace
 */

$hero_photo_url = esc_url(
    MEDISPACE_THEME_URL . "/assets/images/medical/hero/hero-collage.png",
);
$badge_url = esc_url(
    MEDISPACE_THEME_URL . "/assets/images/medical/hero/trusted-badge.png",
);

return [
    "title" => __("Hero - Medical", "medispace"),
    "categories" => ["medispace-medical"],
    "content" =>
        '<!-- wp:group {"align":"full","backgroundColor":"light-blue","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|10","left":"var:preset|spacing|100","right":"var:preset|spacing|100"}}},"layout":{"type":"constrained","contentSize":"1640px"}} -->
<div class="wp-block-group alignfull has-light-blue-background-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--100);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--100)">

	<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"64px","top":"32px"}}}} -->
	<div class="wp-block-columns are-vertically-aligned-center">

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">

			<!-- wp:heading {"level":1,"fontSize":"h-1"} -->
			<h1 class="wp-block-heading has-h-1-font-size">Flexible Medical &amp; Therapy Office Spaces for Rent</h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"body-m","style":{"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|50"}}}} -->
			<p class="has-body-m-font-size" style="margin-top:var(--wp--preset--spacing--40);margin-bottom:var(--wp--preset--spacing--50)">Rent private exam rooms &#8211; daily, weekly, monthly, or annual medical office rentals</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"fontSize":"button"} -->
				<div class="wp-block-button has-button-font-size">
					<a class="wp-block-button__link has-button-font-size has-custom-font-size wp-element-button" href="#">Schedule Tour</a>
				</div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">

			<!-- wp:image {"style":{"border":{"radius":"30px"}},"className":"medispace-hero-photo"} -->
			<figure class="wp-block-image medispace-hero-photo has-custom-border">
				<img src="' .
        $hero_photo_url .
        '" alt="Медичний кабінет" style="border-radius:30px" />
			</figure>
			<!-- /wp:image -->

			<!-- wp:image {"className":"medispace-hero-badge"} -->
			<figure class="wp-block-image medispace-hero-badge">
				<img src="' .
        $badge_url .
        '" alt="Trusted by 100+ doctors and therapists" />
			</figure>
			<!-- /wp:image -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- wp:group {"backgroundColor":"white","style":{"spacing":{"margin":{"top":"-40px"},"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}},"border":{"radius":{"topRight":"80px"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group has-white-background-color has-background" style="border-top-right-radius:80px;margin-top:-40px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">

		<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"50px"}}}} -->
		<div class="wp-block-columns">

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:heading {"level":3,"fontSize":"h-3","textColor":"primary"} -->
				<h3 class="wp-block-heading has-primary-color has-text-color has-h-3-font-size">100+</h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"fontSize":"body-s"} -->
				<p class="has-body-s-font-size">Healthcare providers launch their practices</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:heading {"level":3,"fontSize":"h-3","textColor":"primary"} -->
				<h3 class="wp-block-heading has-primary-color has-text-color has-h-3-font-size">95%</h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"fontSize":"body-s"} -->
				<p class="has-body-s-font-size">Satisfaction rate from our clients</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:heading {"level":3,"fontSize":"h-3","textColor":"primary"} -->
				<h3 class="wp-block-heading has-primary-color has-text-color has-h-3-font-size">200+</h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"fontSize":"body-s"} -->
				<p class="has-body-s-font-size">Fully stocked exam rooms</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

		</div>
		<!-- /wp:columns -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->',
];
