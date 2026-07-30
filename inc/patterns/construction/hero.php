<?php

return [
    "title" => __("Hero - Construction", "medispace"),
    "categories" => ["medispace-construction"],
    // 'inserter' => false,
    "content" =>
        '<!-- wp:group {"metadata":{"name":"Home hero"},"className":"home-hero","align":"full","style":{"spacing":{"padding":{"top":"0px","bottom":"0px"},"margin":{"top":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull home-hero" style="margin-top:0px;padding-top:0px;padding-bottom:0px"><!-- wp:cover {"url":"' .
        MEDISPACE_THEME_URL .
        '/assets/images/construction/hero/hero.webp","id":472,"dimRatio":0,"customOverlayColor":"#475663","isUserOverlayColor":false,"sizeSlug":"large","align":"full","style":{"spacing":{"padding":{"bottom":"0px","top":"150px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-cover alignfull" style="padding-top:150px;padding-bottom:0px"><img class="wp-block-cover__image-background wp-image-472 size-large" alt="" src="' .
        MEDISPACE_THEME_URL .
        '/assets/images/construction/hero/hero.webp" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#475663"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":1,"style":{"typography":{"textAlign":"center"}},"fontSize":"large"} -->
<h1 class="wp-block-heading has-text-align-center has-large-font-size">Designing &amp; managing <br>healthcare-grade spaces</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background"} -->
<p class="has-text-align-center has-background-color has-text-color has-link-color">We\'re here to help you create your dream workspace without <br>traditional upfront costs or long-term leases.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Talk to an expert</a></div>
<!-- /wp:button -->

<!-- wp:button {"textColor":"background","className":"is-style-outline","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"borderColor":"background"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-background-color has-text-color has-link-color has-border-color has-background-border-color wp-element-button">View portfolio</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"color":{"background":"#ffffff61"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
<div class="wp-block-group alignfull has-background hero-line" style="background-color:#ffffff61"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="' .
        MEDISPACE_THEME_URL .
        '/assets/images/construction/hero/icon-process.svg" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"18px","fontStyle":"normal","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|dark-gray"}}}},"textColor":"dark-gray"} -->
<p class="has-dark-gray-color has-text-color has-link-color" style="font-size:18px;font-style:normal;font-weight:700">Simple process</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="' .
        MEDISPACE_THEME_URL .
        '/assets/images/construction/hero/icon-money.svg" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"18px","fontStyle":"normal","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|dark-gray"}}}},"textColor":"dark-gray"} -->
<p class="has-dark-gray-color has-text-color has-link-color" style="font-size:18px;font-style:normal;font-weight:700">Transparent pricing</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="' .
        MEDISPACE_THEME_URL .
        '/assets/images/construction/hero/icon-mark.svg" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"18px","fontStyle":"normal","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|dark-gray"}}}},"textColor":"dark-gray"} -->
<p class="has-dark-gray-color has-text-color has-link-color" style="font-size:18px;font-style:normal;font-weight:700">Licensed &amp; certified</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->',
];
