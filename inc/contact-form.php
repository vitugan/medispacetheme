<?php
/**
 * Medispace Theme: the theme's Contact Form 7 form.
 *
 * Patterns cannot hardcode a CF7 form id (it differs on every site), so the theme owns one form:
 * created on first use with the fields from the design, remembered in an option, and embedded in
 * patterns through medispace_contact_form_block().
 *
 * @package Medispace
 */

if (!function_exists("medispace_get_contact_form")):
    /**
     * @return WPCF7_ContactForm|null The theme form, created if missing; null without CF7.
     */
    function medispace_get_contact_form()
    {
        if (!class_exists("WPCF7_ContactForm")) {
            return null;
        }

        $id = (int) get_option("medispace_contact_form_id");
        if ($id && ($form = wpcf7_contact_form($id))) {
            return $form;
        }

        $form = WPCF7_ContactForm::get_template(["title" => __("MediSpace contact form", "medispace")]);
        $form->set_properties([
            "form" => implode("\n", [
                '<div class="medispace-form">',
                '<div class="medispace-form__row">[text* your-name autocomplete:name placeholder "' . __("Name", "medispace") . '"] [email* your-email autocomplete:email placeholder "' . __("Email", "medispace") . '"]</div>',
                '<div class="medispace-form__row">[tel your-phone autocomplete:tel placeholder "(123) 456 - 7890"] [text your-company autocomplete:organization placeholder "' . __("BRIX Agency", "medispace") . '"]</div>',
                '[textarea your-message placeholder "' . __("Type your message here...", "medispace") . '"]',
                '[submit "' . __("Submit", "medispace") . '"]',
                "</div>",
            ]),
        ]);
        $form->save();

        if ($form->id()) {
            update_option("medispace_contact_form_id", $form->id(), false);
            return $form;
        }

        return null;
    }
endif;

// The theme form lays its fields out with its own <div> grid; CF7's auto <p>/<br> would break it.
add_filter("wpcf7_autop_or_not", function ($autop) {
    $current = class_exists("WPCF7_ContactForm") ? WPCF7_ContactForm::get_current() : null;
    return $current && (int) $current->id() === (int) get_option("medispace_contact_form_id") ? false : $autop;
});

if (!function_exists("medispace_contact_form_block")):
    /**
     * Block markup embedding the theme form, or a hint when Contact Form 7 is not active.
     *
     * @return string
     */
    function medispace_contact_form_block()
    {
        $form = medispace_get_contact_form();

        if (!$form) {
            return '<!-- wp:paragraph {"textColor":"gray-80","fontSize":"body-s"} -->
<p class="has-gray-80-color has-text-color has-body-s-font-size">' . esc_html__("Install and activate Contact Form 7 to show the form here.", "medispace") . '</p>
<!-- /wp:paragraph -->';
        }

        $hash = $form->hash();
        $title = $form->title();

        return '<!-- wp:contact-form-7/contact-form-selector {"id":' . (int) $form->id() . ',"hash":"' . esc_attr($hash) . '","title":"' . esc_attr($title) . '","className":"medispace-contact-form"} -->
<div class="wp-block-contact-form-7-contact-form-selector medispace-contact-form">[contact-form-7 id="' . esc_attr($hash) . '" title="' . esc_attr($title) . '"]</div>
<!-- /wp:contact-form-7/contact-form-selector -->';
    }
endif;
