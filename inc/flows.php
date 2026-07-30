<?php
/**
 * Medispace Theme: Flow Registry
 *
 * Єдине джерело правди про доступні демо-флоу теми.
 * Усі інші частини системи (адмін-сторінка вибору, майбутній
 * demo-import) читають список звідси, а не дублюють його.
 *
 * @package Medispace
 */

if (!function_exists("medispace_get_available_flows")):
    /**
     * @return array<string, array{label:string, description:string, style_variation:string, screenshot:string}>
     */
    function medispace_get_available_flows()
    {
        $flows = [
            "medical" => [
                "label" => __("Medical Coworking", "medispace"),
                "description" => __(
                    "Healthcare & therapy office space rental design.",
                    "medispace",
                ),
                "style_variation" => "flow-3-medical",
                "screenshot" => "/assets/images/medical/screenshot-flow.png",
                "front_page_template" => "/templates/front-page-medical.html",
                "header_template_part" => "/parts/header-medical.html",
                "footer_template_part" => "/parts/footer-medical.html",
            ],
            "construction" => [
                "label" => __("Construction Firm", "medispace"),
                "description" => __(
                    "Company / construction firm design.",
                    "medispace",
                ),
                "style_variation" => "flow-2-construction",
                "screenshot" =>
                    "/assets/images/construction/screenshot-flow.png",
                "front_page_template" =>
                    "/templates/template-construction-home.html",
                "header_template_part" => "/parts/header-construction.html",
                "footer_template_part" => "/parts/footer-construction.html",
            ],
        ];

        /**
         * Filters the list of available theme flows.
         *
         * @param array $flows Array of flow definitions keyed by flow slug.
         */
        return apply_filters("medispace_available_flows", $flows);
    }
endif;

if (!function_exists("medispace_get_active_flow")):
    /**
     * @return string|false Slug активного флоу, або false, якщо ще не обрано.
     */
    function medispace_get_active_flow()
    {
        $flow = get_option("medispace_active_flow", false);

        $flows = medispace_get_available_flows();

        // Захист: якщо в опції лишився slug флоу, якого більше нема в реєстрі.
        if ($flow && !isset($flows[$flow])) {
            return false;
        }

        return $flow;
    }
endif;
