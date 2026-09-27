<?php
/**
 * Medispace Theme: Flow Selector (admin setup screen)
 *
 * @package Medispace
 */

/**
 * 1. On theme activation, set a flag to show the welcome notice.
 */
add_action("after_switch_theme", function () {
    if (!medispace_get_active_flow()) {
        set_transient("medispace_show_flow_notice", true, WEEK_IN_SECONDS);
    }
});

/**
 * 2. Unobtrusive admin notice linking to the flow selection page.
 */
add_action("admin_notices", function () {
    if (!current_user_can("switch_themes")) {
        return;
    }

    if (!get_transient("medispace_show_flow_notice")) {
        return;
    }

    if (medispace_get_active_flow()) {
        delete_transient("medispace_show_flow_notice");
        return;
    }

    printf(
        '<div class="notice notice-info"><p>%s <a href="%s" class="button button-primary">%s</a></p></div>',
        esc_html__(
            "MediSpace: обери демо-дизайн для сайту, перш ніж продовжити.",
            "medispace",
        ),
        esc_url(admin_url("themes.php?page=medispace-setup")),
        esc_html__("Обрати демо", "medispace"),
    );
});

/**
 * 3. Register the Appearance → MediSpace Setup page.
 */
add_action("admin_menu", function () {
    add_theme_page(
        __("MediSpace Setup", "medispace"),
        __("MediSpace Setup", "medispace"),
        "switch_themes",
        "medispace-setup",
        "medispace_render_flow_selector_page",
    );
});

/**
 * 4. Render the flow selection page itself.
 */
function medispace_render_flow_selector_page()
{
    $flows = medispace_get_available_flows();
    $active_flow = medispace_get_active_flow();
    ?>
	<div class="wrap">
		<h1><?php esc_html_e("MediSpace — оберіть демо-дизайн", "medispace"); ?></h1>

		<?php if (isset($_GET["medispace_updated"])): ?>
			<div class="notice notice-success is-dismissible">
				<p><?php esc_html_e("Демо-дизайн активовано.", "medispace"); ?></p>
			</div>
		<?php endif; ?>

		<?php if (isset($_GET["medispace_styles_customized"], $_GET["flow"])): ?>
			<?php $blocked_flow = sanitize_key(wp_unslash($_GET["flow"])); ?>
			<div class="notice notice-warning">
				<p><?php esc_html_e(
        "Кольори/шрифти сайту було змінено вручну через Site Editor після останнього вибору демо. Header/Footer вже оновлені, але кольори не перезаписані, щоб не втратити твої зміни.",
        "medispace",
    ); ?></p>
				<form method="post" action="<?php echo esc_url(
        admin_url("admin-post.php"),
    ); ?>">
					<input type="hidden" name="action" value="medispace_set_flow" />
					<input type="hidden" name="flow" value="<?php echo esc_attr(
         $blocked_flow,
     ); ?>" />
					<input type="hidden" name="force" value="1" />
					<?php wp_nonce_field("medispace_set_flow_" . $blocked_flow); ?>
					<button type="submit" class="button">
						<?php esc_html_e("Все одно перезаписати кольори", "medispace"); ?>
					</button>
				</form>
			</div>
		<?php endif; ?>

		<div style="display:flex; gap:24px; flex-wrap:wrap; margin-top:24px;">
			<?php foreach ($flows as $flow_slug => $flow): ?>
				<div style="border:1px solid #ccd0d4; border-radius:8px; padding:20px; width:320px; background:#fff;">

					<h2 style="margin-top:0;">
						<?php echo esc_html($flow["label"]); ?>
						<?php if ($active_flow === $flow_slug): ?>
							<span style="font-size:12px; font-weight:normal; color:#2271b1;">
								(<?php esc_html_e("активний", "medispace"); ?>)
							</span>
						<?php endif; ?>
					</h2>

					<p><?php echo esc_html($flow["description"]); ?></p>

					<form method="post" action="<?php echo esc_url(
         admin_url("admin-post.php"),
     ); ?>">
						<input type="hidden" name="action" value="medispace_set_flow" />
						<input type="hidden" name="flow" value="<?php echo esc_attr($flow_slug); ?>" />
						<?php wp_nonce_field("medispace_set_flow_" . $flow_slug); ?>

						<button type="submit" class="button <?php echo $active_flow === $flow_slug
          ? ""
          : "button-primary"; ?>">
							<?php echo $active_flow === $flow_slug
           ? esc_html__("Активовано", "medispace")
           : esc_html__("Обрати цей флоу", "medispace"); ?>
						</button>
					</form>

				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<?php
}

/**
 * 5. Form handler — saves the option and applies the Style Variation.
 */
add_action("admin_post_medispace_set_flow", function () {
    if (!current_user_can("switch_themes")) {
        wp_die(esc_html__("Недостатньо прав.", "medispace"));
    }

    $flow_slug = isset($_POST["flow"])
        ? sanitize_key(wp_unslash($_POST["flow"]))
        : "";

    check_admin_referer("medispace_set_flow_" . $flow_slug);

    $flows = medispace_get_available_flows();

    if (!isset($flows[$flow_slug])) {
        wp_die(esc_html__("Невідомий флоу.", "medispace"));
    }

    update_option("medispace_active_flow", $flow_slug);

    $force = !empty($_POST["force"]);

    $applied = medispace_apply_style_variation(
        $flows[$flow_slug]["style_variation"],
        $force,
    );

    delete_transient("medispace_show_flow_notice");

    // Style variation was skipped because manual customizations were
    // detected — send the user back with a warning instead of a
    // silent success message.
    if ("blocked" === $applied) {
        wp_safe_redirect(
            add_query_arg(
                [
                    "medispace_styles_customized" => "1",
                    "flow" => $flow_slug,
                ],
                admin_url("themes.php?page=medispace-setup"),
            ),
        );
        exit();
    }

    // Clear DB customizations for templates and parts to prevent blocking the new flow.
    $overrides = get_posts([
        "post_type" => ["wp_template", "wp_template_part"],
        "post_name__in" => ["front-page", "home", "header", "footer"],
        "posts_per_page" => -1,
        "post_status" => "any",
    ]);

    foreach ($overrides as $override) {
        wp_delete_post($override->ID, true);
    }

    wp_safe_redirect(
        add_query_arg(
            "medispace_updated",
            "1",
            admin_url("themes.php?page=medispace-setup"),
        ),
    );
    exit();
});

/**
 * Programmatically apply a Style Variation (styles/*.json) — the same
 * mechanism as clicking a card in Site Editor → Styles → Browse styles.
 *
 * Guarded: if the current global styles content doesn't match what we
 * last wrote ourselves (meaning someone customized colors/fonts by hand
 * since), it refuses to overwrite unless $force is true.
 *
 * @param string $variation_slug File name without .json (e.g. 'flow-3-medical').
 * @param bool   $force          Overwrite even if manual customizations are detected.
 * @return bool|string true on success, false on failure, 'blocked' if customizations detected.
 */
function medispace_apply_style_variation($variation_slug, $force = false)
{
    $variation_file =
        MEDISPACE_THEME_PATH . "/styles/" . $variation_slug . ".json";

    if (!file_exists($variation_file)) {
        return false;
    }

    $variation_data = json_decode(file_get_contents($variation_file), true);

    if (!is_array($variation_data)) {
        return false;
    }

    if (!class_exists("WP_Theme_JSON_Resolver")) {
        return false;
    }

    // Core creates the user global styles post with tax_input, which is skipped when nobody with
    // the right capability is logged in (WP-CLI, cron, a demo import run from the command line).
    // Without its wp_theme term core never finds that post again - the front end misses the
    // flow's styles and the next lookup creates a duplicate. Re-attach an orphan first.
    $orphan = get_page_by_path("wp-global-styles-" . urlencode(get_stylesheet()), OBJECT, "wp_global_styles");
    if ($orphan && !has_term(get_stylesheet(), "wp_theme", $orphan)) {
        wp_set_object_terms($orphan->ID, get_stylesheet(), "wp_theme");
    }

    $global_styles_id = WP_Theme_JSON_Resolver::get_user_global_styles_post_id();

    if ($global_styles_id && !has_term(get_stylesheet(), "wp_theme", $global_styles_id)) {
        wp_set_object_terms($global_styles_id, get_stylesheet(), "wp_theme");
    }

    if (!$force && medispace_styles_were_customized($global_styles_id)) {
        return "blocked";
    }

    $user_theme_json = [
        "version" => isset($variation_data["version"])
            ? $variation_data["version"]
            : 3,
        "isGlobalStylesUserThemeJSON" => true,
        "settings" => isset($variation_data["settings"])
            ? $variation_data["settings"]
            : new stdClass(),
        "styles" => isset($variation_data["styles"])
            ? $variation_data["styles"]
            : new stdClass(),
    ];

    $json_string = wp_json_encode($user_theme_json);

    wp_update_post([
        "ID" => $global_styles_id,
        // wp_update_post() assumes slashed input (like raw $_POST data)
        // and strips backslashes internally via sanitize_post(). Without
        // wp_slash() here, our legitimate `\"` escape sequences inside
        // the JSON get stripped, corrupting the JSON syntax.
        "post_content" => wp_slash($json_string),
    ]);

    // Remember the hash of what we just wrote, so a future apply can tell
    // whether anyone has customized it by hand since.
    update_option("medispace_style_variation_hash", md5($json_string));

    // The resolver caches theme.json/global styles within a request — clear it.
    if (method_exists("WP_Theme_JSON_Resolver", "clean_cached_data")) {
        WP_Theme_JSON_Resolver::clean_cached_data();
    }

    return true;
}

/**
 * Whether the current global styles post content differs from the hash
 * we recorded after our own last write — i.e. someone customized it by
 * hand (via Site Editor → Styles) since we last applied a variation.
 *
 * @param int $global_styles_id Post ID of the user global styles CPT entry.
 * @return bool
 */
function medispace_styles_were_customized($global_styles_id)
{
    $last_hash = get_option("medispace_style_variation_hash", "");

    // We never applied a variation before — nothing to protect yet.
    if ("" === $last_hash) {
        return false;
    }

    $post = get_post($global_styles_id);

    if (!$post) {
        return false;
    }

    return md5($post->post_content) !== $last_hash;
}
