<?php
/**
 * Title: Construction - Home - Call to Action
 * Slug: {{TEXT_DOMAIN}}/construction-home-cta
 * Categories: call-to-action
 * Keywords: cta, contact, construction
 * Viewport Width: 1440
 */
?>
<!-- wp:group {"metadata":{"name":"Call to Action"},"align":"full","backgroundColor":"gray-100","textColor":"white","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"},"blockGap":"40px"}},"layout":{"type":"constrained","contentSize":"534px"}} -->
<div class="wp-block-group alignfull has-white-color has-gray-100-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)"><!-- wp:group {"metadata":{"name":"Content"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center"><?php echo esc_html_x( 'Not sure where to start?', 'CTA heading', '{{TEXT_DOMAIN}}' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><?php echo esc_html_x( 'Reach out to us!', 'CTA description', '{{TEXT_DOMAIN}}' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html_x( 'Contact us', 'CTA button label', '{{TEXT_DOMAIN}}' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->